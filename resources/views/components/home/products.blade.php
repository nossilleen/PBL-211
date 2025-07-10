@php
    $bestSellers = \App\Models\Produk::with('gambar')
        ->where('status_ketersediaan', 'Available')
        ->orderBy('suka', 'desc')
        ->take(5)
        ->get();
@endphp

<section class="py-16 relative" style="background-color: #99f159; background-size: cover; background-position: center;">
<div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-6" data-aos="fade-up">
            Produk Eco Enzim terlaris
        </h2>
        <h3 class="text-xl text-center mb-12" data-aos="fade-up" data-aos-delay="100">bulan ini</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                        @foreach ($bestSellers as $product)
                            <x-browse.product-card 
                                :image="asset($product->image_url)"
                                :title="$product->nama_produk"
                                :desc="Str::limit($product->deskripsi, 50)"
                                :price="number_format($product->harga, 0, ',', '.')"
                                :harga_points="$product->harga_points"
                                :status="$product->status_ketersediaan"
                                :bank="optional($product->user)->nama"
                                :createdAt="$product->created_at"
                                :suka="$product->suka"
                                :productId="$product->produk_id"
                            >
                                <!-- Remove the duplicate like button, keep only the Beli button -->
                            </x-browse.product-card>
                        @endforeach
                    </div>

        <div class="text-center mt-10" data-aos="fade-up" data-aos-delay="600">
            <a href="{{ route('browse') }}" 
               class="inline-block bg-white text-green-600 px-8 py-3 rounded-lg hover:bg-gray-50 transition button-hover-effect">
                See more
            </a>
        </div>
    </div>
</section>

<div class="spacer2 wave4"></div>