<!-- resources/views/components/home/navbar.blade.php -->
<nav
    id="main-navbar"
    class="py-1 fixed top-0 left-0 right-0 z-50 navbar-fixed"
    style="background-image: url('{{ asset('images/bg1.jpeg') }}'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4 md:px-6 flex justify-between items-center">
        <a href="/" class="flex items-center" data-aos="fade-right" data-aos-delay="100">
            <div class="bg-transparent p-2 rounded-md">
                <span class="text-white font-bold text-xl"
                    >Eco<span class="text-green-100">Zense</span></span
                >
            </div>
        </a>
        <div class="hidden md:flex space-x-8" data-aos="fade-down" data-aos-delay="200">
            <a
                href="/"
                class="text-white hover:text-green-100 transition-all duration-300 border-b-2 border-transparent hover:border-green-100"
                >Beranda</a
            >
            <a
                href="/toko"
                class="text-white hover:text-green-100 transition-all duration-300 border-b-2 border-transparent hover:border-green-100"
                >Toko</a
            >
            <a
                href="/artikel"
                class="text-white hover:text-green-100 transition-all duration-300 border-b-2 border-transparent hover:border-green-100"
                >Artikel</a
            >
            <a
                href="/events"
                class="text-white hover:text-green-100 transition-all duration-300 border-b-2 border-transparent hover:border-green-100"
                >Events</a
            >
            <a
                href="/about"
                class="text-white hover:text-green-100 transition-all duration-300 border-b-2 border-transparent hover:border-green-100"
                >About Us</a
            >
            <a
                href="/daftar-nasabah"
                class="text-white hover:text-green-100 transition-all duration-300 border-b-2 border-transparent hover:border-green-100"
                >Daftar Nasabah</a
            >
        </div>
        <a
            href="/login"
            class="text-white hover:text-green-100 flex items-center button-hover-effect"
            data-aos="fade-left"
            data-aos-delay="100"
        >
            Log in
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 ml-1 transition-transform duration-300 group-hover:translate-x-1"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"
                />
            </svg>
        </a>
        <button class="md:hidden text-white mobile-menu-button">
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

    <!-- Mobile Menu -->
    <div class="md:hidden mobile-menu hidden bg-green-800 bg-opacity-90">
        <div class="px-4 py-3 space-y-2">
            <a
                href="/"
                class="block text-white hover:text-green-100 py-2 transition-all duration-300"
                >Beranda</a
            >
            <a
                href="/toko"
                class="block text-white hover:text-green-100 py-2 transition-all duration-300"
                >Toko</a
            >
            <a
                href="/artikel"
                class="block text-white hover:text-green-100 py-2 transition-all duration-300"
                >Artikel</a
            >
            <a
                href="/events"
                class="block text-white hover:text-green-100 py-2 transition-all duration-300"
                >Events</a
            >
            <a
                href="/about"
                class="block text-white hover:text-green-100 py-2 transition-all duration-300"
                >About Us</a
            >
            <a
                href="/daftar-nasabah"
                class="block text-white hover:text-green-100 py-2 transition-all duration-300"
                >Daftar Nasabah</a
            >
        </div>
    </div>
</nav>

<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('main-navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });
</script>
