@extends('layouts.app')

@section('content')
<div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    <!-- Left Side: Illustration -->
    <div class="hidden md:flex flex-col items-center justify-center">
        <div class="flex flex-col items-center gap-6">
            <div class="relative">
                <div class="absolute inset-0 bg-teal-500 rounded-full opacity-10 blur-3xl transform scale-150"></div>
                <img src="{{ asset('img/logo-dashboard.png') }}" alt="E-Dumas Logo" class="h-48 w-auto object-contain drop-shadow-xl relative z-10">
            </div>
            <h1 class="text-6xl font-bold text-blue-900 tracking-tighter font-serif" style="text-shadow: 0 4px 6px rgba(0,0,0,0.1);">e-dumas</h1>
            <p class="text-blue-700/80 text-lg font-medium tracking-wide">Layanan Pengaduan Masyarakat Online</p>
        </div>
    </div>

    <!-- Right Side: Forgot Password Form -->
    <div class="bg-blue-200/50 p-10 rounded-3xl shadow-sm backdrop-blur-sm relative">
        <h2 class="text-3xl font-serif font-bold text-blue-900 text-center mb-4">Lupa Password?</h2>
        <p class="text-gray-600 text-center mb-8">Masukkan email anda untuk mereset password.</p>

        <form action="#" method="POST" class="space-y-6">
            @csrf
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 group-focus-within:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <input type="email" name="email" class="w-full bg-transparent border-b-2 border-gray-400 text-gray-900 text-sm py-3 pl-10 pr-4 focus:outline-none focus:border-blue-600 placeholder-gray-500 transition-colors" placeholder="Email Address" required>
            </div>

            <div class="pt-4 flex justify-center">
                <button type="submit" class="bg-white text-blue-900 font-bold py-2 px-8 rounded-full shadow-md hover:shadow-lg hover:bg-gray-50 transition transform hover:-translate-y-0.5">
                    Kirim Link Reset
                </button>
            </div>

            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-blue-600 font-medium flex items-center justify-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Login
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
