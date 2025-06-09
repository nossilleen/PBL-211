<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
    <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
        <h2 class="text-xl font-bold text-white">Upgrade</h2>
    </div>
    
    <div class="p-6">
        <p class="text-gray-600 mb-6">
            Ingin berkontribusi lebih lanjut? Segera upgrade!
        </p>

        <!-- Upgrade Role Section -->
        <div class="mb-8">
            @php
                $hasPending = \App\Models\Upgrade::where('user_id', auth()->id())
                    ->where('status', 'pending')
                    ->exists();
            @endphp

            <button id="openUpgradeModal" 
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded shadow transition {{ $hasPending ? 'opacity-50 cursor-not-allowed' : '' }}" 
                {{ $hasPending ? 'disabled' : '' }}>
                Ajukan Jadi Pengelola Bank Sampah
            </button>

            @if($hasPending)
                <p class="text-red-500 text-sm mt-2">Anda sudah mengajukan permohonan. Mohon tunggu verifikasi admin.</p>
            @else
                <p class="text-sm text-gray-500 mt-2">Ingin berkontribusi lebih? Ajukan diri Anda menjadi pengelola bank sampah!</p>
            @endif
        </div>
                    @if (session('success'))
                         <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                             {{ session('success') }}
                         </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            {{ session('error') }}
                        </div>
                    @endif
        <!-- Modal Upgrade Role -->
        <div id="upgradeModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <button id="closeUpgradeModal" class="absolute top-2 right-2 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
                <h2 class="text-xl font-bold mb-4 text-green-700">Form Pengajuan Pengelola Bank Sampah</h2>
                <form action="{{ route('nasabah.upgrade') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Bank Sampah</label>
                        <input type="text" name="nama_bank_sampah" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Contoh: Bank Sampah Sejahtera" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Alamat Lengkap</label>
                        <textarea name="alamat_lengkap" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" rows="2" placeholder="Alamat lengkap lokasi bank sampah" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Kota</label>
                        <input type="text" name="kota" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Kota" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Alasan Pengajuan</label>
                        <textarea name="alasan_pengajuan" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" rows="2" placeholder="Mengapa Anda ingin menjadi pengelola?" required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded mr-2" id="closeUpgradeModal2">Batal</button>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-semibold">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const openBtn = document.getElementById('openUpgradeModal');
                const closeBtn = document.getElementById('closeUpgradeModal');
                const closeBtn2 = document.getElementById('closeUpgradeModal2');
                const modal = document.getElementById('upgradeModal');
                
                // Only add click event if button is not disabled
                if (!openBtn.hasAttribute('disabled')) {
                    openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
                }
                
                closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
                closeBtn2.addEventListener('click', () => modal.classList.add('hidden'));
            });
        </script>
        <!-- End Upgrade Role Section -->
    </div>
</div>