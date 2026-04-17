<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight print:hidden text-center">
            {{ __('تصريح الدخول الذكي') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center justify-center min-h-[85vh] p-6 bg-slate-100 print:bg-white print:p-0 print:min-h-0">
        
        {{-- كارت الزيارة بتصميم عصري --}}
        <div id="printableCard" class="bg-white border-t-[6px] border-blue-600 rounded-2xl p-0 w-[420px] shadow-2xl overflow-hidden relative print:shadow-none print:border-2 print:w-[350px] print:rounded-none">
            
            {{-- الهيدر المميز --}}
            <div class="bg-slate-50 p-6 border-b border-dashed border-slate-200 text-center relative">
                <div class="absolute top-4 right-4 text-blue-600 opacity-20">
                    <i class="fas fa-shield-alt text-4xl"></i>
                </div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight">تصريح زيارة رسمية</h2>
                <p class="text-[11px] font-bold text-blue-600 uppercase tracking-widest mt-1">Smart Management System</p>
            </div>
            
            {{-- جسم الكارت --}}
            <div class="p-8 flex gap-6 items-start" dir="rtl">
                
                {{-- البيانات الأساسية --}}
                <div class="flex-1 space-y-4 text-right">
                    <div>
                        <p class="text-[10px] text-slate-400 font-bold uppercase mb-1">اسم الزائر الكريم</p>
                        <p class="text-base font-black text-slate-900 leading-none">{{ $visit->visitor->name ?? 'غير متوفر' }}</p>
                    </div>

                    <div>
                        <p class="text-[10px] text-slate-400 font-bold uppercase mb-1">النزيل المطلوب زيارته</p>
                        <p class="text-sm font-bold text-slate-700 leading-none">{{ $visit->inmate->full_name ?? 'غير متوفر' }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 pt-2">
                        <div>
                            <p class="text-[9px] text-slate-400 font-bold uppercase mb-1">تاريخ اليوم</p>
                            <p class="text-xs font-black text-slate-800">{{ date('Y/m/d') }}</p>
                        </div>
                        <div>
                            <p class="text-[9px] text-slate-400 font-bold uppercase mb-1">وقت الزيارة</p>
                            <p class="text-xs font-black text-slate-800">{{ date('h:i A') }}</p>
                        </div>
                    </div>
                </div>

                {{-- منطقة الـ QR المتميزة --}}
                <div class="flex flex-col items-center gap-2">
                    <div class="p-2 bg-white border-2 border-slate-900 rounded-xl shadow-inner">
                        {!! QrCode::size(100)->margin(1)->color(15, 23, 42)->generate($visit->visit_uuid) !!}
                    </div>
                    <span class="text-[8px] font-mono text-slate-400">#{{ substr($visit->visit_uuid, 0, 8) }}</span>
                </div>
            </div>

            {{-- تذييل الكارت (الفوتّر) --}}
            <div class="bg-slate-900 p-3 text-center">
                <div class="flex justify-center items-center gap-2 text-white">
                    <i class="fas fa-exclamation-triangle text-[10px] text-yellow-400"></i>
                    <p class="text-[9px] font-bold uppercase tracking-widest text-slate-200">صالح للاستخدام لمرة واحدة فقط عند البوابة</p>
                </div>
            </div>
        </div>

        {{-- أزرار التحكم --}}
        <div class="mt-8 flex gap-4 print:hidden">
            <button onclick="window.print()" class="bg-slate-900 hover:bg-black text-white px-10 py-4 rounded-2xl font-black shadow-xl transition transform active:scale-95 flex items-center gap-3">
                <i class="fas fa-print text-lg"></i>
                طباعة التصريح الآن
            </button>
            
            <a href="{{ route('dashboard') }}" class="bg-white hover:bg-slate-50 text-slate-600 px-10 py-4 rounded-2xl font-bold border border-slate-200 transition">
                العودة للوحة التحكم
            </a>
        </div>
    </div>

    {{-- تحسينات الطباعة --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap');
        
        body { font-family: 'Cairo', sans-serif; }

        @media print {
            nav, header, .print\:hidden, .mt-8 { display: none !important; }
            body { background: white !important; }
            #printableCard {
                position: absolute;
                top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                border: 1px solid #000 !important;
                border-top: 5px solid #000 !important;
            }
        }
    </style>
</x-app-layout>