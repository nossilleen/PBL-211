<!-- resources/views/components/home/navbar.blade.php -->
<nav
    id="main-navbar"
    class="py-1 sm:py-2 fixed top-0 left-0 right-0 z-50 navbar-fixed bg-transparent transition-all duration-300"
>
    <div class="container mx-auto px-4 md:px-6 flex justify-between items-center">
        <!-- Logo - Far Left -->
        <a href="/" class="flex items-center flex-shrink-0" data-aos="fade-right" data-aos-delay="100">
            <div class="bg-transparent rounded-md">
                <img src="{{ asset('images/logo.png') }}" alt="EcoZense Logo" class="h-5 md:h-7 w-auto">
            </div>
        </a>
        
        <!-- Navigation Links - Center (Improved Centering) -->
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
                >Events</a
            >
            <a
                href="/about"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium text-sm xl:text-base py-1"
                >About Us</a
            >
            <a
                href="/daftar-nasabah"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium text-sm xl:text-base py-1"
                >Daftar Nasabah</a
            >
        </div>
        <div class="flex items-center space-x-4">
            <a
                href="/login"
                class="text-green-800 hover:text-green-600 flex items-center flex-shrink-0 text-sm md:text-base"
                data-aos="fade-left"
                data-aos-delay="100"
            >
                <span class="hidden sm:inline font-medium">Log in</span>
                <span class="sm:hidden font-medium">Login</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
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
                >Events</a
            >
            <a
                href="/about"
                class="block text-green-800 hover:text-green-600 py-3 px-2 transition-all duration-300 border-l-4 border-transparent hover:border-green-600 hover:bg-green-50 rounded"
                >About Us</a
            >
            <a
                href="/daftar-nasabah"
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
        </div>
    </div>
</nav>

<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('main-navbar');
        if (window.scrollY > 50) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('navbar-scrolled', 'shadow-md');
            // Use the hero background image for navbar when scrolled
            navbar.style.backgroundImage = "url('{{ asset('images/Frame 2305.png') }}')";
            navbar.style.backgroundSize = "cover";
            navbar.style.backgroundPosition = "center";
        } else {
            navbar.classList.add('bg-transparent');
            navbar.classList.remove('navbar-scrolled', 'shadow-md');
            navbar.style.backgroundImage = "none";
        }
    });
    
    // Mobile menu toggle with smooth animation
    document.querySelector('.mobile-menu-button').addEventListener('click', function(e) {
        e.stopPropagation();
        const mobileMenu = document.querySelector('.mobile-menu');
        mobileMenu.classList.toggle('hidden');
        
        // Menambahkan event listener hanya sekali
        if (!window.mobileMenuInitialized) {
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                const mobileMenu = document.querySelector('.mobile-menu');
                const isClickInsideMenu = mobileMenu.contains(event.target);
                const isClickOnButton = event.target.closest('.mobile-menu-button');
                
                if (!isClickInsideMenu && !isClickOnButton && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            });
            
            window.mobileMenuInitialized = true;
        }
    });
    
    // Close mobile menu on window resize if screen becomes large
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) { // lg breakpoint
            document.querySelector('.mobile-menu').classList.add('hidden');
        }
    });
    
    // Jalankan scroll check saat halaman dimuat
    window.dispatchEvent(new Event('scroll'));
</script>
