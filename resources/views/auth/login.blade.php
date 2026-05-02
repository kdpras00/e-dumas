@extends('layouts.app')

@section('content')
<div class="flex-grow relative bg-gradient-to-br from-blue-600 to-blue-800 text-white overflow-hidden flex items-center justify-center pt-24 pb-12">
    <div class="absolute inset-0 bg-blue-900/20"></div>
    
    <div class="container mx-auto px-8 relative z-10 w-full max-w-7xl flex flex-col md:flex-row items-center justify-center gap-12 md:gap-20 h-full">
        <!-- Left Side: Illustration -->
        <div class="hidden md:flex flex-1 flex-col items-center justify-center relative md:border-r border-white/20 md:pr-20 h-[70vh]">
            <div class="relative w-full max-w-lg">
                <div class="absolute inset-0 bg-teal-500 rounded-full opacity-20 blur-3xl transform scale-150"></div>
                <img src="{{ asset('images/bannerimages.png') }}" alt="E-Dumas Illustration" class="h-auto w-full object-contain drop-shadow-2xl relative z-10 transform hover:scale-105 transition duration-500">
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="flex-1 w-full max-w-md relative z-10">
            <div class="bg-white p-10 rounded-3xl shadow-2xl relative">
                <h2 class="text-3xl font-serif font-bold text-blue-900 text-center mb-10">Masuk</h2>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="text" name="username" class="w-full bg-transparent border-b-2 border-gray-200 text-gray-900 text-sm py-3 pl-10 pr-4 focus:outline-none focus:border-blue-600 placeholder-gray-400 transition-colors" placeholder="Username" required>
                </div>

                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="password" name="password" id="password" class="w-full bg-transparent border-b-2 border-gray-200 text-gray-900 text-sm py-3 pl-10 pr-10 focus:outline-none focus:border-blue-600 placeholder-gray-400 transition-colors" placeholder="Password" required>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" onclick="togglePassword()">
                        <svg id="eye-icon" class="w-5 h-5 text-gray-400 hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('password.request') }}" class="text-xs text-gray-500 hover:text-blue-600 transition-colors">Lupa Password?</a>
                </div>

                <div class="pt-4 flex justify-center">
                    <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-12 rounded-full shadow-lg hover:shadow-blue-500/30 hover:bg-blue-700 transition transform hover:-translate-y-1 w-full md:w-auto">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
        }
    }
</script>
@endsection
