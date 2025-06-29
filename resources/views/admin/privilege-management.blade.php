@extends('admin.layout')

@section('title', 'User Privilege Management - EcoZense')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">User Privilege Management</h1>
        <p class="text-gray-600 mt-2">Manage user access and privileges</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">View Products</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Create Products</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Edit Products</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Delete Products</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr id="user-row-{{ $user->user_id }}" data-user-id="{{ $user->user_id }}">
                        <td class="px-4 py-3">{{ $user->nama }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full
                                {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' :
                                   ($user->role === 'pengelola' ? 'bg-blue-100 text-blue-800' :
                                    'bg-gray-100 text-gray-800') }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <input type="checkbox" class="privilege-checkbox" data-privilege="can_view_product"
                                   {{ $user->can_view_product ? 'checked' : '' }}
                                   {{ $user->role === 'admin' ? 'disabled' : '' }}>
                        </td>
                        <td class="px-4 py-3">
                            <input type="checkbox" class="privilege-checkbox" data-privilege="can_create_product"
                                   {{ $user->can_create_product ? 'checked' : '' }}
                                   {{ $user->role === 'admin' ? 'disabled' : '' }}>
                        </td>
                        <td class="px-4 py-3">
                            <input type="checkbox" class="privilege-checkbox" data-privilege="can_edit_product"
                                   {{ $user->can_edit_product ? 'checked' : '' }}
                                   {{ $user->role === 'admin' ? 'disabled' : '' }}>
                        </td>
                        <td class="px-4 py-3">
                            <input type="checkbox" class="privilege-checkbox" data-privilege="can_delete_product"
                                   {{ $user->can_delete_product ? 'checked' : '' }}
                                   {{ $user->role === 'admin' ? 'disabled' : '' }}>
                        </td>
                        <td class="px-4 py-3">
                            <button class="save-privileges-btn px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 disabled:opacity-50"
                                    {{ $user->role === 'admin' ? 'disabled' : '' }}>
                                Save Changes
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('[data-user-id]');
    
    rows.forEach(row => {
        const userId = row.dataset.userId;
        const saveButton = row.querySelector('.save-privileges-btn');
        const checkboxes = row.querySelectorAll('.privilege-checkbox');
        
        // Initially disable save button
        saveButton.disabled = true;
        
        // Enable save button when privileges are changed
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                saveButton.disabled = false;
            });
        });
        
        // Handle save button click
        saveButton.addEventListener('click', async () => {
            const privileges = {};
            checkboxes.forEach(checkbox => {
                privileges[checkbox.dataset.privilege] = checkbox.checked;
            });
            
            try {
                const response = await fetch(`/admin/users/${userId}/privileges`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(privileges)
                });
                
                if (!response.ok) throw new Error('Failed to update privileges');
                
                saveButton.disabled = true;
                
                // Show success message
                const toast = document.createElement('div');
                toast.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded shadow-lg';
                toast.textContent = 'Privileges updated successfully';
                document.body.appendChild(toast);
                
                setTimeout(() => {
                    toast.remove();
                }, 3000);
                
            } catch (error) {
                console.error('Error updating privileges:', error);
                alert('Failed to update privileges. Please try again.');
            }
        });
    });
});
</script>
@endpush
@endsection