<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
    <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
        <h2 class="text-xl font-bold text-white">Dashboard Pengelola</h2>
    </div>
    
    <div class="p-6">
        <p class="text-gray-600 mb-6">
            This is your pengelola dashboard. Here you can manage waste collection,
            handle transactions, and view statistics about your waste management operations.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
            <!-- Nasabah Card -->
            <div class="bg-green-50 rounded-lg p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-green-800 mb-2">Total Nasabah</h3>
                <p class="text-3xl font-bold text-green-600">0</p>
                <p class="text-sm text-gray-500 mt-2">Registered with your facility</p>
            </div>

            <!-- Transactions Card -->
            <div class="bg-blue-50 rounded-lg p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-blue-800 mb-2">Transactions</h3>
                <p class="text-3xl font-bold text-blue-600">0</p>
                <p class="text-sm text-gray-500 mt-2">Total transactions</p>
            </div>

            <!-- Waste Collected Card -->
            <div class="bg-yellow-50 rounded-lg p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-yellow-800 mb-2">Waste Collected</h3>
                <p class="text-3xl font-bold text-yellow-600">0 kg</p>
                <p class="text-sm text-gray-500 mt-2">Total waste collected</p>
            </div>
            
            <!-- Income Card -->
            <div class="bg-purple-50 rounded-lg p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-purple-800 mb-2">Income</h3>
                <p class="text-3xl font-bold text-purple-600">Rp 0</p>
                <p class="text-sm text-gray-500 mt-2">Total income</p>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="mt-10 mb-8">
            <h2 class="text-xl font-bold text-blue-700 mb-4">Transaksi Terbaru</h2>
            <!-- Tabel Daftar Transaksi -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded shadow text-sm">
                    <thead class="bg-blue-100">
                        <tr>
                            <th class="py-2 px-3 text-left">No</th>
                            <th class="py-2 px-3 text-left">Nasabah</th>
                            <th class="py-2 px-3 text-left">Tanggal</th>
                            <th class="py-2 px-3 text-left">Jenis Sampah</th>
                            <th class="py-2 px-3 text-left">Berat (kg)</th>
                            <th class="py-2 px-3 text-left">Poin</th>
                            <th class="py-2 px-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh data dummy, ganti dengan loop data transaksi dari backend -->
                        <tr>
                            <td class="py-2 px-3">1</td>
                            <td class="py-2 px-3">Budi Santoso</td>
                            <td class="py-2 px-3">2025-05-01</td>
                            <td class="py-2 px-3">Plastik</td>
                            <td class="py-2 px-3">5</td>
                            <td class="py-2 px-3">50</td>
                            <td class="py-2 px-3">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">Selesai</span>
                            </td>
                        </tr>
                        <!-- Jika tidak ada data, tampilkan pesan -->
                        <tr class="hidden" id="noTransactionsRow">
                            <td colspan="7" class="py-4 text-center text-gray-400">Belum ada transaksi.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add New Transaction Button -->
        <div class="mt-8">
            <button id="openTransactionModal" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Transaksi Baru
            </button>
        </div>

        <!-- Modal Tambah Transaksi -->
        <div id="transactionModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <button id="closeTransactionModal" class="absolute top-2 right-2 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
                <h2 class="text-xl font-bold mb-4 text-green-700">Tambah Transaksi Baru</h2>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Nasabah</label>
                        <select class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                            <option value="">-- Pilih Nasabah --</option>
                            <option value="1">Budi Santoso</option>
                            <option value="2">Ani Wijaya</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Jenis Sampah</label>
                        <select class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                            <option value="">-- Pilih Jenis Sampah --</option>
                            <option value="plastik">Plastik</option>
                            <option value="kertas">Kertas</option>
                            <option value="logam">Logam</option>
                            <option value="kaca">Kaca</option>
                            <option value="organik">Organik</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Berat (kg)</label>
                        <input type="number" min="0.1" step="0.1" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded mr-2" id="closeTransactionModal2">Batal</button>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-semibold">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            // Modal Tambah Transaksi
            document.addEventListener('DOMContentLoaded', function() {
                const openBtn = document.getElementById('openTransactionModal');
                const closeBtn = document.getElementById('closeTransactionModal');
                const closeBtn2 = document.getElementById('closeTransactionModal2');
                const modal = document.getElementById('transactionModal');
                
                if (openBtn && closeBtn && closeBtn2 && modal) {
                    openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
                    closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
                    closeBtn2.addEventListener('click', () => modal.classList.add('hidden'));
                }
            });
        </script>
    </div>
</div> 