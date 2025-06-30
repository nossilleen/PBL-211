@extends('admin.layout')

@section('title', 'Buat Artikel Baru - EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Buat Artikel Baru</h1>
        <p class="text-gray-600 mt-1">Isi form di bawah untuk membuat artikel baru</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                <textarea name="konten" id="konten" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required></textarea>
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                <div id="cropper-container" class="mt-4" style="display:none;">
                    <img id="cropper-image" style="max-width:100%; max-height:300px;">
                    <button type="button" id="crop-btn" class="mt-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Crop Gambar</button>
                </div>
                <input type="hidden" name="cropped_gambar" id="cropped_gambar">
                <div id="cropped-preview" class="mt-2"></div>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="eco enzim">Eco Enzim</option>
                    <option value="bank sampah">Bank Sampah</option>
                    <option value="tips dan trik">Tips & Trik</option>
                    <option value="berita">Berita</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.artikel.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition-colors">Batal</a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">Simpan Artikel</button>
            </div>
        </form>
    </div>
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
const croppedInput = document.getElementById('cropped_gambar');
const croppedPreview = document.getElementById('cropped-preview');

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
            };
            reader.readAsDataURL(blob);
        }, 'image/jpeg');
    }
});
// Saat submit, jika ada cropped_gambar, hapus input file asli agar hanya cropped yang dikirim
const form = input.closest('form');
form.addEventListener('submit', function(e) {
    if (croppedInput.value) {
        input.removeAttribute('name');
    }
});
</script>
@endpush