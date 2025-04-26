<!-- resources/views/components/home/navbar.blade.php -->
<nav
    id="main-navbar"
    class="py-3 fixed top-0 left-0 right-0 z-50 navbar-fixed bg-transparent transition-all duration-300"
>
    <div class="container mx-auto px-4 md:px-6 flex justify-between items-center">
        <!-- Logo - Far Left -->
        <a href="/" class="flex items-center flex-shrink-0 mr-auto" data-aos="fade-right" data-aos-delay="100">
            <div class="bg-transparent p-2 rounded-md">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="EcoZense Logo" class="h-12 md:h-16 w-auto">
            </div>
        </a>
        
        <!-- Navigation Links - Center -->
        <div class="hidden md:flex space-x-8 mx-auto" data-aos="fade-down" data-aos-delay="200">
            <a
                href="/"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium"
                >Beranda</a
            >
            <a
                href="/toko"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium"
                >Toko</a
            >
            <a
                href="/artikel"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium"
                >Artikel</a
            >
            <a
                href="/events"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium"
                >Events</a
            >
            <a
                href="/about"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium"
                >About Us</a
            >
            <a
                href="/daftar-nasabah"
                class="text-green-800 hover:text-green-600 transition-all duration-300 border-b-2 border-transparent hover:border-green-600 font-medium"
                >Daftar Nasabah</a
            >
        </div>
        <a
            href="/login"
            class="text-green-800 hover:text-green-600 flex items-center"
            data-aos="fade-left"
            data-aos-delay="100"
        >
            <span class="font-medium">Log in →</span>
        </a>
        <button class="md:hidden text-green-800 mobile-menu-button">
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
    <div class="md:hidden mobile-menu hidden bg-green-100 bg-opacity-95">
        <div class="px-4 py-3 space-y-2">
            <a
                href="/"
                class="block text-green-800 hover:text-green-600 py-2 transition-all duration-300"
                >Beranda</a
            >
            <a
                href="/toko"
                class="block text-green-800 hover:text-green-600 py-2 transition-all duration-300"
                >Toko</a
            >
            <a
                href="/artikel"
                class="block text-green-800 hover:text-green-600 py-2 transition-all duration-300"
                >Artikel</a
            >
            <a
                href="/events"
                class="block text-green-800 hover:text-green-600 py-2 transition-all duration-300"
                >Events</a
            >
            <a
                href="/about"
                class="block text-green-800 hover:text-green-600 py-2 transition-all duration-300"
                >About Us</a
            >
            <a
                href="/daftar-nasabah"
                class="block text-green-800 hover:text-green-600 py-2 transition-all duration-300"
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
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('navbar-scrolled');
            // Use the hero background image for navbar when scrolled
            navbar.style.backgroundImage = "url('<?php echo e(asset('images/Frame 2305.png')); ?>')";
            navbar.style.backgroundSize = "cover";
            navbar.style.backgroundPosition = "center";
        } else {
            navbar.classList.add('bg-transparent');
            navbar.classList.remove('navbar-scrolled');
            navbar.style.backgroundImage = "none";
        }
    });
    
    // Mobile menu toggle
    document.querySelector('.mobile-menu-button').addEventListener('click', function() {
        document.querySelector('.mobile-menu').classList.toggle('hidden');
    });
</script>
<?php /**PATH D:\xampp\htdocs\laravel\PBL-211\resources\views/components/home/navbar.blade.php ENDPATH**/ ?>