<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Detail Toko - EcoZense" />
        <meta name="theme-color" content="#8DD363" />
        <title>Detail Toko - EcoZense</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .navbar-transparent {
                background-color: transparent;
                transition: all 0.3s ease-in-out;
            }
            .navbar-solid {
                background-image: url('/images/bg1.jpeg');
                background-size: cover;
                background-position: center;
                box-shadow: 0 4px 10px rgb(0 0 0 / 10%);
                transition: all 0.3s ease-in-out;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-100 overflow-x-hidden">
        <!-- Navbar -->
        <nav id="navbar" class="navbar-transparent fixed w-full top-0 z-50">
            <x-home.navbar />
        </nav>

        <!-- Main Content -->
        <main class="pt-20">
            <!-- Store Header -->
            <section class="bg-white shadow-sm">
                <div class="container mx-auto px-4 py-12">
                    <div class="flex flex-col md:flex-row items-center gap-8">
                        <div class="w-40 h-40 md:w-48 md:h-48 rounded-full overflow-hidden shadow-lg">
                            <img src="{{ asset('images/Frame 2305.png') }}" alt="Foto Toko" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Nama Toko</h1>
                            <p class="text-lg text-gray-600 mb-6 max-w-2xl">Deskripsi singkat tentang toko ini dan produk-produk yang dijual. Kami menyediakan berbagai produk eco enzyme berkualitas dan sembako untuk kebutuhan sehari-hari.</p>
                            <div class="flex flex-wrap gap-6 justify-center md:justify-start">
                                <div class="flex items-center bg-gray-50 px-4 py-2 rounded-lg">
                                    <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-gray-700">Lokasi Toko</span>
                                </div>
                                <div class="flex items-center bg-gray-50 px-4 py-2 rounded-lg">
                                    <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-gray-700">Jam Operasional: 08.00 - 17.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Product Categories -->
            <section class="py-8">
                <div class="container mx-auto px-4">
                    <!-- Category Tabs -->
                    <div class="flex flex-wrap gap-4 mb-12">
                        <button onclick="showCategory('eco-enzyme')" class="px-6 py-3 bg-green-600 text-white rounded-full hover:bg-green-700 transition-colors text-lg">
                            Eco Enzim
                        </button>
                        <button onclick="showCategory('sembako')" class="px-6 py-3 bg-white text-gray-600 rounded-full hover:bg-gray-100 transition-colors text-lg">
                            Sembako
                        </button>
                    </div>

                    <!-- Eco Enzyme Products Section -->
                    <div id="eco-enzyme-products" class="category-section">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Eco Enzim</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Eco Enzyme Products -->
                            <x-browse.product-card 
                                image="https://www.unesa.ac.id/images/foto-04-08-2023-08-08-24-5583.png"
                                title="Pupuk Cair Organik"
                                desc="Pupuk cair sangat bagus untuk tanaman"
                                price="25.000"
                                status="Available"
                                bank="Toko Ini"
                                likes="38"
                            />
                            <x-browse.product-card 
                                image="https://filebroker-cdn.lazada.co.id/kf/Sa88de6e565304317b183c5fe9d53fe571.jpg"
                                title="Sabun Cuci Piring"
                                desc="Sabun cuci piring hasil eco enzim"
                                price="15.000"
                                status="Available"
                                bank="Toko Ini"
                                likes="24"
                            />
                        </div>
                    </div>

                    <!-- Sembako Products Section -->
                    <div id="sembako-products" class="category-section hidden mt-12">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Sembako</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Sembako Products -->
                            <x-browse.product-card 
                                image="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/5/26/a22d75c1-301a-465a-8ad3-7aa3e335563a.jpg"
                                title="Beras"
                                desc="Beras premium berkualitas"
                                price="75.000"
                                status="Available"
                                bank="Toko Ini"
                                likes="32"
                            />
                            <x-browse.product-card 
                                image="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/5/26/a22d75c1-301a-465a-8ad3-7aa3e335563a.jpg"
                                title="Minyak Goreng"
                                desc="Minyak goreng berkualitas"
                                price="45.000"
                                status="Available"
                                bank="Toko Ini"
                                likes="28"
                            />
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <!-- Footer -->
        <x-home.footer />

        <!-- Scripts -->
        <script>
            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    navbar.classList.remove('navbar-transparent');
                    navbar.classList.add('navbar-solid');
                } else {
                    navbar.classList.remove('navbar-solid');
                    navbar.classList.add('navbar-transparent');
                }
            });

            // Category switching functionality
            function showCategory(category) {
                // Hide all category sections
                document.querySelectorAll('.category-section').forEach(section => {
                    section.classList.add('hidden');
                });

                // Reset all category buttons
                document.querySelectorAll('.flex.flex-wrap.gap-4 button').forEach(button => {
                    button.classList.remove('bg-green-600', 'text-white');
                    button.classList.add('bg-white', 'text-gray-600');
                });

                // Show selected category
                if (category === 'eco-enzyme') {
                    document.getElementById('eco-enzyme-products').classList.remove('hidden');
                } else if (category === 'sembako') {
                    document.getElementById('sembako-products').classList.remove('hidden');
                }

                // Update active button style
                const activeButton = event.currentTarget;
                activeButton.classList.remove('bg-white', 'text-gray-600');
                activeButton.classList.add('bg-green-600', 'text-white');
            }
        </script>
    </body>
</html>