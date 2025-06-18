<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - EcoZense</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased relative" style="background: url('{{ asset('images/bg1.jpeg') }}') no-repeat center center fixed; background-size: cover;">
    <!-- Blur overlay -->
    <div class="absolute inset-0 backdrop-blur-sm bg-white/30 z-0"></div>

    <div class="flex items-center justify-center min-h-screen relative z-10">
        <div class="flex w-full max-w-3xl rounded-3xl shadow-2xl overflow-hidden bg-white/0 h-[600px] items-center relative z-30">
            <!-- Left Box -->
            <div class="hidden md:flex md:w-1/2 h-full items-center justify-center relative">
                <div class="absolute inset-0 bg-white/0" style="opacity:0.04;"></div>
                <img src="{{ asset('images/2.png') }}" alt="Ilustrasi"
                     class="w-auto h-auto object-contain z-20 pointer-events-none">
            </div>
            <!-- Right Box: Login Form -->
            <div class="w-full md:w-1/2 flex flex-col justify-center h-full relative">
                <div class="absolute inset-0 bg-white" style="opacity:0.9;"></div>
                <div class="relative z-10 p-10 flex flex-col justify-center h-full">
                    <div class="mb-6 text-center">
                        <img src="{{ asset('images/logo.png') }}" alt="EcoZense Logo" class="h-10 mx-auto">
                    </div>
                    <h1 class="text-2xl font-bold text-green-800 mb-6 text-center">LOGIN</h1>
                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf
                        @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-3 text-sm">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="space-y-1">
                            <label class="block text-gray-700 text-sm">Email</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </span>
                                <input type="email" name="email" class="w-full pl-10 pr-3 py-2 rounded-2xl bg-white shadow border border-green-100 focus:outline-none" required autofocus>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="block text-gray-700 text-sm">Password</label>
                            <div class="relative">
                                <button type="button" tabindex="-1" id="toggleLockBtn"
                                    class="absolute left-3 top-1/2 -translate-y-1/2 text-green-500 focus:outline-none transition"
                                    onclick="togglePasswordIcon(this)">
                                    <svg id="lockIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14v8a2 2 0 01-2 2H7a2 2 0 01-2-2v-8z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11V7a5 5 0 0110 0v4"/>
                                    </svg>
                                </button>
                                <input type="password" name="password" class="w-full pl-10 pr-3 py-2 rounded-2xl bg-white shadow border border-green-100 focus:outline-none" required id="passwordInput">
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-8 mt-2">
                            <div class="flex items-center">
                                <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300">
                                <label for="remember" class="ml-2 text-gray-700 text-sm">Remember me?</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-gray-400 hover:text-gray-700 text-sm">
                                Forgot Password?
                            </a>
                        </div>
                        <button type="submit" class="w-full py-2 px-3 bg-yellow-300 hover:bg-yellow-400 text-green-900 font-semibold rounded-2xl transition duration-200 mt-4">
                            LOGIN
                        </button>
                        <div class="text-center mt-2">
                            <p class="text-gray-500 text-sm">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="text-yellow-500 hover:text-yellow-600 font-semibold">
                                    Daftar disini
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    function togglePasswordIcon(btn) {
        const input = document.getElementById('passwordInput');
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
    </script>
</body>
</html>
