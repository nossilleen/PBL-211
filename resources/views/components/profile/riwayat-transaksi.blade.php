<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-xl font-semibold text-green-700 mb-4">Riwayat Transaksi</h2>
    
    <div class="mb-4">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-500">Filter:</span>
                <select id="status-filter" class="form-select text-sm border-gray-300 rounded-md focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                    <option value="all">Semua Status</option>
                    <option value="selesai">Selesai</option>
                    <option value="dibatalkan">Dibatalkan</option>
                </select>
            </div>
            <div class="relative">
                <input type="text" id="search-riwayat" placeholder="Cari produk..." class="form-input w-full md:w-60 pr-8 text-sm border-gray-300 rounded-md focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
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
                @foreach($riwayatTransaksi ?? [] as $transaksi)
                <tr>
                    <td class="py-4 px-4">
                        <div class="flex items-center">
                            <div class="h-12 w-12 flex-shrink-0">
                                <img class="h-12 w-12 rounded-md object-cover" src="{{ $transaksi->produk->gambar_utama ?? '/images/produk/default.jpg' }}" alt="{{ $transaksi->produk->nama_produk ?? 'Produk' }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $transaksi->produk->nama_produk ?? 'Produk' }}</div>
                                <div class="text-sm text-gray-500">{{ $transaksi->tanggal->format('d M Y') ?? '' }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-sm text-gray-900">{{ $transaksi->jumlah_produk ?? '1' }}</td>
                    <td class="py-4 px-4 text-sm text-gray-900">
                        @if($transaksi->pay_method == 'poin')
                            {{ number_format($transaksi->poin_used, 0, ',', '.') }} Poin
                        @else
                            Rp{{ number_format($transaksi->harga_total ?? 0, 0, ',', '.') }}
                        @endif
                    </td>
                    <td class="py-4 px-4 text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaksi->pay_method == 'poin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $transaksi->pay_method == 'poin' ? 'Poin' : 'Transfer' }}
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        @php
                            $statusClass = [
                                'selesai' => 'bg-green-100 text-green-800',
                                'dibatalkan' => 'bg-gray-100 text-gray-800'
                            ];
                            $status = $transaksi->status ?? 'selesai';
                            $statusText = ucwords($status);
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass[$status] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ $statusText }}
                        </span>
                    </td>
                    <td class="py-4 px-4 text-sm font-medium">
                        @if($transaksi->bukti_transfer)
                            <button type="button"
                                onclick="showDetailModal('{{ $transaksi->bukti_transfer }}')"
                                class="inline-flex items-center px-3 py-1.5 border border-gray-300 bg-gray-50 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-100 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat Detail
                            </button>
                        @endif
                    </td>
                </tr>
                @endforeach

                @if(empty($riwayatTransaksi) || count($riwayatTransaksi) == 0)
                <tr>
                    <td colspan="6" class="py-6 px-4 text-center text-gray-500">
                        Tidak ada riwayat transaksi
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter and search functionality for riwayat transaksi
        const statusFilter = document.getElementById('status-filter');
        const searchInput = document.getElementById('search-riwayat');
        
        if (statusFilter) {
            statusFilter.addEventListener('change', filterRiwayat);
        }
        
        if (searchInput) {
            searchInput.addEventListener('input', filterRiwayat);
        }
        
        function filterRiwayat() {
            const status = statusFilter.value;
            const searchTerm = searchInput.value.toLowerCase();
            const rows = document.querySelectorAll('#riwayat-section tbody tr');
            
            rows.forEach(row => {
                const statusCell = row.querySelector('td:nth-child(5) span');
                const productNameCell = row.querySelector('td:nth-child(1) .text-sm.font-medium');
                
                if (!statusCell || !productNameCell) return;
                
                const rowStatus = statusCell.textContent.trim().toLowerCase();
                const productName = productNameCell.textContent.trim().toLowerCase();
                
                const statusMatch = status === 'all' || rowStatus === status;
                const searchMatch = productName.includes(searchTerm);
                
                if (statusMatch && searchMatch) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }
    });

    function showDetailModal(buktiTransfer) {
        const modal = document.getElementById('buktiModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = `/storage/${buktiTransfer}`;
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