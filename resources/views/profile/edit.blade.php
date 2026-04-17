<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight">
            {{ __('الملف الشخصي') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- الجزء الأول: معلومات الحساب --}}
            <div class="p-8 bg-white shadow-xl sm:rounded-3xl border border-slate-100 relative overflow-hidden">
                <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                    {{-- الصورة الرمزية --}}
                    <div class="relative">
                        <div class="w-32 h-32 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-3xl flex items-center justify-center text-white text-5xl font-black shadow-2xl shadow-blue-200">
                            {{ mb_substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-emerald-500 border-4 border-white rounded-full flex items-center justify-center text-white shadow-lg" title="نشط الآن">
                            <i class="fas fa-check text-xs"></i>
                        </div>
                    </div>

                    {{-- البيانات الأساسية --}}
                    <div class="flex-1 text-right">
                        <h3 class="text-3xl font-black text-slate-800 mb-2">{{ Auth::user()->name }}</h3>
                        <p class="text-slate-500 flex items-center gap-2 justify-end md:justify-start">
                             {{ Auth::user()->email }} <i class="far fa-envelope text-blue-500"></i>
                        </p>
                        <div class="mt-4 flex flex-wrap gap-3 justify-end md:justify-start">
                            <span class="px-4 py-1.5 bg-slate-100 text-slate-600 rounded-xl text-xs font-bold border border-slate-200">
                                <i class="fas fa-user-tag ml-1"></i> مسؤول نظام
                            </span>
                            <span class="px-4 py-1.5 bg-blue-50 text-blue-600 rounded-xl text-xs font-bold border border-blue-100">
                                <i class="fas fa-calendar-check ml-1"></i> عضو منذ {{ Auth::user()->created_at->format('Y/m/d') }}
                            </span>
                        </div>
                    </div>

                    {{-- زرار التعديل السريع --}}
                    <div class="md:border-r md:pr-8 border-slate-100">
                        <button onclick="window.print()" class="px-6 py-3 bg-slate-900 text-white rounded-2xl font-bold hover:bg-slate-800 transition flex items-center gap-2">
                            <i class="fas fa-print"></i> طباعة بياناتي
                        </button>
                    </div>
                </div>
                
                {{-- خلفية ديكور --}}
                <i class="fas fa-user-circle absolute -left-10 -bottom-10 text-[15rem] text-slate-50 pointer-events-none"></i>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- كارت: إحصائيات سريعة للموظف --}}
                <div class="p-8 bg-white shadow-lg sm:rounded-3xl border border-slate-100">
                    <h4 class="font-black text-slate-800 mb-6 flex items-center gap-2 text-lg">
                        <i class="fas fa-chart-pie text-blue-500"></i> نشاطك اليوم
                    </h4>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl">
                            <span class="text-slate-500 font-bold">زيارات سجلتها</span>
                            <span class="text-xl font-black text-blue-600">12</span>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl">
                            <span class="text-slate-500 font-bold">ساعات العمل</span>
                            <span class="text-xl font-black text-orange-600">08:30</span>
                        </div>
                    </div>
                </div>

                {{-- كارت: إعدادات الأمان --}}
                <div class="p-8 bg-white shadow-lg sm:rounded-3xl border border-slate-100 flex flex-col justify-between">
                    <div>
                        <h4 class="font-black text-slate-800 mb-6 flex items-center gap-2 text-lg">
                            <i class="fas fa-lock text-red-500"></i> الأمان والخصوصية
                        </h4>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6">
                            تأكد دائماً من تحديث كلمة المرور بشكل دوري لضمان حماية بيانات المنشأة والزوار.
                        </p>
                    </div>
                    <a href="{{ route('profile.edit') ?? '#' }}" class="w-full py-4 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-2xl font-black transition text-center">
                        تعديل كلمة المرور
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>