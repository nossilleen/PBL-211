<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Event EcoZense - Temukan berbagai acara edukatif dan kolaboratif seputar eco enzim, daur ulang, dan lingkungan hijau." />
        <meta name="theme-color" content="#8DD363" />
        <title>Event - EcoZense</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 overflow-x-hidden">
        <!-- Preloader -->
        <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
        </div>

        <!-- Navbar -->
        <x-home.navbar />

        <!-- Main Content Wrapper -->
        <main class="overflow-x-hidden">
            <!-- Hero Section for Articles -->
            <section class="min-h-[60vh] flex items-center relative hero-gradient floating-elements">
                <div class="container mx-auto px-6 md:px-8 relative z-20 py-20">
                    <div class="max-w-4xl mx-auto text-center">
                        <div class="flex justify-center mb-8 fade-in">
                            <div class="relative">
                                <img src="{{ asset('images/Logo.jpg') }}" alt="EcoZense Logo" class="h-20 md:h-24 w-auto rounded-2xl shadow-2xl">
                                <div class="absolute inset-0 bg-white rounded-2xl opacity-20 pulse-animation"></div>
                            </div>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in">
                            Event & Kegiatan
                        </h1>
                        <p class="text-xl text-green-100 animate-slide-up mb-8">
                            Temukan berbagai acara edukatif dan kolaboratif seputar eco enzim, daur ulang, dan lingkungan hijau.
                        </p>
                        <!-- Search Bar mirip browse toko -->
                        <div class="max-w-2xl mx-auto mt-12 slide-in">
                            <form method="GET" action="{{ route('events.index') }}" class="relative">
                                <div class="floating-card rounded-2xl p-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 relative">
                                            <input 
                                                type="text" 
                                                name="search" 
                                                value="{{ request('search') }}" 
                                                placeholder="Cari acara..." 
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
                        <!-- Stats mirip browse toko -->
                        <div class="flex justify-center mt-12 space-x-8 fade-in">
                            @php
                                $totalEventsRaw = $events->total() ?? 0;
                                $totalLokasiRaw = $events->pluck('location')->unique()->count();
                                $totalPenulisRaw = $events->pluck('user_id')->unique()->count();
                                $totalEvents = $totalEventsRaw >= 20 ? '20+' : $totalEventsRaw;
                                $totalLokasi = $totalLokasiRaw >= 4 ? '4' : $totalLokasiRaw;
                                $totalPenulis = $totalPenulisRaw > 15 ? '15+' : $totalPenulisRaw;
                            @endphp
                            <div class="text-center">
                                <div class="text-3xl font-bold text-white">{{ $totalEvents }}</div>
                                <div class="text-emerald-200 text-sm">Acara</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-white">{{ $totalLokasi }}</div>
                                <div class="text-emerald-200 text-sm">Lokasi</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-white">{{ $totalPenulis }}</div>
                                <div class="text-emerald-200 text-sm">Penulis</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Filter Tabs Section (tab highlight mirip artikel) -->
            <section class="bg-white border-b border-gray-200">
                <div class="container mx-auto px-4">
                    <form id="filterForm" method="GET" action="{{ route('events.index') }}" class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 py-4">
                        <div class="flex space-x-6 justify-end md:justify-end w-full">
                            @php
                                $currentSort = request('sort', 'terbaru');
                                $query = request()->all();
                            @endphp
                            <a href="{{ route('events.index', array_merge($query, ['sort' => 'populer'])) }}"
                               class="px-6 py-3 rounded-lg font-medium transition-all duration-300 {{ $currentSort === 'populer' ? 'bg-white text-emerald-600 shadow-md' : 'text-gray-600 hover:text-emerald-600' }}">
                                🔥 Terpopuler
                            </a>
                            <a href="{{ route('events.index', array_merge($query, ['sort' => 'terbaru'])) }}"
                               class="px-6 py-3 rounded-lg font-medium transition-all duration-300 {{ !request('sort') || $currentSort === 'terbaru' ? 'bg-white text-emerald-600 shadow-md' : 'text-gray-600 hover:text-emerald-600' }}">
                                ⭐ Terbaru
                            </a>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Event List Section -->
            <section class="py-12 bg-gray-100">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($events as $event)
<div class="relative bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
    <!-- Gambar Event -->
    <div class="relative">
        <img src="{{ asset($event->image ?? 'images/default-event.jpg') }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">


        <!-- Label Tanggal -->
        <div class="absolute top-3 left-3 bg-white text-center text-xs px-2 py-1 rounded-md shadow">
            <p class="text-black font-bold leading-tight">
                {{ \Carbon\Carbon::parse($event->date)->format('d') }}
                <br>
                <span class="text-green-600 font-semibold uppercase">
                    {{ \Carbon\Carbon::parse($event->date)->format('M') }}
                </span>
            </p>
        </div>

        <!-- Icon Favorite -->
         @if(\Carbon\Carbon::parse($event->created_at)->diffInDays(now()) <= 7)
    <div class="absolute bottom-3 right-3 bg-red-500 text-white text-xs px-3 py-1 rounded-full z-20 animate-bounce shadow-md" title="Event baru minggu ini!">
    Baru!
