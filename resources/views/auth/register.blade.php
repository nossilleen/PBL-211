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
<body class="font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center bg-green-800" style="background-image: url('{{ asset('images/bg3.jpeg') }}');">
        <!-- Overlay dengan blur -->
        <!-- <div class="absolute inset-0 bg-green-900/80"></div> -->
        
        <!-- Form Container -->
        <div class="relative w-full max-w-md mx-4">
            <!-- Form Header -->
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="EcoZense Logo" class="h-16 mx-auto mb-6">
                <h1 class="text-2xl font-bold text-yellow-300">Formulir Pendaftaran Nasabah</h1>
            </div>

            <!-- Form Content -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                
                <!-- Nama Lengkap -->
                <div class="space-y-2">
                    <label class="block text-gray-100">Nama Lengkap</label>
                    <input type="text" name="name" class="w-full px-4 py-3 rounded-xl bg-white border border-gray-300 text-gray-800 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" required autofocus>
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label class="block text-gray-100">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-3 rounded-xl bg-white border border-gray-300 text-gray-800 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" required>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label class="block text-gray-100">Password</label>
                    <div class="relative">
                        <input type="password" name="password" class="w-full px-4 py-3 rounded-xl bg-white border border-gray-300 text-gray-800 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 pr-10" required>
                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400" onclick="togglePassword(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Nomor Telepon -->
                <div class="space-y-2">
                    <label class="block text-gray-100">Nomor Telepon</label>
                    <input type="tel" name="phone" class="w-full px-4 py-3 rounded-xl bg-white border border-gray-300 text-gray-800 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="space-y-2">
                    <label class="block text-gray-100">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="w-full px-4 py-3 rounded-xl bg-white border border-gray-300 text-gray-800 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="space-y-2">
                    <label class="block text-gray-100">Jenis Kelamin</label>
                    <select name="gender" class="w-full px-4 py-3 rounded-xl bg-white border border-gray-300 text-gray-800 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <!-- Alamat -->
                <div class="space-y-2">
                    <label class="block text-gray-100">Alamat</label>
                    <textarea name="address" rows="3" class="w-full px-4 py-3 rounded-xl bg-white border border-gray-300 text-gray-800 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" required></textarea>
                </div>

                <!-- Submit & Cancel Buttons -->
                <div class="flex space-x-4 mt-8">
                    <button type="submit" class="w-1/2 py-3 px-4 bg-yellow-400 hover:bg-yellow-500 text-green-900 font-semibold rounded-xl transition duration-200">
                        Submit
                    </button>
                    <button type="button" onclick="window.history.back()" class="w-1/2 py-3 px-4 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-xl transition duration-200">
                        Cancel
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center mt-6">
                    <p class="text-gray-300 text-sm">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-yellow-300 hover:text-yellow-400 font-semibold">
                            Login disini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(button) {
            const input = button.parentElement.querySelector('input');
            const icon = button.querySelector('svg');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `<path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" /><path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />`;
            } else {
                input.type = 'password';
                icon.innerHTML = `<path d="M10 12a2 2 0 100-4 2 2 0 000 4z" /><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />`;
            }
        }
    </script>
</body>
</html>
