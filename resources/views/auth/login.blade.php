<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50">
        
        <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-white shadow-[0_20px_50px_rgba(0,0,0,0.05)] overflow-hidden sm:rounded-[2.5rem] border border-slate-100 relative">
            
            {{-- الشعار أو أيقونة القفل --}}
            <div class="flex flex-col items-center mb-10">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-xl shadow-blue-200 mb-4">
                    <i class="fas fa-lock text-2xl"></i>
                </div>
                <h2 class="text-2xl font-black text-slate-800">تسجيل الدخول</h2>
                <p class="text-slate-400 text-xs font-bold mt-1 uppercase tracking-widest">نظام إدارة الزوار الذكي</p>
            </div>

            <x-auth-session-status class="mb-6" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-black text-slate-500 mb-2 mr-1">البريد الإلكتروني</"label>
                    <div class="relative">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">
                            <i class="far fa-envelope"></i>
                        </span>
                        <input id="email" 
                               class="block w-full pr-11 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition font-bold text-sm text-slate-700" 
                               type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@example.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2 mr-1">
                        <label for="password" class="block text-xs font-black text-slate-500">كلمة المرور</label>
                        @if (Route::has('password.request'))
                            <a class="text-[10px] font-black text-blue-600 hover:text-blue-800 transition" href="{{ route('password.request') }}">
                                نسيت كلمة المرور؟
                            </a>
                        @endif
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">
                            <i class="fas fa-key"></i>
                        </span>
                        <input id="password" 
                               class="block w-full pr-11 py-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-600 transition font-bold text-sm text-slate-700"
                               type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" class="rounded-lg border-slate-200 text-blue-600 shadow-sm focus:ring-blue-500 w-5 h-5 transition" name="remember">
                        <span class="ms-2 text-xs font-bold text-slate-500 italic">{{ __('تذكرني على هذا الجهاز') }}</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button class="w-full py-4 bg-slate-900 hover:bg-blue-600 text-white rounded-2xl font-black shadow-xl shadow-slate-200 transition-all duration-300 transform active:scale-95 flex items-center justify-center gap-2 tracking-wide">
                        {{ __('دخول للنظام') }}
                        <i class="fas fa-sign-in-alt text-sm"></i>
                    </button>
                </div>
            </form>

            {{-- Footer بسيط للفورم --}}
            {{-- @if (Route::has('register'))
                <p class="mt-8 text-center text-xs font-bold text-slate-400">
                    ليس لديك حساب؟ 
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">أنشئ حساباً جديداً</a>
                </p>
            @endif --}}
        </div>
        
        <p class="mt-8 text-[10px] font-black text-slate-300 uppercase tracking-[0.2em]">Secure Access • Gooocode v2.0</p>
    </div>
</x-guest-layout>