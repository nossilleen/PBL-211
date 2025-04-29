@props(['image', 'title', 'desc', 'price', 'status', 'bank', 'likes'])

<div class="bg-white rounded-md shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
    <div class="relative">
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-40 object-cover">
        <div class="absolute top-2 right-2 flex items-center bg-white px-2 py-1 rounded-full text-gray-600 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            {{ $likes }}
        </div>
    </div>
    <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $title }}</h3>
        <p class="text-sm text-gray-600 mb-3">{{ $desc }}</p>
        
        <div class="text-2xl font-bold text-yellow-500 mb-2">Rp{{ $price }}</div>
        
        <div class="flex justify-between items-center mb-3 text-sm">
            <div>
                <span class="text-gray-600">Status Ketersediaan:</span>
                <span class="ml-1 {{ $status === 'Available' ? 'text-green-500' : 'text-red-500' }}">{{ $status }}</span>
            </div>
        </div>
        
        <div class="mb-4 text-sm text-gray-700">
            <span>Bank Sampah: {{ $bank }}</span>
        </div>
        
        <button class="block w-full text-center py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors">Beli</button>
    </div>
</div> 