@props(['images', 'productName'])

<div class="product-image-slider relative">
    <!-- Main Image Container -->
    <div class="relative bg-gray-100 rounded-lg overflow-hidden shadow-sm">
        <div id="mainImageContainer" class="relative">
            @if($images && count($images) > 0)
                <img id="mainImage" src="{{ asset('storage/' . $images[0]->file_path) }}" 
                     alt="{{ $productName }}" 
                     class="w-full h-auto object-cover transition-opacity duration-300">
            @else
                <img id="mainImage" src="{{ asset('images/default-product.jpg') }}" 
                     alt="{{ $productName }}" 
                     class="w-full h-auto object-cover">
            @endif
            
            <!-- Navigation Arrows -->
            @if($images && count($images) > 1)
                <button id="prevBtn" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow-lg transition-all duration-200 z-10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button id="nextBtn" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow-lg transition-all duration-200 z-10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            @endif
        </div>
    </div>

    <!-- Thumbnail Navigation -->
    @if($images && count($images) > 1)
        <div class="mt-4 flex gap-2 overflow-x-auto pb-2">
            @foreach($images as $index => $image)
                <button class="thumbnail-btn flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden border-2 transition-all duration-200 {{ $index === 0 ? 'border-green-500' : 'border-gray-300 hover:border-green-400' }}"
                        data-index="{{ $index }}"
                        onclick="changeImage({{ $index }})">
                    <img src="{{ asset('storage/' . $image->file_path) }}" 
                         alt="{{ $productName }} - Image {{ $index + 1 }}" 
                         class="w-full h-full object-cover">
                </button>
            @endforeach
        </div>
    @endif
</div>

<script>
let currentImageIndex = 0;
const images = @json($images ? $images->map(function($img) { return $img->file_path; })->toArray() : []);
const totalImages = images.length;

function changeImage(index) {
    if (index < 0 || index >= totalImages) return;
    
    currentImageIndex = index;
    const mainImage = document.getElementById('mainImage');
    const thumbnailBtns = document.querySelectorAll('.thumbnail-btn');
    
    // Update main image
    mainImage.src = `/storage/${images[index]}`;
    mainImage.style.opacity = '0';
    setTimeout(() => {
        mainImage.style.opacity = '1';
    }, 150);
    
    // Update thumbnail selection
    thumbnailBtns.forEach((btn, i) => {
        if (i === index) {
            btn.classList.remove('border-gray-300', 'hover:border-green-400');
            btn.classList.add('border-green-500');
        } else {
            btn.classList.remove('border-green-500');
            btn.classList.add('border-gray-300', 'hover:border-green-400');
        }
    });
}

function nextImage() {
    const nextIndex = (currentImageIndex + 1) % totalImages;
    changeImage(nextIndex);
}

function prevImage() {
    const prevIndex = (currentImageIndex - 1 + totalImages) % totalImages;
    changeImage(prevIndex);
}

// Event listeners for navigation buttons
document.addEventListener('DOMContentLoaded', function() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    if (prevBtn) {
        prevBtn.addEventListener('click', prevImage);
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', nextImage);
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (totalImages <= 1) return;
        
        if (e.key === 'ArrowLeft') {
            prevImage();
        } else if (e.key === 'ArrowRight') {
            nextImage();
        }
    });
});
</script> 