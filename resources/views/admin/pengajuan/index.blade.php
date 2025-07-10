@extends('admin.layout')

@section('title', 'Verifikasi Pengajuan - EcoZense')

@section('content')
    <div class="space-y-6">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-green-600 to-emerald-700 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Verifikasi Pengajuan</h1>
                    <p class="text-blue-100">Kelola dan verifikasi pengajuan dari pengguna</p>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-2xl font-bold">{{ count($pengajuan) }}</div>
                        <div class="text-sm text-blue-100">Pengajuan Pending</div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-green-800 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-800">Daftar Pengajuan</h2>
                    <div class="flex items-center space-x-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ count($pengajuan) }} Pengajuan
                        </span>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center space-x-1">
                                    <span>Pemohon</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Bank Sampah
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Alasan Pengajuan
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($pengajuan as $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                                                <span class="text-white font-medium text-sm">
                                                    {{ substr(optional($item->user)->nama ?? '??', 0, 2) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ optional($item->user)->nama ?? '-' }}</div>
                                            <div class="text-sm text-gray-500">ID: #{{ $item->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        <div class="font-medium">{{ $item->nama_bank_sampah }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        <div class="max-w-xs">
                                            <p class="line-clamp-2">{{ $item->alasan_pengajuan }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <form action="{{ route('admin.pengajuan.approve', $item->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="group relative inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 shadow-sm hover:shadow-md"
                                                    onclick="return confirm('Apakah Anda yakin ingin menyetujui pengajuan ini?')">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Setuju
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.pengajuan.reject', $item->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="group relative inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 shadow-sm hover:shadow-md"
                                                    onclick="return confirm('Apakah Anda yakin ingin menolak pengajuan ini?')">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Tolak
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div class="text-center">
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada pengajuan</h3>
                                            <p class="text-gray-500 text-sm">Tidak ada pengajuan yang perlu diverifikasi saat ini.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Additional Styles -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Hover effects for table rows */
        tbody tr:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }
        
        /* Button loading state */
        .btn-loading {
            opacity: 0.7;
            cursor: not-allowed;
        }
        
        /* Smooth transitions */
        * {
            transition: all 0.2s ease-in-out;
        }
        
        /* Custom scrollbar */
        .overflow-x-auto::-webkit-scrollbar {
            height: 6px;
        }
        
        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        
        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
@endsection

@section('scripts')
<script>
    // Enhanced JavaScript functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Kategori dropdown functionality (keeping existing functionality)
        const kategoriDropdown = document.getElementById('kategoriDropdown');
        const kategoriMenu = document.getElementById('kategoriMenu');
        const selectedKategori = document.getElementById('selectedKategori');
        
        if (kategoriDropdown && kategoriMenu) {
            kategoriDropdown.addEventListener('click', function() {
                kategoriMenu.classList.toggle('hidden');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!kategoriDropdown.contains(event.target) && !kategoriMenu.contains(event.target)) {
                    kategoriMenu.classList.add('hidden');
                }
            });
            
            // Handle option click
            const options = kategoriMenu.querySelectorAll('a');
            options.forEach(option => {
                option.addEventListener('click', function(e) {
                    e.preventDefault();
                    selectedKategori.textContent = this.dataset.value;
                    kategoriMenu.classList.add('hidden');
                });
            });
        }
        
        // Enhanced form submission with loading states
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const button = form.querySelector('button[type="submit"]');
                if (button) {
                    button.classList.add('btn-loading');
                    button.disabled = true;
                    
                    // Add loading spinner
                    const originalText = button.innerHTML;
                    button.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses...
                    `;
                    
                    // Reset button state after 5 seconds (fallback)
                    setTimeout(() => {
                        button.classList.remove('btn-loading');
                        button.disabled = false;
                        button.innerHTML = originalText;
                    }, 5000);
                }
            });
        });
        
        // Add smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';
        
        // Success message auto-hide
        const successAlert = document.querySelector('.bg-gradient-to-r.from-green-50');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.opacity = '0';
                setTimeout(() => {
                    successAlert.remove();
                }, 300);
            }, 5000);
        }
    });
    
    // Add keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // Close any open dropdowns
            const openDropdowns = document.querySelectorAll('.dropdown-menu:not(.hidden)');
            openDropdowns.forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        }
    });
</script>
@endsection