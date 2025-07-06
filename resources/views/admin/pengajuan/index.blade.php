@extends('admin.layout')

@section('title', 'Verifikasi Pengajuan - EcoZense')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Verifikasi Pengajuan</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-md">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Nama</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Nama Bank Sampah</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Alasan</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($pengajuan as $item)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $item->user->nama}}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $item->nama_bank_sampah }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $item->alasan_pengajuan }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <form action="{{ route('admin.pengajuan.approve', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-green-100 hover:bg-green-200 text-green-700 px-3 py-1 rounded transition-colors">
                                            Setuju
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.pengajuan.reject', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                            Tolak
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada pengajuan yang perlu diverifikasi.
                            </td>
                        </tr>
                    @endforelse
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