<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-8 mt-8">
    <h2 class="text-2xl font-bold mb-6">Edit Profil</h2>
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">NAMA LENGKAP</label>
            <input type="text" name="nama" value="{{ old('nama', Auth::user()->nama) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Nomor Telepon</label>
            <input type="text" name="telepon" value="{{ old('telepon', Auth::user()->telepon) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Password</label>
            <input type="password" name="password" placeholder="********" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">jenis kelamin</label>
            <input type="text" name="jenis_kelamin" value="{{ old('jenis_kelamin', Auth::user()->jenis_kelamin) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', Auth::user()->alamat) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-900">KONFIRMASI</button>
        </div>
    </form>
</div> 