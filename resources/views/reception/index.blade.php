<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight">
            {{ __('بوابة إصدار تصاريح الزيارة') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            {{-- رسائل الأخطاء --}}
            @if ($errors->any())
                <div class="bg-red-100 border-r-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl shadow-sm" role="alert">
                    <p class="font-bold mb-1">عفواً، هناك خطأ في البيانات:</p>
                    <ul class="list-disc mr-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-6 flex justify-between items-center bg-blue-50 p-4 rounded-2xl border border-blue-100">
    <p class="text-sm text-blue-800 font-bold">زائر جديد؟ سجل بياناته أولاً</p>
    <a href="{{ route('visitor.new') }}" class="bg-blue-600 text-white px-4 py-2 rounded-xl text-xs font-black hover:bg-blue-700 transition">
        <i class="fas fa-plus ml-1"></i> تسجيل زائر جديد
    </a>
</div>
            {{-- الكارت الرئيسي --}}
            <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
                
                {{-- هيدر الكارت بتدرج ألوان فخم --}}
                <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-black p-8 text-center text-white">
                    <div class="mb-3 inline-block p-4 bg-white/10 rounded-full">
                        <i class="fas fa-id-card-alt text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-black mb-1">بوابة إصدار تصاريح الزيارة</h3>
                    <p class="text-slate-400 text-sm">نظام الإدارة الذكي - قسم الاستقبال</p>
                </div>

             
{{-- محتوى الفورم --}}
{{-- تم تعديل الرووت هنا ليكون visit.store ليتوافق مع المتحكم --}}
<form action="{{ route('visit.store') }}" method="POST" class="p-8">
    @csrf
    <div class="space-y-6">
        
        {{-- الرقم القومي للزائر --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">الرقم القومي للزائر</label>
            <div class="relative">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="fas fa-user-check text-blue-500"></i>
                </div>
                <input type="text" name="national_id" value="{{ old('national_id') }}" 
                    class="w-full p-3 pr-10 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" 
                    placeholder="أدخل 14 رقم للزائر المسجل" required>
            </div>
        </div>

        {{-- كود النزيل --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">كود النزيل</label>
            <div class="relative">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="fas fa-key text-blue-500"></i>
                </div>
                <input type="text" name="inmate_code" value="{{ old('inmate_code') }}" 
                    class="w-full p-3 pr-10 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" 
                    placeholder="مثال: IN-2026" required>
            </div>
        </div>

        {{-- صلة القرابة --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">صلة القرابة</label>
            <div class="relative">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="fas fa-users text-blue-500"></i>
                </div>
                <select name="relation_type" class="w-full p-3 pr-10 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition bg-white appearance-none">
                    <option value="والد/والدة">والد/والدة</option>
                    <option value="أخ/أخت">أخ/أخت</option>
                    <option value="زوج/زوجة">زوج/زوجة</option>
                    <option value="محامٍ">محامٍ</option>
                    <option value="أخرى">أخرى</option>
                </select>
            </div>
        </div>

        {{-- زرار الحفظ --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-xl shadow-lg shadow-blue-200 transition transform active:scale-95 flex items-center justify-center gap-2">
                <i class="fas fa-qrcode"></i>
                إصدار كارت الـ QR
            </button>
            
            <a href="{{ route('dashboard') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-4 rounded-xl transition flex items-center justify-center gap-2">
                <i class="fas fa-arrow-right"></i>
                العودة للرئيسية
            </a>
        </div>
    </div>
</form>
                   @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border-r-4 border-red-500 text-red-700 rounded-xl">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="bg-slate-50 text-center py-4 border-t border-gray-100">
                    <p class="text-slate-500 text-xs">نظام إدارة الزيارات الذكي © 2026</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>