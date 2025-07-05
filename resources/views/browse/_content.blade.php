<!-- Enhanced Filter Section -->
<section class="bg-white/80 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-40">
    <div class="container mx-auto px-6">
        <div class="flex flex-wrap justify-between items-center py-6">
            <!-- Enhanced Category Dropdown -->
            <div class="w-full md:w-auto mb-4 md:mb-0">
                <div class="relative">
                    <button id="categoryDropdown" class="category-pill active flex items-center justify-between w-full md:w-64 px-6 py-3 rounded-xl font-medium transition-all duration-300">
                        <span id="currentCategory" class="font-semibold">🏪 Toko Eco Enzim</span>
                        <svg class="w-5 h-5 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="categoryMenu" class="hidden absolute left-0 mt-2 w-full md:w-64 floating-card rounded-xl z-50 overflow-hidden">
                        <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-emerald-50 transition-colors font-medium" data-category="stores">
                            🏪 Toko Eco Enzim
                        </a>
                        <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-emerald-50 transition-colors font-medium" data-category="products">
                            🧪 Produk Eco Enzim
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Tabs -->
            <div class="w-full md:w-auto flex bg-gray-100 rounded-xl p-1">
                <a href="{{ request()->fullUrlWithQuery(['sort' => 'populer']) }}" 
                   class="px-6 py-3 rounded-lg font-medium transition-all duration-300 {{ request('sort') === 'populer' ? 'bg-white text-emerald-600 shadow-md' : 'text-gray-600 hover:text-emerald-600' }}">
                    🔥 Terpopuler
                </a>
                <a href="{{ request()->fullUrlWithQuery(['sort' => 'terbaru']) }}" 
                   class="px-6 py-3 rounded-lg font-medium transition-all duration-300 {{ request('sort') === 'populer' ? 'text-gray-600 hover:text-emerald-600' : 'bg-white text-emerald-600 shadow-md' }}">
                    ⭐ Terbaru
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Stores Section -->
<section id="storesSection" class="py-16 bg-gradient-to-br from-gray-50 to-emerald-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold gradient-text mb-4">Hasil Pencarian</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Temukan toko eco-enzyme terbaik di sekitar Anda</p>
            <div class="section-divider max-w-xs mx-auto w-full flex justify-center items-center"></div>
        </div>
        
        @php
            $shops = $shops ?? collect();
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($shops as $shop)
                <x-browse.product-card
                    :image="$shop->foto_toko ? Storage::url($shop->foto_toko) : asset('images/default-store.png')"        
                    :title="$shop->nama ?? 'Nama Toko'"
                    :desc="Str::limit($shop->deskripsi_toko ?? 'Belum ada deskripsi', 50)"
                    :bank="$shop->jam_operasional ?? 'Belum ada jam operasional'"
                    :productId="$shop->id"
                    :showLike="false"
                    href="{{ route('toko.detail', ['id' => $shop->user_id]) }}"
                >
                </x-browse.product-card>
            @empty
                <div class="col-span-4 text-center py-16">
                    <div class="text-6xl mb-4">🏪</div>
                    <div class="text-2xl font-bold text-gray-700 mb-2">Belum ada toko Bank Sampah.</div>
                    <p class="text-gray-500">Coba ubah kata kunci pencarian Anda</p>
                </div>
            @endforelse
        </div>
        
        <!-- Enhanced Pagination -->
        @if(method_exists($shops, 'links'))
            <div class="mt-8 flex justify-center">
                <ul class="flex border border-gray-300 rounded-md overflow-hidden bg-white text-sm">
                    {{-- Tombol Sebelumnya --}}
                    @if ($shops->onFirstPage())
                        <li>
                            <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white border-r border-gray-300 cursor-not-allowed select-none">Sebelumnya</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $shops->previousPageUrl() }}" rel="prev" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">Sebelumnya</a>
                        </li>
                    @endif
                    {{-- Nomor Halaman --}}
                    @foreach ($shops->getUrlRange(1, $shops->lastPage()) as $page => $url)
                        @if ($page == $shops->currentPage())
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
                    @if ($shops->hasMorePages())
                        <li>
                            <a href="{{ $shops->nextPageUrl() }}" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
                        </li>
                    @else
                        <li>
                            <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white cursor-not-allowed select-none">Selanjutnya</span>
                        </li>
                    @endif
                </ul>
            </div>
        @endif
    </div>
