<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="Detail Produk - EcoZense" />
    <meta name="theme-color" content="#8DD363" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
        <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
    </div>

    <x-home.navbar />

    <main class="overflow-x-hidden pt-20">
        <section class="py-8 bg-white">
            <div class="container mx-auto px-4">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 relative"> 
                        <div class="lg:col-span-5 w-full"> 
                            <x-product-image-slider :images="$product->gambar" :productName="$product->nama_produk" />
                        </div>

                        <div class="lg:col-span-4 w-full space-y-4"> {{-- Adjusted overall space-y --}}
                            <div class="flex items-start justify-between">
                                <h1 class="text-3xl font-extrabold text-gray-900 leading-tight">{{ $product->nama_produk }}</h1>
                                <div class="flex-shrink-0 flex items-center space-x-2 ml-4">
                                    <button id="share-btn" class="w-9 h-9 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-green-600 flex items-center justify-center transition" title="Bagikan">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                        </svg>
                                    </button>
                                    <button
                                        @if(auth()->check())
                                            onclick="toggleLike({{ $product->produk_id }})"
                                        @else
                                            onclick="window.location.href='{{ route('login') }}'"
                                        @endif
                                        class="like-button p-2.5 rounded-full bg-white/90 backdrop-blur-sm shadow-lg hover:bg-white hover:scale-110 transition-all duration-200 z-10 relative flex items-center justify-center"
                                        style="background: none; border: none;"
                                        data-liked="{{ auth()->check() && $product->likedByCurrentUser() ? '1' : '0' }}"
                                        @if(!auth()->check())
                                            onclick="window.location.href='{{ route('login') }}'"
                                        @else
                                            onclick="toggleLike({{ $product->produk_id }})"
                                        @endif
                                    >
                                        <svg id="heart-{{ $product->produk_id }}" class="w-5 h-5 {{ auth()->check() && $product->likedByCurrentUser() ? 'text-red-500' : 'text-gray-600' }}"
                                            fill="{{ auth()->check() && $product->likedByCurrentUser() ? 'currentColor' : 'none' }}"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                        <span id="like-count-{{ $product->produk_id }}" class="text-sm font-medium ml-2 {{ auth()->check() && $product->likedByCurrentUser() ? 'text-red-400' : 'text-gray-400' }}">{{ $product->suka ?? 0 }}</span>
                                    </button>
                                </div>
                            </div>



                            <hr class="border-gray-200 my-2"> {{-- Added a clean horizontal rule --}}


                                                        <div class="flex items-center gap-2 text-base text-gray-700 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-2a7 7 0 00-7-7h14a7 7 0 00-7 7v2" />
                                </svg>
                                <span>Bank Sampah:</span>
                                <span class="text-green-700 font-semibold">{{ $product->user->nama ?? '-' }}</span>
                            </div>

                            <div class="flex items-center gap-2 text-base font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $product->status_ketersediaan == 'Available' ? 'text-green-500' : 'text-red-500' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    @if($product->status_ketersediaan == 'Available')
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    @endif
                                </svg>
                                <span class="text-gray-700">Status:</span>
                                <span class="{{ $product->status_ketersediaan == 'Available' ? 'text-green-600' : 'text-red-600' }} font-bold">{{ $product->status_ketersediaan }}</span>
                            </div>
                            
                            <div class="flex items-baseline space-x-3"> {{-- items-baseline for mixed text sizes --}}
                                <span class="text-4xl font-extrabold text-yellow-600">Rp{{ number_format($product->harga, 0, ',', '.') }}</span>
                                @if($product->harga_points)
                                    <span class="text-xl font-semibold text-blue-700">/{{ number_format($product->harga_points) }} Poin</span>
                                @endif
                            </div>

                            
                        </div>

                        @if($product->status_ketersediaan == 'Available')
                        <div class="lg:col-span-3 w-full font-['Lexend_Deca',_sans-serif]"> 
                            <form action="{{ route('produk.beli') }}" method="POST" class="bg-white rounded-xl shadow-2xl p-8 relative">
                                @csrf
                                @if(session('error'))
                                    <div class="mb-4 flex items-start bg-red-50 border border-red-200 text-red-700 rounded-lg p-4 space-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-sm font-medium">{{ session('error') }}</span>
                                    </div>
                                @endif
                                <h2 class="text-2xl font-bold text-green-700 mb-4 text-center">Detail Pembelian</h2>
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
                                </div>
                                <div id="poin-warning" class="text-red-600 text-sm mt-2 hidden">Poin tidak cukup.</div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        
        <section class="py-8 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="border-b border-gray-200 mb-6">
                        <div class="flex space-x-8">
                            <button id="tab-deskripsi" class="text-green-600 border-b-2 border-green-600 pb-4 font-medium focus:outline-none" onclick="changeTab('deskripsi')">Deskripsi</button>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="content-deskripsi" class="text-gray-700 leading-relaxed space-y-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Deskripsi</h3>
                            <p>{{ $product->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
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
                            :isLiked="auth()->check() ? \DB::table('product_likes')->where('user_id', auth()->id())->where('produk_id', $item->produk_id)->exists() : false"
                        >
                        </x-browse.product-card>
                    @empty
                        <div class="col-span-4 text-center text-gray-500">Tidak ada produk lain dari toko ini.</div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
    
    <x-home.footer />
    
    <!-- Modal Konfirmasi Beli dengan Poin -->
    <div id="modal-poin" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/40 hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-center animate-fadeIn">
            <div class="mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold mb-2">Konfirmasi Pembelian</h3>
            <p class="mb-6 text-gray-700">Apakah Anda yakin ingin membeli produk ini dengan poin?</p>
            <div class="flex justify-center gap-4">
                <button id="modal-poin-ya" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-semibold">Ya</button>
                <button id="modal-poin-tidak" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded font-semibold">Tidak</button>
            </div>
        </div>
    </div>
    
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
            document.getElementById('content-deskripsi').classList.remove('hidden'); // Ensure description is visible
            document.getElementById('tab-deskripsi').classList.add('text-green-600', 'border-b-2', 'border-green-600');
            document.getElementById('tab-deskripsi').classList.remove('text-gray-500');
        }

        // Initialize tab on load (since there's only one tab now)
        document.addEventListener('DOMContentLoaded', () => {
            changeTab('deskripsi'); // Make sure description tab is active
        });

        // Harga satuan produk (ambil dari PHP)
        const hargaSatuan = {{ $product->harga ?? 0 }};
        const poinSatuan = {{ $product->harga_points ?? 0 }};
        const userPoints = {{ auth()->check() ? (auth()->user()->points ?? 0) : 0 }};
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
            checkPoinAvailability();
        }

        function checkPoinAvailability() {
            const warning = document.getElementById('poin-warning');
            if (!usePoinCheckbox || !warning) return;
            const poinNeeded = qty * poinSatuan;
            if (usePoinCheckbox.checked && poinSatuan > 0 && poinNeeded > userPoints) {
                warning.classList.remove('hidden');
            } else {
                warning.classList.add('hidden');
            }
        }

        // Konfirmasi pembelian dengan poin (custom modal)
        const usePoinCheckbox = document.getElementById('use_poin');
        const modalPoin = document.getElementById('modal-poin');
        const modalPoinYa = document.getElementById('modal-poin-ya');
        const modalPoinTidak = document.getElementById('modal-poin-tidak');
        let lastPoinChecked = false;
        if (usePoinCheckbox) {
            usePoinCheckbox.addEventListener('change', function(e) {
                if (this.checked) {
                    lastPoinChecked = true;
                    this.checked = false;
                    modalPoin.classList.remove('hidden');
                }
                checkPoinAvailability();
            });
        }
        if (modalPoinYa) {
            modalPoinYa.addEventListener('click', function() {
                modalPoin.classList.add('hidden');
                if (usePoinCheckbox && lastPoinChecked) {
                    usePoinCheckbox.checked = true;
                }
                checkPoinAvailability();
            });
        }
        if (modalPoinTidak) {
            modalPoinTidak.addEventListener('click', function() {
                modalPoin.classList.add('hidden');
                if (usePoinCheckbox) {
                    usePoinCheckbox.checked = false;
                }
            });
        }

        // Share button functionality: copy product link and show toast notification
        const shareBtn = document.getElementById('share-btn');
        if (shareBtn) {
            shareBtn.addEventListener('click', function () {
                const url = window.location.href;
                // Preferred Clipboard API
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(url)
                        .then(() => showToast('Link produk telah disalin'))
                        .catch(() => fallbackCopy(url));
                } else {
                    fallbackCopy(url);
                }
            });
        }

        function fallbackCopy(text) {
            const tempInput = document.createElement('input');
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            showToast('Link produk telah disalin');
        }

        function showToast(message) {
            const toast = document.createElement('div');
            toast.textContent = message;
            toast.className = 'fixed top-5 right-5 bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg opacity-0 transition-opacity duration-300 z-[9999]';
            document.body.appendChild(toast);
            // Fade in
            requestAnimationFrame(() => toast.classList.add('opacity-100'));
            // Fade out after 3 seconds
            setTimeout(() => {
                toast.classList.remove('opacity-100');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    </script>
</body>
</html>