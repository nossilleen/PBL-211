@extends('pengelola.layout')

@section('title', 'Alamat - Pengelola EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Alamat</h1>
        <p class="text-gray-600 mt-1">Kelola data alamat dan lokasi bank sampah</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Nama Jalan Form -->
        <div class="bg-white rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Nama Jalan</h3>
            <div class="relative">
                <input type="text" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Entered text">
            </div>
        </div>

        <!-- Alamat Form -->
        <div class="bg-white rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Alamat</h3>
            <div class="relative">
                <input type="text" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Entered text">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Kelurahan Form -->
        <div class="bg-white rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Kelurahan</h3>
            <div class="relative">
                <input type="text" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Entered text">
            </div>
        </div>

        <!-- Kecamatan Form -->
        <div class="bg-white rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Kecamatan</h3>
            <div class="relative">
                <input type="text" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Entered text">
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Pin Lokasi Di Peta:</h2>
        <div class="rounded-lg overflow-hidden h-96 bg-gray-100">
            <!-- Map container -->
            <div class="h-full w-full bg-gray-200 relative">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0iI2RkZGRkZCIgZmlsbC1ydWxlPSJldmVub2RkIj48Y2lyY2xlIGN4PSIxIiBjeT0iMSIgcj0iMSIvPjxjaXJjbGUgY3g9IjUiIGN5PSIxIiByPSIxIi8+PGNpcmNsZSBjeD0iOSIgY3k9IjEiIHI9IjEiLz48Y2lyY2xlIGN4PSIxMyIgY3k9IjEiIHI9IjEiLz48Y2lyY2xlIGN4PSIxNyIgY3k9IjEiIHI9IjEiLz48Y2lyY2xlIGN4PSIxIiBjeT0iNSIgcj0iMSIvPjxjaXJjbGUgY3g9IjUiIGN5PSI1IiByPSIxIi8+PGNpcmNsZSBjeD0iOSIgY3k9IjUiIHI9IjEiLz48Y2lyY2xlIGN4PSIxMyIgY3k9IjUiIHI9IjEiLz48Y2lyY2xlIGN4PSIxNyIgY3k9IjUiIHI9IjEiLz48Y2lyY2xlIGN4PSIxIiBjeT0iOSIgcj0iMSIvPjxjaXJjbGUgY3g9IjUiIGN5PSI5IiByPSIxIi8+PGNpcmNsZSBjeD0iOSIgY3k9IjkiIHI9IjEiLz48Y2lyY2xlIGN4PSIxMyIgY3k9IjkiIHI9IjEiLz48Y2lyY2xlIGN4PSIxNyIgY3k9IjkiIHI9IjEiLz48Y2lyY2xlIGN4PSIxIiBjeT0iMTMiIHI9IjEiLz48Y2lyY2xlIGN4PSI1IiBjeT0iMTMiIHI9IjEiLz48Y2lyY2xlIGN4PSI5IiBjeT0iMTMiIHI9IjEiLz48Y2lyY2xlIGN4PSIxMyIgY3k9IjEzIiByPSIxIi8+PGNpcmNsZSBjeD0iMTciIGN5PSIxMyIgcj0iMSIvPjxjaXJjbGUgY3g9IjEiIGN5PSIxNyIgcj0iMSIvPjxjaXJjbGUgY3g9IjUiIGN5PSIxNyIgcj0iMSIvPjxjaXJjbGUgY3g9IjkiIGN5PSIxNyIgcj0iMSIvPjxjaXJjbGUgY3g9IjEzIiBjeT0iMTciIHI9IjEiLz48Y2lyY2xlIGN4PSIxNyIgY3k9IjE3IiByPSIxIi8+PC9nPjwvc3ZnPg=='); background-size: 20px 20px;"></div>
                
                <!-- Sample map pins -->
                <div class="absolute" style="top: 25%; left: 30%;">
                    <div class="relative">
                        <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-white">
                            <div class="bg-blue-500 h-full w-full flex items-center justify-center text-white font-bold">1</div>
                        </div>
                        <div class="absolute bottom-0 left-1/2 transform translate-x-[-50%] translate-y-[80%] w-4 h-4 bg-white rotate-45"></div>
                    </div>
                </div>
                
                <div class="absolute" style="top: 40%; left: 50%;">
                    <div class="relative">
                        <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-white">
                            <div class="bg-green-500 h-full w-full flex items-center justify-center text-white font-bold">2</div>
                        </div>
                        <div class="absolute bottom-0 left-1/2 transform translate-x-[-50%] translate-y-[80%] w-4 h-4 bg-white rotate-45"></div>
                    </div>
                </div>
                
                <div class="absolute" style="top: 65%; left: 70%;">
                    <div class="relative">
                        <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-white">
                            <div class="bg-red-500 h-full w-full flex items-center justify-center text-white font-bold">3</div>
                        </div>
                        <div class="absolute bottom-0 left-1/2 transform translate-x-[-50%] translate-y-[80%] w-4 h-4 bg-white rotate-45"></div>
                    </div>
                </div>
                
                <div class="absolute" style="top: 55%; left: 20%;">
                    <div class="relative">
                        <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-white">
                            <div class="bg-yellow-500 h-full w-full flex items-center justify-center text-white font-bold">4</div>
                        </div>
                        <div class="absolute bottom-0 left-1/2 transform translate-x-[-50%] translate-y-[80%] w-4 h-4 bg-white rotate-45"></div>
                    </div>
                </div>
                
                <div class="absolute" style="top: 35%; left: 80%;">
                    <div class="relative">
                        <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-white">
                            <div class="bg-purple-500 h-full w-full flex items-center justify-center text-white font-bold">5</div>
                        </div>
                        <div class="absolute bottom-0 left-1/2 transform translate-x-[-50%] translate-y-[80%] w-4 h-4 bg-white rotate-45"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 