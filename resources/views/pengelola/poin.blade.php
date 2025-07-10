@extends('pengelola.layout')

@section('title', 'Konversi Poin - Pengelola EcoZense')

@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Konversi Sampah ke Poin</h1>
                <p class="text-gray-600 mt-1">Kelola konversi sampah menjadi poin reward untuk nasabah</p>
            </div>
            <div class="flex items-center space-x-2 text-sm text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>1 kg sampah = 100 poin</span>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if (session('success'))
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">
                        <strong class="font-medium">Berhasil!</strong> {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">
                        <strong class="font-medium">Gagal!</strong> {{ session('error') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700 font-medium">Terjadi Kesalahan:</p>
                    <ul class="mt-2 text-sm text-red-600 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Conversion Form -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Form Section -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-gray-100">
                    <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Form Konversi Poin
                    </h2>
                </div>
                
                <form action="{{ route('pengelola.poin.store') }}" method="POST" class="p-6 space-y-6" id="conversionForm">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">

                    <!-- Customer Search -->
                    <div class="space-y-2">
                        <label for="user_search" class="block text-sm font-medium text-gray-700">Pilih Nasabah</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" 
                                   id="user_search" 
                                   name="user_search" 
                                   class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200" 
                                   placeholder="Cari berdasarkan nama atau ID nasabah">
                            <div id="user_suggestions" class="absolute z-20 w-full bg-white border border-gray-200 rounded-lg mt-1 shadow-lg hidden max-h-60 overflow-y-auto"></div>
                        </div>
                    </div>

                    <!-- Selected User Preview -->
                    <div id="userPreview" class="hidden">
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-blue-900" id="previewName">Nasabah Terpilih</p>
                                    <p class="text-sm text-blue-600" id="previewId">ID: -</p>
                                    <p class="text-sm text-blue-600" id="previewCurrentPoints">Total Poin: -</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="text-blue-400 hover:text-blue-600 transition-colors" onclick="clearUserSelection()">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Waste Weight Input -->
                    <div class="space-y-2">
                        <label for="wasteWeight" class="block text-sm font-medium text-gray-700">Berat Sampah</label>
                        <div class="flex space-x-3">
                            <div class="flex-1">
                                <div class="relative">
                                    <input type="number" 
                                           id="wasteWeight" 
                                           name="wasteWeight" 
                                           class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200" 
                                           placeholder="0.0"
                                           min="0"
                                           step="0.1">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-32">
                                <select id="weightUnit" 
                                        name="weightUnit" 
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200">
                                    <option value="kg">Kilogram</option>
                                    <option value="g">Gram</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="submit" 
                                class="px-6 py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition-colors duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Kirim Poin
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Points Preview Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden h-fit sticky top-4">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Preview Konversi
                    </h3>
                </div>
                
                <div id="pointsPreview" class="p-6 hidden">
                    <div class="space-y-4">
                        <div class="text-center">
                            <div class="bg-gradient-to-r from-green-100 to-emerald-100 rounded-xl p-4">
                                <div class="text-2xl font-bold text-green-800" id="previewPoints">0</div>
                                <div class="text-sm text-green-600">Poin yang Didapat</div>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-100 pt-4">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-600">Berat Sampah:</span>
                                <span class="font-medium text-gray-900"><span id="previewWeight">0</span> kg</span>
                            </div>
                        </div>
                        
                        <div class="bg-blue-50 rounded-lg p-3">
                            <div class="flex items-center text-sm text-blue-700">
                                <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Konversi: 1 kg = 100 poin</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="pointsPlaceholder" class="p-6 text-center text-gray-500">
                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-sm">Masukkan berat sampah untuk melihat preview poin</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction History -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-slate-50 px-6 py-4 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                    <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Riwayat Transfer Poin
                </h2>
                <div class="text-sm text-gray-500">
                    Total transaksi: {{ $histories->total() }}
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
            <div class="flex flex-wrap gap-4 items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <label class="text-sm font-medium text-gray-700">Periode:</label>
                        <select id="periodFilter" name="period" class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500">
                            <option value="all" @if(request('period') == 'all' || !request('period')) selected @endif>Semua</option>
                            <option value="today" @if(request('period') == 'today') selected @endif>Hari Ini</option>
                            <option value="this_week" @if(request('period') == 'this_week') selected @endif>Minggu Ini</option>
                            <option value="this_month" @if(request('period') == 'this_month') selected @endif>Bulan Ini</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <label class="text-sm font-medium text-gray-700">Status:</label>
                        <select id="statusFilter" name="status" class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500">
                            <option value="all" @if(request('status') == 'all' || !request('status')) selected @endif>Semua</option>
                            <option value="berhasil" @if(request('status') == 'berhasil') selected @endif>Berhasil</option>
                            <option value="pending" @if(request('status') == 'pending') selected @endif>Pending</option>
                            <option value="gagal" @if(request('status') == 'gagal') selected @endif>Gagal</option>
                        </select>
                    </div>
                </div>
                <form id="searchForm" class="relative">
                    <input type="text" 
                           name="search"
                           placeholder="Cari nasabah..." 
                           value="{{ request('search') }}"
                           class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500 w-64 pl-10">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table & Pagination Wrapper -->
        <div class="ajax-pagination">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal & Waktu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nasabah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($histories as $history)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 font-medium">{{ $history->created_at->format('d M Y') }}</div>
                            <div class="text-sm text-gray-500">{{ $history->created_at->format('H:i') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8">
                                    <div class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center">
                                        <svg class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $history->user->nama }}</div>
                                    <div class="text-sm text-gray-500">{{ $history->user->user_id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $history->description }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-bold text-green-600">+{{ number_format($history->amount) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @switch($history->status)
                                    @case('berhasil') bg-green-100 text-green-800 @break
                                    @case('pending') bg-yellow-100 text-yellow-800 @break
                                    @case('gagal') bg-red-100 text-red-800 @break
                                @endswitch">
                                @switch($history->status)
                                    @case('berhasil')
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        @break
                                    @case('pending')
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        @break
                                    @case('gagal')
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        @break
                                @endswitch
                                {{ ucfirst($history->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="text-sm">Belum ada riwayat konversi poin</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($histories->hasPages())
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div class="hidden sm:block">
                    <p class="text-sm text-gray-700">
                        Menampilkan
                        <span class="font-semibold text-gray-900">{{ $histories->firstItem() }}</span>
                        sampai
                        <span class="font-semibold text-gray-900">{{ $histories->lastItem() }}</span>
                        dari
                        <span class="font-semibold text-gray-900">{{ $histories->total() }}</span>
                        riwayat
                    </p>
                </div>

                <div class="flex items-center space-x-2">
                    @if ($histories->onFirstPage())
                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-50 border border-gray-300 rounded-lg cursor-not-allowed">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Sebelumnya
                        </span>
                    @else
                        <a href="{{ $histories->previousPageUrl() }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Sebelumnya
                        </a>
                    @endif

                    <div class="hidden md:flex items-center space-x-1">
                        @php
                            $current = $histories->currentPage();
                            $last    = $histories->lastPage();
                            // Hitung rentang agar maksimum 7 halaman yang ditampilkan
                            $start = max(1, $current - 3);
                            $end   = min($last, $start + 6);
                            if (($end - $start) < 6) {
                                $start = max(1, $end - 6);
                            }
                        @endphp

                        {{-- Ellipsis di kiri --}}
                        @if ($start > 1)
                            <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-gray-50 border border-gray-300 rounded-lg cursor-default select-none">…</span>
                        @endif

                        {{-- Nomor halaman utama --}}
                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $current)
                                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-green-600 rounded-lg">{{ $i }}</span>
                            @else
                                <a href="{{ $histories->url($i) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">{{ $i }}</a>
                            @endif
                        @endfor

                        {{-- Ellipsis di kanan --}}
                        @if ($end < $last)
                            <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-gray-50 border border-gray-300 rounded-lg cursor-default select-none">…</span>
                        @endif
                    </div>

                    @if ($histories->hasMorePages())
                        <a href="{{ $histories->nextPageUrl() }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-200">
                            Berikutnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @else
                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-50 border border-gray-300 rounded-lg cursor-not-allowed">
                            Berikutnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div></div><!-- /.ajax-pagination -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userSearchInput = document.getElementById('user_search');
            const userSuggestions = document.getElementById('user_suggestions');
            const userPreview = document.getElementById('userPreview');
            const hiddenUserId = document.getElementById('user_id');
            let activeSuggestionIndex = -1;

            const wasteWeight = document.getElementById('wasteWeight');
            const weightUnit = document.getElementById('weightUnit');
            const pointsPreview = document.getElementById('pointsPreview');
            const pointsPlaceholder = document.getElementById('pointsPlaceholder');
            const previewWeight = document.getElementById('previewWeight');
            const previewPoints = document.getElementById('previewPoints');

            // User search functionality
            userSearchInput.addEventListener('input', async function() {
                const query = this.value;
                
                if (query.length < 2) {
                    userSuggestions.classList.add('hidden');
                    return;
                }
                
                activeSuggestionIndex = -1;

                try {
                    const response = await fetch(`{{ route('pengelola.api.users.search') }}?query=${query}`);
                    if (!response.ok) throw new Error('Network response was not ok.');
                    const users = await response.json();

                    userSuggestions.innerHTML = '';
                    if (users.length > 0) {
                        users.forEach(user => {
                            const suggestionItem = document.createElement('div');
                            suggestionItem.className = 'p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100 last:border-b-0 transition-colors duration-150';
                            suggestionItem.innerHTML = `
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">${user.nama}</p>
                                        <p class="text-xs text-gray-500">ID: ${user.user_id} • ${new Intl.NumberFormat().format(user.points)} poin</p>
                                    </div>
                                </div>
                            `;
                            suggestionItem.dataset.userId = user.user_id;
                            suggestionItem.dataset.userName = user.nama;
                            suggestionItem.dataset.userPoints = user.points;
                            
                            suggestionItem.addEventListener('click', () => selectUser(suggestionItem));
                            userSuggestions.appendChild(suggestionItem);
                        });
                        userSuggestions.classList.remove('hidden');
                    } else {
                        userSuggestions.innerHTML = '<div class="p-3 text-gray-500 text-center">Nasabah tidak ditemukan</div>';
                        userSuggestions.classList.remove('hidden');
                    }
                } catch (error) {
                    console.error('Error fetching users:', error);
                    userSuggestions.innerHTML = '<div class="p-3 text-red-500 text-center">Gagal memuat data</div>';
                    userSuggestions.classList.remove('hidden');
                }
            });

            function selectUser(userElement) {
                if (userElement) {
                    hiddenUserId.value = userElement.dataset.userId;
                    userSearchInput.value = `${userElement.dataset.userName} (ID: ${userElement.dataset.userId})`;

                    document.getElementById('previewName').textContent = userElement.dataset.userName;
                    document.getElementById('previewId').textContent = `ID: ${userElement.dataset.userId}`;
                    document.getElementById('previewCurrentPoints').textContent = `Total Poin: ${new Intl.NumberFormat().format(userElement.dataset.userPoints)}`;
                    
                    userPreview.classList.remove('hidden');
                    userSuggestions.classList.add('hidden');
                }
            }

            // Clear user selection
            window.clearUserSelection = function() {
                hiddenUserId.value = '';
                userSearchInput.value = '';
                userPreview.classList.add('hidden');
                userSearchInput.focus();
            };

            // Keyboard navigation for suggestions
            userSearchInput.addEventListener('keydown', function(e) {
                const suggestions = userSuggestions.querySelectorAll('div[data-user-id]');
                if (suggestions.length === 0) return;

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    activeSuggestionIndex = (activeSuggestionIndex + 1) % suggestions.length;
                    updateActiveSuggestion(suggestions);
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    activeSuggestionIndex = (activeSuggestionIndex - 1 + suggestions.length) % suggestions.length;
                    updateActiveSuggestion(suggestions);
                } else if (e.key === 'Enter') {
                    e.preventDefault();
                    if (activeSuggestionIndex > -1) {
                        selectUser(suggestions[activeSuggestionIndex]);
                    }
                }
            });
            
            function updateActiveSuggestion(suggestions) {
                suggestions.forEach((suggestion, index) => {
                    if (index === activeSuggestionIndex) {
                        suggestion.classList.add('bg-blue-50');
                    } else {
                        suggestion.classList.remove('bg-blue-50');
                    }
                });
            }

            // Hide suggestions when clicking outside
            document.addEventListener('click', function(e) {
                if (!userSearchInput.contains(e.target) && !userSuggestions.contains(e.target)) {
                    userSuggestions.classList.add('hidden');
                }
            });

            // Calculate points when weight changes
            function calculatePoints() {
                const weight = parseFloat(wasteWeight.value) || 0;
                const unit = weightUnit.value;
                
                // Convert to kg if in grams
                const weightInKg = unit === 'g' ? weight / 1000 : weight;
                
                // Calculate points (1kg = 100 points)
                const points = Math.floor(weightInKg * 100);
                
                if (weight > 0) {
                    pointsPreview.classList.remove('hidden');
                    pointsPlaceholder.classList.add('hidden');
                    previewWeight.textContent = weightInKg.toFixed(2);
                    previewPoints.textContent = new Intl.NumberFormat().format(points);
                } else {
                    pointsPreview.classList.add('hidden');
                    pointsPlaceholder.classList.remove('hidden');
                }
            }

            wasteWeight.addEventListener('input', calculatePoints);
            weightUnit.addEventListener('change', calculatePoints);

            // Filter functionality
            const periodFilter = document.getElementById('periodFilter');
            const statusFilter = document.getElementById('statusFilter');
            const searchForm = document.getElementById('searchForm');

            function applyFilters() {
                const period = periodFilter.value;
                const status = statusFilter.value;
                const search = document.querySelector('input[name="search"]').value;

                const url = new URL(window.location.href.split('?')[0]);
                if (period !== 'all') url.searchParams.set('period', period);
                if (status !== 'all') url.searchParams.set('status', status);
                if (search) url.searchParams.set('search', search);

                window.location.href = url.toString();
            }

            periodFilter.addEventListener('change', applyFilters);
            statusFilter.addEventListener('change', applyFilters);
            
            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                applyFilters();
            });
        });
    </script>
@endsection