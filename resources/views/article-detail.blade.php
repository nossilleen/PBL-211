@extends('layouts.app')

@section('content')
<x-home.navbar />
<div class="bg-gray-100 min-h-screen pt-6 font-['Lexend Deca',_sans-serif]">
    <div class="max-w-6xl mx-auto px-2 md:px-0">
        {{-- Gambar Utama Artikel --}}
        <div class="bg-white rounded-lg shadow mb-6 overflow-hidden">
            <img src="{{ asset($artikel->gambar->first()->file_path ?? 'images/default.jpg') }}" alt="Hero Artikel" class="w-full h-auto object-cover">
            <div class="flex items-center justify-between px-4 py-2 border-b">
                <div class="flex items-center space-x-2 text-xs text-gray-600">
                    <span>{{ $artikel->user->nama ?? 'Penulis Tidak Diketahui' }}</span>
                    <span>|</span>
                    <span>{{ $artikel->tanggal_publikasi->format('d M Y') }}</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span>❤️</span>
                    <span>{{ $artikel->likes_count ?? 0 }}</span>
                    <span>💬</span>
                    <span>{{ $artikel->feedback->count() }}</span>
                </div>
            </div>
        </div>

        {{-- Judul --}}
        <h1 class="text-3xl md:text-4xl font-bold text-center mb-4">
            {{ $artikel->judul }}
        </h1>

        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Konten Artikel --}}
            <div class="flex-1">
                <p class="text-lg mb-4">
                    {!! nl2br(e($artikel->konten)) !!}
                </p>

                {{-- Form Feedback --}}
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-2 rounded mb-2">
                        {{ session('success') }}
                    </div>
                @endif

                @auth
                <form action="{{ route('feedback.store', $artikel->artikel_id) }}" method="POST" class="mb-4">
                    @csrf
                    <textarea name="komentar" rows="3" class="w-full border rounded p-2 mb-2" placeholder="Tulis feedback Anda...">{{ old('komentar') }}</textarea>
                    @error('komentar')
                        <div class="text-red-500 text-xs mb-2">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Kirim</button>
                </form>
                @else
                    <div class="mb-4 text-sm text-gray-600">Silakan <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> untuk memberi feedback.</div>
                @endauth

                {{-- List Feedback (3 terbaru, sisanya hidden) --}}
                <div class="mt-6">
                    <h3 class="font-semibold mb-2">Feedback</h3>
                    @php $count = 0; @endphp
                    @forelse($artikel->feedback as $fb)
                        <div class="border-b py-2 {{ $count >= 3 ? 'hidden extra-feedback' : '' }}">
                            <div class="text-sm font-medium">{{ $fb->user->nama ?? 'User' }}</div>
                            <div class="text-xs text-gray-500">{{ $fb->created_at->format('d M Y H:i') }}</div>
                            <div class="mt-1">{{ $fb->komentar }}</div>
                        </div>
                        @php $count++; @endphp
                    @empty
                        <div class="text-gray-500 text-sm">Belum ada feedback.</div>
                    @endforelse

                    @if($artikel->feedback->count() > 3)
                        <div class="mt-2">
                            <button id="showMoreFeedback" class="text-blue-600 underline text-sm">Lihat feedback lainnya</button>
                        </div>
                    @endif
                </div>
            </div>

            {{-- You may also like --}}
            <aside class="w-full lg:w-80">
                <div class="bg-white rounded-xl shadow p-4 mb-4">
                    <h3 class="font-semibold mb-3">Anda mungkin juga menyukainya</h3>
                    <ul class="space-y-3">
                        @foreach($relatedArticles as $related)
                        <li class="flex space-x-3">
                            <a href="{{ route('artikel.show', $related->artikel_id) }}" class="flex items-center space-x-3">
                                <img src="{{ $related->gambar->first()->file_path ?? '/images/default.jpg' }}" class="w-16 h-16 object-cover rounded" alt="{{ $related->judul }}">
                                <div>
                                    <div class="font-medium text-sm">{{ $related->judul }}</div>
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
<x-home.footer />

{{-- Script untuk show/hide feedback --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('showMoreFeedback');
    if(btn){
        btn.addEventListener('click', function() {
            document.querySelectorAll('.extra-feedback').forEach(function(el){
                el.classList.remove('hidden');
            });
            btn.style.display = 'none';
        });
    }
});
</script>
@endsection