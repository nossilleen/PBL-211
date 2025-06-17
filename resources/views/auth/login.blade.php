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
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex">
        <div class="w-full bg-green-800 p-6 flex flex-col md:flex-row items-center justify-between relative">
            <!-- Form Login -->
            <div class="flex-1 flex flex-col justify-center">
                <div class="mb-8 ml-4">
                    <img src="{{ asset('images/logo.png') }}" alt="EcoZense Logo" class="h-12">
                </div>

                <div class="max-w-md ml-4">
                    <h1 class="text-3xl font-bold text-yellow-300 mb-8">LOGIN</h1>
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="space-y-2">
                            <label class="block text-gray-200">Email</label>
                            <input type="email" name="email" class="w-full px-4 py-3 rounded-2xl bg-white focus:outline-none" required autofocus>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-gray-200">Password</label>
                            <div class="relative">
                                <input type="password" name="password" class="w-full px-4 py-3 rounded-2xl bg-white focus:outline-none pr-10" required>
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400" onclick="togglePassword(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300">
                            <label for="remember" class="ml-2 text-gray-200">Remember me?</label>
                        </div>

                        <button type="submit" class="w-full py-3 px-4 bg-yellow-300 hover:bg-yellow-400 text-green-900 font-semibold rounded-2xl transition duration-200">
                            LOGIN
                        </button>

                        <div class="text-center">
                            <a href="{{ route('password.request') }}" class="text-gray-400 hover:text-gray-200 text-sm">
                                Forgot Password?
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Gambar -->
            <div class="hidden md:flex items-center justify-center flex-1">
                <img src="{{ asset('images/4.png') }}" alt="Ilustrasi" class="w-[250px] h-auto object-contain">
            </div>
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