</div>

@endif

        <!-- Preview pengguna -->
        <div class="absolute bottom-3 left-3 flex items-center space-x-1">
            @for ($i = 0; $i < min(3, $event->attendees_count ?? 0); $i++)
                <img src="{{ asset('images/user'.$i.'.jpg') }}" class="w-6 h-6 rounded-full border-2 border-white" alt="User">
            @endfor
            @if(($event->attendees_count ?? 0) > 3)
                <span class="text-xs text-white ml-1 bg-black bg-opacity-50 px-2 py-0.5 rounded-full">+{{ $event->attendees_count - 3 }} Going</span>
            @endif
        </div>
    </div>

    <!-- Konten -->
    <div class="p-4">
        <!-- Kategori Sort (Populer atau Terbaru) -->
        @php
            $sort = request('sort', 'terbaru');
            $label = $sort === 'populer' ? 'Terpopuler' : 'Terbaru';
        @endphp
        <span class="absolute top-6 right-0 bg-red-500 text-white text-xs font-semibold px-4 py-1 rounded-l-full shadow z-20">
    {{ $label }}
</span>

        <!-- Judul -->
<a href="{{ route('events.show', ['id' => $event->id]) }}" class="text-lg font-bold text-green-700 hover:underline hover:text-green-800 transition block">
    {{ $event->title }}
</a>

        <!-- Lokasi dan Tanggal -->
        <p class="flex items-center text-sm text-gray-600 mt-1">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12.414M9.172 8.172l4.242 4.242L20 4M4 20h16" />
    </svg>
    {{ $event->location }}
</p>
        <p class="text-sm text-gray-600 mt-1">
            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y - H:i') }}
        </p>
        @php
    $isUpcoming = \Carbon\Carbon::parse($event->date)->isFuture();
@endphp

@if($isUpcoming)
    <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full mb-2">
        <svg class="w-4 h-4 inline mr-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="#22c55e"/>
          <path stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
        </svg>
        Tersedia
    </span>
@else
    <span class="inline-block bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full mb-2">
        <svg class="w-4 h-4 inline mr-1 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="#ef4444"/>
          <path stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 9l-6 6m0-6l6 6"/>
        </svg>
        Tidak Tersedia
    </span>
@endif


        <!-- Tombol -->
        <div class="mt-4 flex gap-2">
    @if($isUpcoming)
        <a href="{{ route('events.show', ['id' => $event->id]) }}" class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-2 px-4 rounded-lg text-sm font-medium">
            Daftar Event
        </a>
    @else
        <button disabled class="flex-1 bg-gray-400 text-white text-center py-2 px-4 rounded-lg text-sm font-medium cursor-not-allowed">
            Event Selesai
        </button>
    @endif
    <a href="{{ route('events.show', ['id' => $event->id]) }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 text-center py-2 px-4 rounded-lg text-sm font-medium">
        Lihat Detail
    </a>
</div>

    </div>
</div>

                        @endforeach
                    </div>

                    <div class="mt-8 flex justify-center">
    <ul class="flex border border-gray-300 rounded-md overflow-hidden bg-white text-sm">
        {{-- Previous Page Link --}}
        @if ($events->onFirstPage())
            <li>
                <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white border-r border-gray-300 cursor-not-allowed select-none">Sebelumnya</span>
            </li>
        @else
            <li>
                <a href="{{ $events->previousPageUrl() }}" rel="prev" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">Sebelumnya</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($events->getUrlRange(1, $events->lastPage()) as $page => $url)
            @if ($page == $events->currentPage())
                <li>
                    <span class="px-4 py-1.5 h-9 flex items-center font-bold text-white bg-green-600 border-r border-gray-300">{{ $page }}</span>
                </li>
            @else
                <li>
                    <a href="{{ $url }}" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">{{ $page }}</a>
                </li>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($events->hasMorePages())
            <li>
                <a href="{{ $events->nextPageUrl() }}" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
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

        <!-- Footer -->
        <x-home.footer />

        <!-- Back to top button -->
        <button id="back-to-top" class="fixed bottom-6 right-6 bg-green-600 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 z-50 hover:bg-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>

        <script>
            // Preloader
            window.addEventListener('load', function() {
                document.getElementById('preloader').style.opacity = '0';
                setTimeout(function() {
                    document.getElementById('preloader').style.display = 'none';
                }, 500);
            });
            
            // Back to top button
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
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        </script>
    </body>
</html>
