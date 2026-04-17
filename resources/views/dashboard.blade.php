<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight">
            {{ __('لوحة الاستقبال') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4 space-y-8">
        {{-- 1. صف العدادات (Cards) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border-r-4 border-blue-500 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">زيارات اليوم</p>
                    <h3 class="text-3xl font-black text-slate-800">{{ $stats['total_today'] ?? 0 }}</h3>
                </div>
                <div class="bg-blue-50 p-4 rounded-xl text-blue-600">
                    <i class="fas fa-users text-2xl"></i>
                </div>
            </div>
             
            <div class="bg-white p-6 rounded-2xl shadow-sm border-r-4 border-orange-500 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">متواجدون الآن</p>
                    <h3 class="text-3xl font-black text-slate-800">{{ $stats['currently_inside'] ?? 0 }}</h3>
                </div>
                <div class="bg-orange-50 p-4 rounded-xl text-orange-600">
                    <i class="fas fa-sign-in-alt text-2xl"></i>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border-r-4 border-green-500 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">تم تسجيل خروجهم</p>
                    <h3 class="text-3xl font-black text-slate-800">{{ $stats['completed_today'] ?? 0 }}</h3>
                </div>
                <div class="bg-green-50 p-4 rounded-xl text-green-600">
                    <i class="fas fa-check-double text-2xl"></i>
                </div>
            </div>
        </div>

        {{-- 2. القسم السفلي: مقسم بين الكاميرا وجدول البيانات --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-7 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-slate-50 p-4 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-slate-700">أحدث حركات الدخول والخروج</h3>
                    <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">تحديث مباشر</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-right">
                        <thead class="bg-slate-50 text-slate-500 text-xs uppercase">
                            <tr>
                                <th class="p-4">الزائر</th>
                                <th class="p-4 text-center">الحالة</th>
                                <th class="p-4 text-center">دخول</th>
                                <th class="p-4 text-center">خروج</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($recent_activities as $activity)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-4">
                                    <div class="font-bold text-slate-800 text-sm">{{ $activity->visitor->name }}</div>
                                    <div class="text-[10px] text-gray-400">كود: {{ $activity->visit_uuid }}</div>
                                </td>
                                <td class="p-4 text-center">
                                    @if($activity->status == 'entered')
                                        <span class="px-2 py-1 rounded-md bg-orange-100 text-orange-600 text-[10px] font-bold">داخل المنشأة</span>
                                    @else
                                        <span class="px-2 py-1 rounded-md bg-green-100 text-green-600 text-[10px] font-bold">اكتملت الزيارة</span>
                                    @endif
                                </td>
                                <td class="p-4 text-center text-xs text-slate-500 font-mono">
                                    {{ \Carbon\Carbon::parse($activity->entry_at)->format('h:i A' )?? '-' }}
                                </td>
                                <td class="p-4 text-center text-xs text-slate-500 font-mono">
                                    {{ \Carbon\Carbon::parse($activity->exit_at)->format('h:i A') ?? '-' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="lg:col-span-5 space-y-6">
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-8 text-center text-white shadow-xl relative overflow-hidden group">
                    <div class="relative z-10">
                        <div class="mb-4 inline-block p-4 bg-white/10 rounded-full">
                            <i class="fas fa-qrcode text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">بدء عملية مسح جديدة</h3>
                        <p class="text-slate-400 text-sm mb-6">سجل دخول أو خروج الزوار باستخدام QR Code</p>
                        <a href="{{ route('reception.scan') }}" class="block w-full py-4 bg-blue-600 hover:bg-blue-700 rounded-xl font-bold transition transform hover:scale-105">
                            افتح الكاميرا الآن
                        </a>
                    </div>
                    <i class="fas fa-shield-alt absolute -bottom-10 -right-10 text-9xl text-white/5 rotate-12"></i>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
                        
