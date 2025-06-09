@extends('admin.layout')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Edit Event</h1>
                    <p class="text-gray-600 mt-1">Ubah informasi event sesuai kebutuhan</p>
                </div>
                <a href="{{ route('admin.events.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Daftar Event
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
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Event</label>
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
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <label for="banner" class="block text-sm font-medium text-gray-700 mb-2">Banner Event</label>
                    
                    @if($event->image)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-2">Banner Saat Ini:</p>
                            <img src="{{ asset('storage/' . str_replace('public/', '', $event->image)) }}" 
                                 alt="Current Banner" 
                                 class="max-h-48 rounded-lg shadow-sm">
                        </div>
                    @endif

                    <div class="mt-4">
                        <div class="flex items-center justify-center w-full">
                            <label for="banner" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">Klik untuk upload</span> atau drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">PNG, JPG atau GIF (MAX. 2MB)</p>
                                </div>
                                <input id="banner" 
                                       name="banner" 
                                       type="file" 
                                       accept="image/*"
                                       class="hidden"
                                       @error('banner') aria-invalid="true" @enderror>
                            </label>
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
<script>
    // Preview image before upload
    document.getElementById('banner').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.className = 'max-h-48 rounded-lg shadow-sm mt-2';
                
                const previewContainer = document.querySelector('.flex.flex-col.items-center');
                const existingPreview = previewContainer.querySelector('img');
                if (existingPreview) {
                    existingPreview.remove();
                }
                previewContainer.appendChild(preview);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection 