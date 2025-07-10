@props(['comment', 'level' => 0])

@php
    $userName = optional($comment->user)->nama ?? 'Pengguna';
@endphp

{{-- Wrapper untuk satu komentar dan semua balasannya --}}
<div class="flex flex-col" id="comment-{{ $comment->feedback_id }}">
    {{-- Konten Komentar Utama --}}
    <div class="flex items-start space-x-3 p-4 rounded-lg relative {{ $level > 0 ? 'bg-gray-50' : 'bg-white' }}">
        @if($level > 0)
            {{-- Garis vertikal reply ala Reddit --}}
            <div class="absolute left-0 top-4 bottom-4 w-3 flex justify-center z-0">
                <div class="h-full w-1 rounded bg-green-400"></div>
            </div>
        @endif
        {{-- Gunakan nama pengguna atau fallback jika user sudah dihapus --}}
        <img src="https://ui-avatars.com/api/?name={{ urlencode($userName) }}&background=random" alt="Avatar" class="w-10 h-10 rounded-full z-10">
        <div class="flex-1 z-10">
            <div class="flex items-center justify-between">
                <div>
                    <span class="font-semibold text-gray-800">{{ $userName }}</span>
                    <span class="text-xs text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <p class="text-gray-700 mt-1">{{ $comment->komentar }}</p>
            
            {{-- Tombol Balas --}}
            @auth
                <button onclick="toggleReplyForm('{{ $comment->feedback_id }}')" class="text-sm font-semibold text-green-600 hover:underline mt-2">
                    Balas
                </button>
            @endauth
        </div>
    </div>

    {{-- Form Balasan (Hidden by default) --}}
    @auth
    <div id="reply-form-{{ $comment->feedback_id }}" class="hidden pl-16 mt-2">
        <form action="{{ route('feedback.store', $comment->artikel_id) }}" method="POST">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $comment->feedback_id }}">
            <textarea name="komentar" rows="2" class="w-full p-2 text-sm bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Tulis balasan..."></textarea>
            <div class="text-right mt-2">
                <button type="button" onclick="toggleReplyForm('{{ $comment->feedback_id }}')" class="text-sm text-gray-600 mr-2">Batal</button>
                <button type="submit" class="bg-green-600 text-white text-sm font-semibold px-4 py-1.5 rounded-md hover:bg-green-700">Kirim</button>
            </div>
        </form>
    </div>
    @endauth

    {{-- Render Balasan (Rekursif) --}}
    @if($comment->replies->isNotEmpty())
    <div class="pl-8 border-l-2 border-gray-200 ml-5 mt-3 space-y-3">
        @foreach($comment->replies as $reply)
            <x-artikel.comment-thread :comment="$reply" :level="$level + 1" />
        @endforeach
    </div>
    @endif
</div> 