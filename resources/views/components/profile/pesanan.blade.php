<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold text-green-700 mb-4">Pesanan Aktif</h2>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Produk</th>
                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Jumlah</th>
                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Total</th>
                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Metode</th>
                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Status</th>
                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($pesananAktif ?? [] as $pesanan)
                <tr>
                    <td class="py-4 px-4">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img 
                                    class="h-10 w-10 rounded object-cover border border-gray-200"
                                    src="{{ $pesanan->produk && $pesanan->produk->gambar && $pesanan->produk->gambar->first() ? asset('storage/' . $pesanan->produk->gambar->first()->file_path) : asset('/images/produk/default.jpg') }}"
                                    alt="{{ $pesanan->produk->nama_produk ?? 'Produk' }}"
                                    onerror="this.onerror=null;this.src='{{ asset('/images/produk/default.jpg') }}';"
                                />
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ $pesanan->produk->nama_produk ?? 'Produk' }}</div>
                                <div class="text-xs text-gray-500">{{ $pesanan->tanggal->format('d M Y') ?? '' }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-sm text-gray-900">{{ $pesanan->jumlah_produk ?? '1' }}</td>
                    <td class="py-4 px-4 text-sm text-gray-900">
                        @if($pesanan->pay_method == 'poin')
                            {{ number_format($pesanan->poin_used, 0, ',', '.') }} Poin
                        @else
                            Rp{{ number_format($pesanan->harga_total ?? 0, 0, ',', '.') }}
                        @endif
                    </td>
                    <td class="py-4 px-4 text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $pesanan->pay_method == 'poin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $pesanan->pay_method == 'poin' ? 'Poin' : 'Transfer' }}
                        </span>
                    </td>
                    <td class="py-4 px-4 align-middle">
                        @php
                            $statusClass = [
                                'belum dibayar' => 'bg-red-100 text-red-800',
                                'menunggu konfirmasi' => 'bg-yellow-100 text-yellow-800',
                                'diproses' => 'bg-amber-100 text-amber-800',
                                'sedang dikirim' => 'bg-blue-100 text-blue-800',
                                'selesai' => 'bg-green-100 text-green-800',
                                'dibatalkan' => 'bg-gray-100 text-gray-800'
                            ];
                            $status = $pesanan->status ?? 'belum dibayar';
                            $statusText = ucwords($status);
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass[$status] ?? 'bg-gray-100 text-gray-800' }} whitespace-nowrap">
                            {{ $statusText }}
                            @if($status == 'diproses' && $pesanan->estimasi_hari)
                                <span>(Sisa {{ (int) $pesanan->sisa_hari }} / {{ $pesanan->estimasi_hari }} hari)</span>
                            @elseif($status == 'sedang dikirim')
                            @endif
                        </span>
                    </td>
                    <td class="py-4 px-4 text-sm font-medium">
                        <div class="flex flex-wrap gap-2">
                            @if($pesanan->status == 'belum dibayar' && $pesanan->pay_method == 'transfer')
                                <button type="button" 
                                    onclick="openUploadModal('{{ $pesanan->transaksi_id }}')" 
                                    class="inline-flex items-center px-3 py-1.5 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition-colors duration-150 min-w-[120px]">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                    </svg>
                                    Upload Bukti
                                </button>
                            @elseif($pesanan->pay_method != 'poin')
                                <button type="button"
                                    onclick="showDetailModal('{{ $pesanan->bukti_transfer }}')"
                                    class="inline-flex items-center px-3 py-1.5 border border-gray-300 bg-gray-50 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-100 transition-colors duration-150 min-w-[120px]">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat Detail
                                </button>
                            @endif

                            @if($pesanan->status == 'belum dibayar')
                                <form method="POST" action="{{ route('transaksi.cancel', $pesanan->transaksi_id) }}" onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?');">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-500 text-white text-sm font-medium rounded-md hover:bg-red-600 transition-colors duration-150 min-w-[120px]">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Batalkan
                                    </button>
                                </form>
                            @endif

                            @if($pesanan->status == 'sedang dikirim')
                                <form method="POST" action="{{ route('transaksi.complete', $pesanan->transaksi_id) }}" onsubmit="return confirm('Pesanan sudah diterima dan selesai?');">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition-colors duration-150 min-w-[120px]">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Tandai Selesai
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach

                @if(empty($pesananAktif) || count($pesananAktif) == 0)
                <tr>
                    <td colspan="6" class="py-6 px-4 text-center text-gray-500">
                        Tidak ada pesanan aktif saat ini
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>


<!-- Add this modal at the top of your file -->
<div id="buktiModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Bukti Transfer
                </h3>
                <button type="button" onclick="closeBuktiModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <img id="modalImage" src="" alt="Bukti Transfer" class="w-full">
            </div>
        </div>
    </div>
</div>

<!-- Replace your existing JavaScript with this -->
<script>
function showDetailModal(transaksiId) {
    const modal = document.getElementById('buktiModal');
    const modalImage = document.getElementById('modalImage');
    modalImage.src = `/storage/${transaksiId}`;
    modal.classList.remove('hidden');
}

function closeBuktiModal() {
    const modal = document.getElementById('buktiModal');
    modal.classList.add('hidden');
}

// Close on background click
document.addEventListener('click', function(event) {
    const modal = document.getElementById('buktiModal');
    if (event.target === modal) {
        closeBuktiModal();
    }
});
</script>