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

    <!-- Right Side: Register Form -->
    <div class="bg-blue-200/50 p-10 rounded-3xl shadow-sm backdrop-blur-sm">
        <h2 class="text-3xl font-serif font-bold text-blue-900 text-center mb-8">Register</h2>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            
            <!-- NIK -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884.356 1.683.93 2.25M15 11h3m-3 4h2" />
                    </svg>
                </div>
                <input type="text" name="nik" id="nik" class="w-full bg-transparent border-b-2 border-gray-400 text-gray-900 text-sm py-3 pl-8 pr-2 focus:outline-none focus:border-blue-600 placeholder-gray-500 transition-colors" placeholder="Nomor Induk Keluarga (NIK)" required maxlength="16" minlength="16" pattern="\d{16}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" title="NIK harus 16 digit angka">
            </div>

            <!-- Nama Lengkap -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <input type="text" name="nama_lengkap" class="w-full bg-transparent border-b-2 border-gray-400 text-gray-900 text-sm py-3 pl-8 pr-2 focus:outline-none focus:border-blue-600 placeholder-gray-500 transition-colors" placeholder="Nama Lengkap" required>
            </div>

            <!-- Email -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </div>
                <input type="email" name="email" class="w-full bg-transparent border-b-2 border-gray-400 text-gray-900 text-sm py-3 pl-8 pr-2 focus:outline-none focus:border-blue-600 placeholder-gray-500 transition-colors" placeholder="Email" required>
            </div>

            <!-- Username -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <input type="text" name="username" class="w-full bg-transparent border-b-2 border-gray-400 text-gray-900 text-sm py-3 pl-8 pr-2 focus:outline-none focus:border-blue-600 placeholder-gray-500 transition-colors" placeholder="Username" required>
            </div>

            <!-- Alamat -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                </div>
                <input type="text" name="alamat" class="w-full bg-transparent border-b-2 border-gray-400 text-gray-900 text-sm py-3 pl-8 pr-2 focus:outline-none focus:border-blue-600 placeholder-gray-500 transition-colors" placeholder="Alamat" required>
            </div>

            <!-- RW (Dropdown) -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                </div>
                <select id="rw_id" class="w-full bg-transparent border-b-2 border-gray-400 text-gray-900 text-sm py-3 pl-8 pr-2 focus:outline-none focus:border-blue-600 text-gray-500 transition-colors appearance-none" onchange="filterRt()">
                    <option value="" disabled selected>Pilih RW</option>
                    @foreach(\App\Models\Rw::all() as $rw)
                        <option value="{{ $rw->id }}">RW {{ $rw->rw }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </div>
            </div>

            <!-- RT (Dropdown) -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                     <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                </div>
                <select name="rt_id" id="rt_id" class="w-full bg-transparent border-b-2 border-gray-400 text-gray-900 text-sm py-3 pl-8 pr-2 focus:outline-none focus:border-blue-600 text-gray-500 transition-colors appearance-none" required disabled>
                    <option value="" disabled selected>Pilih RT</option>
                     <!-- Options populated via JS -->
                     @foreach(\App\Models\Rt::all() as $rt)
                        <option value="{{ $rt->id }}" data-rw="{{ $rt->rw_id }}" class="rt-option hidden">RT {{ $rt->rt }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </div>
            </div>

            <script>
                function filterRt() {
                    const rwId = document.getElementById('rw_id').value;
                    const rtSelect = document.getElementById('rt_id');
                    const rtOptions = document.querySelectorAll('.rt-option');
                    
                    // Reset RT selection
                    rtSelect.value = "";
                    rtSelect.disabled = false;
                    
                    // Filter options
                    let hasOptions = false;
                    rtOptions.forEach(option => {
                        if (option.dataset.rw == rwId) {
                            option.classList.remove('hidden');
                            option.style.display = 'block'; // Ensure compatibility
                            hasOptions = true;
                        } else {
                            option.classList.add('hidden');
                            option.style.display = 'none';
                        }
                    });

                    if(!hasOptions) {
                        rtSelect.disabled = true;
                    }
                }
            </script>

            <!-- No Telpon -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                </div>
                <input type="text" name="no_hp" id="no_hp" class="w-full bg-transparent border-b-2 border-gray-400 text-gray-900 text-sm py-3 pl-8 pr-2 focus:outline-none focus:border-blue-600 placeholder-gray-500 transition-colors" placeholder="No. Telpon" required maxlength="12" minlength="12" pattern="\d{12}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12)" title="Nomor Telepon harus 12 digit angka">
            </div>

            <!-- Password -->
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                </div>
                <input type="password" name="password" id="password" class="w-full bg-transparent border-b-2 border-gray-400 text-gray-900 text-sm py-3 pl-8 pr-10 focus:outline-none focus:border-blue-600 placeholder-gray-500 transition-colors" placeholder="Password" required>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 cursor-pointer" onclick="togglePassword()">
                    <svg id="eye-icon" class="w-5 h-5 text-gray-500 hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
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

            <div class="pt-6 flex justify-center">
                <button type="submit" class="bg-white text-blue-900 font-bold py-2 px-12 rounded-full shadow-md hover:shadow-lg hover:bg-gray-50 transition transform hover:-translate-y-0.5">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
