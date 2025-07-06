@props(['artikel'])
@php
    $icons = [
        'eco enzim' => '🧪',
        'bank sampah' => '♻',
        'tips dan trik' => '💡',
        'berita' => '📰',
    ];
    $kategori = strtolower($artikel->kategori);
    $icon = $icons[$kategori] ?? '📄';
    $isBaru = \Carbon\Carbon::parse($artikel->tanggal_publikasi)->diffInDays(now()) <= 7;
@endphp
<div class="bg-white rounded-xl shadow-lg hover:shadow-2xl overflow-hidden flex flex-col h-full min-h-[420px] relative group transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:scale-[1.02] cursor-pointer border border-gray-100">
    <div class="relative h-52 overflow-hidden">
        <img src="{{ asset($artikel->gambar->first()->file_path ?? 'images/default.jpg') }}" alt="{{ $artikel->judul }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        <a href="{{ route('artikel.index', ['kategori' => $kategori]) }}" class="absolute top-3 right-2 z-10 bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full shadow flex items-center gap-1 hover:bg-green-200">
            <span>{{ $icon }}</span>
            <span>{{ ucfirst($kategori) }}</span>
        </a>
        <button type="button" onclick="event.stopPropagation(); toggleLikeArtikel({{ $artikel->artikel_id }});" class="absolute top-2 left-3 z-10 flex items-center gap-1 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow hover:bg-white transition">
            <svg id="heart-article-{{ $artikel->artikel_id }}" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 {{ $artikel->isLikedBy(auth()->user()) ? 'text-red-500' : 'text-gray-400' }}" fill="{{ $artikel->isLikedBy(auth()->user()) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                         2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09
                         C13.09 3.81 14.76 3 16.5 3
                         19.58 3 22 5.42 22 8.5
                         c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
            </svg>
            <span id="like-count-article-{{ $artikel->artikel_id }}" class="text-xs text-gray-600 ml-1">{{ $artikel->likes->count() }} suka</span>
        </button>
        @if($isBaru)
            <span class="absolute top-3 left-1/2 -translate-x-1/2 bg-red-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg animate-bounce">Baru!</span>
        @endif
        <div class="absolute inset-0" onclick="window.location.href='{{ route('artikel.show', $artikel->artikel_id) }}'"></div>
    </div>
    <div class="p-5 flex-grow flex flex-col justify-between space-y-4">
        <div class="space-y-2">
            <h3 class="text-xl font-bold text-green-700 line-clamp-1 group-hover:text-green-800 transition-colors duration-200">
                <a href="{{ route('artikel.show', $artikel->artikel_id) }}">{{ $artikel->judul }}</a>
            </h3>
            <p class="text-sm text-gray-600 line-clamp-2 leading-relaxed">{{ Str::limit(strip_tags($artikel->konten), 100) }}</p>
        </div>
        <div class="flex items-center justify-between pt-2">
            <p class="text-xs text-gray-500 flex items-center">
                <span>{{ $artikel->user->nama ?? 'Penulis Tidak Diketahui' }}</span>
                <span class="mx-1">|</span>
                <span>{{ \Carbon\Carbon::parse($artikel->tanggal_publikasi)->format('d M Y') }}</span>
            </p>
            <a href="{{ route('artikel.show', $artikel->artikel_id) }}" class="text-green-600 hover:underline text-xs font-semibold">Baca Selengkapnya</a>
        </div>
    </div>
</div>
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
function toggleLikeArtikel(artikelId) {
    fetch(`/artikel/${artikelId}/like`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        credentials: 'same-origin'
    })
    .then(res => {
        if (res.status === 401) {
            window.location.href = '/login';
            return null;
        }
        return res.json();
    })
    .then(data => {
        if (!data) return;
        const heartIcon = document.getElementById(`heart-article-${artikelId}`);
        const likeCountEl = document.getElementById(`like-count-article-${artikelId}`);
        if (data.success) {
            if (data.isLiked) {
                heartIcon.classList.add('text-red-500');
                heartIcon.classList.remove('text-gray-400');
                heartIcon.setAttribute('fill', 'currentColor');
            } else {
                heartIcon.classList.remove('text-red-500');
                heartIcon.classList.add('text-gray-400');
                heartIcon.setAttribute('fill', 'none');
            }
            likeCountEl.textContent = data.suka + ' suka';
        }
    })
    .catch(err => console.error(err));
}
</script>
