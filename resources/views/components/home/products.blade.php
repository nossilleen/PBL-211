@php
    $bestSellers = \App\Models\Produk::with('gambar')
        ->where('status_ketersediaan', 'Available')
        ->orderBy('suka', 'desc')
        ->take(4)
        ->get();
@endphp

<section class="py-16 relative" style="background-color: #99f159; background-size: cover; background-position: center;">
<div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-6" data-aos="fade-up">
            Produk Eco Enzim terlaris
        </h2>
        <h3 class="text-xl text-center mb-12" data-aos="fade-up" data-aos-delay="100">bulan ini</h3>

        <div class="grid md:grid-cols-4 gap-6">
            @foreach($bestSellers as $product)
            <div class="bg-white rounded-lg overflow-hidden shadow-lg card-hover-effect flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ 200 + $loop->index * 100 }}">
                <div class="aspect-w-16 aspect-h-9">
                    <img src="{{ $product->image_url }}" 
                         alt="{{ $product->nama_produk }}" 
                         class="object-cover w-full h-48">
                </div>
                <div class="p-6 flex-grow">
                    <h4 class="font-semibold mb-4 text-lg text-gray-800 min-h-[56px]">{{ $product->nama_produk }}</h4>
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center">
                            <span class="text-green-600 font-medium text-lg min-w-[100px]">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center text-gray-500 space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                            </svg>
                            <span class="min-w-[30px] text-right">{{ $product->suka }}</span>
                        </div>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="{{ route('product.detail', $product->produk_id) }}"
                       class="block w-full text-center bg-green-600 text-white rounded-lg py-2.5 px-4 hover:bg-green-700 transition duration-200 button-hover-effect">
                        Beli
                    </a>
                </div>
            </div>
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