<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-8 mt-8">
    <h2 class="text-2xl font-bold mb-6">Edit Profil</h2>
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-5" id="editProfileForm">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">NAMA LENGKAP</label>
            <input type="text" name="nama" value="{{ old('nama', Auth::user()->nama) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Nomor Telepon</label>
            <input type="text" name="telepon" id="teleponInput" value="{{ old('telepon', Auth::user()->no_hp) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
            <span id="teleponError" class="text-red-600 text-sm"></span>
            @if ($errors->has('telepon'))
                <span class="text-red-600 text-sm">{{ $errors->first('telepon') }}</span>
            @endif
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
            <label class="block text-gray-500 text-sm font-medium mb-1">Kecamatan</label>
            <input type="text" name="kecamatan" value="{{ old('kecamatan', Auth::user()->kecamatan) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
        </div>
        <div>
            <label class="block text-gray-500 text-sm font-medium mb-1">Kelurahan</label>
            <input type="text" name="kelurahan" value="{{ old('kelurahan', Auth::user()->kelurahan) }}" class="w-full border rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-200" />
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

<!-- Modal Custom untuk Validasi -->
<div id="modalAlert" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center">
        <h2 class="text-2xl font-bold mb-4 text-red-600">Peringatan!</h2>
        <p class="mb-6 text-gray-700">Semua kolom wajib diisi!</p>
        <button onclick="closeModalAlert()" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded">Tutup</button>
    </div>
</div>

<script>
function showModalAlert() {
    document.getElementById('modalAlert').classList.remove('hidden');
}
function closeModalAlert() {
    document.getElementById('modalAlert').classList.add('hidden');
}

document.getElementById('editProfileForm').addEventListener('submit', function(e) {
    var requiredFields = [
        'nama', 'telepon', 'email', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'kecamatan', 'kelurahan', 'kode_pos'
    ];
    var isValid = true;
    requiredFields.forEach(function(field) {
        var input = document.querySelector('[name="' + field + '"]');
        if (input && !input.value.trim()) {
            input.classList.add('border-red-500');
            isValid = false;
        } else if (input) {
            input.classList.remove('border-red-500');
        }
    });
    if (!isValid) {
        showModalAlert();
        e.preventDefault();
        return;
    }
    var telepon = document.getElementById('teleponInput').value.trim();
    var errorSpan = document.getElementById('teleponError');
    errorSpan.textContent = '';
    if (telepon && telepon.length < 10) {
        errorSpan.textContent = 'Nomor HP minimal 10 digit.';
        e.preventDefault();
    }
});
</script>