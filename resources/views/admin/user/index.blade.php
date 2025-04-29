@extends('admin.layout')

@section('title', 'Data User - EcoZense')

@section('content')
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Data User</h2>
            <div class="mt-4 md:mt-0 relative">
                <input type="text" placeholder="Cari user..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- Tabel Data User -->
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peran</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit & Delete</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Manfaat Eco enzim ...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Eco enzim ber...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Karimun</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">JANGAN LUPA ...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Edit
                                </button>
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Eco Enzim ...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Legenda Malaka</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Event ini membahas...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Edit
                                </button>
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Eco Enzim ...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Batu Aji</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Diwajibkan untuk...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Edit
                                </button>
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Eco Enzim ...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Batu Ampar</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Dibanding dengan ...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Edit
                                </button>
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded text-green-500 focus:ring-green-500">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Eco Enzim ...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Cell Texts</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Sekupang</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Wajib untuk ...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Edit
                                </button>
                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Delete
                                </button>
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
                <button class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 px-4 py-2 text-sm rounded-md">
                    Previous
                </button>
                <button class="bg-green-500 border border-green-500 text-white hover:bg-green-600 px-4 py-2 text-sm rounded-md">
                    Next
                </button>
            </div>
        </div>
    </div>
@endsection 