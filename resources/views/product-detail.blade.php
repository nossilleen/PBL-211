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
    @php
        use Illuminate\Support\Str;
    @endphp
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
                    <div class="grid grid-cols-1 lg:grid-cols-7 gap-8 relative">
                        <!-- Product Image -->
                        <div class="lg:col-span-3 w-full">
                            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-sm">
                                <img id="mainImage" src="{{ asset($product->image_url) }}" alt="{{ $product->nama_produk }}" class="w-full h-auto object-cover">
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="lg:col-span-4 w-full space-y-4">
                            <!-- Title & Vertical Action Buttons -->
                            <div class="flex items-start justify-between">
                                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 leading-snug max-w-xl">{{ $product->nama_produk }}</h1>

                                <!-- Floating vertical actions (desktop) -->
                                <div class="hidden lg:flex flex-col space-y-2">
                                    <button class="p-3 rounded-md bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-green-600 shadow transition" title="Bagikan">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                        </svg>
                                    </button>
                                    <button class="p-3 rounded-md bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-red-600 shadow transition" title="Favoritkan">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="flex items-center space-x-3">
                                <span class="text-3xl sm:text-4xl font-bold text-yellow-500">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                                @if($product->harga_points)
                                    <span class="text-base sm:text-xl font-medium text-blue-600">/{{ number_format($product->harga_points) }} Poin</span>
                                @endif
                            </div>

                            <!-- Availability & Seller -->
                            <div class="space-y-2 text-sm sm:text-base">
                                <div class="flex items-center gap-2">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="{{ $product->status_ketersediaan == 'Available' ? 'text-green-600' : 'text-red-600' }} font-semibold">{{ $product->status_ketersediaan }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray-600">Bank Sampah:</span>
                                    <span class="text-gray-800 font-medium">{{ $product->user->nama ?? '-' }}</span>
                                </div>
                            </div>

                            <!-- CTA -->
                            <div class="pt-4">
                                <button class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-green-600 to-green-500 hover:from-green-700 hover:to-green-600 text-white font-semibold rounded-md shadow-lg transition" onclick="document.getElementById('popup-beli').classList.remove('hidden')">
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
        
        <!-- Produk Lain dari Toko Ini -->
        <section class="py-8 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Lainnya dari {{ $product->user->nama ?? 'Toko Ini' }}</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($relatedProducts as $item)
                        <x-browse.product-card 
                            :image="asset($item->image_url ?? 'images/default-product.jpg')"
                            :title="$item->nama_produk"
                            :desc="Str::limit($item->deskripsi, 50)"
                            :price="number_format($item->harga, 0, ',', '.')"
                            :harga_points="$item->harga_points"
                            :status="$item->status_ketersediaan"
                            :bank="$product->user->nama"
                            :createdAt="$item->created_at"
                            :suka="$item->suka"
                            :productId="$item->produk_id"
                        >
                            <a href="{{ route('product.detail', ['id' => $item->produk_id]) }}"
                               class="w-full px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-colors text-center">
                                Lihat Produk
                            </a>
                        </x-browse.product-card>
                    @empty
                        <div class="col-span-4 text-center text-gray-500">Tidak ada produk lain dari toko ini.</div>
                    @endforelse
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
        <form action="{{ route('produk.beli') }}" method="POST" class="bg-white rounded-xl shadow-2xl max-w-md w-full p-8 relative animate-fade-in">
            @csrf
            <!-- Tombol Close -->
            <button
                type="button"
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
                    <input type="hidden" name="jumlah" id="jumlah-input" value="1">
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
            <div class="mb-4">
                <input type="checkbox" id="use_poin" name="use_poin" value="1">
                <label for="use_poin" class="text-gray-700 cursor-pointer">Beli dengan Poin</label>
            </div>
            <input type="hidden" name="produk_id" value="{{ $product->produk_id }}">
            <div class="flex flex-col gap-3">
                <button type="submit" class="bg-green-600 text-white py-2 rounded-md font-semibold hover:bg-green-700 transition">Bayar Sekarang</button>
                <button type="button" class="bg-gray-200 text-gray-700 py-2 rounded-md font-semibold hover:bg-gray-300 transition" onclick="document.getElementById('popup-beli').classList.add('hidden')">Batal</button>
            </div>
        </form>
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
            document.getElementById('jumlah-input').value = qty;
            document.getElementById('total-harga').innerText = 'Rp' + (qty * hargaSatuan).toLocaleString('id-ID');
            if (poinSatuan > 0) {
                document.getElementById('total-poin').innerText = 'atau ' + (qty * poinSatuan).toLocaleString('id-ID') + ' Poin';
            }
        }
    </script>
</body>
</html>