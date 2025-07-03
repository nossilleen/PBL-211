<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold text-green-700 mb-4">Favorit Saya</h2>
    <!-- Tombol Switch Kategori -->
    <div class="flex gap-2 mb-4">
        <button id="btn-produk" class="kategori-btn px-5 py-2 rounded-full font-semibold flex items-center gap-2 transition-colors duration-150 bg-green-600 text-white focus:outline-none focus:ring-2 focus:ring-green-300" onclick="showFavorit('produk')">
            <span class="text-lg icon-produk text-yellow-200">🛒</span> Produk
        </button>
        <button id="btn-artikel" class="kategori-btn px-5 py-2 rounded-full font-semibold flex items-center gap-2 transition-colors duration-150 bg-gray-100 text-green-700 focus:outline-none focus:ring-2 focus:ring-green-200" onclick="showFavorit('artikel')">
            <span class="text-lg icon-artikel text-green-600">📰</span> Artikel
        </button>
    </div>
    <!-- Daftar Produk Favorit -->
    <div id="favorit-produk" class="favorit-list">
        <h3 class="text-lg font-bold mb-2">Produk</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            @forelse($produkFavorit as $produk)
                <x-browse.product-card 
                    :image="asset($produk->image_url ?? 'images/default-product.jpg')"
                    :title="$produk->nama_produk"
                    :desc="Str::limit($produk->deskripsi, 50)"
                    :price="number_format($produk->harga, 0, ',', '.')"
                    :harga_points="$produk->harga_points"
                    :status="$produk->status_ketersediaan"
                    :bank="$produk->user->nama"
                    :createdAt="$produk->created_at"
                    :suka="$produk->suka"
                    :productId="$produk->produk_id"
                    :isLiked="true"
                />
            @empty
                <p class="text-gray-500 col-span-full text-center">Belum ada produk favorit.</p>
            @endforelse
        </div>
        @if($produkFavorit->lastPage() > 1)
        <div class="flex justify-center mt-2">
            <ul class="flex border border-gray-300 rounded-md overflow-hidden bg-white text-sm">
                @if ($produkFavorit->onFirstPage())
                    <li>
                        <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white border-r border-gray-300 cursor-not-allowed select-none">Sebelumnya</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $produkFavorit->previousPageUrl() }}#favorit" rel="prev" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">Sebelumnya</a>
                    </li>
                @endif
                @foreach ($produkFavorit->getUrlRange(1, $produkFavorit->lastPage()) as $page => $url)
                    @if ($page == $produkFavorit->currentPage())
                        <li>
                            <span class="px-4 py-1.5 h-9 flex items-center font-bold text-white bg-green-600 border-r border-gray-300">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}#favorit" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
                @if ($produkFavorit->hasMorePages())
                    <li>
                        <a href="{{ $produkFavorit->nextPageUrl() }}#favorit" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
                    </li>
                @else
                    <li>
                        <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white cursor-not-allowed select-none">Selanjutnya</span>
                    </li>
                @endif
            </ul>
        </div>
        @endif
    </div>
    <!-- Daftar Artikel Favorit -->
    <div id="favorit-artikel" class="favorit-list hidden">
        <h3 class="text-lg font-bold mb-2">Artikel</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mb-6">
            @forelse($artikelFavorit as $artikel)
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col border border-green-200 hover:shadow-green-300 hover:ring-2 hover:ring-green-400 transition-all duration-300 h-full">
                    <div class="relative overflow-hidden rounded mb-4">
                        @php
                            $icons = [
                                'eco enzim' => '🧪',
                                'bank sampah' => '♻',
                                'tips dan trik' => '💡',
                                'berita' => '📰',
                            ];
                            $kategori = strtolower($artikel->kategori);
                            $icon = $icons[$kategori] ?? '📄';
                        @endphp
                        <a href="{{ route('artikel.index', ['kategori' => $kategori]) }}"
                           class="absolute top-3 right-2 z-10 bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full shadow flex items-center gap-1 hover:bg-green-200">
                            <span>{{ $icon }}</span>
                            <span>{{ ucfirst($kategori) }}</span>
                        </a>
                        <form method="POST" action="{{ route('artikel.like', $artikel->artikel_id) }}"
                              class="absolute top-2 left-3 z-10">
                            @csrf
                            <button type="submit"
                                    class="flex items-center gap-1 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow hover:bg-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 {{ $artikel->isLikedBy(auth()->user()) ? 'text-red-500' : 'text-gray-400' }}"
                                     viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                             2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09
                                             C13.09 3.81 14.76 3 16.5 3
                                             19.58 3 22 5.42 22 8.5
                                             c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                                <span class="text-xs text-gray-600 ml-1">{{ $artikel->likes->count() }} suka</span>
                            </button>
                        </form>
                        <img src="{{ asset($artikel->gambar->first()->file_path ?? 'images/default.jpg') }}"
                             class="w-full h-48 object-cover transition-transform duration-300 ease-in-out hover:scale-105"
                             alt="Gambar Artikel">
                    </div>
                    <div class="flex items-center gap-2 mb-2">
                        <a href="{{ route('artikel.show', $artikel->artikel_id) }}"
                           class="text-base font-bold text-green-700 hover:underline hover:text-green-800 transition-all duration-200 ease-in-out hover:-translate-y-0.5 inline-block">
                            {{ $artikel->judul }}
                        </a>
                        @if(\Carbon\Carbon::parse($artikel->tanggal_publikasi)->diffInDays(now()) <= 7)
                            <span class="text-xs bg-red-500 text-white px-2 py-0.5 rounded-full animate-bounce">Baru!</span>
                        @endif
                    </div>
                    <p class="text-gray-600 text-sm mb-3 flex-grow">{{ Str::limit(strip_tags($artikel->konten), 100) }}</p>
                    <div class="text-xs text-gray-500 mb-4 flex items-center space-x-2">
                        <span>{{ $artikel->user->nama ?? 'Penulis Tidak Diketahui' }}</span>
                        <span class="mx-1">|</span>
                        <span>{{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->format('d M Y') }}</span>
                    </div>
                    <a href="{{ route('artikel.show', $artikel->artikel_id) }}"
                       class="bg-green-600 text-white px-4 py-2 rounded shadow-md hover:bg-green-700 transition mt-auto text-center">
                        Baca Selengkapnya
                    </a>
                </div>
            @empty
                <p class="text-gray-500 col-span-full text-center">Belum ada artikel favorit.</p>
            @endforelse
        </div>
        @if($artikelFavorit->lastPage() > 1)
        <div class="flex justify-center mt-2">
            <ul class="flex border border-gray-300 rounded-md overflow-hidden bg-white text-sm">
                @if ($artikelFavorit->onFirstPage())
                    <li>
                        <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white border-r border-gray-300 cursor-not-allowed select-none">Sebelumnya</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $artikelFavorit->previousPageUrl() }}#favorit" rel="prev" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">Sebelumnya</a>
                    </li>
                @endif
                @foreach ($artikelFavorit->getUrlRange(1, $artikelFavorit->lastPage()) as $page => $url)
                    @if ($page == $artikelFavorit->currentPage())
                        <li>
                            <span class="px-4 py-1.5 h-9 flex items-center font-bold text-white bg-green-600 border-r border-gray-300">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}#favorit" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
                @if ($artikelFavorit->hasMorePages())
                    <li>
                        <a href="{{ $artikelFavorit->nextPageUrl() }}#favorit" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
                    </li>
                @else
                    <li>
                        <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white cursor-not-allowed select-none">Selanjutnya</span>
                    </li>
                @endif
            </ul>
        </div>
        @endif
    </div>
