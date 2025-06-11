<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="Detail Produk - EcoZense" />
    <meta name="theme-color" content="#8DD363" />
    <title>{{ $product->nama_produk ?? 'Detail Produk - EcoZense' }}</title>
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
    <main class="overflow-x-hidden pt-20">
        <!-- Product Detail Section -->
        <section class="py-8 bg-white">
            <div class="container mx-auto px-4">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Product Image -->
                        <div class="w-full md:w-1/3">
                            <div class="bg-white rounded-lg overflow-hidden">
                                <img id="mainImage" src="{{ asset($product->image_url) }}" alt="{{ $product->nama_produk }}" class="w-full h-auto object-cover">
                            </div>
                        </div>
                        
                        <!-- Product Details -->
                        <div class="w-full md:w-2/3">
                            <div class="flex items-center justify-between">
                                <h1 class="text-3xl font-bold text-gray-800">{{ $product->nama_produk }}</h1>
                                <!-- Share and Like Buttons -->
                                <div class="flex items-center">
                                    <!-- Share Button -->
                                    <div class="ml-4">
                                        <button class="flex items-center text-gray-500 hover:text-green-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- Like Button -->
                                    <div class="ml-2">
                                        <button class="flex items-center text-gray-500 hover:text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Price -->
                            <div class="text-3xl font-bold text-yellow-500 mb-2">Rp{{ number_format($product->harga, 0, ',', '.') }}</div>
                            @if($product->harga_points)
                                <div class="text-xl font-medium text-blue-600 mb-6">atau {{ number_format($product->harga_points) }} Poin</div>
                            @endif
                            <!-- Product Info -->
                            <div class="space-y-3 mb-6">
                                <div class="flex">
                                    <span class="w-40 text-gray-600">Status Ketersediaan</span>
                                    <span class="{{ $product->status_ketersediaan == 'Available' ? 'text-green-600' : 'text-red-600' }} font-medium">{{ $product->status_ketersediaan }}</span>
                                </div>
                                <div class="flex">
                                    <span class="w-40 text-gray-600">Bank Sampah</span>
                                    <span class="text-gray-800">{{ $product->user->nama ?? '-' }}</span>
                                </div>
                            </div>
                            <!-- Action Buttons -->
                            <div class="mt-8">
                                <button class="w-full md:w-auto px-8 py-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-colors font-['Lexend_Deca',_sans-serif]" onclick="document.getElementById('popup-beli').classList.remove('hidden')">
                                    Beli Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Product Tabs Section -->
        <section class="py-8 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <!-- Tabs -->
                    <div class="border-b border-gray-200 mb-6">
                        <div class="flex space-x-8">
                            <button id="tab-deskripsi" class="text-green-600 border-b-2 border-green-600 pb-4 font-medium focus:outline-none" onclick="changeTab('deskripsi')">Deskripsi</button>
                        </div>
                    </div>
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Description Tab -->
                        <div id="content-deskripsi" class="text-gray-700 leading-relaxed space-y-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Deskripsi</h3>
                            <p>{{ $product->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Related Products Section -->
        <section class="py-8 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Serupa</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Example related products, you can make these dynamic if you want -->
                    <x-browse.product-card 
                        :image="asset('images/bg1.jpeg')"
                        title="Produk Serupa 1"
                        desc="Deskripsi singkat produk serupa 1"
                        price="25.000"
                        status="Available"
                        bank="Steven"
                        suka="42"
                        productId="1"
                    />
                    <x-browse.product-card 
                        :image="asset('images/bg2.jpeg')"
                        title="Produk Serupa 2"
                        desc="Deskripsi singkat produk serupa 2"
                        price="30.000"
                        status="Available"
                        bank="Arif"
                        suka="18"
                        productId="2"
                    />
                    <!-- Add more as needed -->
                </div>
            </div>
        </section>
    </main>
    
    <!-- Footer -->
    <x-home.footer />
    
    <!-- Scripts for Preloader and Tabs -->
    <script>
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            setTimeout(function() {
                preloader.classList.add('opacity-0');
                setTimeout(function() {
                    preloader.style.display = 'none';
                }, 500);
            }, 800);
        });
        // Tab functionality
        function changeTab(tabName) {
            document.getElementById('content-deskripsi').classList.add('hidden');
            document.getElementById('tab-deskripsi').classList.remove('text-green-600', 'border-b-2', 'border-green-600');
            document.getElementById('tab-deskripsi').classList.add('text-gray-500');
            document.getElementById('content-' + tabName).classList.remove('hidden');
            document.getElementById('tab-' + tabName).classList.remove('text-gray-500');
            document.getElementById('tab-' + tabName).classList.add('text-green-600', 'border-b-2', 'border-green-600');
        }
    </script>

    <!-- Modal Pop Up -->
    <div id="popup-beli" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden font-['Lexend_Deca',_sans-serif]">
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-8 relative animate-fade-in">
            <!-- Tombol Close -->
            <button
                class="absolute top-3 right-3 text-gray-400 hover:text-green-700 text-2xl font-bold"
                onclick="document.getElementById('popup-beli').classList.add('hidden')"
                aria-label="Tutup"
            >&times;</button>
            <h2 class="text-2xl font-bold text-green-700 mb-4 text-center">Konfirmasi Pembelian</h2>
            <div class="mb-4">
                <div class="text-gray-700 font-semibold mb-1">Rekening Penjual</div>
                <div class="bg-gray-100 rounded px-4 py-2 text-gray-800 text-sm select-all">
                    {{ $product->user->nama_bank_rekening ?? 'Belum ditentukan' }} {{ $product->user->nomor_rekening ?? 'Belum ditentukan' }} a.n. {{ $product->user->nama }}
                </div>
            </div>
            <div class="mb-4 flex items-center justify-between">
                <span class="font-semibold text-gray-700">Jumlah</span>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="changeQty(-1)" class="w-8 h-8 rounded bg-gray-200 hover:bg-gray-300 text-xl font-bold flex items-center justify-center">-</button>
                    <span id="qty" class="w-8 text-center font-semibold">1</span>
                    <button type="button" onclick="changeQty(1)" class="w-8 h-8 rounded bg-gray-200 hover:bg-gray-300 text-xl font-bold flex items-center justify-center">+</button>
                </div>
            </div>
            <div class="mb-6 flex items-center justify-between">
                <span class="font-semibold text-gray-700">Total Harga</span>
                <div class="text-right">
                    <span id="total-harga" class="text-green-700 font-bold text-lg block">
                        Rp{{ number_format($product->harga, 0, ',', '.') }}
                    </span>
                    @if($product->harga_points)
                        <span id="total-poin" class="text-blue-600 font-medium text-sm block">
                            atau {{ number_format($product->harga_points) }} Poin
                        </span>
                    @endif
                </div>
            </div>
            <div class="flex flex-col gap-3">
                <button class="bg-green-600 text-white py-2 rounded-md font-semibold hover:bg-green-700 transition">Bayar Sekarang</button>
                <button class="bg-gray-200 text-gray-700 py-2 rounded-md font-semibold hover:bg-gray-300 transition" onclick="document.getElementById('popup-beli').classList.add('hidden')">Batal</button>
            </div>
        </div>
    </div>
    <script>
        // Harga satuan produk (ambil dari PHP)
        const hargaSatuan = {{ $product->harga ?? 0 }};
        const poinSatuan = {{ $product->harga_points ?? 0 }};
        let qty = 1;

        function changeQty(val) {
            qty += val;
            if (qty < 1) qty = 1;
            document.getElementById('qty').innerText = qty;
            document.getElementById('total-harga').innerText = 'Rp' + (qty * hargaSatuan).toLocaleString('id-ID');
            if (poinSatuan > 0) {
                document.getElementById('total-poin').innerText = 'atau ' + (qty * poinSatuan).toLocaleString('id-ID') + ' Poin';
            }
        }
    </script>
</body>
</html>