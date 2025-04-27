<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Artikel EcoZense - Informasi dan Edukasi tentang Bank Sampah dan Eco Enzim di Batam" />
        <meta name="theme-color" content="#8DD363" />
        <title>Artikel - EcoZense</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 overflow-x-hidden">
        <!-- Preloader -->
        <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
        </div>

        <!-- Navbar -->
        <x-home.navbar />

        <!-- Main Content Wrapper -->
        <main class="overflow-x-hidden">
            <!-- Hero Section for Articles -->
            <section class="h-[40vh] flex items-center relative">
                <!-- Background image layer -->
                <div class="absolute inset-0 z-0">
                    <img src="{{ asset('images/bg1.jpeg') }}" class="w-full h-full object-cover" alt="Background">
                </div>
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-green-900/50 z-10"></div>
                
                <!-- Content -->
                <div class="container mx-auto px-6 md:px-8 relative z-20 py-16 md:py-20">
                    <div class="max-w-4xl mx-auto text-center">
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in">
                            Artikel & Berita
                        </h1>
                        <p class="text-xl text-green-100 animate-slide-up mb-8">
                            Dapatkan informasi terbaru dan edukasi tentang pengelolaan sampah, eco enzim, dan gaya hidup ramah lingkungan
                        </p>
                        
                        <!-- Search Bar -->
                        <div class="max-w-xl mx-auto mt-8 relative">
                            <div class="flex items-center bg-white rounded-full shadow-lg overflow-hidden border-2 border-green-100 hover:border-green-200 transition-all duration-300">
                                <input type="text" placeholder="Cari artikel..." class="w-full px-6 py-3 text-gray-700 focus:outline-none text-lg">
                                <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 transition-all duration-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Category and Tabs Section -->
            <section class="bg-white border-b border-gray-200">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap justify-between items-center py-4">
                        <!-- Category Dropdown -->
                        <div class="w-full md:w-auto mb-4 md:mb-0">
                            <div class="relative">
                                <button id="categoryDropdown" class="flex items-center justify-between w-full md:w-48 px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none">
                                    <span class="text-gray-700">Pilih Kategori</span>
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="categoryMenu" class="hidden absolute left-0 mt-2 w-full md:w-48 bg-white shadow-lg rounded-md z-50">
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Semua Kategori</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Eco Enzim</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Bank Sampah</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Tips & Trik</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Berita</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tabs -->
                        <div class="w-full md:w-auto flex space-x-6">
                            <a href="#" class="text-gray-700 hover:text-green-600 border-b-2 border-transparent hover:border-green-600 px-1 py-2 font-medium">Terpopuler</a>
                            <a href="#" class="text-gray-700 hover:text-green-600 border-b-2 border-green-600 px-1 py-2 font-medium">Terbaru</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Articles Section -->
            <section class="py-12 bg-gray-100">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Article Card 1 -->
                        <div class="bg-white rounded-md shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                            <img src="{{ asset('images/Frame 2305.png') }}" alt="Eco Enzyme" class="w-full h-56 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">All About Bio-Enzymes: How You Can Make Chemical-Free Floor Cleaners from Kitchen Waste!</h3>
                                <p class="text-gray-600 mb-4">How You Can Make Chemical-Free Bio-Enzyme Cleaners From Fruit Peels</p>
                                <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                                    <span>25 April 2023</span>
                                    <button class="text-gray-400 hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <a href="#" class="block w-full text-center py-2 bg-green-100 text-green-800 rounded-md hover:bg-green-200 transition-colors">Selengkapnya</a>
                            </div>
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
            // Preloader
            window.addEventListener('load', () => {
                const preloader = document.getElementById('preloader');
                setTimeout(() => {
                    preloader.classList.add('opacity-0');
                    setTimeout(() => {
                        preloader.style.display = 'none';
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

            // Category dropdown toggle
            document.getElementById('categoryDropdown').addEventListener('click', function() {
                document.getElementById('categoryMenu').classList.toggle('hidden');
            });

            // Close the dropdown when clicking outside
            window.addEventListener('click', function(event) {
                if (!event.target.closest('#categoryDropdown')) {
                    document.getElementById('categoryMenu').classList.add('hidden');
                }
            });
        </script>
    </body>
</html> 