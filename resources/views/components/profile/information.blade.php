<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
    <div class="bg-green-600 px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-white">Informasi Profil</h1>
        <button type="button" onclick="showSection('edit-profile-section')" class="inline-flex items-center px-3 py-1 bg-white text-green-600 border border-green-600 rounded hover:bg-green-50 hover:text-green-700 transition-colors text-sm font-semibold">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            <span>Edit</span>
        </button>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Nama Lengkap</h3>
                <p class="text-gray-800 font-semibold">{{ Auth::user()->nama }}</p>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Email</h3>
                <p class="text-gray-800 font-semibold">{{ Auth::user()->email }}</p>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">No. Telepon</h3>
                <p class="text-gray-800 font-semibold">{{ Auth::user()->no_hp ?? '-' }}</p>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Role</h3>
                <p class="text-gray-800 font-semibold">{{ ucfirst(Auth::user()->role) }}</p>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Status Akun</h3>
                <p class="bg-green-100 text-green-800 inline-block px-2 py-1 rounded text-xs font-semibold">Aktif</p>
            </div>
            <div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Tanggal Registrasi</h3>
                <p class="text-gray-800 font-semibold">{{ Auth::user()->created_at->format('d M Y') }}</p>
            </div>
        </div>
        <div class="mt-8 pt-6 border-t border-gray-100">
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Detail Alamat</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Alamat Lengkap</h3>
                    <p class="text-gray-800 font-semibold">{{ Auth::user()->alamat ?? '-' }}</p>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Kota</h3>
                    <p class="text-gray-800 font-semibold">{{ Auth::user()->kota ?? '-' }}</p>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Provinsi</h3>
                    <p class="text-gray-800 font-semibold">{{ Auth::user()->provinsi ?? '-' }}</p>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium mb-1">Kode Pos</h3>
                    <p class="text-gray-800 font-semibold">{{ Auth::user()->kode_pos ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</div> 