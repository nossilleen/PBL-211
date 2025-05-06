@extends('admin.layout')

@section('title', 'Verifikasi Pengajuan - EcoZense')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex flex-col mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Verifikasi Pengajuan</h2>
        </div>
        
        <!-- Tabel Pengajuan -->
        <div class="overflow-x-auto bg-white rounded-md">
            <table class="min-w-full">
                <thead class="bg-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Nama</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Peran</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Alamat</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Telepon</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Manfaat Eco enzim ...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Eco enzim ber...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Karimun</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">JANGAN LUPA ...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Setuju
                                </button>
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Tolak
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Eco Enzim ...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Legenda Malaka</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Event ini membahas...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Setuju
                                </button>
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Tolak
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Eco Enzim ...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Batu Aji</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Diwajibkan untuk...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Setuju
                                </button>
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Tolak
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Eco Enzim ...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Batu Ampar</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Dibanding dengan ...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Setuju
                                </button>
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Tolak
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Eco Enzim ...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Sekupang</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Wajib untuk ...</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Setuju
                                </button>
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Tolak
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Kategori dropdown functionality
    document.addEventListener('DOMContentLoaded', function() {
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
    });
</script>
@endsection 