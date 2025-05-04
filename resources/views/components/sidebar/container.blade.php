<div class="bg-green-50 rounded-lg shadow overflow-hidden border border-green-100">
    @if(Auth::user()->role === 'nasabah')
    <x-sidebar.user-profile />
    @endif
    <x-sidebar.navigation-links />
</div> 