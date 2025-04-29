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
            <section class="h-[60vh] flex items-center relative">
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
                        <x-artikel.card 
                            image="images/bg1.jpeg"
                            title="All About Bio-Enzymes: How You Can Make Chemical-Free Floor Cleaners from Kitchen Waste!"
                            desc="How You Can Make Chemical-Free Bio-Enzyme Cleaners From Fruit Peels"
                            date="25 April 2023"
                            author="Anindita A'isyahira"
                        />
                        
                        <!-- Article Card 2 -->
                        <x-artikel.card 
                            image="images/bg2.jpeg"
                            title="All About Bio-Enzymes: How You Can Make Chemical-Free Floor Cleaners from Kitchen Waste!"
                            desc="How You Can Make Chemical-Free Bio-Enzyme Cleaners From Fruit Peels"
                            date="25 April 2023"
                            author="Anindita A'isyahira"
                        />
                        
                        <!-- Article Card 3 -->
                        <x-artikel.card 
                            image="images/bg3.jpeg"
                            title="All About Bio-Enzymes: How You Can Make Chemical-Free Floor Cleaners from Kitchen Waste!"
                            desc="How You Can Make Chemical-Free Bio-Enzyme Cleaners From Fruit Peels"
                            date="25 April 2023"
                            author="Anindita A'isyahira"
                        />
                        
                        <!-- DIY Enzyme Cleaner Cards -->
                        <x-artikel.card-small 
                            image="images/bg4.jpeg"
                            title="You Can Make this DIY Enzyme Cleaner from Kitchen Scraps"
                            desc="This enzyme cleaner is surprisingly easy to make using ingredients found in your kitchen. Use it to remove pet, blood, and other stains."
                            date="20 April 2023"
                            author="Steven Kosasih"
                        />
                        
                        <x-artikel.card-small 
                            image="images/bg5.jpeg"
                            title="You Can Make this DIY Enzyme Cleaner from Kitchen Scraps"
                            desc="This enzyme cleaner is surprisingly easy to make using ingredients found in your kitchen. Use it to remove pet, blood, and other stains."
                            date="20 April 2023"
                            author="Steven Kosasih"
                        />
                        
                        <x-artikel.card-small 
                            image="images/bg6.jpeg"
                            title="You Can Make this DIY Enzyme Cleaner from Kitchen Scraps"
                            desc="This enzyme cleaner is surprisingly easy to make using ingredients found in your kitchen. Use it to remove pet, blood, and other stains."
                            date="20 April 2023"
                            author="Steven Kosasih"
                        />
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center">
                        <nav class="inline-flex rounded-md shadow-sm">
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-500 hover:bg-gray-50">
                                Previous
                            </a>
                            <a href="#" class="py-2 px-4 bg-green-600 border border-green-600 text-sm leading-5 font-medium text-white hover:bg-green-700">
                                1
                            </a>
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50">
                                2
                            </a>
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50">
                                3
                            </a>
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-500 hover:bg-gray-50">
                                Next
                            </a>
                        </nav>
                    </div>
                </div>
            </section>
            
            <!-- Newsletter Section -->
            <section class="py-16 bg-green-600">
                <div class="container mx-auto px-4">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-3xl font-bold text-white mb-4">ECOZENSE</h2>
                        <h3 class="text-2xl font-semibold text-white mb-6">Ready to get started?</h3>
                        <p class="text-green-100 mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        
                        <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                            <input type="email" placeholder="Email address" class="px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">
                            <button class="px-6 py-3 bg-white text-green-700 font-medium rounded-md hover:bg-green-100 transition-colors">Subscribe</button>
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