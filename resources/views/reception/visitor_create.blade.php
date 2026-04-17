<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight">
            {{ __('تسجيل زائر جديد بالنظام') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            {{-- رسائل النجاح أو الخطأ --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border-r-4 border-green-500 text-green-700 rounded-xl flex items-center gap-3 shadow-sm">
                    <i class="fas fa-check-circle text-xl"></i>
                    <p class="font-bold">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden">
                <div class="md:flex">
                    
                    {{-- الجانب الأيمن: تعليمات أو صورة توضيحية --}}
                    <div class="md:w-1/3 bg-slate-900 p-8 text-white flex flex-col justify-center">
                        <div class="mb-6">
                            <i class="fas fa-user-plus text-5xl text-blue-400"></i>
                        </div>
                        <h3 class="text-xl font-black mb-4">تسجيل البيانات الأساسية</h3>
                        <ul class="space-y-4 text-slate-400 text-sm">
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-500 text-xs"></i>
                                تأكد من دقة الـ 14 رقم للرقم القومي.
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-500 text-xs"></i>
                                تحميل صورة شخصية واضحة للزائر.
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-blue-500 text-xs"></i>
                                رقم الهاتف يستخدم للتواصل الطارئ.
                            </li>
                        </ul>
                    </div>

                    {{-- الجانب الأيسر: الفورم --}}
                    <div class="md:w-2/3 p-8">
                        <form action="{{ route('visitor.store_data') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 gap-6">
                                
                                {{-- الاسم الكامل --}}
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">اسم الزائر (رباعي)</label>
                                    <input type="text" name="name" value="{{ old('name') }}" 
                                        class="w-full p-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition @error('name') border-red-500 @enderror" 
                                        placeholder="أدخل الاسم كما هو في البطاقة" required>
                                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                {{-- الرقم القومي --}}
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">الرقم القومي (14 رقم)</label>
                                    <input type="text" name="national_id" value="{{ old('national_id') }}" maxlength="14"
                                        class="w-full p-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition @error('national_id') border-red-500 @enderror" 
                                        placeholder="29901010000000" required>
                                    @error('national_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    {{-- رقم الهاتف --}}
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">رقم الهاتف</label>
                                        <input type="text" name="phone" value="{{ old('phone') }}" 
                                            class="w-full p-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition" 
                                            placeholder="01xxxxxxxxx">
                                    </div>
                                    
                                    {{-- رفع الصورة --}}
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">الصورة الشخصية</label>
                                        <input type="file" name="image" 
                                            class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                                    </div>
                                </div>

                                <div class="pt-6 border-t border-slate-100 flex gap-4">
                                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg transition transform active:scale-95">
                                        حفظ بيانات الزائر
                                    </button>
                                    <a href="{{ route('dashboard') }}" class="px-8 py-4 bg-slate-100 text-slate-600 font-bold rounded-2xl hover:bg-slate-200 transition">
                                        إلغاء
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
