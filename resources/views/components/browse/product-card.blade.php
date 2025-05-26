@props(['image', 'title', 'desc', 'price', 'status', 'bank', 'suka', 'productId', 'isLiked' => false])

<div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full min-h-[400px]">
    {{-- Product Image with Like Button --}}
    <div class="relative h-48">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover">
        <button type="button"
            onclick="toggleLike({{ $productId }})" 
            class="like-button absolute top-2 right-2 p-2 rounded-full bg-white shadow-md hover:bg-gray-100">
            <svg id="heart-{{ $productId }}" 
                class="w-6 h-6 {{ $isLiked ? 'text-red-500' : '' }}" 
                fill="{{ $isLiked ? 'currentColor' : 'none' }}"
                stroke="currentColor" 
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                </path>
            </svg>
        </button>
    </div>

    {{-- Product Info --}}
    <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
        {{-- Title and Description --}}
        <div>
            <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $title }}</h3>
            <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ $desc }}</p>
        </div>

        {{-- Price, Status, and Bank --}}
        <div class="space-y-2">
            @isset($price)
                <p class="text-lg font-bold text-yellow-500">Rp{{ $price }}</p>
            @endisset
            <div class="flex items-center justify-between">
                <span class="text-sm {{ $status == 'Available' ? 'text-green-600' : 'text-red-600' }} font-medium">
                    {{ $status }}
                </span>
                <span class="text-sm text-gray-500" id="like-count-{{ $productId }}">❤ {{ $suka }}</span>
            </div>
            @if(!empty($bank))
                <p class="text-sm text-blue-600 truncate">{{ $bank }}</p>
            @endif
        </div>
    </div>

    {{-- Action Button (Slot) --}}
    <div class="p-4 pt-0 mt-auto">
        {{ $slot }}
    </div>
</div>