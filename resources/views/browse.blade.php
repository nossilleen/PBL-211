<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Temukan Bank Sampah dan Toko Eco Enzim di sekitar Anda - EcoZense" />
        <meta name="theme-color" content="#10b981" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url('/') }}">
        <title>Browse Toko - EcoZense</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-br from-slate-50 via-white to-emerald-50 overflow-x-hidden">
        <!-- Main Content Wrapper -->
        <main class="overflow-x-hidden">
            <!-- Enhanced Hero Section -->
            <section class="min-h-[70vh] flex items-center relative hero-gradient floating-elements">
                <!-- Navbar -->
                <x-home.navbar class="absolute top-0 left-0 right-0 z-50" />
                
                <!-- Content -->
                <div class="container mx-auto px-6 md:px-8 relative z-20 py-20">
                    <div class="max-w-5xl mx-auto text-center">
                        <!-- Enhanced Logo -->
                        <div class="flex justify-center mb-8 fade-in">
                            <div class="relative">
                                <img src="{{ asset('images/Logo.jpg') }}" alt="EcoZense Logo" class="h-24 md:h-28 w-auto rounded-2xl shadow-2xl">
                                <div class="absolute inset-0 bg-white rounded-2xl opacity-20 pulse-animation"></div>
                            </div>
                        </div>
                        
                        <!-- Enhanced Title -->
                        <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 slide-in">
                            Welcome to <span class="relative">
                                EcoZense
                            </span>
                        </h1>
                        
                        <p class="text-xl md:text-2xl text-emerald-100 mb-8 slide-in max-w-3xl mx-auto">
                            Discover the world's most comprehensive eco-enzyme marketplace
                        </p>
                        
                        <!-- Enhanced Search Bar -->
                        <div class="max-w-2xl mx-auto mt-12 slide-in">
                            <form method="GET" action="{{ route('browse') }}" class="relative">
                                <div class="floating-card rounded-2xl p-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 relative">
                                            <input 
                                                type="text" 
                                                name="search" 
                                                value="{{ request('search') }}" 
                                                placeholder="Search stores, products, or eco-enzymes..." 
                                                class="w-full pl-12 pr-4 py-4 bg-transparent border-none focus:outline-none focus:ring-0 text-gray-700 placeholder-gray-400 text-lg font-medium search-glow rounded-xl"
                                            />
                                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="hidden" name="sort" value="{{ request('sort', 'terbaru') }}" />
                                        <button type="submit" class="modern-button ml-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Stats or Features -->
                        <div class="flex justify-center mt-12 space-x-8 fade-in">
                            @php
                                // Hitung total toko yang aktif (hanya berdasarkan role dan tidak di-soft-delete)
                                $totalStores = \App\Models\User::withoutTrashed()
                                    ->where('role', 'pengelola')
                                    ->count();
                                
                                // Hitung produk yang tersedia
                                $totalProducts = \App\Models\Produk::where('status_ketersediaan', 'available')
                                    ->whereHas('user', function($q) {
                                        $q->where('role', 'pengelola')
                                           ->whereNull('deleted_at'); // Tambahkan filter untuk user yang tidak di-soft-delete
                                    })
                                    ->count();

                                // Logika untuk menampilkan angka stores
                                $displayStores = $totalStores >= 10 ? '10+' : 
                                               ($totalStores >= 7 ? '7+' : 
                                               ($totalStores >= 5 ? '5+' : $totalStores . '+'));

                                // Logika untuk menampilkan angka products
                                $displayProducts = $totalProducts >= 100 ? '100+' :
                                                 ($totalProducts >= 50 ? '50+' :
                                                 ($totalProducts >= 25 ? '25+' : $totalProducts . '+'));
                            @endphp
                            
                            <!-- Debug info -->
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <div class="fixed top-4 right-4 bg-white p-4 rounded-lg shadow-lg z-50">
                                    <p>Debug Info:</p>
                                    <p>Total Stores (raw): {{ $totalStores }}</p>
                                    <p>Display Value: {{ $displayStores }}</p>
                                </div>
                            @endif

                            <div class="text-center">
                                <div class="text-3xl font-bold text-white">{{ $displayStores }}</div>
                                <div class="text-emerald-200 text-sm">Eco Stores</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-white">{{ $displayProducts }}</div>
                                <div class="text-emerald-200 text-sm">Products</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-white">100%</div>
                                <div class="text-emerald-200 text-sm">Eco-Friendly</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @include('browse._content')
        </main>

        <!-- Footer -->
        <x-home.footer />

        <!-- Enhanced Back to Top Button -->
        <button id="back-to-top" class="fixed bottom-8 right-8 modern-button w-14 h-14 rounded-full opacity-0 invisible transition-all duration-300 z-50 glow-effect flex items-center justify-center p-0">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7 7 7"></path>
            </svg>
        </button>

        <!-- JavaScript -->
        <script>
            // Back to top button
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

            // Category dropdown
            const categoryDropdown = document.getElementById('categoryDropdown');
            const categoryMenu = document.getElementById('categoryMenu');
            const currentCategory = document.getElementById('currentCategory');
            const storesSection = document.getElementById('storesSection');
            const productsSection = document.getElementById('productsSection');
            const categoryLinks = document.querySelectorAll('#categoryMenu a');
            
            if (categoryDropdown && categoryMenu) {
                categoryDropdown.addEventListener('click', function() {
                    categoryMenu.classList.toggle('hidden');
                    const arrow = this.querySelector('svg');
                    arrow.classList.toggle('rotate-180');
                });
                
                categoryLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        // Update dropdown text and style
                        currentCategory.textContent = this.textContent;
                        categoryMenu.classList.add('hidden');
                        
                        // Reset arrow rotation
                        const arrow = categoryDropdown.querySelector('svg');
                        arrow.classList.remove('rotate-180');
                        
                        const category = this.getAttribute('data-category');
                        
                        // Show/hide sections based on selection
                        if (category === 'products') {
                            storesSection.classList.add('hidden');
                            productsSection.classList.remove('hidden');
                        } else if (category === 'stores') {
                            storesSection.classList.remove('hidden');
                            productsSection.classList.add('hidden');
                        } else {
                            // 'all' or default
                            storesSection.classList.remove('hidden');
                            productsSection.classList.add('hidden');
                        }
                    });
                });
                
                document.addEventListener('click', function(event) {
                    if (!categoryDropdown.contains(event.target)) {
                        categoryMenu.classList.add('hidden');
                        const arrow = categoryDropdown.querySelector('svg');
                        arrow.classList.remove('rotate-180');
                    }
                });
            }
        </script>
    </body>
</html>