@extends('layouts.app')

@section('content')
<!-- Main Content -->
<main class="pt-20 pb-16">
    <!-- Store Header -->
    <section class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-12">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="w-40 h-40 md:w-48 md:h-48 rounded-full overflow-hidden shadow-lg">
                    <img src="{{ $pengelola->foto_toko ? Storage::url($pengelola->foto_toko) : asset('images/default-store.png') }}" 
                         alt="{{ $pengelola->nama }}" 
                         class="w-full h-full object-cover">
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ $pengelola->nama }}</h1>
                    <p class="text-lg text-gray-600 mb-6 max-w-2xl">{{ $pengelola->deskripsi_toko ?? 'Belum ada deskripsi' }}</p>
                    <div class="flex flex-wrap gap-6 justify-center md:justify-start">
                        <div class="flex items-center bg-gray-50 px-4 py-2 rounded-lg">
                            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-gray-700">
                                @if($lokasi)
                                    {{ $lokasi->nama_lokasi }}, {{ $lokasi->alamat }}
                                @else
                                    Belum ada alamat
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center bg-gray-50 px-4 py-2 rounded-lg">
                            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-gray-700">{{ $pengelola->jam_operasional ?? 'Belum ditentukan' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mx-auto px-4 min-h-[calc(100vh-theme('spacing.20')-theme('spacing.16')-theme('spacing.32'))] mb-8">
        <!-- Category Tabs -->
        <div class="flex flex-wrap gap-4 mb-12 mt-8">
            <button onclick="showCategory('eco_enzim')" 
                    class="category-btn px-6 py-3 bg-white text-gray-600 rounded-full hover:bg-gray-100 transition-colors text-lg active"
                    data-category="eco_enzim">
                Eco Enzyme
            </button>
            <button onclick="showCategory('sembako')" 
                    class="category-btn px-6 py-3 bg-white text-gray-600 rounded-full hover:bg-gray-100 transition-colors text-lg"
                    data-category="sembako">
                Sembako
            </button>
        </div>

        <!-- Products Sections -->
        @foreach($products as $kategori => $productCollection)
            <div id="{{ $kategori }}-products" class="category-section {{ $loop->first ? '' : 'hidden' }}">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ ucwords(str_replace('_', ' ', $kategori)) }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                    @foreach($productCollection as $product)
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
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</main>

<!-- Footer -->
<x-home.footer />
@endsection

@push('scripts')
<script>
    function showCategory(category) {
        const sections = document.querySelectorAll('.category-section');
        const buttons = document.querySelectorAll('.category-btn');
        
        // Hide all sections
        sections.forEach(section => section.classList.add('hidden'));
        
        // Remove active state from all buttons
        buttons.forEach(btn => {
            btn.classList.remove('bg-green-600', 'text-white');
            btn.classList.add('bg-white', 'text-gray-600');
        });
        
        // Show selected section
        const selectedSection = document.getElementById(`${category}-products`);
        if (selectedSection) {
            selectedSection.classList.remove('hidden');
        }
        
        // Set active button
        const selectedButton = document.querySelector(`[data-category="${category}"]`);
        if (selectedButton) {
            selectedButton.classList.remove('bg-white', 'text-gray-600');
            selectedButton.classList.add('bg-green-600', 'text-white');
        }
    }

    // Initialize first category as active
    document.addEventListener('DOMContentLoaded', () => {
        showCategory('eco_enzim');
    });
</script>
@endpush