<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Temukan Bank Sampah dan Toko Eco Enzim di sekitar Anda - EcoZense" />
        <meta name="theme-color" content="#8DD363" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url('/') }}">
        <title>Browse Toko - EcoZense</title>
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
        <main class="overflow-x-hidden"> <!-- Menghapus padding top agar background image penuh hingga ke belakang navbar -->
            <!-- Hero Section -->
            <section class="h-[60vh] flex items-center relative">
                <!-- Background image layer -->
                <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('{{ asset('images/bg3.jpeg') }}')">
                    <!-- Overlay untuk memastikan teks tetap terbaca -->
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>
                <!-- Content -->
                <div class="container mx-auto px-6 md:px-8 relative z-20 py-16 md:py-20">
                    <div class="max-w-4xl mx-auto text-center">
                        <!-- Logo -->
                        <div class="flex justify-center mb-8">
                            <img src="{{ asset('images/Logo.png') }}" alt="EcoZense Logo" class="h-20 md:h-24 w-auto">
                        </div>
                        
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in">
                            Welcome to EcoZense
                        </h1>
                        <p class="text-xl text-green-100 animate-slide-up mb-8">
                            The Best Eco-Enzyme related website in the world
                        </p>
                        <!-- Search Bar -->
                        <div class="max-w-xl mx-auto mt-8 relative">
                            <form method="GET" action="{{ route('browse') }}" class="relative flex items-center max-w-lg mx-auto">                                 
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari toko atau produk..." class="w-full pl-4 pr-12 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent shadow-sm"/>
                                <input type="hidden" name="sort" value="{{ request('sort', 'terbaru') }}" />
                                <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-500 hover:bg-green-600 text-white p-2 rounded-full transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Filter Section -->
            <section class="bg-white border-b border-gray-200">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap justify-between items-center py-4">
                        <!-- Category Dropdown -->
                        <div class="w-full md:w-auto mb-4 md:mb-0">
                            <div class="relative">
                                <button id="categoryDropdown" class="flex items-center justify-between w-full md:w-48 px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none">
                                    <span id="currentCategory" class="text-gray-700">Toko Eco Enzim</span> <!-- Set default to 'Toko Eco Enzim' -->
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="categoryMenu" class="hidden absolute left-0 mt-2 w-full md:w-48 bg-white shadow-lg rounded-md z-50">
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50" data-category="stores">Toko Eco Enzim</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50" data-category="products">Produk Eco Enzim</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tabs -->
                        <div class="w-full md:w-auto flex space-x-6">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'populer']) }}" class="text-gray-700 hover:text-green-600 border-b-2 {{ request('sort') === 'populer' ? 'border-green-600' : 'border-transparent' }} px-1 py-2 font-medium">Terpopuler</a>
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'terbaru']) }}" class="text-gray-700 hover:text-green-600 border-b-2 {{ request('sort') === 'populer' ? 'border-transparent' : 'border-green-600' }} px-1 py-2 font-medium">Terbaru</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Toko Section -->
            <section id="storesSection" class="py-12 bg-gray-100">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8">Hasil Pencarian</h2>
                    
                    @php
                        $shops = $shops ?? collect();
                    @endphp

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @forelse ($shops as $shop)
                            <x-browse.product-card
                                :image="$shop->foto_toko ? Storage::url($shop->foto_toko) : asset('images/default-store.png')"        
                                :title="$shop->nama ?? 'Nama Toko'"
                                :desc="Str::limit($shop->deskripsi_toko ?? 'Belum ada deskripsi', 50)"
                                :bank="$shop->alamat_toko ?? 'Belum ada alamat'"
                                :productId="$shop->id"
                                :showLike="false"
                                href="{{ route('toko.detail', ['id' => $shop->user_id]) }}"
                            >
                                <a href="{{ route('toko.detail', ['id' => $shop->user_id]) }}" 
                                   class="w-full px-6 py-3 bg-green-600 text-white text-lg font-semibold rounded-md hover:bg-green-700 transition-colors text-center">
                                    Lihat Toko
                                </a>
                            </x-browse.product-card>
                        @empty
                            <div class="col-span-4 text-center text-gray-500">Belum ada toko Bank Sampah.</div>
                        @endforelse
                    </div>
                    
                    <!-- Pagination if needed -->
                    @if(method_exists($shops, 'links'))
                        <div class="mt-12 flex justify-center">
                            {{ $shops->links() }}
                        </div>
                    @endif
                </div>
            </section>

            <!-- Products Section (Hidden by Default) -->
            <section id="productsSection" class="py-12 bg-gray-100 hidden">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8">Hasil Pencarian</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                        @foreach ($products as $product)
                            <x-browse.product-card 
                                :image="asset($product->image_url)"
                                :title="$product->nama_produk"
                                :desc="Str::limit($product->deskripsi, 50)"
                                :price="number_format($product->harga, 0, ',', '.')"
                                :harga_points="$product->harga_points"
                                :status="$product->status_ketersediaan"
                                :bank="$product->user->nama"
                                :createdAt="$product->created_at"
                                :suka="$product->suka"
                                :productId="$product->produk_id"
                                :isLiked="$product->likedByCurrentUser"
                            >
                                <!-- Remove the duplicate like button, keep only the Beli button -->
                                <a href="{{ route('product.detail', $product->produk_id) }}"
                                   class="w-full px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-colors text-center">
                                    Beli Sekarang
                                </a>
                            </x-browse.product-card>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center">
                        {{ $products->links() }}
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
            window.addEventListener('load', function() {
                document.getElementById('preloader').style.opacity = '0';
                setTimeout(function() {
                    document.getElementById('preloader').style.display = 'none';
                }, 500);
            });
            
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
                });
                
                // Toggle between views based on category selection
                categoryLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        // Update dropdown text
                        currentCategory.textContent = this.textContent;
                        
                        // Hide category menu
                        categoryMenu.classList.add('hidden');
                        
                        // Get selected category
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
                
                // Close the dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!categoryDropdown.contains(event.target)) {
                        categoryMenu.classList.add('hidden');
                    }
                });
            }
            
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
        </script>
        
        <script>
function toggleLike(productId) {
    const heartIcon = document.getElementById(`heart-${productId}`);
    const likeCount = document.getElementById(`like-count-${productId}`);
    
    // Get current state
    const isCurrentlyLiked = heartIcon.getAttribute('fill') === 'currentColor';
    
    fetch(`/produk/${productId}/like`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ isLiked: !isCurrentlyLiked }), // Send current state
        credentials: 'same-origin'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Toggle heart icon
            if (data.isLiked) {
                heartIcon.classList.add('text-red-500');
                heartIcon.setAttribute('fill', 'currentColor');
            } else {
                heartIcon.classList.remove('text-red-500');
                heartIcon.setAttribute('fill', 'none');
            }
            // Update like count next to status
            const currentCount = parseInt(data.suka);
            likeCount.textContent = `❤ ${currentCount}`;
            likeCount.classList.add('like-count-update');
            setTimeout(() => likeCount.classList.remove('like-count-update'), 300);
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
        
        <script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.like-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const produkId = this.getAttribute('data-produk-id');
            fetch(`/produk/${produkId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    this.querySelector('.like-count').textContent = data.suka;
                    this.querySelector('.like-icon').textContent = data.isLiked ? '❤️' : '🤍';
                }
            });
        });
    });
});
</script>
        
        <style>
            .like-button svg {
                transition: all 0.2s ease-in-out;
            }

            .like-button:hover svg {
                transform: scale(1.1);
            }

            .like-button svg.text-red-500 {
                filter: drop-shadow(0 0 2px rgba(239, 68, 68, 0.5));
            }

            @keyframes likeScale {
                0% { transform: scale(1); }
                50% { transform: scale(1.2); }
                100% { transform: scale(1); }
            }

            .like-count-update {
                animation: likeScale 0.3s ease-in-out;
            }
        </style>
    </body>
</html>