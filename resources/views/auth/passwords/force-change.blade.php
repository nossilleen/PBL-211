@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-green-800">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ __('Ganti Password') }}</h2>
            <p class="mb-6 text-gray-600">Password Anda telah direset oleh admin. Untuk keamanan, Anda harus mengganti password sebelum melanjutkan.</p>
            
            @if(session('warning'))
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700">{{ session('warning') }}</p>
                    </div>
                </div>
            </div>
            @endif

            <form method="POST" action="{{ route('password.force-update') }}" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="password" class="block text-gray-700">{{ __('Password Baru') }}</label>
                    <div class="relative">
                        <input id="password" type="password" 
                            class="w-full px-4 py-3 rounded-lg border @error('password') border-red-500 @else border-gray-300 @enderror"
                            name="password" required autocomplete="new-password">
                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400" onclick="togglePassword(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="password-confirm" class="block text-gray-700">{{ __('Konfirmasi Password Baru') }}</label>
                    <div class="relative">
                        <input id="password-confirm" type="password" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-300"
                            name="password_confirmation" required autocomplete="new-password">
                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400" onclick="togglePassword(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" 
                    class="w-full py-3 px-4 bg-yellow-300 hover:bg-yellow-400 text-green-900 font-semibold rounded-lg transition duration-200">
                    {{ __('Ganti Password') }}
                </button>
            </form>
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
@endsection