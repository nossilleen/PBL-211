<div class="bg-white rounded-lg shadow-md p-6">
    <div class="poin-saya">
        <h2 class="text-lg font-bold">Poin Saya</h2>
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <span class="text-3xl font-bold text-green-600">{{ number_format(Auth::user()->points ?? 0) }} Poin</span>
                <p class="ml-4 text-sm text-gray-600">Poin dapat ditukar dengan Eco Enzim atau Sembako di lokasi terdekat
                    <!-- <br>Setor 3kg sampah lagi untuk tukar 1 produk Eco Enzim!</p> -->
            </div>
            <div class="flex items-center">
                @if(Auth::user()->expired_at)
                    <div class="mr-4 text-xs text-gray-500" id="expired-timer"></div>
                    <script>
                        const expiredAt = new Date("{{ \Carbon\Carbon::parse(Auth::user()->expired_at)->toIso8601String() }}").getTime();
                        function updateTimer() {
                            const now = new Date().getTime();
                            let distance = expiredAt - now;
                            if (distance < 0) {
                                document.getElementById('expired-timer').innerText = "Poin Expired";
                                return;
                            }
                            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            document.getElementById('expired-timer').innerText = `${days} Hari, ${hours} Jam, ${minutes} Menit`;
                        }
                        updateTimer();
                        setInterval(updateTimer, 60000);
                    </script>
                @endif
                <!-- <label for="lokasi" class="mr-2 text-sm font-medium">Lokasi</label>
                <select id="lokasi" class="border border-gray-300 rounded px-2 py-1 text-sm">
                    <option value="semua">Semua</option>
                    <option value="lokasi1">Lokasi 1</option>
                    <option value="lokasi2">Lokasi 2</option>
                    <option value="lokasi3">Lokasi 3</option>
                </select> -->
                <a href="/browse" class="ml-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 inline-block">Tukar Poin</a>
            </div>
        </div>
    </div>
</div>

<div class="mt-8">
    <h3 class="text-lg font-bold">Riwayat Poin</h3>
    <div class="mt-4 bg-white rounded-lg shadow-md p-6">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3 text-right">
                        Jumlah
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $histories = Auth::user()->pointHistories()->orderBy('created_at', 'desc')->limit(10)->get();
                @endphp
                @forelse ($histories as $history)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">
                            {{ $history->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $history->description }}
                        </td>
                        <td class="px-6 py-4 text-right font-medium {{ $history->transaction_type == 'credit' ? 'text-green-600' : 'text-red-600' }}">
                            {{ ($history->transaction_type == 'credit' ? '+' : '-') . number_format($history->amount) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                            Belum ada riwayat poin.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>