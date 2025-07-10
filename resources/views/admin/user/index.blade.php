@extends('admin.layout')

@section('title', 'Data User - EcoZense')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Data User</h2>
            @if(Auth::user()->role === 'superadmin')
            <button onclick="toggleAddAdminModal()" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors mr-4">Tambah Akun Admin</button>
            @endif
            <div class="mt-4 md:mt-0 relative">
                <form method="GET" action="{{ route('admin.user') }}" class="flex items-center">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari user..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </form>
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
                        @php
                            $currentSort = request('sort');
                            $currentDirection = request('direction', 'asc');
                            function sort_link($label, $field) {
                                $isCurrent = request('sort') === $field;
                                $direction = $isCurrent && request('direction', 'asc') === 'asc' ? 'desc' : 'asc';
                                $query = array_merge(request()->query(), ['sort' => $field, 'direction' => $direction]);
                                return '<a href="'.route('admin.user', $query).'" class="flex items-center space-x-1">'.$label.
                                       ($isCurrent ? ($direction === 'desc' ? ' ▴' : ' ▾') : '').'</a>';
                            }
                        @endphp
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! sort_link('Nama', 'nama') !!}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! sort_link('Email', 'email') !!}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! sort_link('Role', 'role') !!}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        @if(in_array(Auth::user()->role, ['admin','superadmin']))
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permissions</th>
                        @endif
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
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $user->role === 'superadmin' ? 'bg-orange-100 text-orange-800' : ($user->role === 'admin' ? 'bg-purple-100 text-purple-800' : ($user->role === 'pengelola' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800')) }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                @if(!(Auth::user()->role === 'admin' && in_array($user->role, ['admin', 'superadmin'])) && 
                                    !(Auth::id() === $user->user_id))
                                <form action="{{ route('admin.user.destroy', $user->user_id) }}" method="POST"
                                      onsubmit="return confirm('Apakah Anda yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                        Delete
                                    </button>
                                </form>
                                @endif
                                @if(Auth::user()->role === 'superadmin' && $user->role === 'admin')
                                <form action="{{ route('admin.user.promote', $user->user_id) }}" method="POST" onsubmit="return confirm('Promosikan menjadi superadmin?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-purple-100 hover:bg-purple-200 text-purple-700 px-3 py-1 rounded transition-colors">Promote</button>
                                </form>
                                @endif
                            </div>
                        </td>
                        @if(in_array(Auth::user()->role, ['admin','superadmin']))
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if(in_array($user->role, ['admin','superadmin']))
                            <form action="{{ route('admin.user.permissions', $user->user_id) }}" method="POST" class="flex space-x-2">
                                @csrf
                                @method('PATCH')
                                <label class="flex items-center space-x-1 text-xs">
                                    <input type="checkbox" name="can_create_article" value="1" {{ $user->can_create_article ? 'checked' : '' }}>
                                    <span>Artikel</span>
                                </label>
                                <label class="flex items-center space-x-1 text-xs">
                                    <input type="checkbox" name="can_create_event" value="1" {{ $user->can_create_event ? 'checked' : '' }}>
                                    <span>Event</span>
                                </label>
                                <button type="submit" class="text-green-600 text-xs">Simpan</button>
                            </form>
                            @endif
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if(Auth::user()->role === 'superadmin')
    <!-- Modal Tambah Admin -->
    <div id="addAdminModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Tambah Akun Admin</h3>
                <form action="{{ route('admin.user.storeAdmin') }}" method="POST">
                    @csrf
                    <div class="mb-4 text-left">
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 text-left">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 text-left">
                        <label class="block text-sm font-medium text-gray-700">No HP</label>
                        <input type="text" name="no_hp" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 text-left">
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 text-left">
                        <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required class="mt-1 block w-full border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="toggleAddAdminModal()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors">Batal</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

@endsection

@push('scripts')
@if(Auth::user()->role === 'superadmin')
<script>
    function toggleAddAdminModal() {
        const modal = document.getElementById('addAdminModal');
        modal.classList.toggle('hidden');
    }
</script>
@endif
@endpush