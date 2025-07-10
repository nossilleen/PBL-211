@extends('pengelola.layout')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Transaksi Toko Anda</h1>
    @if($riwayatTransaksi->isEmpty())
        <div class="bg-white p-6 rounded shadow text-center text-gray-500">
            Belum ada riwayat transaksi untuk toko Anda.
        </div>
    @else
        <div class="bg-white rounded shadow overflow-x-auto ajax-pagination">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pembeli</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($riwayatTransaksi as $trx)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $trx->formatted_tanggal }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $trx->produk->nama_produk ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $trx->user->nama ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $trx->jumlah_produk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                @if($trx->isUsingPoints())
                                    {{ $trx->poin_used }} Poin
                                @else
                                    Rp {{ number_format($trx->harga_total, 0, ',', '.') }}
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $trx->status_label }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination custom --}}
            @if ($riwayatTransaksi->hasPages())
            <div class="bg-white rounded-xl shadow-sm border-t border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div class="hidden sm:block">
                        <p class="text-sm text-gray-700">
                            Menampilkan
                            <span class="font-semibold text-gray-900">{{ $riwayatTransaksi->firstItem() }}</span>
                            sampai
                            <span class="font-semibold text-gray-900">{{ $riwayatTransaksi->lastItem() }}</span>
                            dari
                            <span class="font-semibold text-gray-900">{{ $riwayatTransaksi->total() }}</span>
                            transaksi
                        </p>
                    </div>

                    <div class="flex items-center space-x-2">
                        {{-- Prev Button --}}
                        @if ($riwayatTransaksi->onFirstPage())
                            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-50 border border-gray-300 rounded-lg cursor-not-allowed">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                                Sebelumnya
                            </span>
                        @else
                            <a href="{{ $riwayatTransaksi->previousPageUrl() }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                                Sebelumnya
                            </a>
                        @endif

                        {{-- Page numbers with ellipsis (max 7) --}}
                        <div class="hidden md:flex items-center space-x-1">
                            @php
                                $current = $riwayatTransaksi->currentPage();
                                $last    = $riwayatTransaksi->lastPage();
                                $start   = max(1, $current - 3);
                                $end     = min($last, $start + 6);
                                if (($end - $start) < 6) {
                                    $start = max(1, $end - 6);
                                }
                            @endphp

                            @if ($start > 1)
                                <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-gray-50 border border-gray-300 rounded-lg select-none">…</span>
                            @endif

                            @for ($i = $start; $i <= $end; $i++)
                                @if ($i == $current)
                                    <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-green-600 rounded-lg">{{ $i }}</span>
                                @else
                                    <a href="{{ $riwayatTransaksi->url($i) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">{{ $i }}</a>
                                @endif
                            @endfor

                            @if ($end < $last)
                                <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-gray-50 border border-gray-300 rounded-lg select-none">…</span>
                            @endif
                        </div>

                        {{-- Next Button --}}
                        @if ($riwayatTransaksi->hasMorePages())
                            <a href="{{ $riwayatTransaksi->nextPageUrl() }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                                Berikutnya
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </a>
                        @else
                            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-50 border border-gray-300 rounded-lg cursor-not-allowed">
                                Berikutnya
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    @endif
</div>
@endsection
