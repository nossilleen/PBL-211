@extends('pengelola.layout')

@section('title', 'Manage Products - EcoZense')

@section('content')
<!-- Header Section -->
<div class="mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Product Management</h1>
            <p class="text-gray-600">Manage your eco-friendly products inventory</p>
        </div>
        <div class="mt-4 md:mt-0">
            <button onclick="openProductModal()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-green-800 transform hover:scale-105 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Product
            </button>
        </div>
    </div>
</div>

<!-- Success/Error Messages -->
@if(session('success'))
    <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-green-100 border-l-4 border-green-400 rounded-r-lg shadow-sm">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="mb-6 p-4 bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-400 rounded-r-lg shadow-sm">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-red-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
            </svg>
            <p class="text-red-800 font-medium">{{ session('error') }}</p>
        </div>
    </div>
@endif

<!-- Products Section -->
<div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Your Products</h2>
        <div class="flex items-center space-x-2 text-sm text-gray-500">
            <span>Total Products:</span>
            <span class="font-semibold text-green-600">{{ $products->total() }}</span>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($products as $item)
            <div class="group bg-white rounded-xl shadow-md hover:shadow-xl border border-gray-100 overflow-hidden transition-all duration-300 hover:scale-105">
                <!-- Product Image -->
                <div class="relative h-48 overflow-hidden">
                    @if($item->gambar && count($item->gambar) > 0)
                        <img src="{{ Storage::url($item->gambar->first()->file_path) }}" 
                             alt="{{ $item->nama_produk }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    
                    <!-- Category Badge -->
                    <div class="absolute top-3 left-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ ucwords(str_replace('_', ' ', $item->kategori)) }}
                        </span>
                    </div>

                    <!-- Status Badge -->
                    <div class="absolute top-3 right-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->status_ketersediaan == 'Available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $item->status_ketersediaan }}
                        </span>
                    </div>

                    <!-- Likes -->
                    <div class="absolute bottom-3 right-3 bg-black bg-opacity-50 backdrop-blur-sm rounded-full px-2 py-1">
                        <div class="flex items-center space-x-1">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-xs text-white font-medium">{{ $item->suka }}</span>
                        </div>
                    </div>
                        @if(count($item->gambar) > 1)
                            <div class="absolute top-2 right-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded-full">
                                +{{ count($item->gambar) - 1 }} gambar
                            </div>
                        @endif
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                
                <!-- Product Info -->
                <div class="p-5">
                    <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2">{{ $item->nama_produk }}</h3>
                    <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ Str::limit($item->deskripsi, 60) }}</p>
                    
                    <!-- Price Section -->
                    <div class="mb-4">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-green-600">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
                        </div>
                        @if($item->harga_points)
                            <div class="flex items-center mt-1">
                                <svg class="w-4 h-4 text-yellow-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <span class="text-sm font-medium text-yellow-600">{{ number_format($item->harga_points) }} Points</span>
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <button onclick="openProductModal({{ $item }})" 
                                class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-all duration-200 transform hover:scale-105">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </button>
                        <form action="{{ route('products.destroy', ['product' => $item->produk_id]) }}" 
                              method="POST" 
                              class="flex-1"
                              onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-all duration-200 transform hover:scale-105">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
        {{ $products->links() }}
    </div>
</div>

