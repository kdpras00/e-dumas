@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-blue-200/50 rounded-3xl p-8 min-h-[600px] relative">
        <!-- Header -->
        <div class="border-b border-gray-400 pb-4 mb-8">
            <h1 class="text-4xl font-serif italic font-bold text-gray-900">Petugas</h1>
        </div>

        <!-- Form Card -->
        <div class="max-w-4xl mx-auto border border-gray-400 rounded-lg overflow-hidden">
            <!-- Card Header -->
            <div class="bg-blue-100/50 border-b border-gray-400 p-4">
                <h2 class="text-2xl font-bold text-purple-900">Edit</h2>
            </div>
            
            <!-- Card Body -->
            <div class="bg-blue-50/50 p-12">
                <form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Kategori -->
                    <div class="flex items-center mb-6">
                        <label class="w-1/4 text-purple-900 font-medium" for="kategori_id">Kategori</label>
                        <div class="w-3/4">
                            <select class="w-full border border-gray-400 rounded-lg py-2 px-4 focus:outline-none focus:border-blue-500 bg-white" id="kategori_id" name="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $petugas->kategori_id == $category->id ? 'selected' : '' }}>{{ $category->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="flex items-center mb-6">
                        <label class="w-1/4 text-purple-900 font-medium" for="username">Username</label>
                        <div class="w-3/4">
                            <input class="w-full border border-gray-400 rounded-lg py-2 px-4 focus:outline-none focus:border-blue-500 bg-white" id="username" type="text" name="username" value="{{ $petugas->username }}" required>
                        </div>
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="flex items-center mb-6">
                        <label class="w-1/4 text-purple-900 font-medium" for="nama_lengkap">Nama Lengkap</label>
                        <div class="w-3/4">
                            <input class="w-full border border-gray-400 rounded-lg py-2 px-4 focus:outline-none focus:border-blue-500 bg-white" id="nama_lengkap" type="text" name="nama_lengkap" value="{{ $petugas->nama_lengkap }}" required>
                        </div>
                    </div>

                    <!-- NIK -->
                    <div class="flex items-center mb-6">
                        <label class="w-1/4 text-purple-900 font-medium" for="nik">NIK</label>
                        <div class="w-3/4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="nama_petugas">Nama Petugas</label>
                            <input class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="nama_petugas" type="text" name="nama_petugas" value="{{ $petugas->nama_petugas }}" required>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="username">Username</label>
                            <input class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="username" type="text" name="username" value="{{ $petugas->username }}" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="telp">No. Telepon</label>
                            <input class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="telp" type="text" name="telp" value="{{ $petugas->telp }}" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="level">Level</label>
                            <div class="relative">
                                <select class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200 appearance-none bg-white" id="level" name="level" required>
                                    <option value="">-- Pilih Level --</option>
                                    <option value="admin" {{ $petugas->level == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="petugas" {{ $petugas->level == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('admin.petugas.index') }}" class="px-6 py-3 rounded-xl text-gray-500 font-semibold hover:bg-gray-50 transition">
                            Batal
                        </a>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-blue-200 transition transform hover:-translate-y-0.5" type="submit">
                            Update Petugas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Reset Password Modal -->
<div id="resetModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeResetModal()"></div>
    <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full transform scale-100 transition-all relative z-10 overflow-hidden">
        <div class="p-6 text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 mb-6">
                <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Reset Password?</h3>
            <p class="text-gray-500 mb-6">Password petugas <span id="resetPetugasName" class="font-bold text-gray-800"></span> akan direset menjadi default: <span class="font-mono bg-gray-100 px-2 py-1 rounded">password123</span></p>
            
            <div class="flex justify-center space-x-3">
                <button onclick="closeResetModal()" class="bg-gray-100 text-gray-700 font-semibold py-2.5 px-6 rounded-xl hover:bg-gray-200 transition">
                    Batal
                </button>
                <form id="resetForm" action="" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="bg-yellow-500 text-white font-semibold py-2.5 px-6 rounded-xl hover:bg-yellow-600 shadow-lg shadow-yellow-200 transition">
                        Ya, Reset
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openResetModal(id, name) {
        const modal = document.getElementById('resetModal');
        const nameEl = document.getElementById('resetPetugasName');
        const form = document.getElementById('resetForm');
        
        nameEl.textContent = name;
        form.action = `/admin/petugas/${id}/reset-password`;
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.querySelector('div[class*="transform"]').classList.remove('scale-95', 'opacity-0');
            modal.querySelector('div[class*="transform"]').classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeResetModal() {
        const modal = document.getElementById('resetModal');
        modal.classList.add('hidden');
    }
</script>
@endsection
