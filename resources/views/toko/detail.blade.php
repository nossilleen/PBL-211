@extends('layouts.app')

@section('content')
    <!-- Remove pt-16 since we'll handle spacing differently -->
    <main>


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
                                :harga_points="$product->harga_points"
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

    <x-home.footer />
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