<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - EcoZense</title>
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
                    <img src="{{ asset('images/logo.jpg') }}" alt="EcoZense Logo" class="h-10">
                    <span class="ml-4 text-xl font-semibold">Dasbor Admin</span>
                </div>
                <div>
                    <span class="font-medium">{{ Auth::user()->nama }}</span>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="ml-4 bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-sm">
                        Keluar
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
                    This is your admin dashboard. Here you can monitor the entire system, manage users, 
                    and oversee all activities within the EcoZense platform.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
                    <!-- Users Card -->
                    <div class="bg-green-50 rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-green-800 mb-2">Total Users</h3>
                        <p class="text-3xl font-bold text-green-600">0</p>
                        <p class="text-sm text-gray-500 mt-2">All registered users</p>
                    </div>

                    <!-- Nasabah Card -->
                    <div class="bg-blue-50 rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-blue-800 mb-2">Nasabah</h3>
                        <p class="text-3xl font-bold text-blue-600">0</p>
                        <p class="text-sm text-gray-500 mt-2">Registered nasabah</p>
                    </div>

                    <!-- Pengelola Card -->
                    <div class="bg-yellow-50 rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-yellow-800 mb-2">Pengelola</h3>
                        <p class="text-3xl font-bold text-yellow-600">0</p>
                        <p class="text-sm text-gray-500 mt-2">Waste management staff</p>
                    </div>

                    <!-- Transactions Card -->
                    <div class="bg-purple-50 rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-purple-800 mb-2">Transactions</h3>
                        <p class="text-3xl font-bold text-purple-600">0</p>
                        <p class="text-sm text-gray-500 mt-2">Total transactions</p>
                    </div>
                </div>

                <div class="mt-10">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Administration</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="#" class="block bg-green-100 hover:bg-green-200 p-4 rounded-lg border border-green-200">
                            <h4 class="font-semibold text-green-800">User Management</h4>
                            <p class="text-sm text-gray-600 mt-1">Manage all system users</p>
                        </a>
                        <a href="#" class="block bg-blue-100 hover:bg-blue-200 p-4 rounded-lg border border-blue-200">
                            <h4 class="font-semibold text-blue-800">Content Management</h4>
                            <p class="text-sm text-gray-600 mt-1">Manage articles and content</p>
                        </a>
                        <a href="#" class="block bg-yellow-100 hover:bg-yellow-200 p-4 rounded-lg border border-yellow-200">
                            <h4 class="font-semibold text-yellow-800">System Settings</h4>
                            <p class="text-sm text-gray-600 mt-1">Configure system settings</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 