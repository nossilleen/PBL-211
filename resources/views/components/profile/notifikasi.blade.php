{{-- Komponen Notifikasi --}}
@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|null $notifications */
@endphp

<div class="bg-white rounded-lg shadow-md p-6">
    <div class="notifikasi space-y-4">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800 flex items-center justify-between">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                Notifikasi
            </div>
            @if(isset($notifications) && $notifications->count() > 0)
                <button id="delete-all-notif" class="text-sm text-red-600 hover:text-red-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Hapus Semua
                </button>
            @endif
        </h2>

        @if(!isset($notifications) || $notifications->count() === 0)
            <p class="text-center text-gray-500 py-8">Tidak ada notifikasi.</p>
        @else
            @foreach($notifications as $notif)
                <a href="{{ $notif->url ?? '#' }}" class="block rounded-lg border border-gray-200 hover:border-green-500 transition shadow-sm p-4 {{ $notif->read_at ? 'bg-white' : 'bg-green-50' }} relative group">
                    <div class="flex items-start space-x-3">
                        {{-- Icon berdasarkan tipe --}}
                        @switch($notif->type)
                            @case('transaksi')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m0 0L3 10m6-7l6 7" />
                                </svg>
                                @break
                            @case('artikel')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                @break
                            @case('event')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                @break
                            @default
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                        @endswitch

                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <p class="font-medium text-gray-800">{{ $notif->title }}</p>
                                @if(!$notif->read_at)
                                    <span class="inline-block w-2 h-2 rounded-full bg-green-500 mt-1"></span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 mt-1">{{ $notif->message }}</p>
                            <p class="text-xs text-gray-400 mt-2">{{ $notif->created_at->diffForHumans() }}</p>
                        </div>
                        <button data-delete="{{ $notif->id }}" class="delete-notif opacity-0 group-hover:opacity-100 text-gray-400 hover:text-red-600 ml-2" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </a>
            @endforeach

            {{-- Pagination custom --}}
            @if($notifications->lastPage() > 1)
            <div class="pt-6 flex justify-center">
                <ul class="flex border border-gray-300 rounded-md overflow-hidden bg-white text-sm">
                    {{-- Previous Page Link --}}
                    @if ($notifications->onFirstPage())
                        <li>
                            <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white border-r border-gray-300 cursor-not-allowed select-none">Sebelumnya</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $notifications->previousPageUrl() }}" rel="prev" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">Sebelumnya</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($notifications->getUrlRange(1, $notifications->lastPage()) as $page => $url)
                        @if ($page == $notifications->currentPage())
                            <li>
                                <span class="px-4 py-1.5 h-9 flex items-center font-bold text-white bg-green-600 border-r border-gray-300">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($notifications->hasMorePages())
                        <li>
                            <a href="{{ $notifications->nextPageUrl() }}" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
                        </li>
                    @else
                        <li>
                            <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white cursor-not-allowed select-none">Selanjutnya</span>
                        </li>
                    @endif
                </ul>
            </div>
            @endif
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let csrf = '{{ csrf_token() }}';
        const meta = document.querySelector('meta[name="csrf-token"]');
        if (meta) {
            csrf = meta.getAttribute('content');
        }

        // Hapus satu notifikasi
        document.querySelectorAll('.delete-notif').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                const id = this.dataset.delete;
                const parent = this.closest('a');

                fetch(`/nasabah/notifikasi/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    }
                }).then(res => {
                    if (res.ok) {
                        parent.remove();
                    }
                });
            });
        });

        // Hapus semua notifikasi
        const deleteAllBtn = document.getElementById('delete-all-notif');
        if (deleteAllBtn) {
            deleteAllBtn.addEventListener('click', function (e) {
                e.preventDefault();
                if (!confirm('Apakah Anda yakin ingin menghapus semua notifikasi?')) {
                    return;
                }
                fetch(`/nasabah/notifikasi`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrf,
                        'Accept': 'application/json'
                    }
                }).then(res => {
                    if (res.ok) {
                        document.querySelectorAll('.notifikasi a').forEach(el => el.remove());
                        // Sembunyikan tombol hapus semua setelah kosong
                        deleteAllBtn.remove();
                    }
                });
            });
        }
    });
</script>