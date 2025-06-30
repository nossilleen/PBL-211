<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold text-green-700 mb-4">Eco Enzyme yang Saya Sukai</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {{-- Produk Eco Enzyme --}}
        @foreach($produkEcoEnzyme as $produk)
        <div class="p-4 border rounded shadow-sm">
            <h3 class="font-semibold text-green-700">{{ $produk->nama_produk }}</h3>
            <p class="text-sm text-gray-600">{{ $produk->deskripsi }}</p>
        </div>
        @endforeach

        {{-- Artikel Eco Enzyme --}}
        @foreach($artikelEcoEnzyme as $artikel)
        <div class="p-4 border rounded shadow-sm">
            <h3 class="font-semibold text-green-700">{{ $artikel->judul }}</h3>
            <p class="text-sm text-gray-600">{{ Str::limit(strip_tags($artikel->konten), 100) }}</p>
        </div>
        @endforeach

        @if($produkEcoEnzyme->isEmpty() && $artikelEcoEnzyme->isEmpty())
            <p class="text-gray-500 col-span-full text-center">Belum ada konten favorit.</p>
        @endif
    </div>
</div>
