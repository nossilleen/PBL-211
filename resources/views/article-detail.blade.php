@extends('layouts.app')

@section('content')
<x-home.navbar />
<div class="bg-gray-100 min-h-screen pt-6 font-['Lexend Deca',_sans-serif] text-gray-800">
    <div class="max-w-6xl mx-auto px-4 md:px-6">

        {{-- Gambar Utama Artikel --}}
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition mb-8 overflow-hidden">
            <img src="{{ asset($artikel->gambar->first()->file_path ?? 'images/default.jpg') }}" alt="Hero Artikel" class="w-full h-auto object-cover">
            <div class="flex items-center justify-between px-6 py-3 border-b">
                <div class="flex items-center space-x-2 text-xs text-gray-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.5 3.5l4 4L8 20H4v-4L16.5 3.5z" />
    </svg>
    <span>{{ $artikel->user->nama ?? 'Penulis Tidak Diketahui' }}</span>
    <span>|</span>
    <span>{{ $artikel->tanggal_publikasi->format('d M Y') }}</span>
</div>

                <div class="flex items-center space-x-3 text-sm text-gray-600">
    @php
    $liked = $artikel->likes->contains('user_id', auth()->id());
@endphp



    {{-- Tombol Like --}}
    <button type="button" onclick="toggleLikeArtikel({{ $artikel->artikel_id }});"
        class="inline-flex items-center bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-medium space-x-2 hover:bg-blue-200 transition">
        <svg id="heart-article-{{ $artikel->artikel_id }}" xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 {{ $liked ? 'text-red-500' : 'text-gray-500' }}"
             fill="{{ $liked ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 
                     2 6.01 4.01 4 6.5 4c1.74 0 3.41 1.01 4.13 2.44h1.74C14.09 5.01 
                     15.76 4 17.5 4 19.99 4 22 6.01 22 8.5c0 3.78-3.4 6.86-8.55 
                     11.54L12 21.35z" />
        </svg>
        <span id="like-count-article-{{ $artikel->artikel_id }}">{{ $artikel->likes()->count() }}</span>
    </button>



    {{-- Tombol Komentar --}}
    <a href="#feedback-section"
        class="inline-flex items-center bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-medium space-x-2 hover:bg-blue-200 transition scroll-smooth">
<span class="text-xl leading-none">💬</span>
        <span>{{ $artikel->feedback_count }}</span>
    </a>
</div>

            </div>
        </div>

        {{-- Judul --}}
        <h1 class="text-3xl md:text-4xl font-bold text-center mb-8 drop-shadow-sm">
            {{ $artikel->judul }}
        </h1>

        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Konten --}}
            <div class="flex-1">
                <div class="prose prose-lg max-w-none mb-10">
                    {!! nl2br(e($artikel->konten)) !!}
                </div>

                {{-- Notifikasi Feedback --}}
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4 border border-green-300">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Form Feedback --}}
                @auth
                <form action="{{ route('feedback.store', $artikel->artikel_id) }}" method="POST" class="mb-10 bg-white border border-gray-300 rounded-xl shadow-md p-6">
                    @csrf
                    <textarea id="komentarInput" name="komentar" rows="4" maxlength="500"
                        class="w-full p-4 text-base bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400"
                        placeholder="Apa pendapatmu tentang artikel ini?">{{ old('komentar') }}</textarea>
                    @error('komentar')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                    <div id="char-count" class="text-right text-xs text-gray-400 mt-1">500 karakter tersisa</div>
                    <button type="submit"
    class="mt-3 bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md transition">
    Kirim Feedback
