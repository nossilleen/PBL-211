@extends('pengelola.layout')

@section('title', 'Konversi Poin - Pengelola EcoZense')

@section('content')
    <!-- Main Content -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Konversi Sampah ke Poin</h1>
        <p class="text-gray-600 mt-2">Konversi berat sampah menjadi poin reward untuk nasabah</p>

        <form action="{{ route('pengelola.poin') }}" method="POST" class="mt-8 space-y-6" id="conversionForm">
            @csrf
            <!-- User Search Section -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <label for="user" class="block text-lg font-semibold text-gray-800 mb-3">Cari Nasabah</label>
                <div class="relative">
                    <input type="text" 
                           id="user" 
                           name="user" 
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 text-lg px-4 py-3" 
                           placeholder="Masukkan nama atau ID nasabah">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
                <!-- Preview User Card (Initially Hidden) -->
                <div id="userPreview" class="hidden mt-4 p-4 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">John Doe</p>
                            <p class="text-sm text-gray-500">ID: NSB123456</p>
                            <p class="text-sm text-gray-500">Total Poin: 1,500</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Waste Input Section -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <label for="wasteWeight" class="block text-lg font-semibold text-gray-800 mb-3">Berat Sampah</label>
                <div class="flex space-x-4">
                    <div class="flex-1">
                        <input type="number" 
                               id="wasteWeight" 
                               name="wasteWeight" 
                               class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 text-lg px-4 py-3" 
                               placeholder="Masukkan berat sampah"
                               min="0"
                               step="0.1">
                    </div>
                    <div class="w-32">
                        <select id="weightUnit" 
                                name="weightUnit" 
                                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 text-lg px-4 py-3">
                            <option value="kg">Kilogram</option>
                            <option value="g">Gram</option>
                        </select>
                    </div>
                </div>

                <!-- Points Preview Section -->
                <div id="pointsPreview" class="mt-6 p-4 bg-green-50 rounded-lg hidden">
                    <h3 class="text-lg font-semibold text-green-800 mb-2">Preview Konversi</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-green-600">Berat Sampah</p>
                            <p class="text-xl font-bold text-green-800"><span id="previewWeight">0</span> kg</p>
                        </div>
                        <div>
                            <p class="text-sm text-green-600">Poin yang Didapat</p>
                            <p class="text-xl font-bold text-green-800"><span id="previewPoints">0</span> poin</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-4">
                <button type="button" 
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition-colors">
                    Batal
                </button>
                <button type="submit" 
                        class="px-6 py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition-colors">
                    Kirim Poin
                </button>
            </div>
        </form>

        <!-- Riwayat Transfer Section -->
        <div class="mt-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Riwayat Transfer Poin</h2>
            
            <!-- Filter dan Search -->
            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 mb-4">
                <div class="flex flex-wrap gap-4 items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <select class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500">
                            <option value="all">Semua Periode</option>
                            <option value="today">Hari Ini</option>
                            <option value="week">Minggu Ini</option>
                            <option value="month">Bulan Ini</option>
                        </select>
                        <select class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500">
                            <option value="all">Semua Status</option>
                            <option value="success">Berhasil</option>
                            <option value="pending">Pending</option>
                            <option value="failed">Gagal</option>
                        </select>
                    </div>
                    <div class="relative">
                        <input type="text" 
                               placeholder="Cari nasabah..." 
                               class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500 w-64">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Riwayat -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Nasabah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Sampah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poin</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Example rows -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">7 Mei 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">NSB123456</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">John Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2.5 kg</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">250</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Berhasil
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">7 Mei 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">NSB123457</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jane Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1.8 kg</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">180</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Berhasil
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">6 Mei 2025</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">NSB123458</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Mike Johnson</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3.2 kg</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">320</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Berhasil
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </a>
                            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </a>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Showing
                                    <span class="font-medium">1</span>
                                    to
                                    <span class="font-medium">10</span>
                                    of
                                    <span class="font-medium">20</span>
                                    results
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        Previous
                                    </a>
                                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        1
                                    </a>
                                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        2
                                    </a>
                                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-green-50 text-sm font-medium text-green-600">
                                        3
                                    </a>
                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        Next
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userInput = document.getElementById('user');
            const userPreview = document.getElementById('userPreview');
            const wasteWeight = document.getElementById('wasteWeight');
            const weightUnit = document.getElementById('weightUnit');
            const pointsPreview = document.getElementById('pointsPreview');
            const previewWeight = document.getElementById('previewWeight');
            const previewPoints = document.getElementById('previewPoints');

            // Show user preview when typing (demo purposes)
            userInput.addEventListener('input', function() {
                if (this.value.length > 2) {
                    userPreview.classList.remove('hidden');
                } else {
                    userPreview.classList.add('hidden');
                }
            });

            // Calculate points when weight changes
            function calculatePoints() {
                const weight = parseFloat(wasteWeight.value) || 0;
                const unit = weightUnit.value;
                
                // Convert to kg if in grams
                const weightInKg = unit === 'g' ? weight / 1000 : weight;
                
                // Calculate points (example: 1kg = 100 points)
                const points = Math.floor(weightInKg * 100);
                
                if (weight > 0) {
                    pointsPreview.classList.remove('hidden');
                    previewWeight.textContent = weightInKg.toFixed(2);
                    previewPoints.textContent = points;
                } else {
                    pointsPreview.classList.add('hidden');
                }
            }

            wasteWeight.addEventListener('input', calculatePoints);
            weightUnit.addEventListener('change', calculatePoints);
        });
    </script>
@endsection