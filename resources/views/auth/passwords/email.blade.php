@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-green-800">
    <div class="max-w-md w-full mx-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ __('Reset Password') }}</h2>
            <p class="mb-6 text-gray-600">Masukkan alamat email Anda dan kami akan mengirimkan link untuk reset password.</p>

            @if (session('status'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf
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
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-yellow-300 hover:bg-yellow-400 text-green-900 font-semibold rounded-lg transition duration-200">
                    {{ __('Kirim Link Reset Password') }}
                </button>

                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">
                        Kembali ke Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
