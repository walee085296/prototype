<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight print:hidden">
            {{ __('تفاصيل دخول الزائر') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4 max-w-4xl">
            
            {{-- 1. التنبيهات --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-r-4 border-green-500 text-green-700 flex items-center shadow-sm rounded-xl animate-bounce print:hidden">
                    <i class="fas fa-check-circle ml-3 text-xl"></i>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 border-r-4 border-red-500 text-red-700 shadow-md rounded-xl flex items-center animate-shake print:hidden">
                    <i class="fas fa-exclamation-triangle ml-3 text-xl"></i>
                    <div class="font-bold">{{ session('error') }}</div>
                </div>
                <audio autoplay><source src="https://www.soundjay.com/buttons/beep-05.mp3" type="audio/mpeg"></audio>
            @endif

            {{-- 2. كارت التفاصيل الرئيسي --}}
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
                
                {{-- الهيدر --}}
                <div class="bg-slate-900 p-6 text-white flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-black">تم إثبات الدخول</h2>
                        <p class="text-slate-400 text-xs mt-1 uppercase tracking-widest">Smart Reception System</p>
                    </div>
                    <div class="flex flex-col items-end">
                        <div class="bg-emerald-500 text-white px-4 py-1.5 rounded-full text-[10px] font-black mb-1 animate-pulse flex items-center gap-1">
                            <i class="fas fa-sign-in-alt"></i> دخل المنشأة الآن
                        </div>
                        <span class="text-[10px] text-slate-500 font-mono">ID: #{{ $visit->id }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-0 p-0">
                    
                    {{-- القسم الأيمن: بيانات الزائر --}}
                    <div class="p-8 border-b md:border-b-0 md:border-l border-slate-100 space-y-6">
                        <h3 class="text-blue-600 font-black text-sm uppercase tracking-wider flex items-center gap-2 mb-4">
                            <i class="fas fa-user-shield"></i> بيانات الزائر الموثقة
                        </h3>
                        
                        <div class="flex items-center gap-6 bg-slate-50 p-6 rounded-2xl border border-slate-100 shadow-inner">
                            <div class="relative">
                                @if($visit->visitor && $visit->visitor->image)
                                    <img src="{{ asset('storage/' . $visit->visitor->image) }}" 
                                         class="w-24 h-24 rounded-2xl object-cover border-4 border-white shadow-lg">
                                @else
                                    <div class="w-24 h-24 bg-slate-200 rounded-2xl flex items-center justify-center border-4 border-white shadow-lg text-slate-400 text-4xl">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                                <div class="absolute -bottom-2 -left-2 bg-emerald-600 text-white p-1 rounded-lg shadow-lg">
                                    <i class="fas fa-check-circle text-[12px]"></i>
                                </div>
                            </div>

                            <div>
                                <p class="text-slate-400 text-[10px] font-bold uppercase mb-1">الاسم الكامل</p>
                                <p class="font-black text-xl text-slate-800 leading-tight capitalize">{{ $visit->visitor->name ?? 'غير مسجل' }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                                <p class="text-slate-400 text-[9px] font-bold uppercase mb-1">الرقم القومي</p>
                                <p class="font-mono font-bold text-slate-700">{{ $visit->visitor->national_id ?? '---' }}</p>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                                <p class="text-slate-400 text-[9px] font-bold uppercase mb-1">رقم الهاتف</p>
                                <p class="font-bold text-slate-700">{{ $visit->visitor->phone ?? 'لا يوجد' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- القسم الأيسر: بيانات الزيارة والوقت --}}
                    <div class="p-8 bg-slate-50/50 space-y-6">
                        <h3 class="text-blue-600 font-black text-sm uppercase tracking-wider flex items-center gap-2 mb-4">
                            <i class="fas fa-info-circle"></i> تفاصيل الزيارة
                        </h3>

                        <div class="space-y-4">
                            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                                <div class="flex justify-between items-center pb-2 border-b border-slate-100">
                                    <span class="text-slate-500 text-xs font-bold">كود النزيل:</span>
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-lg font-black text-sm">
                                        {{ $visit->inmate->inmate_code ?? 'غير متوفر' }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center pb-2 border-b border-slate-100">
                                    <span class="text-slate-500 text-xs font-bold">اسم النزيل:</span>
                                    <span class="font-bold text-slate-800 text-sm">{{ $visit->inmate->full_name ?? '---' }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-slate-500 text-xs font-bold">صلة القرابة:</span>
                                    <span class="bg-slate-100 text-slate-700 px-3 py-1 rounded-lg font-bold text-xs">{{ $visit->relation_type }}</span>
                                </div>
                            </div>

                            <div class="bg-slate-900 rounded-2xl p-6 text-white shadow-2xl relative overflow-hidden group">
                                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:rotate-12 transition-transform">
                                    <i class="fas fa-clock text-6xl"></i>
                                </div>
                                <p class="text-[9px] text-slate-500 font-black uppercase tracking-widest text-center mb-3">توقيت الدخول المعتمد</p>
                                <div class="flex justify-around items-center relative z-10">
                                    <div class="text-center">
                                        <p class="text-3xl font-black text-blue-400">
                                            {{ \Carbon\Carbon::parse($visit->entry_time)->format('h:i A') }}
                                        </p>
                                        <p class="text-[10px] text-slate-500 mt-1 font-bold">الوقت</p>
                                    </div>
                                    <div class="h-10 w-[1px] bg-slate-700"></div>
                                    <div class="text-center">
                                        <p class="text-xl font-black text-slate-200 tracking-tighter">
                                            {{ \Carbon\Carbon::parse($visit->entry_time)->format('Y/m/d') }}
                                        </p>
                                        <p class="text-[10px] text-slate-500 mt-1 font-bold">التاريخ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- الأزرار السفلى --}}
                <div class="p-6 flex flex-col md:flex-row gap-4 bg-white border-t border-slate-100 print:hidden">
                    <a href="{{ route('reception.scan') }}" class="flex-[2] bg-blue-600 hover:bg-blue-700 text-white text-center font-black py-4 rounded-2xl transition shadow-lg shadow-blue-200 flex items-center justify-center gap-2 transform active:scale-95">
                        <i class="fas fa-qrcode text-xl"></i>
                        مسح كود لزائر آخر
                    </a>
                    <button onclick="window.print()" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 font-black rounded-2xl transition flex items-center justify-center gap-2">
                        <i class="fas fa-print"></i>
                        إيصال دخول
                    </button>
                </div>
            </div>

            <div class="text-center mt-6 text-slate-400 text-xs font-bold uppercase tracking-widest print:hidden">
                <i class="fas fa-shield-alt ml-1 text-emerald-500"></i> نظام التحقق الرقمي المؤمن
            </div>
        </div>
    </div>

    <style>
        @media print {
            nav, .print\:hidden, header { display: none !important; }
            body { background: white !important; }
            .container { max-width: 100% !important; padding: 0 !important; margin: 0 !important; }
            .shadow-xl, .shadow-2xl, .shadow-inner { box-shadow: none !important; }
            .rounded-3xl { border-radius: 0 !important; border: 1px solid #eee !important; }
        }
        .animate-shake { animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both; }
        @keyframes shake {
            10%, 90% { transform: translate3d(-1px, 0, 0); }
            20%, 80% { transform: translate3d(2px, 0, 0); }
            30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
            40%, 60% { transform: translate3d(4px, 0, 0); }
        }
    </style>
</x-app-layout>