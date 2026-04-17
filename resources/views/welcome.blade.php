<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نظام إدارة الزوار الذكي | Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 overflow-x-hidden">

    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-200">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <span class="text-xl font-black tracking-tighter text-slate-800 uppercase">Gooo<span class="text-blue-600">code</span></span>
            </div>
            
            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-slate-600 hover:text-blue-600 transition">لوحة التحكم</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-bold text-slate-600 hover:text-blue-600 transition">تسجيل الدخول</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-slate-900 text-white px-5 py-2 rounded-xl text-sm font-bold hover:bg-slate-800 transition shadow-lg">ابدأ الآن</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-right">
                    <span class="inline-block px-4 py-2 bg-blue-50 text-blue-600 rounded-full text-xs font-black uppercase tracking-widest mb-6">إصدار 2026 المحترف</span>
                    <h1 class="text-5xl lg:text-7xl font-black text-slate-900 leading-[1.1] mb-6">
                        نظام إدارة <br> <span class="text-blue-600">الزوار والمنشآت</span>
                    </h1>
                    <p class="text-lg text-slate-500 mb-10 max-w-lg leading-relaxed font-medium">
                        الحل المتكامل لتنظيم عمليات الدخول والخروج، إصدار تصاريح الزيارة، ومراقبة حركة الزوار بدقة عالية باستخدام تقنية QR Code.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('login') }}" class="px-8 py-4 bg-blue-600 text-white rounded-2xl font-black shadow-xl shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition duration-300">
                            ابدأ العمل الآن <i class="fas fa-arrow-left mr-2"></i>
                        </a>
                        <div class="flex items-center gap-3 px-6 py-4">
                            <div class="flex -space-x-3 space-x-reverse">
                                <img class="w-10 h-10 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=W&background=0D8ABC&color=fff" alt="">
                                <img class="w-10 h-10 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=A&background=22c55e&color=fff" alt="">
                            </div>
                            <span class="text-xs font-bold text-slate-400">يثق بنا أكثر من 500+ مؤسسة</span>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-blue-100 rounded-full blur-3xl opacity-50"></div>
                    <div class="bg-white p-4 rounded-[2.5rem] shadow-2xl border border-slate-100 relative z-10 rotate-3 hover:rotate-0 transition duration-500">
                        <img src="https://img.freepik.com/free-vector/security-guard-concept-illustration_114360-6077.jpg" class="rounded-[2rem]" alt="Security System">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-black text-slate-900">لماذا تختار نظامنا؟</h2>
                <p class="text-slate-500 mt-4">مميزات صممت خصيصاً لتلبية احتياجاتك الأمنية</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-blue-200 transition group">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-blue-600 mb-6 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                        <i class="fas fa-qrcode text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">تقنية QR Code</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">إصدار تصاريح دخول فورية تحتوي على رموز مشفرة لضمان أمن البيانات وسرعة التحقق.</p>
                </div>

                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-blue-200 transition group">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-orange-600 mb-6 group-hover:bg-orange-600 group-hover:text-white transition duration-300">
                        <i class="fas fa-user-shield text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">القائمة السوداء</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">نظام حظر ذكي يمنع دخول الأشخاص غير المرغوب فيهم تلقائياً مع تنبيه أمني فوري.</p>
                </div>

                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:border-blue-200 transition group">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-emerald-600 mb-6 group-hover:bg-emerald-600 group-hover:text-white transition duration-300">
                        <i class="fas fa-chart-line text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">تقارير مباشرة</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">لوحة تحكم تعرض إحصائيات حية لعدد الزوار المتواجدين حالياً وسجلات الدخول والخروج.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-12 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <span class="text-xl font-black uppercase tracking-tighter">Gooo<span class="text-blue-500">code</span></span>
            </div>
            <p class="text-slate-400 text-sm">© 2026 جميع الحقوق محفوظة لـ Waleed Ali. تم التصميم بواسطة فريق Gooocode.</p>
            <div class="flex gap-4">
                <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="w-10 h-10 bg-white/5 rounded-full flex items-center justify-center hover:bg-blue-600 transition"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>