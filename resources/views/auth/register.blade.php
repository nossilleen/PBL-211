<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - EcoZense</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('{{ asset('images/test.jpeg') }}');"></div>
    <div class="absolute inset-0 bg-white/20 z-10"></div>

    <!-- Konten Register -->
    <div class="flex items-center justify-center min-h-screen relative z-20">
        <div class="flex w-full max-w-5xl rounded-3xl shadow-2xl overflow-hidden bg-white/0 h-[600px] items-center relative">
            <!-- Left Box -->
            <div class="hidden md:flex md:w-1/2 h-full items-center justify-center relative">
                <div class="absolute inset-0 bg-white/0  shadow-5x1 border-r-2 border-green-300"></div>
                <img src="{{ asset('images/1.png') }}" alt="Ilustrasi" class="w-auto h-auto object-contain z-20 pointer-events-none">
            </div>

            <!-- Right Box: Register Form -->
            <div class="w-full md:w-1/2 flex flex-col justify-center h-full relative">
                <div class="absolute inset-0 bg-white" style="opacity:0.50;"></div>
                <div class="relative z-10 p-6 flex flex-col justify-center h-full">
                    <div class="mb-3 text-center">
                        <img src="{{ asset('images/logo.jpg') }}" alt="EcoZense Logo" class="h-10 mx-auto mb-2">
                    </div>
                    <h1 class="text-xl font-bold text-green-800 mb-3 text-center">REGISTER</h1>

                    <!-- Wizard Indicators -->
                    <div class="flex justify-center items-center space-x-2 mb-4">
                        <div id="indicator-step-1" class="w-8 h-8 flex items-center justify-center rounded-full border-2 border-green-600 text-green-600 font-semibold bg-green-100">1</div>
                        <div class="w-12 h-0.5 bg-green-600"></div>
                        <div id="indicator-step-2" class="w-8 h-8 flex items-center justify-center rounded-full border-2 border-green-600 text-green-600 font-semibold">2</div>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-3" id="registerForm">
                        @csrf

                        <!-- STEP 1 -->
                        <div id="step-1">
                        @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mb-3 text-sm">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Baris 1 -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="space-y-1">
                                <label class="block text-gray-700 text-sm">Nama Lengkap</label>
                                <input type="text" name="name" class="w-full pl-3 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none" required autofocus>
                            </div>
                            <div class="space-y-1">
                                <label class="block text-gray-700 text-sm">Email</label>
                                <input type="email" name="email" class="w-full pl-3 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none" required>
                            </div>
                        </div>

                        <!-- Baris 2 -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="space-y-1">
                                <label class="block text-gray-700 text-sm">Nomor Telepon</label>
                                <input type="tel" name="phone" class="w-full pl-3 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="space-y-1">
                            <label class="block text-gray-700 text-sm">Password</label>
                            <div class="relative">
                                <button type="button" tabindex="-1" id="toggleLockBtnReg" class="absolute left-3 top-1/2 -translate-y-1/2 text-green-500 focus:outline-none transition" onclick="togglePasswordIconReg(this)">
                                    <svg id="lockIconReg" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14v8a2 2 0 01-2 2H7a2 2 0 01-2-2v-8z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11V7a5 5 0 0110 0v4"/>
                                    </svg>
                                </button>
                                <input type="password" name="password" class="w-full pl-10 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none" required id="passwordInputReg">
                            </div>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="space-y-1 mt-3">
                            <label class="block text-gray-700 text-sm">Konfirmasi Password</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" class="w-full pl-3 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none" required>
                            </div>
                        </div>

                        <!-- Tombol Step 1 -->
                        <div class="flex space-x-4 mt-8">
                            <button type="button" onclick="window.history.back()" class="w-1/2 py-3 px-4 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-xl transition duration-200">
                                Batal
                            </button>
                            <button type="button" id="nextBtn" class="w-1/2 py-3 px-4 bg-yellow-400 hover:bg-yellow-500 text-green-900 font-semibold rounded-xl transition duration-200">
                                Selanjutnya
                            </button>
                        </div>

                        </div> <!-- end step-1 -->

                        <!-- STEP 2 -->
                        <div id="step-2" class="hidden">

                            <!-- Baris tanggal lahir dan jenis kelamin -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="space-y-1">
                                    <label class="block text-gray-700 text-sm">Tanggal Lahir</label>
                                    <input type="date" name="birth_date" class="w-full pl-3 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none" required>
                                </div>
                                <div class="space-y-1">
                                    <label class="block text-gray-700 text-sm">Jenis Kelamin</label>
                                    <select name="gender" class="w-full pl-3 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Baris alamat (sudah ditambahkan sebelumnya) -->
                            <!-- Baris 4 -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="space-y-1">
                                    <label class="block text-gray-700 text-sm">Alamat</label>
                                    <textarea name="address" rows="2" class="w-full pl-3 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none resize-none" required></textarea>
                                </div>
                                <div class="space-y-1">
                                    <label class="block text-gray-700 text-sm">Kelurahan</label>
                                    <input type="text" name="kelurahan" class="w-full pl-3 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none" required>
                                </div>
                            </div>

                            <!-- Baris 5 -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="space-y-1">
                                    <label class="block text-gray-700 text-sm">Kecamatan</label>
                                    <input type="text" name="kecamatan" class="w-full pl-3 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none" required>
                                </div>
                                <div class="space-y-1">
                                    <label class="block text-gray-700 text-sm">Kode Pos</label>
                                    <input type="text" name="kode_pos" class="w-full pl-3 pr-3 py-2 rounded-xl bg-white shadow border border-green-100 focus:outline-none" required>
                                </div>
                            </div>

                            <!-- Tombol Step 2 -->
                            <div class="flex space-x-4 mt-8">
                                <button type="button" id="backBtn" class="w-1/2 py-3 px-4 bg-gray-300 hover:bg-gray-400 text-green-900 font-semibold rounded-xl transition duration-200">
                                    Kembali
                                </button>
                                <button type="submit" class="w-1/2 py-3 px-4 bg-yellow-400 hover:bg-yellow-500 text-green-900 font-semibold rounded-xl transition duration-200">
                                    Daftar
                                </button>
                            </div>

                        </div> <!-- end step-2 -->

                        <!-- Link Login -->
                        <div class="text-center mt-2">
                            <p class="text-gray-500 text-sm">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="text-yellow-500 hover:text-yellow-600 font-semibold">
                                    Login disini
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordIconReg(btn) {
            const input = document.getElementById('passwordInputReg');
            const icon = btn.querySelector('svg');
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14v8a2 2 0 01-2 2H7a2 2 0 01-2-2v-8z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7a5 5 0 015 5"/>
                `;
                btn.classList.replace('text-green-500', 'text-yellow-500');
            } else {
                input.type = 'password';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14v8a2 2 0 01-2 2H7a2 2 0 01-2-2v-8z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11V7a5 5 0 0110 0v4"/>
                `;
                btn.classList.replace('text-yellow-500', 'text-green-500');
            }
        }

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            var btn = document.getElementById('registerBtn');
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = '<span class="animate-spin inline-block mr-2 w-4 h-4 border-2 border-gray-200 border-t-green-300 rounded-full"></span>Loading...';
            }
        });

        // Helper to switch indicator styles
        function setActiveStep(step) {
            const step1 = document.getElementById('indicator-step-1');
            const step2 = document.getElementById('indicator-step-2');
            if (step === 1) {
                step1.classList.add('bg-green-100');
                step1.classList.remove('bg-green-600', 'text-white');
                step2.classList.add('text-green-600');
                step2.classList.remove('bg-green-100', 'bg-green-600', 'text-white');
            } else {
                step1.classList.remove('bg-green-100');
                step1.classList.add('text-green-600');
                step2.classList.add('bg-green-100');
            }
        }

        setActiveStep(1);

        // Wizard navigation
        document.getElementById('nextBtn').addEventListener('click', function() {
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2').classList.remove('hidden');
            setActiveStep(2);
        });

        document.getElementById('backBtn').addEventListener('click', function() {
            document.getElementById('step-2').classList.add('hidden');
            document.getElementById('step-1').classList.remove('hidden');
            setActiveStep(1);
        });
    </script>
</body>
</html>
