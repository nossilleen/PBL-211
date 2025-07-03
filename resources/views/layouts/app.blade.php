<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="bg-gray-100 font-sans antialiased">
        <div id="app">
            <!-- Navbar with conditional classes and standard height -->
            <div class="{{ !Request::is('toko', 'toko/*', 'events/*', 'artikel/*') ? 'navbar-transparent' : 'navbar-solid' }} fixed top-0 left-0 right-0 z-50 h-12">
                <x-home.navbar />
            </div>
            
            <!-- Main content with adjusted margin to match navbar height -->
            <main class="mt-12">
                <x-flash-message />
                @yield('content')
            </main>
        </div>
        @stack('scripts')
    </body>
</html>
