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
            <input type="text" name="telepon" value="{{ old('telepon', Auth::user()->no_hp) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <!-- <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Password</label>
            <input type="password" name="password" placeholder="********" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div> -->
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir ? date('Y-m-d', strtotime(Auth::user()->tanggal_lahir)) : '') }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200">
                <option value="" disabled {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', Auth::user()->alamat) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Kota</label>
            <input type="text" name="kota" value="{{ old('kota', Auth::user()->kota) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Provinsi</label>
            <input type="text" name="provinsi" value="{{ old('provinsi', Auth::user()->provinsi) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Kode Pos</label>
            <input type="text" name="kode_pos" value="{{ old('kode_pos', Auth::user()->kode_pos) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-900">KONFIRMASI</button>
        </div>
    </form>
</div> 