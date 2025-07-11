<!-- resources/views/components/home/navbar.blade.php -->
<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

@php
    $currentRoute = Route::currentRouteName();
    $isDetailPage = in_array($currentRoute, ['product.detail', 'article.detail', 'store.detail']);
    $isDashboard = Auth::check() && ((Auth::user()->role === 'admin' && Request::is('admin*')) || (Auth::user()->role === 'pengelola' && Request::is('pengelola*')));
@endphp

<nav
    id="main-navbar"
    class="py-1 sm:py-2 fixed top-0 left-0 right-0 z-50 {{ $isDashboard || $isDetailPage ? 'navbar-solid' : 'bg-transparent' }} transition-all duration-300"
>
    <div class="container mx-auto px-4 md:px-6 flex justify-between items-center">
        <!-- Logo - Far Left -->
        <a href="/" class="flex items-center flex-shrink-0" data-aos="fade-right" data-aos-delay="100">
            <div class="bg-transparent rounded-md">
                <img src="{{ asset('images/logo.jpg') }}" alt="EcoZense Logo" class="h-5 md:h-7 w-auto">
            </div>
        </a>
        
        <!-- Navigation Links - Center -->
        @if(!(Auth::check() && ((Auth::user()->role === 'admin' && Request::is('admin*')) || (Auth::user()->role === 'pengelola' && Request::is('pengelola*')))))
        <div class="hidden lg:flex space-x-4 xl:space-x-8 mx-auto justify-center flex-grow" data-aos="fade-down" data-aos-delay="200">
            <a
                href="/"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium text-sm xl:text-base py-1"
                >Beranda</a
            >
            <a
                href="/browse"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium text-sm xl:text-base py-1"
                >Toko</a
            >
            <a
                href="/artikel"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium text-sm xl:text-base py-1"
                >Artikel</a
            >
            <a
                href="/events"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium text-sm xl:text-base py-1"
                >Acara</a
            >
            <a
                href="/about"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium text-sm xl:text-base py-1"
                >Tentang Kami</a
            >
            @guest
            <a
                href="{{ route('register') }}"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium text-sm xl:text-base py-1"
                >Daftar Nasabah</a
            >
            @endguest
        </div>
        @endif
        <div class="flex items-center space-x-4">
            @guest
            <!-- Show login button for guests -->
            <a
                href="/login"
                class="text-green-800 hover:text-green-600 flex items-center flex-shrink-0 text-sm md:text-base"
                data-aos="fade-left"
                data-aos-delay="100"
            >
                <span class="hidden sm:inline font-medium">Masuk</span>
                <span class="sm:hidden font-medium">Login</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
            @else
            <!-- Show user profile dropdown for authenticated users -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center text-white overflow-hidden">
                        @if(Auth::user()->foto_toko)
                            <img src="{{ asset('storage/' . Auth::user()->foto_toko) }}" alt="Foto Profil" class="w-full h-full object-cover">
                        @else
                            <span class="text-sm font-semibold">{{ substr(Auth::user()->nama, 0, 1) }}</span>
                        @endif
                    </div>
                    <span class="hidden md:inline text-green-800 font-medium">{{ Auth::user()->nama }}</span>
                </button>
                
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" style="display: none;">
                    @if(Auth::user()->role === 'nasabah')
                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    @endif
                    
                    @if(in_array(Auth::user()->role, ['admin','superadmin']))
                        @if(Request::is('admin*'))
                            <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kembali ke Beranda</a>
                        @else
                            <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        @endif
                    @elseif(Auth::user()->role === 'pengelola')
                        @if(Request::is('pengelola*'))
                            <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kembali ke Beranda</a>
                        @else
                            <a href="/pengelola" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        @endif
                    @endif
                    
                    <div class="border-t border-gray-100"></div>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
            @endguest
            <button class="lg:hidden text-green-800 mobile-menu-button focus:outline-none" aria-label="Menu">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="lg:hidden mobile-menu hidden bg-green-100 bg-opacity-95 shadow-lg mt-2 transition-all duration-300 max-h-screen overflow-y-auto backdrop-blur-sm border-t border-green-200">
        <div class="px-4 py-3 space-y-1">
            @if(!(Auth::check() && ((Auth::user()->role === 'admin' && Request::is('admin*')) || (Auth::user()->role === 'pengelola' && Request::is('pengelola*')))))
            <a
                href="/"
                class="block text-green-800 hover:text-green-600 py-3 px-2 transition-all duration-300 border-l-4 border-transparent hover:border-green-600 hover:bg-green-50 rounded"
                >Beranda</a
            >
            <a
                href="/toko"
                class="block text-green-800 hover:text-green-600 py-3 px-2 transition-all duration-300 border-l-4 border-transparent hover:border-green-600 hover:bg-green-50 rounded"
                >Toko</a
            >
            <a
                href="/artikel"
                class="block text-green-800 hover:text-green-600 py-3 px-2 transition-all duration-300 border-l-4 border-transparent hover:border-green-600 hover:bg-green-50 rounded"
                >Artikel</a
            >
            <a
                href="/events"
                class="block text-green-800 hover:text-green-600 py-3 px-2 transition-all duration-300 border-l-4 border-transparent hover:border-green-600 hover:bg-green-50 rounded"
                >Acara</a
            >
            <a
                href="/about"
                class="block text-green-800 hover:text-green-600 py-3 px-2 transition-all duration-300 border-l-4 border-transparent hover:border-green-600 hover:bg-green-50 rounded"
                >Tentang Kami</a
            >
            @guest
            <a
                href="{{ route('register') }}"
                class="block text-green-800 hover:text-green-600 py-3 px-2 transition-all duration-300 border-l-4 border-transparent hover:border-green-600 hover:bg-green-50 rounded"
                >Daftar Nasabah</a
            >
            <div class="mt-4 pt-4 border-t border-green-200">
                <a href="/login" class="flex items-center justify-center w-full bg-green-600 text-white py-3 px-4 rounded-md hover:bg-green-700 transition-all duration-300">
                    <span>Masuk</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            @else
            <!-- User profile links for mobile -->
            @if(Auth::user()->role === 'nasabah')
            <a
                href="/profile"
                class="block text-green-800 hover:text-green-600 py-3 px-2 transition-all duration-300 border-l-4 border-transparent hover:border-green-600 hover:bg-green-50 rounded"
                >Profile</a
            >
            @endif
            
            @if(in_array(Auth::user()->role, ['admin','superadmin']))
            <a
                href="/admin"
                class="block text-green-800 hover:text-green-600 py-3 px-2 transition-all duration-300 border-l-4 border-transparent hover:border-green-600 hover:bg-green-50 rounded"
                >Dashboard</a
            >
            @elseif(Auth::user()->role === 'pengelola')
            <a
                href="/pengelola"
                class="block text-green-800 hover:text-green-600 py-3 px-2 transition-all duration-300 border-l-4 border-transparent hover:border-green-600 hover:bg-green-50 rounded"
                >Dashboard</a
            >
            @endif
            <div class="mt-4 pt-4 border-t border-green-200">
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();" 
                   class="flex items-center justify-center w-full bg-red-600 text-white py-3 px-4 rounded-md hover:bg-red-700 transition-all duration-300">
                    <span>Logout</span>
                </a>
                <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
            @endguest
            @endif
        </div>
    </div>
