@extends('admin.layout')

@section('title', 'Edit Artikel - EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Artikel</h1>
        <p class="text-gray-600 mt-1">Edit data artikel di bawah ini</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('admin.artikel.update', $artikel->artikel_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $artikel->judul) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                <textarea name="konten" id="konten" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>{{ old('konten', $artikel->konten) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                @if($artikel->gambar && $artikel->gambar->count())
                    <div class="mt-2">
                        <span class="text-xs text-gray-500">Gambar saat ini:</span>
                        <img src="{{ asset($artikel->gambar->first()->file_path) }}" alt="Gambar Artikel" class="h-20 mt-1 rounded">
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" id="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="eco enzim" {{ old('kategori', $artikel->kategori) == 'eco enzim' ? 'selected' : '' }}>Eco Enzim</option>
                    <option value="bank sampah" {{ old('kategori', $artikel->kategori) == 'bank sampah' ? 'selected' : '' }}>Bank Sampah</option>
                    <option value="tips dan trik" {{ old('kategori', $artikel->kategori) == 'tips dan trik' ? 'selected' : '' }}>Tips & Trik</option>
                    <option value="berita" {{ old('kategori', $artikel->kategori) == 'berita' ? 'selected' : '' }}>Berita</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $artikel->user ? $artikel->user->nama : '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="tanggal_publikasi" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" value="{{ old('tanggal_publikasi', $artikel->tanggal_publikasi ? $artikel->tanggal_publikasi->format('Y-m-d') : '' ) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.artikel.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition-colors">Batal</a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">Ubah Artikel</button>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div id="successModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center">
                <h2 class="text-2xl font-bold mb-4 text-green-600">Berhasil!</h2>
                <p class="mb-6">{{ session('success') }}</p>
                <button onclick="document.getElementById('successModal').classList.add('hidden')" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tutup</button>
            </div>
        </div>
    @endif
@endsection
