<div class="p-6 flex flex-col items-center bg-white border-b border-green-100">
    <div class="relative group">
        <div class="w-24 h-24 rounded-full bg-green-600 flex items-center justify-center text-white text-3xl font-bold shadow-md overflow-hidden">
            {{ substr(Auth::user()->nama, 0, 1) }}
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-full flex items-center justify-center transition-all duration-300 cursor-pointer opacity-0 group-hover:opacity-100">
            <div class="text-white text-xs font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Ubah Foto</span>
            </div>
        </div>
    </div>
    <h2 class="text-xl font-bold mt-4">{{ Auth::user()->nama }}</h2>
    <p class="text-gray-500 text-sm">{{ ucfirst(Auth::user()->role) }}</p>
    <div class="mt-1 text-green-600 hover:text-green-700 transition-colors">
        <a href="#" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            <span>Edit Profil</span>
        </a>
    </div>
</div> 