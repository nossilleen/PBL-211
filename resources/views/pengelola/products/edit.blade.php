@extends('pengelola.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Edit Produk</h1>
                <a href="{{ route('pengelola.toko') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    Kembali
                </a>
            </div>

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('products.update', $product->produk_id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Product Name -->
                <div>
                    <label for="nama_produk" class="block text-gray-700 font-medium mb-2">Nama Produk *</label>
                    <input type="text" name="nama_produk" id="nama_produk" required
                           value="{{ old('nama_produk', $product->nama_produk) }}"
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
                        <option value="eco_enzim" {{ old('kategori', $product->kategori) == 'eco_enzim' ? 'selected' : '' }}>Eco Enzim</option>
                        <option value="sembako" {{ old('kategori', $product->kategori) == 'sembako' ? 'selected' : '' }}>Sembako</option>
                    </select>
                    @error('kategori')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status_ketersediaan" class="block text-gray-700 font-medium mb-2">Status Ketersediaan *</label>
                    <select name="status_ketersediaan" id="status_ketersediaan" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="Available" {{ old('status_ketersediaan', $product->status_ketersediaan) == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Unavailable" {{ old('status_ketersediaan', $product->status_ketersediaan) == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
                    </select>
                    @error('status_ketersediaan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="harga" class="block text-gray-700 font-medium mb-2">Harga (Rp) *</label>
                        <input type="number" name="harga" id="harga" required min="0"
                               value="{{ old('harga', $product->harga) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('harga')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="harga_points" class="block text-gray-700 font-medium mb-2">Harga Poin (Opsional)</label>
                        <input type="number" name="harga_points" id="harga_points" min="0"
                               value="{{ old('harga_points', $product->harga_points) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('harga_points')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi *</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" required
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Images with Replace Options -->
                @if($product->gambar && count($product->gambar) > 0)
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Gambar Produk Saat Ini</label>
                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                            @foreach($product->gambar as $index => $image)
                            <div class="relative group current-image-item cursor-pointer" data-image-index="{{ $index }}">
                                <div class="absolute top-2 left-2 bg-green-600 text-white text-xs px-2 py-1 rounded-full z-10 font-bold">
                                    {{ $index + 1 }}
                                </div>
                                <img src="{{ asset('storage/' . $image->file_path) }}" 
                                     alt="Current image {{ $index + 1 }}" 
                                     class="w-full h-32 object-cover rounded-lg border-2 border-gray-200 hover:border-green-400 transition-colors">
                                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center rounded-lg">
                                    <button type="button" 
                                            onclick="selectImageForReplacement({{ $index }})"
                                            class="bg-green-600 text-white px-4 py-2 rounded text-sm hover:bg-green-700 transition font-medium">
                                        Ganti Gambar {{ $index + 1 }}
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-sm text-blue-700">
                                    <strong>Petunjuk:</strong> Klik pada gambar untuk memilih gambar yang ingin diganti. Hanya gambar yang dipilih yang akan berubah.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <p class="text-sm text-yellow-700">
                            <strong>Perhatian:</strong> Produk ini belum memiliki gambar. Silakan tambahkan gambar saat membuat produk baru.
                        </p>
                    </div>
                </div>
                @endif

                <!-- Image Replacement Section -->
                <div id="imageReplacementSection" class="hidden">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <h3 class="text-lg font-semibold text-green-800">Ganti Gambar Terpilih</h3>
                        </div>
                        
                        <div class="border-2 border-dashed border-green-400 rounded-lg p-6 text-center bg-white">
                            <input type="file" name="images[]" id="images" accept="image/*"
                                   class="hidden" onchange="handleReplacementImageUpload(this)">
                            <label for="images" class="cursor-pointer">
                                <svg class="mx-auto h-12 w-12 text-green-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="mt-2 text-sm text-green-600 font-medium">Klik untuk memilih gambar pengganti</p>
                                <p class="text-xs text-green-500 mt-1">Format: JPG, PNG (Maksimal 2MB)</p>
                            </label>
                        </div>
                        
                        <!-- Replacement Image Preview -->
                        <div id="replacementImagePreview" class="mt-4 hidden">
                            <div class="bg-white border border-green-300 rounded-lg p-4 shadow-sm">
                                <h4 class="text-green-800 font-medium mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Gambar Pengganti
                                </h4>
                                <div class="flex items-center space-x-4">
                                    <img id="replacementPreview" src="" alt="Replacement preview" class="w-24 h-24 object-cover rounded-lg border-2 border-green-200">
                                    <div class="flex-1">
                                        <p class="text-sm text-green-700 mb-2">
                                            Gambar ini akan mengganti <span class="font-bold text-green-800">Gambar <span id="selectedImageNumber"></span></span>
                                        </p>
                                        <button type="button" onclick="cancelReplacement()" 
                                                class="text-red-600 text-sm hover:text-red-800 font-medium flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Batal penggantian
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @error('images')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        @error('images.*')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Hidden input for selected image index -->
                <input type="hidden" name="replace_image_index" id="replaceImageIndex" value="">

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4 pt-6">
                    <a href="{{ route('pengelola.toko') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition">
                        Batal
                    </a>
                    <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                        Update Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Global variables
let selectedImageIndex = null;
let replacementFile = null;

function selectImageForReplacement(index) {
    selectedImageIndex = index;
    
    // Show replacement section
    document.getElementById('imageReplacementSection').classList.remove('hidden');
    
    // Update selected image number
    document.getElementById('selectedImageNumber').textContent = index + 1;
    
    // Scroll to replacement section with smooth animation
    document.getElementById('imageReplacementSection').scrollIntoView({ 
        behavior: 'smooth',
        block: 'center'
    });
    
    // Highlight selected image
    highlightSelectedImage(index);
    
    // Show success message
    showSelectionMessage(index + 1);
}

function showSelectionMessage(imageNumber) {
    // Create or update selection message
    let messageDiv = document.getElementById('selectionMessage');
    if (!messageDiv) {
        messageDiv = document.createElement('div');
        messageDiv.id = 'selectionMessage';
        messageDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
        document.body.appendChild(messageDiv);
    }
    
    messageDiv.innerHTML = `
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Gambar ${imageNumber} dipilih untuk diganti
        </div>
    `;
    
    // Auto hide after 3 seconds
    setTimeout(() => {
        messageDiv.remove();
    }, 3000);
}

function highlightSelectedImage(index) {
    // Remove previous highlights
    document.querySelectorAll('.current-image-item').forEach(item => {
        item.classList.remove('ring-4', 'ring-green-500');
    });
    
    // Add highlight to selected image
    const selectedItem = document.querySelector(`[data-image-index="${index}"]`);
    if (selectedItem) {
        selectedItem.classList.add('ring-4', 'ring-green-500');
    }
}

function handleReplacementImageUpload(input) {
    const file = input.files[0];
    if (!file) return;
    
    replacementFile = file;
    
    // Show preview
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('replacementPreview').src = e.target.result;
        document.getElementById('replacementImagePreview').classList.remove('hidden');
    };
    reader.readAsDataURL(file);
}

function cancelReplacement() {
    selectedImageIndex = null;
    replacementFile = null;
    
    // Hide sections
    document.getElementById('imageReplacementSection').classList.add('hidden');
    document.getElementById('replacementImagePreview').classList.add('hidden');
    
    // Clear input
    document.getElementById('images').value = '';
    
    // Remove highlights
    document.querySelectorAll('.current-image-item').forEach(item => {
        item.classList.remove('ring-4', 'ring-green-500');
    });
}

// Update form submission to include selected image index
document.querySelector('form').addEventListener('submit', function(e) {
    if (selectedImageIndex !== null && replacementFile) {
        document.getElementById('replaceImageIndex').value = selectedImageIndex;
    } else {
        document.getElementById('replaceImageIndex').value = '';
    }
});
</script>
@endsection 