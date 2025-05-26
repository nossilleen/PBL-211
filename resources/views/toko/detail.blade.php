@extends('layouts.app')

@section('content')
    <!-- Remove pt-16 since we'll handle spacing differently -->
    <main>
        <!-- Store Header - Add mt-16 to start content below navbar -->
        <section class="mt-16 bg-white shadow-sm">
            <div class="container mx-auto px-4 py-12">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="w-40 h-40 md:w-48 md:h-48 rounded-full overflow-hidden shadow-lg">
                        <img src="{{ asset($shop->profile_picture ?? 'images/Frame 2305.png') }}" alt="Foto Toko" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ $shop->nama ?? 'Nama Toko' }}</h1>
                        <p class="text-lg text-gray-600 mb-6 max-w-2xl">{{ $shop->deskripsi ?? 'Deskripsi singkat tentang toko ini dan produk-produk yang dijual. Kami menyediakan berbagai produk eco enzyme berkualitas.' }}</p>
                        <div class="flex flex-wrap gap-6 justify-center md:justify-start">
                            <div class="flex items-center bg-gray-50 px-4 py-2 rounded-lg">
                                <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="text-gray-700">{{ $shop->alamat ?? 'Lokasi Toko' }}</span>
                            </div>
                            <div class="flex items-center bg-gray-50 px-4 py-2 rounded-lg">
                                <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-gray-700">Jam Operasional: 08.00 - 17.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product Categories -->
        <section class="py-8">
            <div class="container mx-auto px-4">
                <!-- Category Tabs -->
                <div class="flex flex-wrap gap-4 mb-12">
                    <button onclick="showCategory('eco-enzyme')" class="px-6 py-3 bg-green-600 text-white rounded-full hover:bg-green-700 transition-colors text-lg">
                        Eco Enzim
                    </button>
                    <button onclick="showCategory('sembako')" class="px-6 py-3 bg-white text-gray-600 rounded-full hover:bg-gray-100 transition-colors text-lg">
                        Sembako
                    </button>
                </div>

                <!-- Eco Enzyme Products Section -->
                <div id="eco-enzyme-products" class="category-section">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Eco Enzim</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @forelse($products ?? [] as $product)
                            <x-browse.product-card 
                                :image="asset($product->image_url ?? 'images/default-product.jpg')"
                                :title="$product->nama_produk"
                                :desc="Str::limit($product->deskripsi, 50)"
                                :price="number_format($product->harga, 0, ',', '.')"
                                :status="$product->status_ketersediaan"
                                :bank="$shop->nama"
                                :suka="$product->suka"
                                :productId="$product->produk_id"
                            >
                                <a href="{{ route('product.detail', ['id' => $product->produk_id]) }}"
                                   class="w-full px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-colors text-center">
                                    Beli Sekarang
                                </a>
                            </x-browse.product-card>
                        @empty
                            <div class="col-span-4 text-center text-gray-500">Belum ada produk eco enzim.</div>
                        @endforelse
                    </div>
                </div>

                <!-- Sembako Products Section -->
                <div id="sembako-products" class="category-section hidden mt-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Sembako</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="col-span-4 text-center text-gray-500">Fitur sembako akan segera hadir.</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    function showCategory(category) {
        document.querySelectorAll('.category-section').forEach(section => {
            section.classList.add('hidden');
        });

        document.querySelectorAll('.flex.flex-wrap.gap-4 button').forEach(button => {
            button.classList.remove('bg-green-600', 'text-white');
            button.classList.add('bg-white', 'text-gray-600');
        });

        if (category === 'eco-enzyme') {
            document.getElementById('eco-enzyme-products').classList.remove('hidden');
        } else if (category === 'sembako') {
            document.getElementById('sembako-products').classList.remove('hidden');
        }

        const activeButton = event.currentTarget;
        activeButton.classList.remove('bg-white', 'text-gray-600');
        activeButton.classList.add('bg-green-600', 'text-white');
    }
</script>
@endpush