<!-- Store Settings Section -->
<div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
    <div class="flex items-center mb-6">
        <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
        </svg>
        <h2 class="text-2xl font-bold text-gray-900">Store Settings</h2>
    </div>

    <form action="{{ route('pengelola.toko.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Profile Picture Section -->
            <div class="lg:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-3">Store Photo</label>
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <div class="w-32 h-32 rounded-2xl overflow-hidden bg-gradient-to-br from-green-100 to-green-200 shadow-lg">
                            <img id="preview-image" src="{{ $user->foto_toko ? Storage::url($user->foto_toko) : asset('images/default-store.png') }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-2 -right-2 bg-green-600 rounded-full p-2 shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <input type="file" name="foto_toko" id="foto_toko" accept="image/*" class="hidden"
                               onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])">
                        <label for="foto_toko" 
                               class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-xl cursor-pointer hover:bg-gray-200 transition-colors duration-200 font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Choose Photo
                        </label>
                        <p class="text-sm text-gray-500 mt-2">PNG, JPG, JPEG up to 10MB</p>
                    </div>
                </div>
                @error('foto_toko')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Operating Hours -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Operating Hours</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="jam_operasional" value="{{ $user->jam_operasional }}"
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors"
                           placeholder="e.g., 08:00 - 17:00">
                </div>
            </div>

            <!-- Bank Name -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Bank Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <input type="text" name="nama_bank_rekening" value="{{ $user->nama_bank_rekening }}"
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors"
                           placeholder="e.g., BCA, Mandiri, BRI">
                </div>
            </div>

            <!-- Account Number -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Account Number</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <input type="text" name="nomor_rekening" value="{{ $user->nomor_rekening }}"
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors"
                           placeholder="Enter your account number">
                </div>
            </div>

            <!-- Store Description -->
            <div class="lg:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Store Description</label>
                <textarea name="deskripsi_toko" rows="4" 
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors resize-none"
                          placeholder="Tell customers about your store...">{{ $user->deskripsi_toko }}</textarea>
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <button type="submit" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-green-800 transform hover:scale-105 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Save Changes
            </button>
        </div>
    </form>
</div>

<!-- Product Modal -->
<div id="productModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h2 id="modalTitle" class="text-2xl font-bold text-gray-900">Add Product</h2>
                <button onclick="closeProductModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Content -->
        <div class="p-6">
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex">
                        <svg class="w-5 h-5 text-red-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form id="productForm" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="productId" name="_method" value="POST">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Image Upload (Gabungan UI drag & drop + fitur multiple images) -->
                    <div class="md:col-span-2">
                        <label for="images" class="block text-sm font-semibold text-gray-700 mb-2">Product Images *</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-green-500 transition-colors relative">
                            <input type="file" name="images[]" id="images" multiple required
                                   class="hidden"
                                   accept="image/*"
                                   onchange="handleImageUpload(this)">
                            <div id="imagePreview" class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 hidden">
                                <!-- Preview images will be inserted here -->
                            </div>
                            <div id="uploadPlaceholder">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Click to upload or drag and drop</p>
                                <label id="chooseFileInBox" for="images" class="mt-3 inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg cursor-pointer hover:bg-gray-200 transition-colors">
                                    Choose File
                                </label>
                                <p class="text-xs text-gray-500 mt-1">Pilih 1-5 gambar (JPG, PNG)</p>
                            </div>
                            <div id="chooseFileBelow" class="w-full flex justify-center mt-2 hidden">
                                <label for="images" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg cursor-pointer hover:bg-gray-200 transition-colors">
                                    Choose File
                                </label>
                            </div>
                            <p id="imageCount" class="text-xs text-green-600 mt-1 hidden">0 gambar dipilih</p>
                            @error('images')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            @error('images.*')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Product Name -->
                    <div class="md:col-span-2">
                        <label for="nama_produk" class="block text-sm font-semibold text-gray-700 mb-2">Product Name *</label>
                        <input type="text" name="nama_produk" id="nama_produk" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                    </div>

                    <!-- Product Price -->
                    <div>
                        <label for="harga" class="block text-sm font-semibold text-gray-700 mb-2">Price (Rp) *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">Rp</span>
                            </div>
                            <input type="number" name="harga" id="harga" required min="0"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                        </div>
                    </div>

                    <!-- Product Point Price -->
                    <div>
                        <label for="harga_points" class="block text-sm font-semibold text-gray-700 mb-2">Point Price (optional)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </div>
                            <input type="number" name="harga_points" id="harga_points" min="0"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                        </div>
                    </div>

                    <!-- Product Category -->
                    <div>
                        <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-2">Category *</label>
                        <select name="kategori" id="kategori" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                            <option value="">Select Category</option>
                            <option value="eco_enzim">Eco Enzim</option>
                            <option value="sembako">Sembako</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status_ketersediaan" class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                        <select name="status_ketersediaan" id="status_ketersediaan" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                            <option value="">Select Status</option>
                            <option value="Available">Available</option>
                            <option value="Unavailable">Unavailable</option>
                        </select>
                    </div>

                    <!-- Product Description -->
                    <div class="md:col-span-2">
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">Description *</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors resize-none"
                                  placeholder="Describe your product..."></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8 flex justify-end space-x-4">
                    <button type="button" onclick="closeProductModal()" 
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white font-semibold rounded-xl shadow-lg hover:from-green-700 hover:to-green-800 transform hover:scale-105 transition-all duration-200">
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Alert Modal -->
<div id="modalTokoAlert" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden">
    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-md w-full mx-4">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Incomplete Information!</h3>
            <p class="text-gray-600 mb-6">Please fill in all required fields to complete your store setup.</p>
            <button onclick="closeTokoModalAlert()" 
                    class="w-full px-6 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-colors">
                Close
            </button>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('imagePreview');
    const placeholder = document.getElementById('uploadPlaceholder');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
            placeholder.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function openProductModal(product = null) {
    const modal = document.getElementById('productModal');
    const form = document.getElementById('productForm');
    const modalTitle = document.getElementById('modalTitle');
    const methodInput = document.getElementById('productId');
    const imagesInput = document.getElementById('images');
    const previewContainer = document.getElementById('imagePreview');
    const placeholder = document.getElementById('uploadPlaceholder');
    const chooseFileBelow = document.getElementById('chooseFileBelow');
    const chooseFileInBox = document.getElementById('chooseFileInBox');

    // Reset preview
    previewContainer.classList.add('hidden');
    placeholder.classList.remove('hidden');

    if (product) {
        modalTitle.textContent = 'Edit Product';
        form.action = `/pengelola/products/${product.produk_id}`;
        methodInput.value = 'PUT';
        
        // Fill in existing values
        document.getElementById('nama_produk').value = product.nama_produk;
        document.getElementById('harga').value = product.harga;
        document.getElementById('harga_points').value = product.harga_points ?? '';
        document.getElementById('deskripsi').value = product.deskripsi;
        document.getElementById('kategori').value = product.kategori;
        document.getElementById('status_ketersediaan').value = product.status_ketersediaan;
        
        // Make images optional for editing
        imagesInput.removeAttribute('required');
    } else {
        modalTitle.textContent = 'Add Product';
        form.action = '{{ route('products.store') }}';
        methodInput.value = 'POST';
        form.reset();
        
        // Make images required for new products
        imagesInput.setAttribute('required', 'required');
    }

    // Clear image preview and reset global array
    allSelectedFiles = [];
    document.getElementById('imagePreview').innerHTML = '';
    document.getElementById('imagePreview').classList.add('hidden');
    document.getElementById('imageCount').classList.add('hidden');
    
    // Reset tombol choose file
    if (chooseFileBelow) chooseFileBelow.classList.add('hidden');
    if (chooseFileInBox) chooseFileInBox.classList.remove('hidden');

    // Clear file input
    document.getElementById('images').value = '';

    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeProductModal() {
    document.getElementById('productModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function showTokoModalAlert() {
    document.getElementById('modalTokoAlert').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeTokoModalAlert() {
    document.getElementById('modalTokoAlert').classList.add('hidden');
}

// Global variable to store all selected files
let allSelectedFiles = [];

function handleImageUpload(input) {
    const preview = document.getElementById('imagePreview');
    const files = Array.from(input.files);
    const placeholder = document.getElementById('uploadPlaceholder');
    const chooseFileBelow = document.getElementById('chooseFileBelow');
    const chooseFileInBox = document.getElementById('chooseFileInBox');
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
        document.getElementById('imageCount').classList.add('hidden');
        placeholder.classList.remove('hidden');
        chooseFileBelow.classList.add('hidden');
        if (chooseFileInBox) chooseFileInBox.classList.remove('hidden');
        return;
    }
    preview.innerHTML = '';
    preview.classList.remove('hidden');
    // Update image count
    const imageCount = document.getElementById('imageCount');
    imageCount.textContent = `${allSelectedFiles.length} gambar dipilih`;
    imageCount.classList.remove('hidden');
    // Sembunyikan placeholder, tampilkan tombol choose file di bawah, sembunyikan di dalam kotak
    placeholder.classList.add('hidden');
    chooseFileBelow.classList.remove('hidden');
    if (chooseFileInBox) chooseFileInBox.classList.add('hidden');
    allSelectedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewItem = document.createElement('div');
            previewItem.className = 'relative group';
            previewItem.innerHTML = `
                <img src="${e.target.result}" alt="Preview" class="w-20 h-20 object-cover rounded-lg border shadow">
                <button type="button" data-index="${index}" class="remove-image-btn absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs opacity-80 group-hover:opacity-100 transition-opacity z-10">
                    ×
                </button>
            `;
            preview.appendChild(previewItem);
        };
        reader.readAsDataURL(file);
    });
    // Setelah forEach render preview, tambahkan event listener ke semua .remove-image-btn
    document.getElementById('imagePreview').onclick = function(e) {
        if (e.target.classList.contains('remove-image-btn')) {
            e.preventDefault();
            const idx = parseInt(e.target.dataset.index);
            window.removeImage(idx);
        }
    };
}

window.removeImage = function(index) {
    const input = document.getElementById('images');
    if (!input) return;
    allSelectedFiles.splice(index, 1);
    const dt = new DataTransfer();
    allSelectedFiles.forEach(file => dt.items.add(file));
    input.files = dt.files;
    handleImageUpload(input);
};

// Store form validation
document.querySelector('form[action*="pengelola.toko.update"]').addEventListener('submit', function(e) {
    var requiredFields = [
        'jam_operasional', 'nomor_rekening', 'nama_bank_rekening', 'deskripsi_toko'
    ];
    var isValid = true;
    
    requiredFields.forEach(function(field) {
        var input = document.querySelector('[name="' + field + '"]');
        if (input && !input.value.trim()) {
            input.classList.add('border-red-500', 'ring-red-500');
            input.classList.remove('border-gray-300');
            isValid = false;
        } else if (input) {
            input.classList.remove('border-red-500', 'ring-red-500');
            input.classList.add('border-gray-300');
        }
    });
    
    if (!isValid) {
        showTokoModalAlert();
        e.preventDefault();
        return;
    }
});

// Close modal when clicking outside
document.getElementById('productModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeProductModal();
    }
});

document.getElementById('modalTokoAlert').addEventListener('click', function(e) {
    if (e.target === this) {
        closeTokoModalAlert();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var chooseFileBelow = document.getElementById('chooseFileBelow');
    var inputImages = document.getElementById('images');
    if (chooseFileBelow && inputImages) {
        chooseFileBelow.addEventListener('click', function(e) {
            // Jika yang diklik adalah label, biarkan default
            if (e.target.tagName !== 'LABEL') {
                inputImages.click();
            }
        });
    }
});
</script>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection