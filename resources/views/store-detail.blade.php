@extends('layouts.app')

@section('content')
<!-- Main Content -->
<main class="pt-20 pb-16 bg-gray-50 min-h-screen">
    <!-- Store Header -->
    <section class="relative bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-12">
            <div class="flex flex-col lg:flex-row items-start gap-8">
                <!-- Store Image -->
                <div class="relative">
                    <div class="w-32 h-32 lg:w-40 lg:h-40 rounded-2xl overflow-hidden shadow-md border border-gray-200">
                        <img src="{{ $pengelola->foto_toko ? Storage::url($pengelola->foto_toko) : asset('images/default-store.png') }}" 
                             alt="{{ $pengelola->nama }}" 
                             class="w-full h-full object-cover">
                    </div>
                    <!-- Status Badge -->
                </div>

                <!-- Store Info -->
                <div class="flex-1">
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3">
                        {{ $pengelola->nama }}
                    </h1>
                    <p class="text-gray-600 text-lg mb-6 leading-relaxed max-w-2xl">
                        {{ $pengelola->deskripsi_toko ?? 'Toko terpercaya dengan produk berkualitas untuk kebutuhan sehari-hari Anda.' }}
                    </p>
                    
                    <!-- Store Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0 w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Lokasi</p>
                                <p class="text-gray-900 font-medium">
                                    @if($lokasi)
                                        {{ $lokasi->nama_lokasi }}, {{ $lokasi->alamat }}
                                    @else
                                        Belum ada alamat
                                    @endif
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0 w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Jam Operasional</p>
                                <p class="text-gray-900 font-medium">{{ $pengelola->jam_operasional ?? 'Belum ditentukan' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <div class="container mx-auto px-4 py-12">
        <!-- Category Navigation & Controls -->
        <div class="mb-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
                <!-- Category Tabs -->
                <div class="inline-flex bg-white rounded-xl shadow-sm border border-gray-200 p-1">
                    <button onclick="showCategory('eco_enzim')" 
                            class="category-btn px-6 py-3 text-sm font-medium rounded-lg transition-all duration-200 active"
                            data-category="eco_enzim">
                        Eco Enzyme
                    </button>
                    <button onclick="showCategory('sembako')" 
                            class="category-btn px-6 py-3 text-sm font-medium rounded-lg transition-all duration-200"
                            data-category="sembako">
                        Sembako
                    </button>
                </div>

                <!-- Search and Sort Controls -->
                <div class="flex items-center gap-4">
                    <!-- Search -->
                    <div class="relative">
                        <input type="text" 
                               id="product-search" 
                               placeholder="Cari produk..." 
                               class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <!-- Sort -->
                    <select id="sort-select" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="default">Urutkan</option>
                        <option value="name-asc">Nama A-Z</option>
                        <option value="name-desc">Nama Z-A</option>
                        <option value="price-asc">Harga Terendah</option>
                        <option value="price-desc">Harga Tertinggi</option>
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        @foreach($products as $kategori => $productCollection)
            <div id="{{ $kategori }}-products" class="category-section {{ $loop->first ? '' : 'hidden' }}">
                <!-- Section Header -->
                <div class="text-center mb-10">
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3">
                        {{ ucwords(str_replace('_', ' ', $kategori)) }}
                    </h2>
                    <p class="text-gray-600 text-lg">Produk berkualitas dengan harga terjangkau</p>
                </div>

                <!-- Products Container -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                    @if($productCollection->count() > 0)
                        <!-- Products Grid -->
                        <div class="product-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                            @foreach($productCollection as $product)
                                <div class="product-item" 
                                     data-name="{{ strtolower($product->nama_produk) }}"
                                     data-price="{{ $product->harga }}"
                                     data-date="{{ $product->created_at->timestamp }}"
                                     data-category="{{ $kategori }}">
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
                                    />
                                </div>
                            @endforeach
                        </div>

                        <!-- No Results Message -->
                        <div id="no-results-{{ $kategori }}" class="no-results-message hidden text-center py-16">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Produk Tidak Ditemukan</h3>
                            <p class="text-gray-500">Coba gunakan kata kunci yang berbeda atau ubah filter pencarian.</p>
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="text-center py-16">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Produk</h3>
                            <p class="text-gray-500">Produk untuk kategori ini sedang dalam persiapan.</p>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Store Statistics Section -->
    <section class="bg-white border-t border-gray-200 py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3">Statistik Toko</h2>
                <p class="text-gray-600 text-lg">Performa dan aktivitas toko kami</p>
            </div>
            
            <!-- Statistics Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                <div class="text-center bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 shadow-sm">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-blue-600 mb-2" id="visit-counter">{{ number_format($visitCount) }}</div>
                    <div class="text-sm text-gray-600">Pengunjung</div>
                </div>
                
                <div class="text-center bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 shadow-sm">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-green-600 mb-2" id="products-sold">{{ number_format($productsSold) }}</div>
                    <div class="text-sm text-gray-600">Produk Terjual</div>
                </div>
                
                <div class="text-center bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 shadow-sm">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-purple-600 mb-2">{{ number_format($totalProducts) }}</div>
                    <div class="text-sm text-gray-600">Total Produk</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location & Map Section -->
    @if($lokasi)
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-8">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3">Lokasi Toko</h2>
                <p class="text-gray-600 text-lg">Temukan lokasi kami dengan mudah</p>
            </div>
            
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- Map Container -->
                <div class="p-8">
                    <div class="bg-gray-100 rounded-xl h-96 flex items-center justify-center relative overflow-hidden">
                        @if($lokasi->latitude && $lokasi->longitude)
                            <!-- Leaflet Map -->
                            <div id="map" 
                                 class="w-full h-full rounded-xl"
                                 data-latitude="{{ $lokasi->latitude }}"
                                 data-longitude="{{ $lokasi->longitude }}"
                                 data-store-name="{{ $lokasi->nama_lokasi }}"
                                 data-store-address="{{ $lokasi->alamat }}">
                            </div>
                        @else
                            <!-- Fallback Map -->
                            <div class="text-center text-gray-500">
                                <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <p class="text-lg font-medium mb-2">Peta Lokasi</p>
                                <p class="text-sm">Koordinat lokasi belum tersedia</p>
                                <p class="text-sm mt-2">{{ $lokasi->alamat }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</main>

<!-- Footer -->
<x-home.footer />
@endsection

@push('styles')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<style>
    .category-btn {
        position: relative;
        color: #6B7280;
        transition: all 0.3s ease;
    }
    
    .category-btn.active {
        background-color: #3ED260;
        color: white;
        box-shadow: 0 4px 14px rgba(62, 210, 96, 0.3);
        transform: translateY(-1px);
    }
    
    .category-btn:not(.active):hover {
        background-color: #f0fdf4;
        color: #16a34a;
        border-color: #3ED260;
    }
    
    .category-section {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    
    .category-section.hidden {
        opacity: 0;
        transform: translateY(10px);
    }
    
    .product-item {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    
    .product-item.hidden {
        opacity: 0;
        transform: scale(0.95);
        pointer-events: none;
    }
    
    /* Smooth animations */
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Counter animation */
    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .counter-animate {
        animation: countUp 0.6s ease-out;
    }

    /* Leaflet Map Styles */
    #map {
        z-index: 1;
    }
</style>
@endpush

@push('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    let currentCategory = 'eco_enzim';
    let currentSort = 'default';
    let currentSearch = '';
    let map = null;

    // Category switching
    function showCategory(category) {
        currentCategory = category;
        const sections = document.querySelectorAll('.category-section');
        const buttons = document.querySelectorAll('.category-btn');
        
        // Update button states
        buttons.forEach(btn => {
            btn.classList.remove('active');
            if (btn.getAttribute('data-category') === category) {
                btn.classList.add('active');
            }
        });
        
        // Hide all sections
        sections.forEach(section => {
            section.classList.add('hidden');
        });
        
        // Show selected section with delay for smooth transition
        setTimeout(() => {
            const selectedSection = document.getElementById(`${category}-products`);
            if (selectedSection) {
                selectedSection.classList.remove('hidden');
                selectedSection.classList.add('fade-in');
            }
            
            // Apply current filters to new category
            applyFilters();
        }, 150);
    }

    // Search functionality
    function searchProducts() {
        currentSearch = document.getElementById('product-search').value.toLowerCase();
        applyFilters();
    }

    // Sort functionality
    function sortProducts() {
        currentSort = document.getElementById('sort-select').value;
        applyFilters();
    }

    // Apply all filters
    function applyFilters() {
        const activeSection = document.querySelector('.category-section:not(.hidden)');
        if (!activeSection) return;

        const products = activeSection.querySelectorAll('.product-item');
        let visibleProducts = [];

        // Filter by search
        products.forEach(product => {
            const name = product.getAttribute('data-name');
            const matchesSearch = currentSearch === '' || name.includes(currentSearch);
            
            if (matchesSearch) {
                visibleProducts.push(product);
                product.classList.remove('hidden');
            } else {
                product.classList.add('hidden');
            }
        });

        // Sort visible products
        if (currentSort !== 'default') {
            visibleProducts.sort((a, b) => {
                switch (currentSort) {
                    case 'name-asc':
                        return a.getAttribute('data-name').localeCompare(b.getAttribute('data-name'));
                    case 'name-desc':
                        return b.getAttribute('data-name').localeCompare(a.getAttribute('data-name'));
                    case 'price-asc':
                        return parseInt(a.getAttribute('data-price')) - parseInt(b.getAttribute('data-price'));
                    case 'price-desc':
                        return parseInt(b.getAttribute('data-price')) - parseInt(a.getAttribute('data-price'));
                    case 'newest':
                        return parseInt(b.getAttribute('data-date')) - parseInt(a.getAttribute('data-date'));
                    case 'oldest':
                        return parseInt(a.getAttribute('data-date')) - parseInt(b.getAttribute('data-date'));
                    default:
                        return 0;
                }
            });

            // Reorder DOM elements
            const container = activeSection.querySelector('.product-grid');
            visibleProducts.forEach(product => {
                container.appendChild(product);
            });
        }

        // Show/hide no results message
        const noResultsMsg = activeSection.querySelector('.no-results-message');
        if (visibleProducts.length === 0 && (currentSearch !== '' || currentSort !== 'default')) {
            noResultsMsg.classList.remove('hidden');
        } else {
            noResultsMsg.classList.add('hidden');
        }
    }



    // Initialize Leaflet Map
    function initMap() {
        const mapElement = document.getElementById('map');
        if (!mapElement) return;

        const latitude = parseFloat(mapElement.dataset.latitude);
        const longitude = parseFloat(mapElement.dataset.longitude);
        const storeName = mapElement.dataset.storeName;
        const storeAddress = mapElement.dataset.storeAddress;

        if (latitude && longitude) {
            // Initialize map
            map = L.map('map').setView([latitude, longitude], 15);

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Add marker
            const marker = L.marker([latitude, longitude]).addTo(map);
            
            // Add popup
            marker.bindPopup(`
                <div class="text-center">
                    <h3 class="font-bold text-lg mb-2">${storeName}</h3>
                    <p class="text-gray-600">${storeAddress}</p>
                </div>
            `);

            // Open popup by default
            marker.openPopup();
        }
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
        // Set up event listeners
        document.getElementById('product-search').addEventListener('input', searchProducts);
        document.getElementById('sort-select').addEventListener('change', sortProducts);
        
        // Initialize first category
        showCategory('eco_enzim');
        
        // Initialize map
        initMap();
    });

    // Smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';
</script>
@endpush