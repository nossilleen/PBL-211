<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="EcoZense - Solusi Ramah Lingkungan untuk Bank Sampah dan Eco Enzim di Batam" />
        <meta name="theme-color" content="#8DD363" />
        <title>EcoZense - Solusi Ramah Lingkungan</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-image-fixed overflow-x-hidden overflow-y-hidden">
        <!-- Notifikasi Selamat Datang -->
        @if(Auth::check() && session('welcome'))
            <div id="welcome-alert" class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-green-400 to-green-600 text-white px-8 py-4 rounded-xl shadow-lg flex items-center gap-4 z-[9998] animate-fade-in opacity-100 transition-all duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white animate-ping-slow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                </svg>
                <span class="font-semibold text-lg">{{ session('welcome') }}</span>
                <button onclick="dismissWelcomeAlert()" class="ml-4 text-white hover:text-green-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <style>
                @keyframes fade-in {
                    0% { opacity: 0; transform: translate(-50%, -30px) scale(0.95); }
                    100% { opacity: 1; transform: translate(-50%, 0) scale(1); }
                }
                @keyframes fade-out {
                    0% { opacity: 1; transform: translate(-50%, 0) scale(1); }
                    100% { opacity: 0; transform: translate(-50%, -20px) scale(0.95); }
                }
                @keyframes ping-slow {
                    0%, 100% { transform: scale(1); opacity: 1; }
                    50% { transform: scale(1.1); opacity: 0.8; }
                }
                .animate-fade-in {
                    animation: fade-in 0.7s cubic-bezier(0.4, 0, 0.2, 1);
                }
                .animate-fade-out {
                    animation: fade-out 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
                }
                .animate-ping-slow {
                    animation: ping-slow 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
                }
            </style>
            <script>
                // Auto-dismiss setelah 5 detik
                let dismissTimeout = setTimeout(() => {
                    dismissWelcomeAlert();
                }, 5000);
                
                // Function untuk dismiss notifikasi
                function dismissWelcomeAlert() {
                    clearTimeout(dismissTimeout);
                    const alert = document.getElementById('welcome-alert');
                    alert.classList.remove('animate-fade-in');
                    alert.classList.add('animate-fade-out');
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 500);
                }
            </script>
        @endif

        <!-- Preloader -->
        <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
        </div>

        <!-- Navbar -->
        <x-home.navbar />

        <!-- Main Content Wrapper -->
        <main class="overflow-hidden">
            <!-- Hero Section -->
            <x-home.hero />

            <!-- Pusat Informasi Section -->
            <x-home.information-center />

            <!-- About Us Section -->
            <x-home.about-us />

            <!-- Kenapa Pilih EcoZense Section -->
            <x-home.features />

            <!-- Produk Eco Enzim Section -->
            <x-home.products />

            <!-- Program Nasabah Section -->
            <x-home.program />

            <!-- Lokasi Bank Sampah Section -->
            <x-home.location :locations="$locations" />
        </main>

        <!-- Footer -->
        <x-home.footer />

        <!-- Back to top button -->
        <button id="back-to-top" class="fixed bottom-6 right-6 bg-green-600 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 z-50 hover:bg-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>

        <script>
            // Preloader
            window.addEventListener('load', () => {
                const preloader = document.getElementById('preloader');
                setTimeout(() => {
                    preloader.classList.add('opacity-0');
                    setTimeout(() => {
                        preloader.style.display = 'none';
                        document.body.classList.remove('overflow-y-hidden');
                    }, 300);
                }, 500);
            });

            // Back to top button
            const backToTopBtn = document.getElementById('back-to-top');
            
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.remove('opacity-0', 'invisible');
                    backToTopBtn.classList.add('opacity-100', 'visible');
                } else {
                    backToTopBtn.classList.add('opacity-0', 'invisible');
                    backToTopBtn.classList.remove('opacity-100', 'visible');
                }
            });
            
            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        </script>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    </body>
</html>
