@props(['image', 'title', 'desc', 'date', 'author'])

<div class="bg-white rounded-md shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
    <div class="relative">
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-48 object-cover">
        <div class="absolute top-2 right-2">
            <button class="text-white hover:text-red-500 transition-colors duration-300 bg-gray-700/50 rounded-full p-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>
    </div>
    <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $title }}</h3>
        <p class="text-sm text-gray-600 line-clamp-2 mb-4">{{ $desc }}</p>
        <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
            <span>{{ $author }}</span>
            <span>{{ $date }}</span>
        </div>
        <a href="#" class="block w-full text-center py-2 bg-green-100 text-green-800 rounded-md hover:bg-green-200 transition-colors text-sm">Selengkapnya</a>
    </div>
</div> 