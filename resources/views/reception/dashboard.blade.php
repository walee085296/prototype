<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight">
            {{ __('تسجيل الزوار وإصدار التصاريح') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- عرض رسائل الخطأ والنجاح --}}
            @if ($errors->any())
                <div class="bg-red-100 border-r-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm" role="alert">
                    <p class="font-bold mb-1">عفواً، هناك خطأ في البيانات:</p>
                    <ul class="list-disc mr-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 border-r-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm flex items-center gap-3">
                    <i class="fas fa-check-circle text-xl"></i>
                    <p class="font-bold">{{ session('success') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                {{-- 1. نموذج تسجيل زائر جديد --}}
                <div class="lg:col-span-5 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden self-start">
                    <div class="bg-blue-600 p-4 text-white flex items-center gap-2">
                        <i class="fas fa-user-plus"></i>
                        <h2 class="font-bold text-lg">تسجيل زائر جديد</h2>
                    </div>
                    
                    <form action="{{ route('visitor.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">الاسم الكامل</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="أدخل الاسم الرباعي" required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">الرقم القومي (14 رقم)</label>
                                <input type="text" name="national_id" value="{{ old('national_id') }}" class="w-full p-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="2990101xxxxxxx" required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">رقم الهاتف</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full p-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="01xxxxxxxxx">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">صورة الزائر</label>
                                <input type="file" name="image" class="w-full text-sm text-slate-500 file:ml-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                            </div>

                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-xl shadow-lg shadow-blue-200 transition duration-200 transform active:scale-95">
                                حفظ بيانات الزائر
                            </button>
                        </div>
                    </form>
                </div>

                {{-- 2. نموذج إصدار تصريح زيارة (اللي كان مخفي) --}}
                <div class="lg:col-span-7 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="bg-emerald-600 p-4 text-white flex items-center gap-2">
                        <i class="fas fa-id-card"></i>
                        <h2 class="font-bold text-lg">إصدار تصريح زيارة</h2>
                    </div>
                    
                    <form action="{{ route('visit.create') }}" method="POST" class="p-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-1">الرقم القومي للزائر</label>
                                <div class="relative">
                                    <input type="text" name="national_id" placeholder="ابحث بالرقم القومي لزائر مسجل..." class="w-full p-2.5 pr-10 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none transition" required>
                                    <i class="fas fa-search absolute right-3 top-3.5 text-slate-400"></i>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">كود النزيل</label>
                                <input type="text" name="inmate_code" placeholder="IN-2026" class="w-full p-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none transition" required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-1">صلة القرابة</label>
                                <select name="relation_type" class="w-full p-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none transition bg-white">
                                    <option value="والد/والدة">والد/والدة</option>
                                    <option value="أخ/أخت">أخ/أخت</option>
                                    <option value="زوج/زوجة">زوج/زوجة</option>
                                    <option value="محامٍ">محامٍ</option>
                                    <option value="أخرى">أخرى</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mt-6 p-4 bg-amber-50 rounded-xl border border-amber-200 flex items-start gap-3">
                            <i class="fas fa-shield-check text-amber-600 mt-1"></i>
                            <p class="text-sm text-amber-800 leading-relaxed">
                                <strong>تنبيه أمني:</strong> سيقوم النظام بالتحقق تلقائياً من <b>القائمة السوداء</b> ومدى استحقاق النزيل للزيارة قبل إصدار الـ QR Code.
                            </p>
                        </div>

                        <button type="submit" class="w-full mt-6 bg-emerald-600 hover:bg-emerald-700 text-white font-black py-4 rounded-xl shadow-lg shadow-emerald-200 transition duration-200 transform active:scale-95">
                            إصدار كارت الزيارة (QR Code)
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>