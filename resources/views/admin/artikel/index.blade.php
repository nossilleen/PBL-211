@extends('admin.layout')

@section('title', 'Artikel & Event - EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Artikel & Event</h1>
        <p class="text-gray-600 mt-1">Kelola konten artikel dan acara EcoZense</p>
    </div>

    <!-- Artikel Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Artikel</h2>
            <a href="#" class="mt-4 md:mt-0 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Artikel Baru
            </a>
        </div>
        
        <div class="mb-6">
            <div class="relative">
                <input type="text" placeholder="Cari artikel..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi Singkat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Likes</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Manfaat Eco Enzim</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">Eco Enzim bermanfaat untuk lingkungan dan kesehatan...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Eco Enzim</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">410</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">David Guerra</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25/04/2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="#" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Edit
                                </a>
                                <a href="#" class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Eco Enzim untuk Pertanian</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">Penggunaan eco enzim untuk pertanian organik...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Eco Enzim</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">280</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Anindha A'isyahlia</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">18/04/2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="#" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Edit
                                </a>
                                <a href="#" class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mt-6 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">10</span> dari <span class="font-medium">20</span> hasil
            </div>
            <div class="flex space-x-2">
                <button class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 px-4 py-2 text-sm rounded-md" disabled>
                    Previous
                </button>
                <button class="bg-green-500 border border-green-500 text-white hover:bg-green-600 px-4 py-2 text-sm rounded-md">
                    Next
                </button>
            </div>
        </div>
    </div>
    
    <!-- Event Section -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Event</h2>
            <a href="#" class="mt-4 md:mt-0 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Event Baru
            </a>
        </div>
        
        <div class="mb-6">
            <div class="relative">
                <input type="text" placeholder="Cari event..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Banner</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link Form</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Workshop Eco Enzim</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ asset('images/event.jpg') }}" alt="Event" class="h-8 w-8 object-cover rounded">
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">Workshop pembuatan eco enzim dari limbah dapur...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Kalimantan</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="docs.google.com/form" class="text-blue-600 hover:text-blue-900 text-sm">docs.google.com/form</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/05/2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="#" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Edit
                                </a>
                                <a href="#" class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mt-6 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">5</span> dari <span class="font-medium">5</span> hasil
            </div>
            <div class="flex space-x-2">
                <button class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 px-4 py-2 text-sm rounded-md" disabled>
                    Previous
                </button>
                <button class="bg-green-500 border border-green-500 text-white hover:bg-green-600 px-4 py-2 text-sm rounded-md">
                    Next
                </button>
            </div>
        </div>
    </div>
@endsection 