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

<div class="bg-white rounded-xl shadow-lg hover:shadow-2xl overflow-hidden flex flex-col h-full min-h-[420px] relative group transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:scale-[1.02] cursor-pointer border border-gray-100">
    {{-- Product Image with Like Button --}}
    <div class="relative h-52 overflow-hidden">
        <img src="{{ $image }}" 
             alt="{{ $title }}" 
             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        
        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        
        @if($isNew)
            <span class="absolute top-3 left-3 bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg animate-pulse">
                ✨ Baru
            </span>
        @endif
        @if($showLike)
            <button type="button"
                onclick="event.stopPropagation(); toggleLike({{ $productId }}); return false;"
                tabindex="0"
                class="like-button absolute top-3 right-3 p-2.5 rounded-full bg-white/90 backdrop-blur-sm shadow-lg hover:bg-white hover:scale-110 transition-all duration-200 z-10 flex items-center pointer-events-auto"
                style="z-index:20;">
                <svg id="heart-{{ $productId }}"
                    class="w-5 h-5 {{ $isLiked ? 'text-red-500' : 'text-gray-600' }}"
                    fill="{{ $isLiked ? 'currentColor' : 'none' }}"
                    stroke="currentColor" 
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" 
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
            </button>
        @endif

        {{-- Status Badge --}}
        @if($status)
            <div class="absolute bottom-3 left-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $status == 'Available' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200' }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ $status == 'Available' ? 'bg-green-500' : 'bg-red-500' }} mr-1.5"></span>
                    {{ $status }}
                </span>
            </div>
        @endif
        <div class="absolute inset-0" onclick="window.location.href='{{ $detailUrl }}'"></div>
    </div>

    {{-- Content Section --}}
    <div class="p-5 flex-grow flex flex-col justify-between space-y-4">
        {{-- Title and Description --}}
        <div class="space-y-2">
            <h3 class="text-xl font-bold text-gray-900 line-clamp-1 group-hover:text-blue-600 transition-colors duration-200">
                {{ $title }}
            </h3>
            <p class="text-sm text-gray-600 line-clamp-2 leading-relaxed">{{ $desc }}</p>
        </div>

        {{-- Price Section --}}
        <div class="space-y-3">
            @isset($price)
                <div class="space-y-1">
                    <p class="text-2xl font-bold bg-gradient-to-r from-yellow-500 to-orange-500 bg-clip-text text-transparent">
                        Rp{{$price}}
                    </p>
                    @if(!empty($harga_points))
                        <p class="text-sm font-medium text-blue-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            {{ number_format($harga_points) }} Poin
                        </p>
                    @endif
                </div>
            @endisset

            {{-- Footer Info --}}
            <div class="flex items-center justify-between pt-2">
                @if(!empty($bank))
                    <p class="text-sm text-blue-600 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        {{ $bank }}
                    </p>
                @endif
                
                @if($showLike)
                    <span class="text-sm text-red-400 flex items-center font-medium" id="like-count-{{ $productId }}">
                        <svg class="w-4 h-4 mr-1 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                        <span class="like-count-number">{{ $suka }}</span>
                    </span>
                @endif
            </div>
        </div>
    </div>

    {{-- Hover Effect Indicator --}}
    <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-green-500 to-emerald-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
    
    {{-- Custom Slot Content (if provided) --}}
    @if(!$slot->isEmpty())
        <div class="p-5 pt-0 mt-auto" onclick="event.stopPropagation();">
            {{ $slot }}
        </div>
    @endif
</div>

{{-- Add this CSS to your app.css or in a style tag --}}
<style>
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
<script>
function toggleLike(productId) {
    fetch(`/product/${productId}/like`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
    })
    .then(res => res.json())
    .then(data => {
        // Tidak ada notifikasi, hanya update UI jika perlu
    })
    .catch(() => {
        // Tidak ada notifikasi
    });
}
</script>