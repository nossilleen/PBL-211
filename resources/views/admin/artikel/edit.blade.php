@extends('admin.layout')

@section('title', 'Edit Artikel - EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Artikel</h1>
        <p class="text-gray-600 mt-1">Edit data artikel di bawah ini</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('admin.artikel.update', $artikel->artikel_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $artikel->judul) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                <textarea name="konten" id="konten" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>{{ old('konten', $artikel->konten) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                
                @if($artikel->gambar)
                    <div class="mt-2">
                        <span class="text-xs text-gray-500">Gambar saat ini:</span>
                        <div class="flex items-center space-x-4 mt-1">
                            <img src="{{ asset($artikel->gambar) }}" alt="Gambar Artikel" class="h-20 rounded">
                            <button type="button" id="crop-current-btn" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                                Crop Gambar Ini
                            </button>
                        </div>
                    </div>
                @endif
                
                <div id="cropper-container" class="mt-4" style="display:none;">
                    <img id="cropper-image" style="max-width:100%; max-height:300px;">
                    <div class="mt-2 space-x-2">
                        <button type="button" id="crop-btn" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Crop Gambar</button>
                        <button type="button" id="cancel-crop-btn" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</button>
                    </div>
                </div>
                <input type="hidden" name="cropped_gambar" id="cropped_gambar">
                <div id="cropped-preview" class="mt-2"></div>
                <div id="clear-preview" class="mt-2" style="display:none;">
                    <button type="button" id="clear-preview-btn" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                        Hapus Preview
                    </button>
                </div>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="eco enzim" {{ old('kategori', $artikel->kategori) == 'eco enzim' ? 'selected' : '' }}>Eco Enzim</option>
                    <option value="bank sampah" {{ old('kategori', $artikel->kategori) == 'bank sampah' ? 'selected' : '' }}>Bank Sampah</option>
                    <option value="tips dan trik" {{ old('kategori', $artikel->kategori) == 'tips dan trik' ? 'selected' : '' }}>Tips & Trik</option>
                    <option value="berita" {{ old('kategori', $artikel->kategori) == 'berita' ? 'selected' : '' }}>Berita</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $artikel->user ? $artikel->user->nama : '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="tanggal_publikasi" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" value="{{ old('tanggal_publikasi', $artikel->tanggal_publikasi ? $artikel->tanggal_publikasi->format('Y-m-d') : '' ) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.artikel.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition-colors">Batal</a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">Ubah Artikel</button>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div id="successModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center">
                <h2 class="text-2xl font-bold mb-4 text-green-600">Berhasil!</h2>
                <p class="mb-6">{{ session('success') }}</p>
                <button onclick="document.getElementById('successModal').classList.add('hidden')" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tutup</button>
            </div>
        </div>
    @endif
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>
let cropper;
const input = document.getElementById('gambar');
const cropperContainer = document.getElementById('cropper-container');
const cropperImage = document.getElementById('cropper-image');
const cropBtn = document.getElementById('crop-btn');
const cropCurrentBtn = document.getElementById('crop-current-btn');
const cancelCropBtn = document.getElementById('cancel-crop-btn');
const croppedInput = document.getElementById('cropped_gambar');
const croppedPreview = document.getElementById('cropped-preview');
const clearPreview = document.getElementById('clear-preview');
const clearPreviewBtn = document.getElementById('clear-preview-btn');

input.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            cropperImage.src = event.target.result;
            cropperContainer.style.display = 'block';
            if (cropper) cropper.destroy();
            cropper = new Cropper(cropperImage, {
                aspectRatio: 16 / 9,
                viewMode: 1,
                autoCropArea: 1,
            });
        };
        reader.readAsDataURL(file);
    }
});

cropBtn.addEventListener('click', function() {
    if (cropper) {
        const canvas = cropper.getCroppedCanvas({
            width: 1280,
            height: 720
        });
        canvas.toBlob(function(blob) {
            const reader = new FileReader();
            reader.onloadend = function() {
                croppedInput.value = reader.result;
                croppedPreview.innerHTML = '<img src="' + reader.result + '" class="mt-2 rounded shadow" style="max-width:100%;">';
                clearPreview.style.display = 'block';
            };
            reader.readAsDataURL(blob);
        }, 'image/jpeg');
    }
});

// Cancel crop
if (cancelCropBtn) {
    cancelCropBtn.addEventListener('click', function() {
        cropperContainer.style.display = 'none';
        if (cropper) cropper.destroy();
        croppedInput.value = '';
        croppedPreview.innerHTML = '';
        clearPreview.style.display = 'none';
    });
}

// Clear preview
if (clearPreviewBtn) {
    clearPreviewBtn.addEventListener('click', function() {
        croppedInput.value = '';
        croppedPreview.innerHTML = '';
        clearPreview.style.display = 'none';
    });
}

// Crop gambar yang sudah ada
if (cropCurrentBtn) {
    cropCurrentBtn.addEventListener('click', function() {
        const currentImageSrc = '{{ asset($artikel->gambar) }}';
        cropperImage.src = currentImageSrc;
        cropperContainer.style.display = 'block';
        if (cropper) cropper.destroy();
        cropper = new Cropper(cropperImage, {
            aspectRatio: 16 / 9,
            viewMode: 1,
            autoCropArea: 1,
        });
    });
}

// Saat submit, jika ada cropped_gambar, hapus input file asli agar hanya cropped yang dikirim
const form = input.closest('form');
form.addEventListener('submit', function(e) {
    if (croppedInput.value) {
        input.removeAttribute('name');
    }
});
</script>
@endpush
