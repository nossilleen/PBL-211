@extends('pengelola.layout')

@section('title', 'Toko - Pengelola EcoZense')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Produk Kami</h1>
    <div class="grid grid-cols-3 gap-6">
        <!-- Product Card -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="h-40 bg-gray-200 rounded mb-4"></div>
            <h2 class="text-lg font-semibold mb-2">Produk Eco Enzim 1</h2>
            <div class="flex items-center mb-2">
                <span class="text-yellow-500 mr-1">★</span>
                <span>4.5</span>
            </div>
            <div class="flex items-center justify-between mb-4">
                <span class="text-gray-700 font-medium">Tersedia</span>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-blue-500 peer-focus:ring-2 peer-focus:ring-blue-300"></div>
                    <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5"></div>
                </label>
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</button>
        </div>

        <!-- Another Product Card -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="h-40 bg-gray-200 rounded mb-4"></div>
            <h2 class="text-lg font-semibold mb-2">Produk Eco Enzim 2</h2>
            <div class="flex items-center mb-2">
                <span class="text-yellow-500 mr-1">★</span>
                <span>4.0</span>
            </div>
            <div class="flex items-center justify-between mb-4">
                <span class="text-gray-700 font-medium">Tersedia</span>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-blue-500 peer-focus:ring-2 peer-focus:ring-blue-300"></div>
                    <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5"></div>
                </label>
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</button>
        </div>

        <!-- Add Product Card -->
        <div class="bg-gray-300 shadow-md rounded-lg flex items-center justify-center h-40 cursor-pointer hover:bg-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span class="text-gray-700 font-semibold ml-2">ADD PRODUCT</span>
        </div>
    </div>
</div>
@endsection