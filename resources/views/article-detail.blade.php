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
@endsection