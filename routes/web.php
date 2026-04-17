<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Reception\DashboardController;
use App\Http\Controllers\Reception\VisitController;
use Illuminate\Support\Facades\Route;

// --- الصفحات الرئيسية ---
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// --- نظام الزوار (Visitors) ---
Route::prefix('visitors')->group(function () {
    Route::get('/', [VisitController::class, 'createVisit'])->name('visitor.create');
    Route::get('/index', [VisitController::class, 'index'])->name('visitor.index');
    Route::post('/store', [VisitController::class, 'storeVisitor'])->name('visitor.store');
    Route::get('/blacklist', [VisitController::class, 'blacklist'])->name('visitor.blacklist');
    Route::post('/{id}/toggle-blacklist', [VisitController::class, 'toggleBlacklist'])->name('visitor.toggleBlacklist');
    Route::get('/{id}', [VisitController::class, 'showVisitor'])->name('visitor.show');
    Route::delete('/{id}', [VisitController::class, 'destroyVisitor'])->name('visitor.destroy');
    Route::get('/search', [VisitController::class, 'search'])->name('visitor.search');
    Route::get('/export', [VisitController::class, 'export'])->name('visitor.export');  
    Route::get('/import', [VisitController::class, 'importForm'])->name('visitor.import.form');
    Route::post('/import', [VisitController::class, 'import'])->name('visitor.import'); 

});

// --- نظام الزيارات (Visits) - إصدار التصاريح والتحقق ---
Route::prefix('reception')->group(function () {
    // عرض صفحة إنشاء زيارة
    Route::get('/', [VisitController::class, 'index'])->name('reception.index');
    Route::get('/visit/create', [VisitController::class, 'create'])->name('reception.visit.create');
    
    // تخزين الزيارة (إصدار الكارت)
    Route::post('/visit/store', [VisitController::class, 'createVisit'])->name('visit.create');
    Route::post('/store', [VisitController::class, 'createVisit'])->name('visit.store'); // الاسم اللي كان ناقص

    // عرض تفاصيل الزيارة (الكارت أو التأكيد)
    Route::get('/visit/{id}', [VisitController::class, 'showVisit'])->name('visit.show');
    Route::get('/visit-detail/{id}', [VisitController::class, 'showVisit'])->name('visit.show'); // لضمان عمل الكود السابق

    // نظام الماسح الضوئي (Scan & QR)
    Route::get('/scan', function () {
        return view('reception.scan');
    })->name('reception.scan');

    // التحقق عند الدخول والخروج
    Route::get('/verify/{uuid}', [VisitController::class, 'verifyQR'])->name('reception.verify');
    Route::get('/checkout/{uuid}', [VisitController::class, 'checkoutQR'])->name('reception.checkout');
     
        /**
        * عرض صفحة إضافة زائر جديد
        */
        Route::get('/visitor/new', [VisitController::class, 'createVisitorPage'])->name('visitor.new');
    
        /**
        * معالجة حفظ بيانات الزائر الجديد
        */
        Route::post('/visitor/new', [VisitController::class, 'storeVisitorData'])->name('visitor.store_data');
    
        /**
        * تسجيل دخول الزائر (Check-in)
        */
        Route::post('/visit/{id}/checkin', [VisitController::class, 'checkIn'])->name('visit.checkin');
    
        
Route::get('/visitor/new', [VisitController::class, 'createVisitorPage'])->name('visitor.new');
Route::post('/visitor/new', [VisitController::class, 'storeVisitorData'])->name('visitor.store_data');
    // عرض صفحة إضافة زائر
    Route::get('/visitor/new', [VisitController::class, 'createVisitorPage'])->name('visitor.new');

    // الرووت ده POST يعني ملوش صفحة تتفتح.. هو بس بياخد البيانات ويحولك لصفحة العرض
    Route::post('/visit/store', [VisitController::class, 'createVisit'])->name('visit.store');
// معالجة الحفظ
    Route::post('/visitor/new', [VisitController::class, 'storeVisitorData'])->name('visitor.store_data'); 
    // تسجيل الدخول الفعلي (Check-in)
    Route::post('/visit/{id}/checkin', [VisitController::class, 'checkIn'])->name('visit.checkin');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';