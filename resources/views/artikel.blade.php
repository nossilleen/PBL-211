{{-- resources/views/artikel/index.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="Artikel EcoZense - Informasi dan Edukasi tentang Bank Sampah dan Eco Enzim di Batam" />
    <meta name="theme-color" content="#8DD363" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Artikel - EcoZense</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-slate-50 via-white to-emerald-50 overflow-x-hidden">

    <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
        <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
    </div>

    <x-home.navbar />
    <div class="bubble-container pointer-events-none fixed inset-0 -z-10 overflow-hidden"></div>

    <main class="overflow-x-hidden">

        {{-- Header --}}
        <section class="min-h-[60vh] flex items-center relative hero-gradient floating-elements">
            <div class="container mx-auto px-6 md:px-8 relative z-20 py-20">
                <div class="max-w-4xl mx-auto text-center">
                    <div class="flex justify-center mb-8 fade-in">
                        <div class="relative">
                            <img src="{{ asset('images/Logo.jpg') }}" alt="EcoZense Logo" class="h-20 md:h-24 w-auto rounded-2xl shadow-2xl">
                            <div class="absolute inset-0 bg-white rounded-2xl opacity-20 pulse-animation"></div>
                        </div>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in">Artikel & Berita</h1>
                    <p class="text-xl text-green-100 animate-slide-up mb-8">
                        Dapatkan informasi terbaru dan edukasi tentang pengelolaan sampah, eco enzim, dan gaya hidup ramah lingkungan
                    </p>
                    <div class="max-w-2xl mx-auto mt-12 slide-in">
                        <form method="GET" action="{{ route('artikel.index') }}" class="relative">
                            <div class="floating-card rounded-2xl p-2">
                                <div class="flex items-center">
                                    <div class="flex-1 relative">
                                        <input 
                                            type="text" 
                                            name="search" 
                                            value="{{ request('search') }}" 
                                            placeholder="Cari artikel..." 
                                            class="w-full pl-12 pr-4 py-4 bg-transparent border-none focus:outline-none focus:ring-0 text-gray-700 placeholder-gray-400 text-lg font-medium search-glow rounded-xl"
                                        />
                                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <input type="hidden" name="sort" value="{{ request('sort', 'terbaru') }}" />
                                    <button type="submit" class="modern-button ml-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="flex justify-center mt-12 space-x-8 fade-in">
                        @php
                            $totalArtikelsRaw = \App\Models\Artikel::count();
                            $totalKategoriRaw = \App\Models\Artikel::distinct('kategori')->count('kategori');
                            $totalPenulisRaw = \App\Models\Artikel::distinct('user_id')->count('user_id');
                            $totalArtikels = $totalArtikelsRaw >= 20 ? '20+' : $totalArtikelsRaw;
                            $totalKategori = $totalKategoriRaw >= 4 ? '4' : $totalKategoriRaw;
                            $totalPenulis = $totalPenulisRaw > 15 ? '15+' : $totalPenulisRaw;
                        @endphp
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">{{ $totalArtikels }}</div>
                            <div class="text-emerald-200 text-sm">Artikel</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">{{ $totalKategori }}</div>
                            <div class="text-emerald-200 text-sm">Kategori</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">{{ $totalPenulis }}</div>
                            <div class="text-emerald-200 text-sm">Penulis</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Filter & Sort (slider horizontal) --}}
        <section class="bg-white border-b border-gray-200">
            <div class="container mx-auto px-4">
                <form id="filterForm" method="GET" action="{{ route('artikel.index') }}" class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 py-4">
                    {{-- Kategori Slider --}}
                    <div class="w-full md:w-auto flex justify-center md:justify-start">
                        <div class="overflow-x-auto flex space-x-3">
                            @php
                                $kategoriList = [
                                    '' => 'Semua',
                                    'eco enzim' => 'Eco Enzim',
                                    'bank sampah' => 'Bank Sampah',
                                    'tips dan trik' => 'Tips & Trik',
                                    'berita' => 'Berita',
                                ];
                                $icons = [
                                    '' => '🌍',
                                    'eco enzim' => '🧪',
                                    'bank sampah' => '♻',
                                    'tips dan trik' => '💡',
                                    'berita' => '📰',
                                ];
                                $selectedKategori = request('kategori');
                            @endphp
                            @foreach ($kategoriList as $value => $label)
                                @php
                                    $active = $selectedKategori === $value || (empty($selectedKategori) && $value === '');
                                @endphp
                                <a href="{{ route('artikel.index', array_merge(request()->except('page'), ['kategori' => $value])) }}"
                                   class="flex items-center gap-1 whitespace-nowrap px-4 py-2 rounded-full border text-sm font-medium transition-all shadow-sm
                                          {{ $active ? 'bg-green-600 text-white border-green-600 ring-2 ring-green-300' : 'bg-white text-gray-700 border-gray-300 hover:bg-green-50' }}">
                                    <span>{{ $icons[$value] ?? '📄' }}</span>
                                    <span>{{ $label }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    {{-- Sort Tabs mirip browse toko --}}
                    <div class="w-full md:w-auto flex bg-gray-100 rounded-xl p-1">
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'populer']) }}" 
                           class="px-6 py-3 rounded-lg font-medium transition-all duration-300 {{ request('sort') === 'populer' ? 'bg-white text-emerald-600 shadow-md' : 'text-gray-600 hover:text-emerald-600' }}">
                            🔥 Terpopuler
                        </a>
                        <a href="{{ request()->fullUrlWithQuery(['sort' => 'terbaru']) }}" 
                           class="px-6 py-3 rounded-lg font-medium transition-all duration-300 {{ !request('sort') || request('sort') === 'terbaru' ? 'bg-white text-emerald-600 shadow-md' : 'text-gray-600 hover:text-emerald-600' }}">
                            ⭐ Terbaru
                        </a>
                    </div>
                </form>
            </div>
        </section>

        {{-- Artikel Cards Section --}}
        <section id="artikelSection" class="py-16 bg-gradient-to-br from-gray-50 to-emerald-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold gradient-text mb-4">Daftar Artikel</h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Temukan artikel terbaru dan terpopuler seputar eco enzim, bank sampah, dan lingkungan</p>
                    <div class="section-divider max-w-xs mx-auto w-full flex justify-center items-center"></div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @forelse($artikels as $artikel)
                        <div class="bg-white/90 floating-card rounded-xl shadow-lg p-6 flex flex-col hover:shadow-2xl hover:scale-[1.03] border transition-all duration-300">
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
                                <a href="{{ route('artikel.index', ['kategori' => $kategori]) }}" class="absolute top-3 right-2 z-10 bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full shadow flex items-center gap-1 hover:bg-green-200">
                                    <span>{{ $icon }}</span>
                                    <span>{{ ucfirst($kategori) }}</span>
                                </a>
                                <button type="button" onclick="event.stopPropagation(); toggleLikeArtikel({{ $artikel->artikel_id }});" class="absolute top-2 left-3 z-10 flex items-center gap-1 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow hover:bg-white transition">
                                    <svg id="heart-article-{{ $artikel->artikel_id }}" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 {{ $artikel->isLikedBy(auth()->user()) ? 'text-red-500' : 'text-gray-400' }}" fill="{{ $artikel->isLikedBy(auth()->user()) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                    </svg>
                                    <span id="like-count-article-{{ $artikel->artikel_id }}" class="text-xs text-gray-600 ml-1">{{ $artikel->likes->count() }} suka</span>
                                </button>
                                <img src="{{ asset($artikel->gambar->first()->file_path ?? 'images/default.jpg') }}" class="w-full h-48 object-cover transition-transform duration-300 ease-in-out hover:scale-105" alt="Gambar Artikel">
                            </div>
                            <div class="flex items-center gap-2 mb-2">
                                <a href="{{ route('artikel.show', $artikel->artikel_id) }}" class="text-xl font-bold text-green-700 hover:underline hover:text-green-800 transition-all duration-200 ease-in-out hover:-translate-y-0.5 inline-block">
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
                            <a href="{{ route('artikel.show', $artikel->artikel_id) }}" class="bg-green-600 text-white px-4 py-2 rounded shadow-md hover:bg-green-700 transition mt-auto text-center">
                                Baca Selengkapnya
                            </a>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-16">
                            <div class="text-6xl mb-4">📄</div>
                            <div class="text-2xl font-bold text-gray-700 mb-2">Belum ada artikel untuk kategori ini.</div>
                            <p class="text-gray-500">Coba ubah kata kunci pencarian atau kategori Anda</p>
                        </div>
                    @endforelse
                </div>
                {{-- Pagination --}}
                <div class="mt-8 flex justify-center">
                    <ul class="flex border border-gray-300 rounded-md overflow-hidden bg-white text-sm">
                        {{-- Tombol Sebelumnya --}}
                        @if ($artikels->onFirstPage())
                            <li>
                                <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white border-r border-gray-300 cursor-not-allowed select-none">Sebelumnya</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $artikels->previousPageUrl() }}" rel="prev" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">Sebelumnya</a>
                            </li>
                        @endif
                        {{-- Nomor Halaman --}}
                        @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                            @if ($page == $artikels->currentPage())
                                <li>
                                    <span class="px-4 py-1.5 h-9 flex items-center font-bold text-white bg-green-600 border-r border-gray-300">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                        {{-- Tombol Selanjutnya --}}
                        @if ($artikels->hasMorePages())
                            <li>
                                <a href="{{ $artikels->nextPageUrl() }}" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
                            </li>
                        @else
                            <li>
                                <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white cursor-not-allowed select-none">Selanjutnya</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <x-home.footer />

    {{-- Back to Top Button --}}
    <button id="back-to-top" class="fixed bottom-8 right-8 modern-button w-14 h-14 rounded-full opacity-0 invisible transition-all duration-300 z-50 glow-effect flex items-center justify-center p-0">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7 7 7"></path>
        </svg>
    </button>

    <script>
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            setTimeout(() => {
                preloader.classList.add('opacity-0');
                setTimeout(() => preloader.style.display = 'none', 300);
            }, 500);
        });

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
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        const kategoriDropdown = document.getElementById('kategoriDropdown');
        const kategoriMenu = document.getElementById('kategoriMenu');
        const currentKategori = document.getElementById('currentKategori');
        const kategoriLinks = document.querySelectorAll('#kategoriMenu a');
        if (kategoriDropdown && kategoriMenu) {
            kategoriDropdown.addEventListener('click', function() {
                kategoriMenu.classList.toggle('hidden');
                const arrow = this.querySelector('svg');
                arrow.classList.toggle('rotate-180');
            });
            kategoriLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    kategoriMenu.classList.add('hidden');
                    const arrow = kategoriDropdown.querySelector('svg');
                    arrow.classList.remove('rotate-180');
                });
            });
            document.addEventListener('click', function(event) {
                if (!kategoriDropdown.contains(event.target)) {
                    kategoriMenu.classList.add('hidden');
                    const arrow = kategoriDropdown.querySelector('svg');
                    arrow.classList.remove('rotate-180');
                }
            });
        }

        // AJAX pagination untuk artikel
        function loadArtikelPage(url) {
            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' }})
                .then(res => res.text())
                .then(html => {
                    const doc = new DOMParser().parseFromString(html, 'text/html');
                    const newSection = doc.querySelector('#artikelSection');
                    if (newSection) {
                        document.querySelector('#artikelSection').innerHTML = newSection.innerHTML;
                        document.querySelector('#artikelSection').scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                    window.history.pushState({}, '', url);
                })
                .catch(err => console.error(err));
        }

        document.addEventListener('click', function(e) {
            const link = e.target.closest('a');
            if (!link) return;
            if (link.closest('#artikelSection') && link.href.includes('page=')) {
                e.preventDefault();
                loadArtikelPage(link.href);
            }
        });

        window.addEventListener('popstate', () => {
            loadArtikelPage(window.location.href);
        });

        // Toggle like artikel
        function toggleLikeArtikel(artikelId) {
            const heartIcon = document.getElementById(`heart-article-${artikelId}`);
            const likeCountEl = document.getElementById(`like-count-article-${artikelId}`);
            const isCurrentlyLiked = heartIcon.classList.contains('text-red-500');

            fetch(`/artikel/${artikelId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'same-origin'
            })
            .then(res => {
                if (res.status === 401) {
                    window.location.href = '/login';
                    return null;
                }
                return res.json();
            })
            .then(data => {
                if (!data) return;
                if (data.success) {
                    if (data.isLiked) {
                        heartIcon.classList.add('text-red-500');
                        heartIcon.classList.remove('text-gray-400');
                        heartIcon.setAttribute('fill', 'currentColor');
                    } else {
                        heartIcon.classList.remove('text-red-500');
                        heartIcon.classList.add('text-gray-400');
                        heartIcon.setAttribute('fill', 'none');
                    }
                    likeCountEl.textContent = data.suka + ' suka';
                }
            })
            .catch(err => console.error(err));
        }
    </script>
</body>
</html>
