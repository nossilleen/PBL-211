{{-- resources/views/artikel/index.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="Artikel EcoZense - Informasi dan Edukasi tentang Bank Sampah dan Eco Enzim di Batam" />
    <meta name="theme-color" content="#8DD363" />
    <title>Artikel - EcoZense</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 overflow-x-hidden">

    <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
        <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
    </div>

    <x-home.navbar />
    <div class="bubble-container pointer-events-none fixed inset-0 -z-10 overflow-hidden"></div>

    <main class="overflow-x-hidden">

        {{-- Header --}}
        <section class="h-[60vh] flex items-center relative">
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/bg1.jpeg') }}" class="w-full h-full object-cover" alt="Background">
            </div>
            <div class="absolute inset-0 bg-green-900/50 z-10"></div>
            <div class="container mx-auto px-6 md:px-8 relative z-20 py-16 md:py-20">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in">Artikel & Berita</h1>
                    <p class="text-xl text-green-100 animate-slide-up mb-8">
                        Dapatkan informasi terbaru dan edukasi tentang pengelolaan sampah, eco enzim, dan gaya hidup ramah lingkungan
                    </p>
                    <form method="GET" action="{{ route('artikel.index') }}" class="relative flex items-center max-w-lg mx-auto mt-8">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..."
                            class="w-full pl-4 pr-12 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 shadow-sm">
                        <button type="submit"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-green-500 hover:bg-green-600 text-white p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </section>

        {{-- Filter & Sort --}}
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


            {{-- Sort Buttons --}}
            <div class="flex space-x-6 justify-end md:justify-end">
                <button type="submit" name="sort" value="populer"
                        class="text-gray-700 hover:text-green-600 border-b-2 {{ request('sort') == 'populer' ? 'border-green-600' : 'border-transparent' }} px-1 py-2 font-medium">
                    Terpopuler
                </button>
                <button type="submit" name="sort" value="terbaru"
                        class="text-gray-700 hover:text-green-600 border-b-2 {{ !request('sort') || request('sort') == 'terbaru' ? 'border-green-600' : 'border-transparent' }} px-1 py-2 font-medium">
                    Terbaru
                </button>
            </div>
        </form>
    </div>
</section>


        {{-- Artikel Cards --}}
        <section class="py-12 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @forelse($artikels as $artikel)
                        <div class="bg-white rounded-lg shadow p-6 flex flex-col hover:shadow-xl hover:scale-[1.02] border transition-all duration-300">
                            <div class="relative overflow-hidden rounded mb-4">
                                {{-- Badge Kategori --}}
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

                                {{-- Tombol Like --}}
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
   class="text-xl font-bold text-green-700 hover:underline hover:text-green-800 transition-all duration-200 ease-in-out hover:-translate-y-0.5 inline-block">
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
                        <p class="text-gray-500">Tidak ada artikel untuk kategori ini.</p>
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

    {{-- Back to Top --}}
    <button id="back-to-top"
        class="fixed bottom-6 right-6 bg-green-600 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 z-50 hover:bg-green-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
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

        const backToTopBtn = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.remove('opacity-0', 'invisible');
                backToTopBtn.classList.add('opacity-100', 'visible');
            } else {
                backToTopBtn.classList.add('opacity-0', 'invisible');
                backToTopBtn.classList.remove('opacity-100', 'visible');
            }
        });
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>
