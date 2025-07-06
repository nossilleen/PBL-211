@extends('pengelola.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Tambah Produk Baru</h1>
                <a href="{{ route('pengelola.toko') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    Kembali
                </a>
            </div>

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <!-- Product Name -->
                <div>
                    <label for="nama_produk" class="block text-gray-700 font-medium mb-2">Nama Produk *</label>
                    <input type="text" name="nama_produk" id="nama_produk" required
                           value="{{ old('nama_produk') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    @error('nama_produk')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="kategori" class="block text-gray-700 font-medium mb-2">Kategori *</label>
                    <select name="kategori" id="kategori" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Pilih Kategori</option>
                        <option value="eco_enzim" {{ old('kategori') == 'eco_enzim' ? 'selected' : '' }}>Eco Enzim</option>
                        <option value="sembako" {{ old('kategori') == 'sembako' ? 'selected' : '' }}>Sembako</option>
                    </select>
                    @error('kategori')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="harga" class="block text-gray-700 font-medium mb-2">Harga (Rp) *</label>
                        <input type="number" name="harga" id="harga" required min="0"
                               value="{{ old('harga') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('harga')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="harga_points" class="block text-gray-700 font-medium mb-2">Harga Poin (Opsional)</label>
                        <input type="number" name="harga_points" id="harga_points" min="0"
                               value="{{ old('harga_points') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('harga_points')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Multiple Images Upload -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Gambar Produk *</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-400 transition-colors">
                        <input type="file" name="images[]" id="images" multiple accept="image/*" required
                               class="hidden" onchange="handleImageUpload(this)">
                        <label for="images" class="cursor-pointer">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="mt-2 text-sm text-gray-600">Klik untuk memilih gambar</p>
                            <p class="text-xs text-gray-500 mt-1">Maksimal 5 gambar, format: JPG, PNG</p>
                        </label>
                    </div>
                    
                    <!-- Image Preview -->
                    <div id="imagePreview" class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 hidden">
                        <!-- Preview images will be inserted here -->
                    </div>
                    
                    @error('images')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @error('images.*')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('pengelola.toko') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Global variable to store all selected files
let allSelectedFiles = [];

function handleImageUpload(input) {
    const preview = document.getElementById('imagePreview');
    const files = Array.from(input.files);
    
    // Check if adding new files would exceed limit
    if (allSelectedFiles.length + files.length > 5) {
        alert('Maksimal hanya bisa upload 5 gambar!');
        return;
    }
    
    // Add new files to existing files
    allSelectedFiles = [...allSelectedFiles, ...files];
    
    // Update the input files
    const dt = new DataTransfer();
    allSelectedFiles.forEach(file => dt.items.add(file));
    input.files = dt.files;
    
    if (allSelectedFiles.length === 0) {
        preview.classList.add('hidden');
        return;
    }
    
    preview.innerHTML = '';
    preview.classList.remove('hidden');
    
    allSelectedFiles.forEach((file, index) => {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const previewItem = document.createElement('div');
            previewItem.className = 'relative group';
            previewItem.innerHTML = `
                <img src="${e.target.result}" alt="Preview" class="w-full h-24 object-cover rounded-lg">
                <button type="button" onclick="removeImage(${index})" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    ×
                </button>
            `;
            preview.appendChild(previewItem);
        };
        
        reader.readAsDataURL(file);
    });
}

function removeImage(index) {
    console.log('Removing image at index:', index);
    const input = document.getElementById('images');
    
    if (!input) {
        console.error('Input element not found');
        return;
    }
    
    // Remove file from array
    allSelectedFiles.splice(index, 1);
    console.log('Remaining files:', allSelectedFiles.length);
    
    // Update input files
    const dt = new DataTransfer();
    allSelectedFiles.forEach(file => dt.items.add(file));
    input.files = dt.files;
    
    // Re-render preview
    handleImageUpload(input);
}
</script>
@endsection 