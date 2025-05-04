<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nasabah Dashboard - EcoZense</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-green-800 text-white shadow-lg">
            <div class="container mx-auto px-4 py-3 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="EcoZense Logo" class="h-10">
                    <span class="ml-4 text-xl font-semibold">Nasabah Dashboard</span>
                </div>
                <div>
                    <span class="font-medium">{{ Auth::user()->nama }}</span>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="ml-4 bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-sm">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container mx-auto px-6 py-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome, {{ Auth::user()->nama }}!</h1>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <p class="text-gray-600 mb-6">
                    This is your nasabah dashboard. Here you can manage your account, track waste collection progress, 
                    and see your contribution to environmental sustainability.
                </p>

                <!-- Upgrade Role Section -->
                <div class="mb-8">
                    <button id="openUpgradeModal" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded shadow transition">Ajukan Jadi Pengelola Bank Sampah</button>
                    <p class="text-sm text-gray-500 mt-2">Ingin berkontribusi lebih? Ajukan diri Anda menjadi pengelola bank sampah!</p>
                </div>

                <!-- Modal Upgrade Role -->
                <div id="upgradeModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                        <button id="closeUpgradeModal" class="absolute top-2 right-2 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
                        <h2 class="text-xl font-bold mb-4 text-green-700">Form Pengajuan Pengelola Bank Sampah</h2>
                        <form>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Bank Sampah</label>
                                <input type="text" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Contoh: Bank Sampah Sejahtera" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Alamat Lengkap</label>
                                <textarea class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" rows="2" placeholder="Alamat lengkap lokasi bank sampah" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Kota</label>
                                <input type="text" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Kota" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Alasan Pengajuan</label>
                                <textarea class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" rows="2" placeholder="Mengapa Anda ingin menjadi pengelola?" required></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded mr-2" id="closeUpgradeModal2">Batal</button>
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-semibold">Ajukan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    // Modal logic
                    document.addEventListener('DOMContentLoaded', function() {
                        const openBtn = document.getElementById('openUpgradeModal');
                        const closeBtn = document.getElementById('closeUpgradeModal');
                        const closeBtn2 = document.getElementById('closeUpgradeModal2');
                        const modal = document.getElementById('upgradeModal');
                        openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
                        closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
                        closeBtn2.addEventListener('click', () => modal.classList.add('hidden'));
                    });
                </script>
                <!-- End Upgrade Role Section -->

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <!-- Points Card -->
                    <div class="bg-green-50 rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-green-800 mb-2">Your Points</h3>
                        <p class="text-3xl font-bold text-green-600">0</p>
                        <p class="text-sm text-gray-500 mt-2">Total points earned</p>
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
                </div>

                <!-- Pemesanan Belum Upload Bukti Bayar -->
                <div class="mt-10 mb-8">
                    <h2 class="text-xl font-bold text-blue-700 mb-4">Pemesanan Belum Upload Bukti Bayar</h2>
                    <!-- Tabel Daftar Pesanan -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white rounded shadow text-sm">
                            <thead class="bg-blue-100">
                                <tr>
                                    <th class="py-2 px-3 text-left">No</th>
                                    <th class="py-2 px-3 text-left">Produk</th>
                                    <th class="py-2 px-3 text-left">Tanggal</th>
                                    <th class="py-2 px-3 text-left">Jumlah</th>
                                    <th class="py-2 px-3 text-left">Harga</th>
                                    <th class="py-2 px-3 text-left">Metode</th>
                                    <th class="py-2 px-3 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Contoh data dummy, ganti dengan loop data pesanan dari backend -->
                                <tr>
                                    <td class="py-2 px-3">1</td>
                                    <td class="py-2 px-3">Eco Enzim 1L</td>
                                    <td class="py-2 px-3">2025-05-01</td>
                                    <td class="py-2 px-3">2</td>
                                    <td class="py-2 px-3">Rp 50.000</td>
                                    <td class="py-2 px-3">Transfer</td>
                                    <td class="py-2 px-3">
                                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-semibold" onclick="openUploadModal()">Upload Bukti</button>
                                    </td>
                                </tr>
                                <!-- Jika tidak ada data, tampilkan pesan -->
                                <tr class="hidden" id="noOrderRow">
                                    <td colspan="7" class="py-4 text-center text-gray-400">Tidak ada pesanan yang menunggu upload bukti bayar.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal Upload Bukti Pembayaran -->
                <div id="uploadModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                        <button onclick="closeUploadModal()" class="absolute top-2 right-2 text-gray-400 hover:text-red-500 text-2xl">&times;</button>
                        <h2 class="text-xl font-bold mb-4 text-yellow-700">Upload Bukti Pembayaran</h2>
                        <form enctype="multipart/form-data">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Pilih File Bukti (jpg, png, pdf)</label>
                                <input type="file" accept="image/*,application/pdf" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" onclick="closeUploadModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded mr-2">Batal</button>
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded font-semibold">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    // Modal upload bukti pembayaran
                    function openUploadModal() {
                        document.getElementById('uploadModal').classList.remove('hidden');
                    }
                    function closeUploadModal() {
                        document.getElementById('uploadModal').classList.add('hidden');
                    }
                </script>
            </div>
        </div>
    </div>
</body>
</html> 