@extends('admin.layout')

@section('title', 'Data User - EcoZense')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Data User</h2>
            <div class="mt-4 md:mt-0 relative">
                <input type="text" placeholder="Cari user..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        @if(session('message'))
            <div class="mb-4 p-4 rounded-lg {{ session('type') === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                {{ session('message') }}
            </div>
        @endif
        
        <!-- Tabel Data User -->
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hak Akses</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $user->nama }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 
                                   ($user->role === 'pengelola' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800') }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($user->role === 'pengelola')
                                <div class="text-sm text-gray-900">
                                    {{ implode(', ', $user->meta['product_operations'] ?? []) }}
                                </div>
                            @else
                                <div class="text-sm text-gray-400">-</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                @if($user->role === 'pengelola')
                                <button onclick="openAccessModal('{{ $user->user_id }}')" 
                                    class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded transition-colors">
                                    Edit Akses
                                </button>
                                @endif
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Edit Akses -->
    <div id="accessModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Edit Hak Akses Produk</h3>
                <button onclick="closeAccessModal()" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="accessForm" method="POST">
                @csrf
                <div class="space-y-3 mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="operations[]" value="create" class="rounded text-green-500">
                        <span class="ml-2">Create</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="operations[]" value="read" class="rounded text-green-500">
                        <span class="ml-2">Read</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="operations[]" value="update" class="rounded text-green-500">
                        <span class="ml-2">Update</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="operations[]" value="delete" class="rounded text-green-500">
                        <span class="ml-2">Delete</span>
                    </label>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAccessModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAccessModal(userId) {
            const modal = document.getElementById('accessModal');
            const form = document.getElementById('accessForm');
            
            // Set form action
            form.action = `/admin/users/${userId}/access`;
            
            // Get current access
            fetch(`/admin/users/${userId}/access`)
                .then(response => response.json())
                .then(data => {
                    // Reset all checkboxes
                    document.querySelectorAll('input[name="operations[]"]').forEach(checkbox => {
                        checkbox.checked = false;
                    });
                    
                    // Check the ones user has
                    if (data.operations) {
                        data.operations.forEach(op => {
                            const checkbox = document.querySelector(`input[name="operations[]"][value="${op}"]`);
                            if (checkbox) checkbox.checked = true;
                        });
                    }
                    
                    modal.classList.remove('hidden');
                });
        }
        
        function closeAccessModal() {
            document.getElementById('accessModal').classList.add('hidden');
        }
    </script>
@endsection
