@extends('admin.layout')

@section('title', 'Kelola Hak Akses Pengelola - EcoZense')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Hak Akses Pengelola</h2>
        <p class="text-gray-600 mt-1">Atur hak akses pengelola untuk mengelola produk</p>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pengelola</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hak Akses</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $user->nama }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $user->email }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <ul class="text-sm text-gray-600 list-disc list-inside">
                            @if($user->can_create_product)
                                <li>Membuat produk</li>
                            @endif
                            @if($user->can_edit_product)
                                <li>Mengedit produk</li>
                            @endif
                            @if($user->can_delete_product)
                                <li>Menghapus produk</li>
                            @endif
                            @if($user->can_view_product)
                                <li>Melihat produk</li>
                            @endif
                        </ul>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button onclick="openPermissionModal({{ $user->user_id }})" 
                                class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-4 py-2 rounded-lg transition-colors">
                            Edit Hak Akses
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Edit Permission -->
<div id="permissionModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Edit Hak Akses Pengelola</h3>
            <form id="permissionForm" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-4">
                    <label class="flex items-center space-x-3">
                        <input type="checkbox" name="can_create_product" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                        <span class="text-gray-700">Membuat Produk</span>
                    </label>
                    
                    <label class="flex items-center space-x-3">
                        <input type="checkbox" name="can_edit_product" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                        <span class="text-gray-700">Mengedit Produk</span>
                    </label>
                    
                    <label class="flex items-center space-x-3">
                        <input type="checkbox" name="can_delete_product" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                        <span class="text-gray-700">Menghapus Produk</span>
                    </label>
                    
                    <label class="flex items-center space-x-3">
                        <input type="checkbox" name="can_view_product" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                        <span class="text-gray-700">Melihat Produk</span>
                    </label>
                </div>
                
                <div class="flex justify-end mt-6 space-x-3">
                    <button type="button" onclick="closePermissionModal()" 
                            class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors">
                        Batal
                    </button>
                    <button type="submit" 
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openPermissionModal(userId) {
    const modal = document.getElementById('permissionModal');
    const form = document.getElementById('permissionForm');
    form.action = `/admin/users/${userId}/permissions`;
    modal.classList.remove('hidden');
}

function closePermissionModal() {
    const modal = document.getElementById('permissionModal');
    modal.classList.add('hidden');
}
</script>
@endsection