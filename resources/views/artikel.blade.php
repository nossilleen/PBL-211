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
                            <form method="GET" action="{{ route('artikel.index') }}" class="relative flex items-center max-w-lg mx-auto">
                                <input 
                                    type="text" 
                                    name="search" 
                                    value="{{ request('search') }}" 
                                    placeholder="Cari artikel..." 
                                    class="w-full pl-4 pr-12 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent shadow-sm"
                                >
                                <button 
                                    type="submit" 
                                    class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-500 hover:bg-green-600 text-white p-2 rounded-full transition-colors"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Category and Tabs Section -->
            <section class="bg-white border-b border-gray-200">
                <div class="container mx-auto px-4">
                    <form id="filterForm" method="GET" action="{{ route('artikel.index') }}" class="flex justify-between items-center">
                        <!-- Category Dropdown -->
                        <div>
                            <select name="kategori" onchange="document.getElementById('filterForm').submit()" class="px-4 py-2 border rounded-md">
                                <option value="">Semua Kategori</option>
                                <option value="eco enzim" {{ request('kategori') == 'eco enzim' ? 'selected' : '' }}>Eco Enzim</option>
                                <option value="bank sampah" {{ request('kategori') == 'bank sampah' ? 'selected' : '' }}>Bank Sampah</option>
                                <option value="tips dan trik" {{ request('kategori') == 'tips dan trik' ? 'selected' : '' }}>Tips & Trik</option>
                                <option value="berita" {{ request('kategori') == 'berita' ? 'selected' : '' }}>Berita</option>
                            </select>
                        </div>
                        <!-- Tabs -->
                        <div class="flex space-x-6">
                            <button type="submit" name="sort" value="populer" class="text-gray-700 hover:text-green-600 border-b-2 {{ request('sort') == 'populer' ? 'border-green-600' : 'border-transparent' }} px-1 py-2 font-medium bg-transparent">Terpopuler</button>
                            <button type="submit" name="sort" value="terbaru" class="text-gray-700 hover:text-green-600 border-b-2 {{ !request('sort') || request('sort') == 'terbaru' ? 'border-green-600' : 'border-transparent' }} px-1 py-2 font-medium bg-transparent">Terbaru</button>
                        </div>
                    </form>
                </div>
            </section>
            <!-- Articles Section -->
            <section class="py-12 bg-gray-100">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse($artikels as $artikel)
                            <div class="bg-white rounded-lg shadow p-6 flex flex-col">
                                <img src="{{ asset($artikel->gambar->first()->file_path ?? 'images/default.jpg') }}" class="w-full h-48 object-cover rounded mb-4" alt="Gambar Artikel">
                                <h2 class="text-xl font-bold mb-2">{{ $artikel->judul }}</h2>
                                <p class="text-gray-600 text-sm mb-4 flex-grow">{{ Str::limit(strip_tags($artikel->konten), 100) }}</p>
                                <a href="{{ route('artikel.show', $artikel->artikel_id) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition mt-auto">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        @empty
                            <p class="text-gray-500">Tidak ada artikel untuk kategori ini.</p>
                        @endforelse
                    </div>

                    <!-- Pagination Controls -->
                    <div class="mt-8 flex justify-center">
            <ul class="flex border border-gray-300 rounded-md overflow-hidden bg-white text-sm">
                {{-- Previous Page Link --}}
                @if ($artikels->onFirstPage())
                    <li>
                        <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white border-r border-gray-300 cursor-not-allowed select-none">Sebelumnya</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $artikels->previousPageUrl() }}" rel="prev" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">Sebelumnya</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                    @if ($page == $artikels->currentPage())
                        <li>
                            <span class="px-4 py-1.5 h-9 flex items-center font-bold text-white bg-green-600 border-r border-gray-300">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($artikels->hasMorePages())
                    <li>
                        <a href="{{ $artikels->nextPageUrl() }}" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
                    </li>
                @else
                    <li>
                        <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white cursor-not-allowed select-none">Selanjutnya</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
                </div>
            </section>
            
            <!-- Newsletter Section -->
            <!-- <section class="py-16 bg-green-600">
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
            </section> -->
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