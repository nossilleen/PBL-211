@extends('admin.layout')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Edit Acara</h1>
                    <p class="text-gray-600 mt-1">Ubah informasi acara sesuai kebutuhan</p>
                </div>
                <a href="{{ route('admin.events.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Daftar Acara
                </a>
            </div>
        </div>

        <!-- Form Section -->
        <div class="max-w-4xl mx-auto">
            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Title Input -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Acara</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $event->title) }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 @error('title') border-red-500 @enderror"
                           required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Input -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="description" 
                              name="description" 
                              rows="4" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 @error('description') border-red-500 @enderror"
                              required>{{ old('description', $event->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date and Location Inputs -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal & Waktu</label>
                        <input type="datetime-local" 
                               id="date" 
                               name="date" 
                               value="{{ old('date', $event->date ? \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i') : null) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 @error('date') border-red-500 @enderror"
                               required>
                        @error('date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                        <input type="text" 
                               id="location" 
                               name="location" 
                               value="{{ old('location', $event->location) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 @error('location') border-red-500 @enderror"
                               required>
                        @error('location')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Banner Upload -->
                <div class="mb-6">
                    <label class="block font-semibold mb-2">Banner Acara</label>
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Area Upload & Cropper -->
                        <div class="flex-1">
                            <input type="file" id="banner" name="banner" accept="image/*" class="hidden">
                            <label for="banner" class="cursor-pointer flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100">
                                <span class="text-gray-500">Klik untuk upload gambar baru</span>
                            </label>
                            <div id="cropper-container" class="mt-4 hidden">
                                <img id="cropper-image" class="max-h-64 mx-auto rounded shadow" alt="Cropper Preview">
                                <div class="flex justify-center mt-2">
                                    <button type="button" id="crop-btn" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Crop & Gunakan</button>
                                    <button type="button" id="cancel-crop-btn" class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</button>
                                </div>
                            </div>
                            <input type="hidden" name="cropped_banner" id="cropped_banner">
                        </div>
                        <!-- Preview -->
                        <div class="flex-1 flex flex-col items-center">
                            <span class="text-sm text-gray-500 mb-2">Preview Banner Saat Ini:</span>
                            <img id="cropped-preview"
                                 src="{{ $event->image ? asset('storage/'.$event->image) : 'https://via.placeholder.com/400x200?text=No+Image' }}"
                                 class="rounded shadow max-h-40 w-auto object-cover border"
                                 alt="Preview Banner">
                        </div>
                    </div>
                    @error('banner')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" 
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let cropper = null;
    const input = document.getElementById('banner');
    const cropperContainer = document.getElementById('cropper-container');
    const cropperImage = document.getElementById('cropper-image');
    const cropBtn = document.getElementById('crop-btn');
    const cancelCropBtn = document.getElementById('cancel-crop-btn');
    const croppedInput = document.getElementById('cropped_banner');
    const croppedPreview = document.getElementById('cropped-preview');

    function resetCropperUI() {
        cropperContainer.classList.add('hidden');
        cropperImage.src = '';
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        input.value = '';
    }

    input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(event) {
            cropperImage.src = event.target.result;
            cropperContainer.classList.remove('hidden');
            if (cropper) cropper.destroy();
            cropper = new Cropper(cropperImage, {
                aspectRatio: 2, // 400x200, sesuaikan dengan kebutuhan
                viewMode: 1,
                autoCropArea: 1,
                movable: true,
                zoomable: true,
                scalable: true,
                rotatable: false,
            });
        };
        reader.readAsDataURL(file);
    });

    cropBtn.addEventListener('click', function() {
        if (!cropper) return;
        cropper.getCroppedCanvas({
            width: 800, // resolusi crop, sesuaikan kebutuhan
            height: 400
        }).toBlob(function(blob) {
            // Preview hasil crop
            const url = URL.createObjectURL(blob);
            croppedPreview.src = url;

            // Convert blob to base64 for backend
            const reader = new FileReader();
            reader.onloadend = function() {
                croppedInput.value = reader.result;
            };
            reader.readAsDataURL(blob);

            resetCropperUI();
        }, 'image/jpeg', 0.95);
    });

    cancelCropBtn.addEventListener('click', function() {
        resetCropperUI();
    });
});
</script>
@endpush
@endsection