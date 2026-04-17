<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-slate-800 leading-tight">
            {{ __('ماسح تصاريح الزيارة الذكي') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto px-4 max-w-md">
            
            {{-- التنبيهات --}}
            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 border-r-4 border-red-500 text-red-700 shadow-lg rounded-2xl flex items-center animate-shake">
                    <i class="fas fa-exclamation-triangle ml-3"></i>
                    <span class="font-bold">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-200">
                <div class="bg-slate-800 p-5 text-white text-center font-bold flex items-center justify-center gap-2">
                    <i class="fas fa-camera-retro"></i>
                    ماسح الـ QR Code
                </div>
                
                <div class="p-6">
                    {{-- اختيار نوع العملية --}}
                    <div class="flex gap-3 mb-6">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="scan_type" value="verify" checked class="hidden peer">
                            <div class="text-center p-4 bg-slate-50 rounded-2xl font-black text-slate-500 peer-checked:bg-blue-600 peer-checked:text-white transition-all shadow-sm">
                                دخول
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="scan_type" value="checkout" class="hidden peer">
                            <div class="text-center p-4 bg-slate-50 rounded-2xl font-black text-slate-500 peer-checked:bg-red-600 peer-checked:text-white transition-all shadow-sm">
                                خروج
                            </div>
                        </label>
                    </div>

                    {{-- منطقة الكاميرا --}}
                    <div id="reader" style="width: 100%; border-radius: 20px; overflow: hidden;"></div>
                </div>

                <div id="result" class="p-5 text-center text-slate-400 font-bold text-sm border-t border-dashed bg-slate-50">
                    <i class="fas fa-spinner fa-spin ml-2 hidden" id="loading-icon"></i>
                    <span id="status-text">انتظار الكود...</span>
                </div>
            </div>

            <a href="{{ route('dashboard') }}" class="mt-6 block text-center text-slate-500 font-bold hover:text-blue-600 transition">
                <i class="fas fa-arrow-right ml-1"></i> العودة للرئيسية
            </a>
        </div>
    </div>

    {{-- المكتبات الضرورية --}}
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // دالة يتم تنفيذها عند نجاح السكان
        function onScanSuccess(decodedText, decodedResult) {
            // نوقف السكنر مؤقتاً عشان ميبعتش طلبات كتير ورا بعض
            html5QrcodeScanner.pause();

            const statusText = document.getElementById('status-text');
            const loadingIcon = document.getElementById('loading-icon');
            
            statusText.innerText = "جاري التحقق...";
            loadingIcon.classList.remove('hidden');
            
            let scanType = document.querySelector('input[name="scan_type"]:checked').value;

            fetch("/reception/" + scanType + "/" + decodedText, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'blacklisted') {
                    Swal.fire({
                        icon: 'error',
                        title: '🚨 دخول ممنوع!',
                        text: data.message,
                        confirmButtonColor: '#d33'
                    }).then(() => {
                        html5QrcodeScanner.resume(); // نرجع نشغل السكنر تاني بعد ما يقفل الرسالة
                        statusText.innerText = "انتظار الكود...";
                        loadingIcon.classList.add('hidden');
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'تمت العملية بنجاح',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = "/dashboard";
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // لو حصل مشكلة في الـ JSON بنحول الصفحة عادي كخيار بديل
                window.location.href = "/reception/" + scanType + "/" + decodedText;
            });
        }

        // 🛑 الأهم: تشغيل السكنر بعد ما الصفحة تحمل تماماً
        window.addEventListener('load', function() {
            window.html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", { 
                    fps: 10, 
                    qrbox: {width: 250, height: 250},
                    aspectRatio: 1.0
                }
            );
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>

    <style>
        /* ستايل لزرار السكان بتاع المكتبة عشان ميكونش شكله وحش */
        #reader__dashboard_section_csr button {
            background-color: #1e293b !important;
            color: white !important;
            padding: 12px 24px !important;
            border-radius: 12px !important;
            border: none !important;
            font-weight: bold !important;
            cursor: pointer !important;
            margin: 10px auto !important;
            display: block !important;
        }
    </style>
</x-app-layout>