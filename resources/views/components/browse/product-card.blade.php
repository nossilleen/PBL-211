@props([
    'image',
    'title',
    'desc',
    'price' => null,
    'harga_points' => null,
    'status' => null,
    'bank' => null,
    'suka' => null,
    'productId' => null,
    'isLiked' => false,
    'showLike' => true,
    'createdAt' => null,
    'href' => null,
])

@php
    use Carbon\Carbon;
    $isNew = false;
    if($createdAt){
        try {
            $isNew = Carbon::parse($createdAt)->diffInDays(Carbon::now()) <= 7;
        } catch (Exception $e) {
            $isNew = false;
        }
    }
    $detailUrl = $href ?? ($productId ? route('product.detail', ['id' => $productId]) : '#');
@endphp

<div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col h-full min-h-[400px] relative group">
    {{-- Product Image with Like Button --}}
    <div class="relative h-48">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover">
        @if($showLike)
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
        @endif

        @if($isNew)
            <span class="absolute top-2 left-2 bg-yellow-500 text-white text-[10px] font-semibold px-2 py-1 rounded">Baru</span>
        @endif
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
                <p class="text-lg font-bold text-yellow-500 mb-1">Rp{{ $price }}</p>
                @if(!empty($harga_points))
                    <p class="text-sm font-medium text-blue-600 mb-1">atau {{ number_format($harga_points) }} Poin</p>
                @endif
            @endisset
            <div class="flex items-center justify-between">
                <span class="text-sm {{ $status == 'Available' ? 'text-green-600' : 'text-red-600' }} font-medium">
                    {{ $status }}
                </span>
                @if($showLike)
                    <span class="text-sm text-gray-500" id="like-count-{{ $productId }}">❤ {{ $suka }}</span>
                @endif
            
            </div>
            @if(!empty($bank))
                <p class="text-sm text-blue-600 truncate">{{ $bank }}</p>
            @endif
        </div>
    </div>

    {{-- Action Button (Slot) --}}
    <div class="p-4 pt-0 mt-auto">
        @if($slot->isEmpty())
            <a href="{{ $detailUrl }}" class="w-full block px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-colors text-center">Lihat Produk</a>
        @else
            {{ $slot }}
        @endif
    </div>
</div>