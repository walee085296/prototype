<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-red-600 leading-tight flex items-center gap-2">
                <i class="fas fa-user-slash"></i>
                {{ __('القائمة السوداء (المحظورين)') }}
            </h2>
            <div class="bg-red-50 text-red-600 px-4 py-1.5 rounded-full text-xs font-black border border-red-100 shadow-sm">
                تحذير: هؤلاء الأشخاص غير مسموح لهم بالدخول
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- كارت القائمة السوداء --}}
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-[2.5rem] border border-red-50 relative">
                
                {{-- رأس الجدول --}}
                <div class="p-8 border-b border-slate-50 flex justify-between items-center bg-gradient-to-r from-red-50/50 to-transparent">
                    <div>
                        <h3 class="text-2xl font-black text-slate-800">إدارة سجلات المحظورين</h3>
                        <p class="text-slate-400 text-sm mt-1">يتم منع هؤلاء الزوار تلقائياً عند مسح الـ QR Code الخاص بهم</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-bold text-slate-500">إجمالي السجلات:</span>
                        <span class="w-10 h-10 bg-slate-900 text-white rounded-xl flex items-center justify-center font-black shadow-lg">
                            {{ $blacklistedVisitors->count() }}
                        </span>
                    </div>
                </div>

                {{-- الجدول --}}
                <div class="overflow-x-auto p-4">
                    <table class="w-full text-right border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">
                                <th class="p-4">الزائر</th>
                                <th class="p-4">الهوية الوطنية</th>
                                <th class="p-4">سبب الإدراج</th>
                                <th class="p-4">تاريخ الحظر</th>
                                <th class="p-4 text-center">الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($blacklistedVisitors as $visitor)
                                <tr class="group hover:bg-red-50/30 transition-all duration-300">
                                    <td class="p-4 bg-slate-50 group-hover:bg-white rounded-r-2xl border-y border-r border-slate-100 group-hover:border-red-100 transition">
                                        <div class="flex items-center gap-3">
                                            <div class="w-12 h-12 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center text-xl font-black">
                                                {{ mb_substr($visitor->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="font-black text-slate-800">{{ $visitor->name }}</div>
                                                <div class="text-[10px] text-red-500 font-bold">حظر أمني</div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="p-4 bg-slate-50 group-hover:bg-white border-y border-slate-100 group-hover:border-red-100 font-mono text-sm font-bold text-slate-600">
                                        {{ $visitor->national_id }}
                                    </td>
                                    
                                    <td class="p-4 bg-slate-50 group-hover:bg-white border-y border-slate-100 group-hover:border-red-100">
                                        <span class="text-xs text-slate-500 font-medium leading-relaxed">
                                            {{ $visitor->blacklist_reason ?? 'مخالفة السياسات الأمنية للمنشأة' }}
                                        </span>
                                    </td>

                                    <td class="p-4 bg-slate-50 group-hover:bg-white border-y border-slate-100 group-hover:border-red-100 text-xs font-bold text-slate-500">
                                        {{ $visitor->updated_at->format('Y/m/d') }}
                                    </td>

                                    <td class="p-4 bg-slate-50 group-hover:bg-white rounded-l-2xl border-y border-l border-slate-100 group-hover:border-red-100 text-center">
                                        <form action="{{ route('visitor.toggleBlacklist', $visitor->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="px-5 py-2.5 bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white rounded-xl text-xs font-black transition-all shadow-sm flex items-center gap-2 mx-auto">
                                                <i class="fas fa-user-check"></i>
                                                رفع الحظر
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-20 text-center">
                                        <div class="flex flex-col items-center opacity-20">
                                            <i class="fas fa-user-shield text-7xl mb-4"></i>
                                            <p class="text-xl font-black">القائمة السوداء فارغة حالياً</p>
                                            <p class="text-sm">لم يتم تسجيل أي زوار محظورين في النظام</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- تلميح أمني --}}
            <div class="mt-8 flex items-center gap-3 p-4 bg-amber-50 border border-amber-100 rounded-2xl">
                <i class="fas fa-exclamation-triangle text-amber-500 text-xl"></i>
                <p class="text-[11px] text-amber-700 font-bold leading-relaxed">
                    ملاحظة: عند محاولة دخول أي شخص من هذه القائمة، سيقوم النظام بإظهار تنبيه أحمر كبير للموظف يمنعه من إتمام عملية تسجيل الدخول.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>