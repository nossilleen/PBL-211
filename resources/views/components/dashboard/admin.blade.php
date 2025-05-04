<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
    <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
        <h2 class="text-xl font-bold text-white">Dashboard Admin</h2>
    </div>
    
    <div class="p-6">
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
                <a href="{{ route('admin.user') }}" class="block bg-green-100 hover:bg-green-200 p-4 rounded-lg border border-green-200">
                    <h4 class="font-semibold text-green-800">User Management</h4>
                    <p class="text-sm text-gray-600 mt-1">Manage all system users</p>
                </a>
                <a href="{{ route('admin.artikel') }}" class="block bg-blue-100 hover:bg-blue-200 p-4 rounded-lg border border-blue-200">
                    <h4 class="font-semibold text-blue-800">Content Management</h4>
                    <p class="text-sm text-gray-600 mt-1">Manage articles and content</p>
                </a>
                <a href="{{ route('admin.pengajuan') }}" class="block bg-yellow-100 hover:bg-yellow-200 p-4 rounded-lg border border-yellow-200">
                    <h4 class="font-semibold text-yellow-800">Pengajuan Management</h4>
                    <p class="text-sm text-gray-600 mt-1">Manage user submissions</p>
                </a>
            </div>
        </div>
    </div>
</div> 