<?php

namespace App\Http\Controllers\Reception;

use App\Http\Controllers\Controller;
use App\Models\Inmate;
use App\Models\Visit;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VisitController extends Controller
{
    /**
     * عرض جميع الزيارات في لوحة التحكم
     */
    public function index() {
        $visits = Visit::with(['visitor', 'inmate'])->latest()->paginate(10);
        return view('reception.index', compact('visits'));
    }

    /**
     * تسجيل زائر جديد في النظام
     */
    public function storeVisitor(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'national_id' => 'required|digits:14|unique:visitors',
            'phone' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('visitors', 'public');
        }

        $visitor = Visitor::create([
            'name' => $validated['name'],
            'national_id' => $validated['national_id'],
            'phone' => $request->phone,
            'image_path' => $imagePath,
        ]);

        return back()->with('success', 'تم حفظ الزائر ' . $visitor->name . ' بنجاح');
    }

    /**
     * إنشاء زيارة وإصدار UUID للكود
     */
  public function createVisit(Request $request) {
    // 1. البحث عن الزائر
    $visitor = Visitor::where('national_id', $request->national_id)->first();
    
    // 🛑 الحماية: لو الزائر مش موجود، ارجع برسالة خطأ بدل ما تضرب Error
    if (!$visitor) {
        return back()->with('error', 'عذراً: الرقم القومي للزائر غير مسجل في النظام.');
    }

    // 2. البحث عن النزيل
    $inmate = Inmate::where('inmate_code', $request->inmate_code)->first();
    
    // 🛑 الحماية: لو النزيل مش موجود
    if (!$inmate) {
        return back()->with('error', 'عذراً: كود النزيل غير صحيح.');
    }

    // 3. التحقق من الحظر
    if ($visitor->is_blacklisted) {
        return back()->with('error', 'تنبيه أمني: هذا الزائر محظور!');
    }

    // 4. إنشاء الزيارة (دلوقتي إحنا واثقين إن $visitor و $inmate مش null)
    $visit = Visit::create([
        'visitor_id'    => $visitor->id,
        'inmate_id'     => $inmate->id,
        'visit_uuid'    => (string) \Illuminate\Support\Str::uuid(), 
        'relation_type' => $request->relation_type ?? 'غير محدد',
        'status'        => 'pending',
    ]);

    if ($visit) {
        return redirect()->route('visit.show', $visit->id)->with('success', 'تم إنشاء التصريح بنجاح');
    }

    return back()->with('error', 'حدث خطأ أثناء إنشاء الزيارة.');
}

    /**
     * عرض كارت الزيارة (QR Code)
     */
    public function showVisit($id) {
        $visit = Visit::with(['visitor', 'inmate'])->findOrFail($id);
        return view('reception.visit_card', compact('visit'));    
    }

    /**
     * التحقق من الـ QR Code وتسجيل الدخول (Check-in)
     */
    public function verifyQR($uuid) {
        $visit = Visit::with(['visitor', 'inmate'])->where('visit_uuid', $uuid)->first();

        if (!$visit) {
            return redirect()->route('reception.scan')->with('error', 'عفواً! هذا الكود غير صحيح أو منتهي.');
        }

        if ($visit->visitor->is_blacklisted) {
            return redirect()->route('reception.scan')->with('error', '🚨 خطر: الزائر مدرج في القائمة السوداء!');
        }

        try {
            $visit->update([
                'status' => 'entered',
                'entry_at' => now(), // تأكد إن الاسم في الداتابيز entry_at وليس entry_time
            ]);

            return view('reception.visit_details', compact('visit'))->with('success', 'تم السماح بالدخول');
            
        } catch (\Exception $e) {
            return redirect()->route('reception.scan')->with('error', 'خطأ تقني: ' . $e->getMessage());
        }
    }

    /**
     * تسجيل الخروج (Check-out)
     */
    public function checkoutQR($uuid) {
        $visit = Visit::where('visit_uuid', $uuid)->where('status', 'entered')->first();

        if (!$visit) {
            return redirect()->route('reception.scan')->with('error', 'لا توجد زيارة نشطة حالياً لهذا الكود.');
        }

        $visit->update([
            'status' => 'completed',
            'exit_at' => now(), // تأكد إن الاسم في الداتابيز exit_at
        ]);

        return redirect()->route('reception.scan')->with('success', 'تم تسجيل خروج الزائر بنجاح');
    }

    /**
     * إدارة القائمة السوداء
     */
    public function blacklist() {
        $blacklistedVisitors = Visitor::where('is_blacklisted', true)->latest()->paginate(10);
        return view('reception.blacklist', compact('blacklistedVisitors'));
    }   

    public function toggleBlacklist($id) {
        $visitor = Visitor::findOrFail($id);
        $visitor->is_blacklisted = !$visitor->is_blacklisted;
        $visitor->save();

        return back()->with('success', 'تم تحديث حالة القائمة السوداء للزائر: ' . $visitor->name);
    } 


    // لعرض الصفحة
public function createVisitorPage() {
    return view('reception.visitor_create');
}

// لحفظ البيانات
public function storeVisitorData(Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'national_id' => 'required|digits:14|unique:visitors,national_id',
        'phone' => 'nullable|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ], [
        'national_id.unique' => 'هذا الرقم القومي مسجل مسبقاً في النظام.',
        'national_id.digits' => 'الرقم القومي يجب أن يكون 14 رقم.',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('visitors', 'public');
    }

    Visitor::create([
        'name' => $validated['name'],
        'national_id' => $validated['national_id'],
        'phone' => $request->phone,
        'image_path' => $imagePath,
    ]);

    return redirect()->route('reception.index')->with('success', 'تم تسجيل الزائر بنجاح، يمكنك الآن إصدار تصريح له.');
}
}