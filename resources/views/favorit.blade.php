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
        @if($produkFavorit->count() > 0 && $produkFavorit->lastPage() > 1)
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
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col border border-green-200 hover:shadow-green-300 hover:ring-2 hover:ring-green-400 transition-all duration-300 h-full" id="artikel-favorit-{{ $artikel->artikel_id }}">
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
                              class="absolute top-2 left-3 z-10 unlike-artikel-form" data-artikel-id="{{ $artikel->artikel_id }}">
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
                        <img src="{{ asset($artikel->gambar ?? 'images/default.jpg') }}"
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
                    @php
                        // Pastikan url pagination artikel hanya mengandung artikel_page, hapus produk_page jika ada
                        $parsedUrl = parse_url($url);
                        $query = [];
                        if (isset($parsedUrl['query'])) {
                            parse_str($parsedUrl['query'], $query);
                            unset($query['produk_page']);
                        }
                        $basePath = $parsedUrl['path'] ?? '';
                        $finalUrl = $basePath . (count($query) ? ('?' . http_build_query($query)) : '');
                    @endphp
                    @if ($page == $artikelFavorit->currentPage())
                        <li>
                            <span class="px-4 py-1.5 h-9 flex items-center font-bold text-white bg-green-600 border-r border-gray-300">{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $finalUrl }}#favorit" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
                @php
                    // Cek apakah next page benar-benar ada data
                    $nextPage = $artikelFavorit->currentPage() + 1;
                    $perPage = $artikelFavorit->perPage();
                    $total = $artikelFavorit->total();
                    $nextPageFirstItem = ($nextPage - 1) * $perPage + 1;
                    $nextPageHasData = $nextPageFirstItem <= $total;
                @endphp
                @if ($artikelFavorit->hasMorePages() && $nextPageHasData)
                    <li>
                        @php
                            $nextUrl = $artikelFavorit->nextPageUrl();
                            $parsedUrl = parse_url($nextUrl);
                            $query = [];
                            if (isset($parsedUrl['query'])) {
                                parse_str($parsedUrl['query'], $query);
                                unset($query['produk_page']);
                            }
                            $basePath = $parsedUrl['path'] ?? '';
                            $finalUrl = $basePath . (count($query) ? ('?' . http_build_query($query)) : '');
                        @endphp
                        <a href="{{ $finalUrl }}#favorit" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
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

    // Auto tab artikel jika ada artikel_page di URL
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('artikel_page')) {
            showFavorit('artikel');
        } else {
            showFavorit('produk');
        }
        document.querySelectorAll('.unlike-artikel-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var artikelId = this.getAttribute('data-artikel-id');
                var token = this.querySelector('input[name="_token"]').value;
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: new URLSearchParams({ _token: token })
                })
                .then(response => {
                    if (response.ok) {
                        // Hapus card artikel dari DOM
                        var card = document.getElementById('artikel-favorit-' + artikelId);
                        if (card) card.remove();
                        // Reload ke tab artikel favorit (dengan artikel_page dan hash)
                        var url = new URL(window.location.href);
                        // Jika sudah ada artikel_page, tetap gunakan, jika tidak, set ke 1
                        if (!url.searchParams.has('artikel_page')) {
                            url.searchParams.set('artikel_page', '1');
                        }
                        url.hash = 'favorit';
                        window.location.href = url.toString();
                    } else {
                        return response.json().then(data => { throw data; });
                    }
                })
                .catch(err => {
                    alert('Gagal unlike artikel. Silakan coba lagi.');
                });
            });
        });
        // Tambahkan event listener untuk unlike produk favorit (AJAX)
        document.querySelectorAll('.unlike-produk-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var produkId = this.getAttribute('data-produk-id');
                var token = this.querySelector('input[name="_token"]').value;
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: new URLSearchParams({ _token: token })
                })
                .then(response => {
                    if (response.ok) {
                        // Hapus card produk dari DOM
                        var card = document.getElementById('produk-favorit-' + produkId);
                        if (card) card.remove();
                        // Cek sisa produk di halaman
                        var sisa = document.querySelectorAll('#favorit-produk .x-browse-product-card, #favorit-produk .bg-white.rounded-lg').length;
                        if (sisa <= 1) {
                            // Jika produk habis di halaman ini, reload ke halaman sebelumnya jika ada
                            var url = new URL(window.location.href);
                            var page = parseInt(url.searchParams.get('produk_page') || '1');
                            if (page > 1) {
                                url.searchParams.set('produk_page', (page - 1).toString());
                            } else {
                                url.searchParams.set('produk_page', '1');
                            }
                            url.hash = 'favorit';
                            window.location.href = url.toString();
                        } else {
                            // Tetap di halaman ini, reload agar paginator update
                            var url = new URL(window.location.href);
                            if (!url.searchParams.has('produk_page')) {
                                url.searchParams.set('produk_page', '1');
                            }
                            url.hash = 'favorit';
                            window.location.href = url.toString();
                        }
                    } else {
                        return response.json().then(data => { throw data; });
                    }
                })
                .catch(err => {
                    alert('Gagal unlike produk. Silakan coba lagi.');
                });
            });
        });
    });
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
