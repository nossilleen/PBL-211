@props(['image', 'title', 'desc', 'alamat'])

<div class="bg-white rounded-md shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $title }}</h3>
        <p class="text-gray-600 mb-4">{{ $desc }}</p>
        
        <div class="mb-4">
            <p class="text-sm text-gray-500 font-medium">Alamat:</p>
            <p class="text-sm text-gray-700">{{ $alamat }}</p>
        </div>
        
        <a href="{{ route('store.detail', ['id' => 1]) }}" class="block w-full text-center py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors">Belanja</a>
    </div>
</div>