</section>

<!-- Enhanced Products Section -->
<section id="productsSection" class="py-16 bg-gradient-to-br from-gray-50 to-emerald-50 hidden">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold gradient-text mb-4">Produk Eco Enzim</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Produk eco-enzyme berkualitas tinggi untuk kebutuhan Anda</p>
            <div class="section-divider max-w-xs mx-auto w-full flex justify-center items-center"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            @foreach ($products as $product)
                <x-browse.product-card 
                    :image="asset($product->image_url)"
                    :title="$product->nama_produk"
                    :desc="Str::limit($product->deskripsi, 50)"
                    :price="number_format($product->harga, 0, ',', '.')"
                    :harga_points="$product->harga_points"
                    :status="$product->status_ketersediaan"
                    :bank="$product->user->nama"
                    :createdAt="$product->created_at"
                    :suka="$product->suka"
                    :productId="$product->produk_id"
                    :isLiked="$product->likedByCurrentUser"
                >
                </x-browse.product-card>
            @endforeach
        </div>

        <!-- Enhanced Pagination -->
        <div class="mt-8 flex justify-center">
            <ul class="flex border border-gray-300 rounded-md overflow-hidden bg-white text-sm">
                {{-- Tombol Sebelumnya --}}
                @if ($products->onFirstPage())
                    <li>
                        <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white border-r border-gray-300 cursor-not-allowed select-none">Sebelumnya</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $products->previousPageUrl() }}" rel="prev" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">Sebelumnya</a>
                    </li>
                @endif
                {{-- Nomor Halaman --}}
                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    @if ($page == $products->currentPage())
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
                @if ($products->hasMorePages())
                    <li>
                        <a href="{{ $products->nextPageUrl() }}" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
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

<!-- JavaScript -->
@push('scripts')
<script>
    // Enhanced Category dropdown
    const categoryDropdown = document.getElementById('categoryDropdown');
    const categoryMenu = document.getElementById('categoryMenu');
    const currentCategory = document.getElementById('currentCategory');
    const storesSection = document.getElementById('storesSection');
    const productsSection = document.getElementById('productsSection');
    const categoryLinks = document.querySelectorAll('#categoryMenu a');
    
    if (categoryDropdown && categoryMenu) {
        categoryDropdown.addEventListener('click', function() {
            categoryMenu.classList.toggle('hidden');
            const arrow = this.querySelector('svg');
            arrow.classList.toggle('rotate-180');
        });
        
        categoryLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Update dropdown text and style
                currentCategory.textContent = this.textContent;
                categoryMenu.classList.add('hidden');
                
                // Reset arrow rotation
                const arrow = categoryDropdown.querySelector('svg');
                arrow.classList.remove('rotate-180');
                
                const category = this.getAttribute('data-category');
                
                // Show/hide sections based on selection
                if (category === 'products') {
                    storesSection.classList.add('hidden');
                    productsSection.classList.remove('hidden');
                } else if (category === 'stores') {
                    storesSection.classList.remove('hidden');
                    productsSection.classList.add('hidden');
                } else {
                    // 'all' or default
                    storesSection.classList.remove('hidden');
                    productsSection.classList.add('hidden');
                }
            });
        });
        
        document.addEventListener('click', function(event) {
            if (!categoryDropdown.contains(event.target)) {
                categoryMenu.classList.add('hidden');
                const arrow = categoryDropdown.querySelector('svg');
                arrow.classList.remove('rotate-180');
            }
        });
    }
</script>
@endpush 