</div>
<script>
    function showFavorit(kategori) {
        const btnProduk = document.getElementById('btn-produk');
        const btnArtikel = document.getElementById('btn-artikel');
        const listProduk = document.getElementById('favorit-produk');
        const listArtikel = document.getElementById('favorit-artikel');
        if (kategori === 'produk') {
            btnProduk.classList.add('bg-green-600', 'text-white', 'active');
            btnProduk.classList.remove('bg-gray-200', 'text-green-700');
            btnArtikel.classList.remove('bg-green-600', 'text-white', 'active');
            btnArtikel.classList.add('bg-gray-200', 'text-green-700');
            listProduk.classList.remove('hidden');
            listArtikel.classList.add('hidden');
        } else {
            btnArtikel.classList.add('bg-green-600', 'text-white', 'active');
            btnArtikel.classList.remove('bg-gray-200', 'text-green-700');
            btnProduk.classList.remove('bg-green-600', 'text-white', 'active');
            btnProduk.classList.add('bg-gray-200', 'text-green-700');
            listProduk.classList.add('hidden');
            listArtikel.classList.remove('hidden');
        }
    }
</script>
<style>
    .kategori-btn {
        border: none;
        box-shadow: none;
    }
    .kategori-btn.active {
        background: #16a34a !important;
        color: #fff !important;
    }
    .kategori-btn.active .icon-produk {
        color: #fde68a !important; /* yellow-200 */
    }
    .kategori-btn:not(.active) {
        background: #f1f5f9;
        color: #15803d;
    }
    .kategori-btn:not(.active) .icon-produk {
        color: #15803d !important;
    }
    .kategori-btn:hover:not(.active) {
        background: #bbf7d0 !important;
        color: #166534 !important;
    }
    .kategori-btn:focus {
        outline: none;
        box-shadow: 0 0 0 2px #bbf7d0;
    }
    .favorit-list.hidden {
        display: none;
    }
</style>
