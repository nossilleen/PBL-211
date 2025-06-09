@extends('pengelola.layout')

@section('title', 'Konversi Poin - Pengelola EcoZense')

@section('content')
    <!-- Main Content -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Konversi Sampah ke Poin</h1>
        <p class="text-gray-600 mt-2">Konversi berat sampah menjadi poin reward untuk nasabah</p>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Terjadi Kesalahan!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pengelola.poin.store') }}" method="POST" class="mt-8 space-y-6" id="conversionForm">
            @csrf
            <input type="hidden" name="user_id" id="user_id">
            <!-- User Search Section -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <label for="user_search" class="block text-lg font-semibold text-gray-800 mb-3">Cari Nasabah</label>
                <div class="relative">
                    <input type="text" 
                           id="user_search" 
                           name="user_search" 
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 text-lg px-4 py-3" 
                           placeholder="Masukkan nama atau ID nasabah">
                    <div id="user_suggestions" class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1 hidden"></div>
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
                            <p class="text-sm font-medium text-gray-900" id="previewName">John Doe</p>
                            <p class="text-sm text-gray-500" id="previewId">ID: NSB123456</p>
                            <p class="text-sm text-gray-500" id="previewCurrentPoints">Total Poin: 1,500</p>
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
                        <select id="periodFilter" name="period" class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500">
                            <option value="all" @if(request('period') == 'all' || !request('period')) selected @endif>Semua Periode</option>
                            <option value="today" @if(request('period') == 'today') selected @endif>Hari Ini</option>
                            <option value="this_week" @if(request('period') == 'this_week') selected @endif>Minggu Ini</option>
                            <option value="this_month" @if(request('period') == 'this_month') selected @endif>Bulan Ini</option>
                        </select>
                        <select id="statusFilter" name="status" class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500">
                            <option value="all" @if(request('status') == 'all' || !request('status')) selected @endif>Semua Status</option>
                            <option value="berhasil" @if(request('status') == 'berhasil') selected @endif>Berhasil</option>
                            <option value="pending" @if(request('status') == 'pending') selected @endif>Pending</option>
                            <option value="gagal" @if(request('status') == 'gagal') selected @endif>Gagal</option>
                        </select>
                    </div>
                    <form id="searchForm" class="relative">
                         <input type="text" 
                               name="search"
                               placeholder="Cari nasabah..." 
                               value="{{ request('search') }}"
                               class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500 w-64">
                        <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </form>
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poin</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($histories as $history)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $history->created_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $history->user->user_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $history->user->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $history->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold text-green-600">+{{ $history->amount }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @switch($history->status)
                                        @case('berhasil') bg-green-100 text-green-800 @break
                                        @case('pending') bg-yellow-100 text-yellow-800 @break
                                        @case('gagal') bg-red-100 text-red-800 @break
                                    @endswitch">
                                    {{ ucfirst($history->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Belum ada riwayat konversi poin.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $histories->links() }}
                </div>
            </div>
        </div>
    </div>

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
            const previewWeight = document.getElementById('previewWeight');
            const previewPoints = document.getElementById('previewPoints');

            userSearchInput.addEventListener('input', async function() {
                const query = this.value;
                
                if (query.length < 2) {
                    userSuggestions.classList.add('hidden');
                    return;
                }
                
                // Reset active suggestion on new query
                activeSuggestionIndex = -1;

                try {
                    const response = await fetch(`{{ route('pengelola.api.users.search') }}?query=${query}`);
                    if (!response.ok) throw new Error('Network response was not ok.');
                    const users = await response.json();

                    userSuggestions.innerHTML = '';
                    if (users.length > 0) {
                        users.forEach(user => {
                            const suggestionItem = document.createElement('div');
                            suggestionItem.className = 'p-3 hover:bg-gray-100 cursor-pointer border-b border-gray-100';
                            suggestionItem.innerHTML = `<p class="font-medium">${user.nama}</p><p class="text-sm text-gray-500">ID: ${user.user_id}</p>`;
                            suggestionItem.dataset.userId = user.user_id;
                            suggestionItem.dataset.userName = user.nama;
                            suggestionItem.dataset.userPoints = user.points;
                            
                            suggestionItem.addEventListener('click', () => selectUser(suggestionItem));

                            userSuggestions.appendChild(suggestionItem);
                        });
                        userSuggestions.classList.remove('hidden');
                    } else {
                        userSuggestions.innerHTML = '<div class="p-3 text-gray-500">Nasabah tidak ditemukan.</div>';
                        userSuggestions.classList.remove('hidden');
                    }
                } catch (error) {
                    console.error('Error fetching users:', error);
                    userSuggestions.innerHTML = '<div class="p-3 text-red-500">Gagal memuat data.</div>';
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
                    userSearchInput.focus();
                }
            }

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
                        suggestion.classList.add('bg-gray-200');
                    } else {
                        suggestion.classList.remove('bg-gray-200');
                    }
                });
            }

            userSuggestions.addEventListener('click', function(e) {
                const targetSuggestion = e.target.closest('div[data-user-id]');
                if (targetSuggestion) {
                    selectUser(targetSuggestion);
                }
            });

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