@extends('admin.layout')

@section('title', 'Data User - EcoZense')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Data User</h2>
                <a href="{{ route('admin.users.permissions') }}" class="mt-2 inline-flex items-center text-sm text-blue-600 hover:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                    </svg>
                    Kelola Hak Akses Pengelola
                </a>
            </div>
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Delete
                                </button>
                                @if($user->role === 'pengelola')
                                <button onclick="openPermissionModal('{{ $user->user_id }}')" 
                                        class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors mr-2">
                                    Permissions
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Permission Modal -->
    <div id="permissionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Manage Permissions</h3>
                <button onclick="closePermissionModal()" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="permissionForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="can_view_product" id="can_view_product" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                        <label for="can_view_product" class="ml-2 block text-sm text-gray-900">Can View Products</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="can_create_product" id="can_create_product" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                        <label for="can_create_product" class="ml-2 block text-sm text-gray-900">Can Create Products</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="can_edit_product" id="can_edit_product" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                        <label for="can_edit_product" class="ml-2 block text-sm text-gray-900">Can Edit Products</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="can_delete_product" id="can_delete_product" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                        <label for="can_delete_product" class="ml-2 block text-sm text-gray-900">Can Delete Products</label>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="closePermissionModal()" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-md">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openPermissionModal(userId) {
            // Update form action URL
            const form = document.getElementById('permissionForm');
            form.action = `/admin/users/${userId}/permissions`;

            // Show modal
            const modal = document.getElementById('permissionModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            // Fetch current permissions and update checkboxes
            fetch(`/admin/users/${userId}/permissions`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('can_view_product').checked = data.can_view_product;
                    document.getElementById('can_create_product').checked = data.can_create_product;
                    document.getElementById('can_edit_product').checked = data.can_edit_product;
                    document.getElementById('can_delete_product').checked = data.can_delete_product;
                });
        }

        function closePermissionModal() {
            const modal = document.getElementById('permissionModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
@endsection