</nav>

<script>
    // Navbar scroll effect - hanya diterapkan jika bukan halaman dashboard atau detail
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('main-navbar');
        const isDetailPage = @json($isDetailPage);
        const isDashboard = @json($isDashboard);
        
        if (!isDetailPage && !isDashboard) {
            if (window.scrollY > 50) {
                navbar.classList.remove('bg-transparent');
                navbar.classList.add('navbar-scrolled');
                // Explicitly set background image when scrolled
                navbar.style.backgroundImage = "url('{{ asset('images/Frame 2305.png') }}')";
                navbar.style.backgroundSize = "cover";
                navbar.style.backgroundPosition = "center";
            } else {
                navbar.classList.add('bg-transparent');
                navbar.classList.remove('navbar-scrolled');
                navbar.style.backgroundImage = "none";
            }
        }
    });
    
    // Mobile menu toggle with smooth animation
    document.querySelector('.mobile-menu-button').addEventListener('click', function(e) {
        e.stopPropagation();
        const mobileMenu = document.querySelector('.mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu on window resize if screen becomes large
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) { // lg breakpoint
            document.querySelector('.mobile-menu').classList.add('hidden');
        }
    });
</script>

<style>
    .navbar-solid {
        background-image: url('{{ asset('images/Frame 2305.png') }}') !important;
        background-size: cover;
        background-position: center;
        box-shadow: 0 4px 10px rgb(0 0 0 / 10%);
    }

    .navbar-scrolled {
        background-image: url('{{ asset('images/Frame 2305.png') }}') !important;
        background-size: cover;
        background-position: center;
        box-shadow: 0 4px 10px rgb(0 0 0 / 10%);
    }
</style>
