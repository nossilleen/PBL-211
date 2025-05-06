@props(['image', 'title', 'desc', 'date', 'author'])

<div class="bg-white rounded-md shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-56 object-cover">
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $title }}</h3>
        <p class="text-gray-600 mb-4">{{ $desc }}</p>
        <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
            <span>{{ $author }} • {{ $date }}</span>
            <button class="text-gray-400 hover:text-red-500 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>
        <a href="/article-detail" class="block w-full text-center py-2 bg-green-100 text-green-800 rounded-md hover:bg-green-200 transition-colors">Selengkapnya</a>
    </div>
</div> 