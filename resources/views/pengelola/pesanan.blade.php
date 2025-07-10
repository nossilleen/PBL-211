@extends('pengelola.layout')

@section('title', 'Kelola Pesanan - Pengelola EcoZense')

@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Kelola Pesanan</h1>
                <p class="text-gray-600 mt-2">konfirmasi dan proses pesanan produk dari nasabah</p>
            </div>
            <div class="flex items-center space-x-3">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 px-4 py-2">
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-sm font-medium text-gray-700">Live Updates</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Enhanced Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <!-- Pesanan Baru Card -->
        <div class="relative bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 shadow-sm border border-blue-200 hover:shadow-md transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-blue-800">Pesanan Baru</h3>
                    </div>
                    <p class="text-3xl font-bold text-blue-700 mb-1">{{ $pesananBaru }}</p>
                    <p class="text-xs text-blue-600">Menunggu konfirmasi</p>
                </div>
                <div class="absolute top-4 right-4 opacity-20 group-hover:opacity-30 transition-opacity">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pesanan Diproses Card -->
        <div class="relative bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-6 shadow-sm border border-amber-200 hover:shadow-md transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="w-10 h-10 bg-amber-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-amber-800">Sedang Diproses</h3>
                    </div>
                    <p class="text-3xl font-bold text-amber-700 mb-1">{{ $sedangDiproses }}</p>
                    <p class="text-xs text-amber-600">Pesanan dalam proses</p>
                </div>
                <div class="absolute top-4 right-4 opacity-20 group-hover:opacity-30 transition-opacity">
                    <svg class="w-8 h-8 text-amber-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,6A1.5,1.5 0 0,1 13.5,7.5A1.5,1.5 0 0,1 12,9A1.5,1.5 0 0,1 10.5,7.5A1.5,1.5 0 0,1 12,6M12,20C10.1,20 8.4,19.1 7.2,17.8C7.2,16.2 10.3,15.3 12,15.3C13.7,15.3 16.8,16.2 16.8,17.8C15.6,19.1 13.9,20 12,20Z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Pesanan Dikirim Card -->
        <div class="relative bg-gradient-to-br from-sky-50 to-sky-100 rounded-xl p-6 shadow-sm border border-sky-200 hover:shadow-md transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="w-10 h-10 bg-sky-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-sky-800">Sedang Dikirim</h3>
                    </div>
                    <p class="text-3xl font-bold text-sky-700 mb-1">{{ $sedangDikirim }}</p>
                    <p class="text-xs text-sky-600">Dalam pengiriman</p>
                </div>
                <div class="absolute top-4 right-4 opacity-20 group-hover:opacity-30 transition-opacity">
                    <svg class="w-8 h-8 text-sky-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M21 8a2 2 0 00-2-2H7.414l-.707-.707A1 1 0 005.293 5H4a2 2 0 00-2 2v11a2 2 0 002 2h14a2 2 0 002-2V8z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pesanan Selesai Card -->
        <div class="relative bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl p-6 shadow-sm border border-emerald-200 hover:shadow-md transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-emerald-800">Pesanan Selesai</h3>
                    </div>
                    <p class="text-3xl font-bold text-emerald-700 mb-1">{{ $pesananSelesai }}</p>
                    <p class="text-xs text-emerald-600">Bulan ini</p>
                </div>
                <div class="absolute top-4 right-4 opacity-20 group-hover:opacity-30 transition-opacity">
                    <svg class="w-8 h-8 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,16.5L6.5,12L7.91,10.59L11,13.67L16.59,8.09L18,9.5L11,16.5Z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Pendapatan Card -->
        <div class="relative bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 shadow-sm border border-purple-200 hover:shadow-md transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-purple-800">Total Pendapatan</h3>
                    </div>
                    <p class="text-2xl font-bold text-purple-700 mb-1">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                    <p class="text-xs text-purple-600">Dari penjualan produk</p>
                </div>
                <div class="absolute top-4 right-4 opacity-20 group-hover:opacity-30 transition-opacity">
                    <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7,15H9C9,16.08 10.37,17 12,17C13.63,17 15,16.08 15,15C15,13.9 13.96,13.5 11.76,12.97C9.64,12.44 7,11.78 7,9C7,7.21 8.47,5.69 10.5,5.18V3H13.5V5.18C15.53,5.69 17,7.21 17,9H15C15,7.92 13.63,7 12,7C10.37,7 9,7.92 9,9C9,10.1 10.04,10.5 12.24,11.03C14.36,11.56 17,12.22 17,15C17,16.79 15.53,18.31 13.5,18.82V21H10.5V18.82C8.47,18.31 7,16.79 7,15Z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Filters & Tabs -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8">
        <div class="p-6">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <!-- Status Tabs -->
                <div class="flex bg-gray-50 p-1 rounded-lg">
                    <a href="{{ route('pengelola.pesanan', ['status' => 'menunggu konfirmasi', 'search' => request('search')]) }}" 
                       class="flex items-center space-x-2 py-2 px-4 rounded-md text-sm font-medium transition-all duration-200 {{ $status == 'menunggu konfirmasi' ? 'bg-white text-green-600 shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        <div class="w-2 h-2 bg-blue-500 rounded-full {{ $status == 'menunggu konfirmasi' ? 'animate-pulse' : '' }}"></div>
                        <span>Menunggu konfirmasi</span>
                        @if($status == 'menunggu konfirmasi')
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{ $pesananBaru }}</span>
                        @endif
                    </a>
                    <a href="{{ route('pengelola.pesanan', ['status' => 'diproses', 'search' => request('search')]) }}"
                       class="flex items-center space-x-2 py-2 px-4 rounded-md text-sm font-medium transition-all duration-200 {{ $status == 'diproses' ? 'bg-white text-green-600 shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        <div class="w-2 h-2 bg-amber-500 rounded-full {{ $status == 'diproses' ? 'animate-pulse' : '' }}"></div>
                        <span>Diproses</span>
                        @if($status == 'diproses')
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{ $sedangDiproses }}</span>
                        @endif
                    </a>

                    <!-- Tab Sedang Dikirim -->
                    <a href="{{ route('pengelola.pesanan', ['status' => 'sedang dikirim', 'search' => request('search')]) }}"
                       class="flex items-center space-x-2 py-2 px-4 rounded-md text-sm font-medium transition-all duration-200 {{ $status == 'sedang dikirim' ? 'bg-white text-green-600 shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        <div class="w-2 h-2 bg-blue-500 rounded-full {{ $status == 'sedang dikirim' ? 'animate-pulse' : '' }}"></div>
                        <span>Sedang Dikirim</span>
                        @if($status == 'sedang dikirim')
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{ $sedangDikirim ?? '' }}</span>
                        @endif
                    </a>
                    <a href="{{ route('pengelola.pesanan', ['status' => 'selesai', 'search' => request('search')]) }}"
                       class="flex items-center space-x-2 py-2 px-4 rounded-md text-sm font-medium transition-all duration-200 {{ $status == 'selesai' ? 'bg-white text-green-600 shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                        <span>Selesai</span>
                    </a>
                    <a href="{{ route('pengelola.pesanan', ['status' => 'dibatalkan', 'search' => request('search')]) }}"
                       class="flex items-center space-x-2 py-2 px-4 rounded-md text-sm font-medium transition-all duration-200 {{ $status == 'dibatalkan' ? 'bg-white text-green-600 shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                        <span>Dibatalkan</span>
                    </a>
                </div>
                
                <!-- Search -->
                <form method="GET" action="{{ route('pengelola.pesanan', ['status' => $status]) }}" class="flex items-center space-x-3">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Cari nama pembeli, produk, atau ID pesanan..." 
                               class="w-80 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Enhanced Order Cards -->
    <div class="ajax-pagination">
    <div class="space-y-6">
        @foreach($pesananMasuk as $pesanan)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-300">
            <!-- Header -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-3">
                            @php
                                $statusConfig = [
                                    'menunggu konfirmasi' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'dot' => 'bg-blue-500'],
                                    'diproses' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-800', 'dot' => 'bg-amber-500'],
                                    'sedang dikirim' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'dot' => 'bg-blue-500'],
                                    'selesai' => ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-800', 'dot' => 'bg-emerald-500'],
                                    'dibatalkan' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'dot' => 'bg-red-500']
                                ];
                                $config = $statusConfig[$pesanan->status] ?? $statusConfig['menunggu konfirmasi'];
                            @endphp
                            <div class="flex items-center space-x-2 px-3 py-1 {{ $config['bg'] }} rounded-full">
                                <div class="w-2 h-2 {{ $config['dot'] }} rounded-full {{ $pesanan->status == 'menunggu konfirmasi' ? 'animate-pulse' : '' }}"></div>
                                <span class="text-sm font-medium {{ $config['text'] }}">{{ ucfirst($pesanan->status) }}</span>
                                @if($pesanan->status == 'diproses' && $pesanan->estimasi_hari)
                                    <span class="ml-2 text-xs text-gray-600">(Sisa {{ (int) $pesanan->sisa_hari }} / {{ $pesanan->estimasi_hari }} hari)</span>
                                @endif
                            </div>
                            <div class="flex items-center space-x-2 text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                                <span class="text-sm font-mono">{{ $pesanan->transaksi_id }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-bold text-gray-900">
                            @if($pesanan->pay_method == 'poin')
                                {{ number_format($pesanan->poin_used, 0, ',', '.') }} <span class="text-base font-medium text-amber-600">Poin</span>
                            @else
                                <span class="text-green-600">Rp{{ number_format($pesanan->harga_total, 0, ',', '.') }}</span>
                            @endif
                        </p>
                        <p class="text-sm text-gray-500 capitalize">via {{ $pesanan->pay_method }}</p>
                    </div>
                </div>
            </div>

            <!-- Order Details -->
            <div class="p-6">
                <!-- Grid dua kolom: kiri = detail customer, kanan = detail produk -->
                <div class="grid lg:grid-cols-2 gap-6 mb-4">
                    <!-- Kolom Customer -->
                    <div class="flex items-start space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ optional($pesanan->user)->nama ?? '-' }}</h3>
                            <!-- Tanggal order -->
                            <p class="text-sm text-gray-500 flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>{{ $pesanan->tanggal->format('d M Y, H:i') }}</span>
                            </p>
                            <!-- Nomor HP -->
                            @if(optional($pesanan->user)->no_hp)
                            <p class="text-sm text-gray-500 flex items-center space-x-1 mt-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.95.684l1.56 4.686a1 1 0 01-.216.97l-2.197 2.197a11.042 11.042 0 005.516 5.516l2.197-2.197a1 1 0 01.97-.216l4.686 1.56A1 1 0 0121 17.72V21a2 2 0 01-2 2h-1C9.163 23 1 14.837 1 4V3A2 2 0 013 1h2" />
                                </svg>
                                <span>{{ optional($pesanan->user)->no_hp ?? '-' }}</span>
                            </p>
                            @endif
                            <!-- Alamat Lengkap -->
                            <p class="text-sm text-gray-500 flex items-start space-x-1 mt-1">
                                <svg class="w-4 h-4 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3zm0 0c-4.418 0-8 1.79-8 4v3h16v-3c0-2.21-3.582-4-8-4z" />
                                </svg>
                                <span>{{ optional($pesanan->user)->full_alamat ?: '-' }}</span>
                            </p>
                        </div>
                    </div>
                    <!-- Kolom Produk -->
                    <div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 bg-white rounded-lg overflow-hidden shadow-sm border border-gray-200">
                                    <img src="{{ $pesanan->produk && $pesanan->produk->gambar && $pesanan->produk->gambar->first() ? asset('storage/' . $pesanan->produk->gambar->first()->file_path) : asset('/images/produk/default.jpg') }}" 
                                         alt="{{ $pesanan->produk->nama_produk }}" 
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 mb-1">{{ $pesanan->produk->nama_produk }}</h4>
                                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                                        <span class="flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                            <span>{{ $pesanan->jumlah_produk }} item</span>
                                        </span>
                                        <span class="flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                            </svg>
                                            <span>
                                                @if($pesanan->pay_method == 'poin')
                                                    {{ number_format($pesanan->produk->harga_points, 0, ',', '.') }} Poin/item
                                                @else
                                                    Rp{{ number_format($pesanan->produk->harga, 0, ',', '.') }}/item
                                                @endif
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END grid -->
            </div>

            <!-- Actions -->
            @if($pesanan->status == 'menunggu konfirmasi')
            <div class="bg-gray-50 px-6 py-4 flex flex-wrap justify-end gap-3">
                @if($pesanan->bukti_transfer)
                <button onclick="showBuktiTransfer('{{ $pesanan->bukti_transfer }}')" 
                        class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-lg text-sm font-medium text-blue-700 hover:from-blue-100 hover:to-blue-200 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>Bukti Transfer</span>
                </button>
                @endif
                <button onclick="handleTolak('{{ $pesanan->transaksi_id }}')"
                        class="inline-flex items-center space-x-2 px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    <span>Tolak Pesanan</span>
                </button>
                <button onclick="handleVerifikasi('{{ $pesanan->transaksi_id }}')"
                        class="inline-flex items-center space-x-2 px-6 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg text-sm font-medium hover:from-green-700 hover:to-green-800 shadow-sm hover:shadow-md transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Konfirmasi & Proses</span>
                </button>
            </div>
            @elseif($pesanan->status == 'diproses')
            <div class="bg-gray-50 p-4 flex flex-wrap justify-end gap-3">
                <button onclick="handleKirim('{{ $pesanan->transaksi_id }}')"
                        class="inline-flex items-center space-x-2 px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg text-sm font-medium hover:from-blue-700 hover:to-blue-800 shadow-sm hover:shadow-md transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                    <span>Tandai Dikirim</span>
                </button>
            </div>
            @elseif($pesanan->status == 'sedang dikirim')
            <div class="bg-gray-50 p-4 flex flex-wrap justify-end gap-3">
                @if($pesanan->bukti_transfer)
                <button onclick="showBuktiTransfer('{{ $pesanan->bukti_transfer }}')" 
                        class="inline-flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-lg text-sm font-medium text-blue-700 hover:from-blue-100 hover:to-blue-200 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>Bukti Transfer</span>
                </button>
                @endif
                <!-- Tombol Tandai Selesai dihapus: pengelola tidak menandai selesai -->
            </div>
            @endif
        </div>
        @endforeach
    </div>

    <!-- Enhanced Pagination -->
    <div class="mt-8">
        @if ($pesananMasuk->hasPages())
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div class="hidden sm:block">
                        <p class="text-sm text-gray-700">
                            Menampilkan
                            <span class="font-semibold text-gray-900">{{ $pesananMasuk->firstItem() }}</span>
                            sampai
                            <span class="font-semibold text-gray-900">{{ $pesananMasuk->lastItem() }}</span>
                            dari
                            <span class="font-semibold text-gray-900">{{ $pesananMasuk->total() }}</span>
                            pesanan
                        </p>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        @if ($pesananMasuk->onFirstPage())
                            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-50 border border-gray-300 rounded-lg cursor-not-allowed">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                                Sebelumnya
                            </span>
                        @else
                            <a href="{{ $pesananMasuk->previousPageUrl() }}" 
                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                                Sebelumnya
                            </a>
                        @endif

                        <div class="hidden md:flex items-center space-x-1">
                            @foreach ($pesananMasuk->getUrlRange(1, $pesananMasuk->lastPage()) as $page => $url)
                                @if ($page == $pesananMasuk->currentPage())
                                    <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-green-600 rounded-lg">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" 
                                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        @if ($pesananMasuk->hasMorePages())
                            <a href="{{ $pesananMasuk->nextPageUrl() }}" 
                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                                Berikutnya
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        @else
                            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-50 border border-gray-300 rounded-lg cursor-not-allowed">
                                Berikutnya
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div><!-- /.ajax-pagination -->

    <!-- Enhanced Modal for Bukti Transfer -->
    <div id="buktiTransferModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
            <div class="relative bg-white rounded-2xl max-w-4xl w-full shadow-2xl">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-900 flex items-center space-x-2">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span>Bukti Transfer</span>
                    </h3>
                    <button onclick="closeBuktiModal()" class="text-gray-400 hover:text-gray-500 transition-colors">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <img id="buktiTransferImage" src="" alt="Bukti Transfer" class="w-full h-auto rounded-lg shadow-sm">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden forms for actions -->
    <form id="tolakForm" method="POST" class="hidden">@csrf</form>
    <form id="verifikasiForm" method="POST" class="hidden">@csrf
        <input type="hidden" name="estimasi_hari" id="estimasi_hari_input">
    </form>
    <form id="selesaiForm" method="POST" class="hidden">@csrf</form>
    <form id="kirimForm" method="POST" class="hidden">@csrf</form>

    <!-- SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

    <!-- Enhanced JavaScript -->
    <script>
    function showBuktiTransfer(buktiTransfer) {
        const modal = document.getElementById('buktiTransferModal');
        const image = document.getElementById('buktiTransferImage');
        image.src = `{{ asset('storage') }}/${buktiTransfer}`;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeBuktiModal() {
        const modal = document.getElementById('buktiTransferModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function handleVerifikasi(transaksiId) {
        Swal.fire({
            title: 'Verifikasi Pesanan?',
            html: '<p class="mb-2">Tolong estimasikan total jumlah hari dari  pembuatan produk.</p>' +
                  '<input id="swal-input-estimasi" type="number" min="1" class="swal2-input" placeholder="Jumlah hari">',
            focusConfirm: false,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#22c55e',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Simpan & Proses',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                const value = document.getElementById('swal-input-estimasi').value;
                if (!value || parseInt(value) < 1) {
                    Swal.showValidationMessage('Masukkan jumlah hari (>=1)');
                }
                return value;
            },
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-lg',
                cancelButton: 'rounded-lg'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('verifikasiForm');
                document.getElementById('estimasi_hari_input').value = result.value;
                form.action = `{{ url('pengelola/pesanan') }}/${transaksiId}/verifikasi`;
                form.submit();
            }
        });
    }

    function handleTolak(transaksiId) {
        Swal.fire({
            title: 'Tolak Pesanan?',
            text: "Pesanan yang ditolak tidak dapat dikembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Tolak',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-lg',
                cancelButton: 'rounded-lg'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('tolakForm');
                form.action = `{{ url('pengelola/pesanan') }}/${transaksiId}/tolak`;
                form.submit();
            }
        });
    }

    function handleSelesai(transaksiId) {
        Swal.fire({
            title: 'Tandai Selesai?',
            text: "Pesanan akan dipindahkan ke riwayat transaksi",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#22c55e',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Selesai',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-lg',
                cancelButton: 'rounded-lg'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('selesaiForm');
                form.action = `{{ url('pengelola/pesanan') }}/${transaksiId}/selesai`;
                form.submit();
            }
        });
    }

    function handleKirim(transaksiId) {
        Swal.fire({
            title: 'Tandai pesanan dikirim?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#22c55e',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Kirim',
            cancelButtonText: 'Batal',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-lg',
                cancelButton: 'rounded-lg'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('kirimForm');
                form.action = `{{ url('pengelola/pesanan') }}/${transaksiId}/kirim`;
                form.submit();
            }
        });
    }

    // Close modal on outside click
    window.onclick = function(event) {
        const modal = document.getElementById('buktiTransferModal');
        if (event.target === modal) {
            closeBuktiModal();
        }
    }

    // Close modal on escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeBuktiModal();
        }
    });

    // Add loading states to buttons
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('button[onclick^="handle"]');
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const originalContent = this.innerHTML;
                this.disabled = true;
                this.innerHTML = `
                    <svg class="animate-spin w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Processing...
                `;
                
                setTimeout(() => {
                    this.disabled = false;
                    this.innerHTML = originalContent;
                }, 3000);
            });
        });
    });
    </script>
@endsection