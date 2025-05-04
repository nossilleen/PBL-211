@php
    $role = Auth::user()->role;
@endphp

@if($role === 'admin')
    <x-dashboard.admin />
@elseif($role === 'nasabah')
    <x-dashboard.nasabah />
@elseif($role === 'pengelola')
    <x-dashboard.pengelola />
@else
    <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
        <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
            <h2 class="text-xl font-bold text-white">Dashboard</h2>
        </div>
        <div class="p-6">
            <p class="text-gray-600">Selamat datang di EcoZense!</p>
        </div>
    </div>
@endif 