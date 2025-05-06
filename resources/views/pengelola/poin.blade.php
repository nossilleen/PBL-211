@extends('pengelola.layout')

@section('title', 'Poin - Pengelola EcoZense')

@section('content')
    <!-- Main Content -->
    <div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Poin</h1>
            <form action="{{ route('pengelola.poin') }ethod="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="user" class="block text-xl font-semibold text-gray-800 mb-6">User Nasabah</label>
                    <input type="text" id="user" name="user" class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 text-lg px-4 py-2" placeholder="Masukkan nama atau ID user">
                </div>
                <div class="mt-8">
                    <label for="nominal" class="block text-xl font-semibold text-gray-800 mb-6">Nominal Poin</label>
                    <input type="number" id="nominal" name="nominal" class="mt-1 block w-3/4 rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 text-lg px-4 py-2" placeholder="Masukkan nominal poin" min="0">
                </div>
                <div class="mt-8 flex justify-between w-3/4">
                    <button type="submit" class="bg-green-500 text-white py-3 px-4 rounded-lg text-lg font-semibold hover:bg-green-600 w-1/2 mr-2">Simpan</button>
                    <button type="button" class="bg-red-500 text-white py-3 px-4 rounded-lg text-lg font-semibold hover:bg-red-600 w-1/2 ml-2">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection