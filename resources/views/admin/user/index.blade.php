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
                                <button onclick="showResetConfirmation({{ $user->user_id }})" 
                                        class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Reset Password
                                </button>
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

    <!-- Reset Password Confirmation Modal -->
    <div id="resetConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-96">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Konfirmasi Reset Password</h3>
            <div class="mb-6">
                <p class="text-gray-600 mb-2">Apakah Anda yakin ingin mereset password user ini?</p>
                <div class="bg-yellow-50 rounded p-3 text-sm">
                    <p class="font-medium text-yellow-800">Informasi Penting:</p>
                    <ul class="list-disc list-inside text-yellow-700 mt-1">
                        <li>Password akan direset menjadi: "<span class="font-mono font-bold">password</span>"</li>
                        <li>User akan diminta mengganti password saat login berikutnya</li>
                    </ul>
                </div>
            </div>
            <form id="resetPasswordForm" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="confirm_reset" class="rounded border-gray-300 text-green-600 focus:ring-green-500" required>
                        <span class="ml-2 text-gray-700">Ya, saya yakin ingin mereset password</span>
                    </label>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="hideResetConfirmation()" 
                            class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition-colors">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showResetConfirmation(userId) {
            const modal = document.getElementById('resetConfirmationModal');
            const form = document.getElementById('resetPasswordForm');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            form.action = `/admin/users/${userId}/reset-password`;
        }

        function hideResetConfirmation() {
            const modal = document.getElementById('resetConfirmationModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>
@endsection