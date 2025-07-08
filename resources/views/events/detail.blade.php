<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Detail Event EcoZense - Informasi lengkap mengenai event eco enzim" />
        <meta name="theme-color" content="#8DD363" />
        <title>Detail Event - EcoZense</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-white">
        <!-- Navbar -->
        <x-home.navbar />

        <!-- Main Content -->
        <main class="min-h-screen">
            <!-- Event Header Section -->
            <section class="relative h-[50vh]">
                <!-- Background Image -->
                <div class="absolute inset-0">
                    <img src="{{ asset('images/bg7.jpeg') }}" alt="Event Background" class="w-full h-full object-cover">
                </div>

            </section>

            <!-- Event Info Section -->
            <section class="relative -mt-32 pb-12">
                <div class="container mx-auto px-4">
                    <div class="bg-white rounded-lg shadow-lg p-6 md:p-8">
                        <!-- Event Category Badge -->
                        <div class="mb-4">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">Workshop</span>
                        </div>

                        <!-- Event Title -->
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Workshop Pembuatan Eco Enzim</h1>

                        <!-- Event Meta Info -->
                        <div class="flex flex-wrap gap-6 mb-8 text-gray-600">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-2">25 – 26 April 2025</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-2">09:00 - 12:00 WIB</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="ml-2">Batam Center, Kota Batam</span>
                            </div>
                        </div>

                        <!-- Event Description -->
                        <div class="prose max-w-none mb-8">
                            <h2 class="text-xl font-semibold mb-4">Tentang Event</h2>
                            <p class="text-gray-600 mb-4">
                                Workshop ini akan membahas tentang cara pembuatan eco enzyme dari bahan-bahan organik rumah tangga. 
                                Peserta akan belajar langsung dari praktisi berpengalaman tentang proses fermentasi dan manfaat eco enzyme 
                                untuk kehidupan sehari-hari.
                            </p>
                            <h3 class="text-lg font-semibold mb-3">Yang Akan Dipelajari:</h3>
                            <ul class="list-disc list-inside text-gray-600 mb-4">
                                <li>Pengenalan bahan-bahan eco enzyme</li>
                                <li>Teknik fermentasi yang benar</li>
                                <li>Tips dan trik pembuatan eco enzyme</li>
                                <li>Cara penggunaan eco enzyme</li>
                                <li>Manfaat eco enzyme untuk lingkungan</li>
                            </ul>
                            <h3 class="text-lg font-semibold mb-3">Yang Perlu Dibawa:</h3>
                            <ul class="list-disc list-inside text-gray-600 mb-4">
                                <li>Botol plastik bekas (minimal 1.5L)</li>
                                <li>Sisa buah-buahan atau sayuran</li>
                                <li>Gula merah/aren</li>
                                <li>Air bersih</li>
                            </ul>
                        </div>

                        <!-- Pembicara/Instruktur -->
                        <div class="mb-8">
                            <h2 class="text-xl font-semibold mb-4">Pembicara</h2>
                            <div class="flex items-center space-x-4">
                                <img src="{{ asset('images/Frame 2305.png') }}" alt="Pembicara" class="w-16 h-16 rounded-full object-cover">
                                <div>
                                    <h3 class="font-semibold text-gray-900">Dr. Joean Oon</h3>
                                    <p class="text-gray-600">Praktisi Eco Enzyme & Peneliti Lingkungan</p>
                                </div>
                            </div>
                        </div>

                        <!-- Registration Section -->
                        <div class="border border-gray-200 rounded-lg p-6">
                            <h2 class="text-xl font-semibold mb-4">Informasi Pendaftaran</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h3 class="font-medium text-gray-900 mb-2">Kuota Peserta</h3>
                                    <p class="text-2xl font-bold text-green-600">30 orang</p>
                                </div>
                            </div>
                            <button class="w-full mt-6 bg-green-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-green-700 transition-colors">
                                Daftar Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </section>
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
            // Back to top button functionality
            const backToTopButton = document.getElementById('back-to-top');
            
            if (backToTopButton) {
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        backToTopButton.classList.remove('opacity-0', 'invisible');
                        backToTopButton.classList.add('opacity-100', 'visible');
                    } else {
                        backToTopButton.classList.remove('opacity-100', 'visible');
                        backToTopButton.classList.add('opacity-0', 'invisible');
                    }
                });
                
                backToTopButton.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        </script>
    </body>
</html>