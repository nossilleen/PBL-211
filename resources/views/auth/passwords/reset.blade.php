@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-green-800">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ __('Reset Password') }}</h2>
            <p class="mb-6 text-gray-600">Silakan masukkan password baru Anda.</p>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="space-y-1">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                        <input id="email" type="email" 
                            class="w-full pl-10 pr-3 py-2 rounded-lg border @error('email') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-green-500"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>
                    </div>
                    @error('email')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password Baru') }}</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                        <input id="password" type="password" 
                            class="w-full pl-10 pr-3 py-2 rounded-lg border @error('password') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-green-500"
                            name="password" required autocomplete="new-password">
                    </div>
                    @error('password')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Konfirmasi Password') }}</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                        <input id="password-confirm" type="password" 
                            class="w-full pl-10 pr-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-yellow-300 hover:bg-yellow-400 text-green-900 font-semibold rounded-lg transition duration-200">
                    {{ __('Reset Password') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
