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
                        <a href="#" class="text-blue-600 hover:text-blue-900">Detail</a>
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
</script>