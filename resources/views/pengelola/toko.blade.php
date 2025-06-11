@extends('pengelola.layout')

@section('title', 'Manage Products - EcoZense')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Manage Products</h1>
    <p class="text-gray-600 mt-1">Add, edit and manage your products inventory</p>
</div>

<!-- Add Product Button -->
<div class="mb-6">
    <button onclick="openProductModal()" class="px-6 py-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-all">
        Add New Product
    </button>
</div>

<!-- Success/Error Messages -->
@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        {{ session('error') }}
    </div>
@endif

<!-- Products Grid -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($products as $item)
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <!-- Product Image -->
                <div class="relative h-48">
                    <img src="{{ Storage::url($item->gambar->first()?->file_path) ?? asset('images/default-image.jpg') }}" 
                         alt="{{ $item->nama_produk }}" 
                         class="w-full h-full object-cover">
                </div>
                
                <!-- Product Info -->
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $item->nama_produk }}</h3>
                    <p class="text-sm text-gray-600 mb-2">{{ Str::limit($item->deskripsi, 50) }}</p>
                    <p class="text-lg font-bold text-yellow-500 mb-2">Rp{{ number_format($item->harga, 0, ',', '.') }}</p>
                    
                    <!-- Add Category Display -->
                    <p class="text-sm text-blue-600 font-medium mb-2">
                        {{ ucwords(str_replace('_', ' ', $item->kategori)) }}
                    </p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm {{ $item->status_ketersediaan == 'Available' ? 'text-green-600' : 'text-red-600' }} font-medium">
                            {{ $item->status_ketersediaan }}
                        </span>
                        <span class="text-sm text-gray-500">Likes: {{ $item->suka }}</span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <button onclick="openProductModal({{ $item }})" 
                                class="flex-1 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-all">
                            Edit
                        </button>
                        <form action="{{ route('products.destroy', ['product' => $item->produk_id]) }}" 
                              method="POST" 
                              class="flex-1"
                              onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition-all">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>

<!-- Product Modal -->
<div id="productModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
        <button onclick="closeProductModal()" class="absolute top-3 right-3 text-gray-400 hover:text-red-600 text-2xl font-bold">&times;</button>
        <h2 id="modalTitle" class="text-2xl font-bold text-gray-800 mb-4">Add Product</h2>
        
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="productForm" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="productId" name="_method" value="POST">

            <!-- Image Upload -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-2">Product Image</label>
                <input type="file" name="image" id="image" 
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 @error('image') border-red-500 @enderror"
                       accept="image/*">
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Product Name -->
            <div class="mb-4">
                <label for="nama_produk" class="block text-gray-700 font-medium mb-2">Product Name *</label>
                <input type="text" name="nama_produk" id="nama_produk" required
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Product Price -->
            <div class="mb-4">
                <label for="harga" class="block text-gray-700 font-medium mb-2">Price (Rp) *</label>
                <input type="number" name="harga" id="harga" required min="0"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Product Category -->
            <div class="mb-4">
                <label for="kategori" class="block text-gray-700 font-medium mb-2">Category *</label>
                <select name="kategori" id="kategori" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="eco_enzim">Eco Enzim</option>
                    <option value="sembako">Sembako</option>
                </select>
            </div>

            <!-- Product Description -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Description *</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required
                          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"></textarea>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status_ketersediaan" class="block text-gray-700 font-medium mb-2">Status *</label>
                <select name="status_ketersediaan" id="status_ketersediaan" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full px-6 py-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-all">
                    Save Product
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Toko Settings -->
<div class="bg-white rounded-lg shadow-md p-6 mb-8">
    <form action="{{ route('pengelola.toko.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Profile Picture -->
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Toko</label>
                <div class="flex items-center space-x-4">
                    <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100">
                        <img id="preview-image" src="{{ $user->foto_toko ? Storage::url($user->foto_toko) : asset('images/default-store.png') }}" 
                             class="w-full h-full object-cover">
                    </div>
                    <input type="file" name="foto_toko" id="foto_toko" accept="image/*" class="hidden"
                           onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])">
                    <label for="foto_toko" 
                           class="px-4 py-2 bg-gray-200 text-gray-700 rounded cursor-pointer hover:bg-gray-300">
                        Pilih Foto
                    </label>
                </div>
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Toko</label>
                <input type="text" name="alamat_toko" value="{{ $user->alamat_toko }}"
                       class="w-full px-3 py-2 border rounded focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Jam Operasional -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jam Operasional</label>
                <input type="text" name="jam_operasional" value="{{ $user->jam_operasional }}"
                       class="w-full px-3 py-2 border rounded focus:ring-green-500 focus:border-green-500"
                       placeholder="Contoh: 08.00 - 17.00">
            </div>

            <!-- Rekening -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Rekening</label>
                <input type="text" name="nomor_rekening" value="{{ $user->nomor_rekening }}"
                       class="w-full px-3 py-2 border rounded focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Nama Bank -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Bank</label>
                <input type="text" name="nama_bank_rekening" value="{{ $user->nama_bank_rekening }}"
                       class="w-full px-3 py-2 border rounded focus:ring-green-500 focus:border-green-500"
                       placeholder="Contoh: BCA, Mandiri, dll">
            </div>

            <!-- Deskripsi -->
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Toko</label>
                <textarea name="deskripsi_toko" rows="4" 
                          class="w-full px-3 py-2 border rounded focus:ring-green-500 focus:border-green-500">{{ $user->deskripsi_toko }}</textarea>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
function openProductModal(product = null) {
    const modal = document.getElementById('productModal');
    const form = document.getElementById('productForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodInput = document.getElementById('productId');
    const imageInput = document.getElementById('image');

    if (product) {
        modalTitle.textContent = 'Edit Product';
        form.action = `/pengelola/products/${product.produk_id}`;
        methodInput.value = 'PUT';
        
        // Fill in existing values
        document.getElementById('nama_produk').value = product.nama_produk;
        document.getElementById('harga').value = product.harga;
        document.getElementById('deskripsi').value = product.deskripsi;
        document.getElementById('kategori').value = product.kategori;
        document.getElementById('status_ketersediaan').value = product.status_ketersediaan;
        
        // Make image optional for editing
        imageInput.removeAttribute('required');
    } else {
        modalTitle.textContent = 'Add Product';
        form.action = '{{ route('products.store') }}';
        methodInput.value = 'POST';
        form.reset();
        
        // Make image required for new products
        imageInput.setAttribute('required', 'required');
    }

    modal.classList.remove('hidden');
}

function closeProductModal() {
    document.getElementById('productModal').classList.add('hidden');
}
</script>
@endsection