</button>

                </form>
                @else
                    <div class="mb-8 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg p-4">
                        Untuk memberikan feedback, silakan <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> terlebih dahulu.
                    </div>
                @endauth

                {{-- Sorting Feedback --}}
                <div class="mb-6 flex items-center space-x-2" x-data="{ open: false, selected: '{{ request('sort', 'terbaru') }}' }">
    <label class="text-sm font-medium">Lihat Berdasarkan:</label>
    <div class="relative w-44">
        <button type="button" @click="open = !open"
            class="w-full bg-white border border-gray-300 px-3 py-2 rounded-xl shadow-sm text-left focus:outline-none focus:ring-2 focus:ring-green-500 flex items-center justify-between text-sm">
            <span x-text="selected === 'terbaru' ? 'Terbaru' : 'Terlama'" class="truncate"></span>
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             @click.away="open = false"
             class="absolute z-50 mt-2 w-full bg-white border border-gray-200 rounded-xl shadow-xl overflow-hidden"
             x-cloak>
            <form method="GET" action="{{ route('artikel.show', $artikel->artikel_id) }}">
                <input type="hidden" name="sort" value="terbaru">
                <button type="submit" @click="selected = 'terbaru'; open = false"
                    class="w-full text-left px-4 py-2 text-sm hover:bg-green-100 text-gray-700 transition"
                    :class="selected === 'terbaru' ? 'bg-green-500 text-white font-semibold' : ''">
                    Terbaru
                </button>
            </form>
            <form method="GET" action="{{ route('artikel.show', $artikel->artikel_id) }}">
                <input type="hidden" name="sort" value="terlama">
                <button type="submit" @click="selected = 'terlama'; open = false"
                    class="w-full text-left px-4 py-2 text-sm hover:bg-green-100 text-gray-700 transition"
                    :class="selected === 'terlama' ? 'bg-green-500 text-white font-semibold' : ''">
                    Terlama
                </button>
            </form>
        </div>
    </div>
</div>


                {{-- Daftar Feedback --}}
                <div class="mt-4 space-y-4" id="feedback-section">
                    <h3 class="text-2xl font-semibold mb-4 border-b pb-2 border-gray-200">💬 Komentar dari Pembaca ({{ $artikel->feedback_count }})</h3>
                    @forelse($artikel->feedback as $comment)
                        <x-artikel.comment-thread :comment="$comment" />
                    @empty
                        <p class="text-gray-500 text-center py-4">Belum ada komentar. Jadilah yang pertama!</p>
                    @endforelse
                </div>
            </div>

            {{-- Artikel Terkait --}}
            <aside class="w-full lg:w-80">
                <div class="bg-white rounded-xl shadow-md p-5">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 border-gray-200">📚 Anda Mungkin Menyukai</h3>
                    <ul class="space-y-3">
                        @foreach($relatedArticles as $related)
                        <li class="flex items-start space-x-3 hover:bg-gray-50 p-2 rounded-lg transition">
                            <a href="{{ route('artikel.show', $related->artikel_id) }}" class="flex space-x-3">
                                <img src="{{ $related->gambar->first()->file_path ?? '/images/default.jpg' }}" class="w-16 h-16 object-cover rounded" alt="{{ $related->judul }}">
                                <div>
                                    <div class="font-medium text-sm text-gray-800">{{ $related->judul }}</div>
                                    <div class="text-xs text-gray-500">{{ Str::limit(strip_tags($related->konten), 50) }}</div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</div>

<div class="mt-12">
  <x-home.footer />
</div>

{{-- Script --}}
<script>
function toggleReplyForm(commentId) {
    const form = document.getElementById('reply-form-' + commentId);
    if (form) {
        form.classList.toggle('hidden');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const textarea = document.getElementById('komentarInput');
    const counter = document.getElementById('char-count');
    const max = 500;

    if (textarea && counter) {
        textarea.addEventListener('input', function () {
            const sisa = max - this.value.length;
            counter.textContent = `${sisa} karakter tersisa`;
            counter.classList.toggle('text-red-500', sisa < 0);
        });
    }

    const showMoreBtn = document.getElementById('showMoreBtn');
    if (showMoreBtn) {
        showMoreBtn.addEventListener('click', function () {
            document.querySelectorAll('.extra-feedback').forEach(function (el) {
                el.classList.remove('hidden');
            });
            showMoreBtn.classList.add('hidden');
        });
    }
});
</script>

<script>
if (typeof toggleLikeArtikel === 'undefined') {
function toggleLikeArtikel(artikelId) {
    const heartIcon = document.getElementById(`heart-article-${artikelId}`);
    const likeCountEl = document.getElementById(`like-count-article-${artikelId}`);
    fetch(`/artikel/${artikelId}/like`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        credentials: 'same-origin'
    })
    .then(res => {
        if (res.status === 401) { window.location.href = '/login'; return null; }
        return res.json();
    })
    .then(data => {
        if (!data) return;
        if (data.isLiked) {
            heartIcon.classList.add('text-red-500');
            heartIcon.classList.remove('text-gray-500');
            heartIcon.setAttribute('fill','currentColor');
        } else {
            heartIcon.classList.remove('text-red-500');
            heartIcon.classList.add('text-gray-500');
            heartIcon.setAttribute('fill','none');
        }
        likeCountEl.textContent = data.suka;
    })
    .catch(console.error);
}
}
</script>
@endsection
