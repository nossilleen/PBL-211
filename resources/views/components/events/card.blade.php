@props(['image', 'title', 'desc', 'url' => '#'])

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    
    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $title }}</h3>
        <p class="text-sm text-gray-600 mb-4">{{ $desc }}</p>

        <a href="{{ $url }}" class="inline-block text-green-600 hover:text-green-800 font-semibold text-sm">
            Selengkapnya &rarr;
        </a>
    </div>
</div>
