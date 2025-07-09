<div>
    @if(Auth::user()->role === 'nasabah')
    <a href="#" class="block px-6 py-3 hover:bg-white flex items-center transition-colors border-l-4 border-transparent hover:border-green-600 group" id="nav-profile">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <span class="font-medium group-hover:text-green-600">Profil</span>
    </a>
    @endif
    <a href="{{ Auth::user()->role === 'admin' ? '/admin' : (Auth::user()->role === 'pengelola' ? '/pengelola' : '#') }}" class="block px-6 py-3 {{ Auth::user()->role !== 'nasabah' ? 'bg-white border-green-600' : 'hover:bg-white border-transparent hover:border-green-600' }} flex items-center transition-colors border-l-4 group" id="nav-dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 {{ Auth::user()->role !== 'nasabah' ? 'text-green-600' : 'text-gray-500 group-hover:text-green-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="font-medium {{ Auth::user()->role !== 'nasabah' ? 'text-green-600' : 'group-hover:text-green-600' }}">
            @if(Auth::user()->role === 'nasabah')
                Upgrade
            @else
                Dashboard
            @endif
        </span>
    </a>
    
    @if(Auth::user()->role === 'nasabah')
    <a href="#notifikasi" class="block px-6 py-3 hover:bg-white flex items-center transition-colors border-l-4 border-transparent hover:border-green-600 group" id="nav-notifikasi">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <span class="font-medium group-hover:text-green-600">Notifikasi</span>
    </a>
    <a href="#poin-saya" class="block px-6 py-3 hover:bg-white flex items-center transition-colors border-l-4 border-transparent hover:border-green-600 group" id="nav-poin-saya">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="font-medium group-hover:text-green-600">Poin Saya</span>
    </a>
    <a href="#pesanan" class="block px-6 py-3 hover:bg-white flex items-center transition-colors border-l-4 border-transparent hover:border-green-600 group" id="nav-pesanan">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <span class="font-medium group-hover:text-green-600">Pesanan</span>
    </a>
    

<a href="#favorit" class="block px-6 py-3 hover:bg-white flex items-center transition-colors border-l-4 border-transparent hover:border-green-600 group" id="nav-favorit">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 010 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
    </svg>
    <span class="font-medium group-hover:text-green-600">Favorit</span>
</a>





    <a href="#riwayat" class="block px-6 py-3 hover:bg-white flex items-center transition-colors border-l-4 border-transparent hover:border-green-600 group" id="nav-riwayat">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <span class="font-medium group-hover:text-green-600">Riwayat Transaksi</span>
    </a>
    @endif
    <a href="{{ route('logout') }}" 
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
        class="block px-6 py-3 hover:bg-white flex items-center transition-colors text-red-500 border-l-4 border-transparent hover:border-red-500 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        <span class="font-medium group-hover:text-red-600">Log Out</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const role = "{{ Auth::user()->role }}";
        const navLinks = document.querySelectorAll('[id^="nav-"]');

        /* ----------  Helper ---------- */
        function updateChildColor(link, makeGreen) {
            if (!link) return;
            const svg = link.querySelector('svg');
            const span = link.querySelector('span');
            if (svg) {
                svg.classList.toggle('text-green-600', makeGreen);
                svg.classList.toggle('text-gray-500', !makeGreen);
            }
            if (span) {
                span.classList.toggle('text-green-600', makeGreen);
                span.classList.toggle('group-hover:text-green-600', !makeGreen);
            }
        }

        function resetAllNavs() {
            navLinks.forEach(link => {
                link.classList.remove('bg-white', 'border-green-600');
                link.classList.add('border-transparent', 'hover:border-green-600');
                updateChildColor(link, false);
            });
        }

        function setActive(link) {
            if (!link) return;
            link.classList.add('bg-white', 'border-green-600');
            link.classList.remove('border-transparent', 'hover:border-green-600');
            updateChildColor(link, true);
        }

        function activateById(idSuffix) {
            resetAllNavs();
            setActive(document.getElementById('nav-' + idSuffix));
        }

        // Alias agar skrip lama yang mungkin masih memanggil fungsi ini tidak error
        window.resetAllNavLinks = resetAllNavs;

        /* ----------  Inisialisasi aktif saat pertama kali dimuat ---------- */
        (function initialiseActiveState() {
            const hash = window.location.hash;
            if (role !== 'nasabah') {
                // Admin/Pengelola: dashboard selalu aktif
                activateById('dashboard');
                return;
            }

            if (!hash || hash === '#') {
                activateById('profile');
            } else {
                activateById(hash.substring(1));
            }
        })();

        /* ----------  Update aktif ketika hash berubah ---------- */
        window.addEventListener('hashchange', () => {
            const hash = window.location.hash;
            if (!hash || hash === '#') {
                activateById('profile');
            } else {
                activateById(hash.substring(1));
            }
        });

        /* ----------  Tambah listener click untuk link internal (#...) ---------- */
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href && href.startsWith('#')) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = href.length > 1 ? href.substring(1) : 'profile';
                    // Opsional: fungsi hideAllSections() bisa dipanggil di sini bila ada
                    if (typeof hideAllSections === 'function') hideAllSections();
                    activateById(target);
                    // Tulis hash agar bisa di-bookmark & trigger hashchange listener
                    window.location.hash = href;
                });
            }
        });
    });
</script>