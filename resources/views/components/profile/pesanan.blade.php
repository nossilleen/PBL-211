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
                            <div class="h-12 w-12 flex-shrink-0">
                                <img class="h-12 w-12 rounded-md object-cover" src="{{ $pesanan->produk->gambar_utama ?? '/images/produk/default.jpg' }}" alt="{{ $pesanan->produk->nama_produk ?? 'Produk' }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $pesanan->produk->nama_produk ?? 'Produk' }}</div>
                                <div class="text-sm text-gray-500">{{ $pesanan->tanggal->format('d M Y') ?? '' }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-sm text-gray-900">{{ $pesanan->jumlah_produk ?? '1' }}</td>
                    <td class="py-4 px-4 text-sm text-gray-900">Rp{{ number_format($pesanan->harga_total ?? 0, 0, ',', '.') }}</td>
                    <td class="py-4 px-4 text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $pesanan->pay_method == 'poin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $pesanan->pay_method == 'poin' ? 'Poin' : 'Transfer' }}
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        @php
                            $statusClass = [
                                'belum dibayar' => 'bg-red-100 text-red-800',
                                'menunggu konfirmasi' => 'bg-yellow-100 text-yellow-800',
                                'sedang dikirim' => 'bg-blue-100 text-blue-800',
                                'selesai' => 'bg-green-100 text-green-800',
                                'dibatalkan' => 'bg-gray-100 text-gray-800'
                            ];
                            $status = $pesanan->status ?? 'belum dibayar';
                            $statusText = ucwords($status);
                        @endphp
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass[$status] ?? 'bg-gray-100 text-gray-800' }}">
                            {{ $statusText }}
                        </span>
                    </td>
                    <td class="py-4 px-4 text-sm font-medium">
                        @if($pesanan->status == 'belum dibayar' && $pesanan->pay_method == 'transfer')
                        <button type="button" onclick="openUploadModal('{{ $pesanan->transaksi_id }}')" class="text-green-600 hover:text-green-900 mr-3">Upload Bukti</button>
                        @endif
                        <a href="#" class="text-blue-600 hover:text-blue-900">Detail</a>
                    </td>
                </tr>
                @endforeach

                <!-- Contoh Pesanan 1: Belum Dibayar (Transfer) -->
                <tr>
                    <td class="py-4 px-4">
                        <div class="flex items-center">
                            <div class="h-12 w-12 flex-shrink-0">
                                <img class="h-12 w-12 rounded-md object-cover" src="/images/produk/default.jpg" alt="Eco-Friendly Tote Bag">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Eco-Friendly Tote Bag</div>
                                <div class="text-sm text-gray-500">{{ now()->format('d M Y') }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-sm text-gray-900">2</td>
                    <td class="py-4 px-4 text-sm text-gray-900">Rp150.000</td>
                    <td class="py-4 px-4 text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            Transfer
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Belum Dibayar
                        </span>
                    </td>
                    <td class="py-4 px-4 text-sm font-medium">
                        <button type="button" onclick="openUploadModal('TRX-001')" class="text-green-600 hover:text-green-900 mr-3">Upload Bukti</button>
                        <a href="#" class="text-blue-600 hover:text-blue-900">Detail</a>
                    </td>
                </tr>

                <!-- Contoh Pesanan 2: Belum Dibayar (Poin) -->
                <tr>
                    <td class="py-4 px-4">
                        <div class="flex items-center">
                            <div class="h-12 w-12 flex-shrink-0">
                                <img class="h-12 w-12 rounded-md object-cover" src="/images/produk/default.jpg" alt="Tempat Sampah Pilah">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Tempat Sampah Pilah</div>
                                <div class="text-sm text-gray-500">{{ now()->format('d M Y') }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-sm text-gray-900">1</td>
                    <td class="py-4 px-4 text-sm text-gray-900">Rp275.000</td>
                    <td class="py-4 px-4 text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                            Poin
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Belum Dibayar
                        </span>
                    </td>
                    <td class="py-4 px-4 text-sm font-medium">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Detail</a>
                    </td>
                </tr>

                <!-- Contoh Pesanan 3: Menunggu Konfirmasi (Transfer) -->
                <tr>
                    <td class="py-4 px-4">
                        <div class="flex items-center">
                            <div class="h-12 w-12 flex-shrink-0">
                                <img class="h-12 w-12 rounded-md object-cover" src="/images/produk/default.jpg" alt="Eco Enzyme Pembersih Lantai">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Eco Enzyme Pembersih Lantai</div>
                                <div class="text-sm text-gray-500">{{ now()->subDays(1)->format('d M Y') }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-sm text-gray-900">3</td>
                    <td class="py-4 px-4 text-sm text-gray-900">Rp125.000</td>
                    <td class="py-4 px-4 text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            Transfer
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Menunggu Konfirmasi
                        </span>
                    </td>
                    <td class="py-4 px-4 text-sm font-medium">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Detail</a>
                    </td>
                </tr>

                <!-- Contoh Pesanan 4: Sedang Dikirim (Transfer) -->
                <tr>
                    <td class="py-4 px-4">
                        <div class="flex items-center">
                            <div class="h-12 w-12 flex-shrink-0">
                                <img class="h-12 w-12 rounded-md object-cover" src="/images/produk/default.jpg" alt="Paket Eco Enzyme Lengkap">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Paket Eco Enzyme Lengkap</div>
                                <div class="text-sm text-gray-500">{{ now()->subDays(3)->format('d M Y') }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-sm text-gray-900">1</td>
                    <td class="py-4 px-4 text-sm text-gray-900">Rp350.000</td>
                    <td class="py-4 px-4 text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            Transfer
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            Sedang Dikirim
                        </span>
                    </td>
                    <td class="py-4 px-4 text-sm font-medium">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Detail</a>
                    </td>
                </tr>

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