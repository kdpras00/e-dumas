@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Master User
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-800 md:ml-2">Tambah User</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Tambah User Baru</h2>
                <p class="text-blue-100 text-sm mt-1">Silahkan isi form dibawah ini untuk menambahkan user baru.</p>
            </div>
            
            <div class="p-8">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    
                    <!-- Section 1: Informasi Akun -->
                    <div class="mb-8">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-6 bg-blue-600 rounded-full mr-3"></div>
                            <h3 class="text-lg font-bold text-gray-800">Informasi Akun</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="username">Username</label>
                                <input class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="username" type="text" name="username" required>
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="email">Email</label>
                                <input class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="email" type="email" name="email" required>
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="password">Password</label>
                                <input class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="password" type="password" name="password" required minlength="6">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="user_level_id">Level User</label>
                                    <div class="relative">
                                        <select class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200 appearance-none bg-white" id="user_level_id" name="user_level_id" required onchange="toggleKategori()">
                                            <option value="">-- Level --</option>
                                            @foreach($levels as $level)
                                                <option value="{{ $level->id }}" data-name="{{ $level->user_level }}">{{ $level->user_level }}</option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>

                                <div id="kategori-container" class="hidden">
                                     <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="kategori_id">Kategori</label>
                                    <div class="relative">
                                        <select class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200 appearance-none bg-white" id="kategori_id" name="kategori_id">
                                            <option value="">-- Pilih --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Data Pribadi -->
                    <div class="mb-8">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-6 bg-blue-600 rounded-full mr-3"></div>
                            <h3 class="text-lg font-bold text-gray-800">Data Pribadi</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="nama_lengkap">Nama Lengkap</label>
                                <input class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="nama_lengkap" type="text" name="nama_lengkap" required>
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="nik">NIK</label>
                                <input class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="nik" type="text" name="nik" required maxlength="16" minlength="16" pattern="\d{16}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)" title="NIK harus 16 digit angka">
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="no_hp">No. HP</label>
                                <input class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="no_hp" type="text" name="no_hp" required maxlength="12" minlength="12" pattern="\d{12}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12)" title="Nomor Telepon harus 12 digit angka">
                            </div>

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="rt_id">RT / RW</label>
                                <div class="relative">
                                    <select class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200 appearance-none bg-white" id="rt_id" name="rt_id" required>
                                        <option value="">-- Pilih RT/RW --</option>
                                        @foreach($rts as $rt)
                                            <option value="{{ $rt->id }}">RT {{ $rt->rt }} / RW {{ $rt->rw->rw }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="alamat">Alamat</label>
                                <textarea class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('admin.users.index') }}" class="px-6 py-3 rounded-xl text-gray-500 font-semibold hover:bg-gray-50 transition">
                            Batal
                        </a>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-blue-200 transition transform hover:-translate-y-0.5" type="submit">
                            Simpan User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function toggleKategori() {
        const levelSelect = document.getElementById('user_level_id');
        const kategoriContainer = document.getElementById('kategori-container');
        const kategoriSelect = document.getElementById('kategori_id');
        
        const selectedOption = levelSelect.options[levelSelect.selectedIndex];
        const levelName = selectedOption.getAttribute('data-name');

        if (levelName === 'Petugas') {
            kategoriContainer.classList.remove('hidden');
            kategoriSelect.setAttribute('required', 'required');
        } else {
            kategoriContainer.classList.add('hidden');
            kategoriSelect.removeAttribute('required');
            kategoriSelect.value = ""; // Reset value
        }
    }
</script>
