@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Master User</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Header Card -->
    <div class="bg-blue-700 rounded-2xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-wide">Master User</h1>
                <p class="text-blue-100 mt-1 text-sm">Kelola data pengguna aplikasi</p>
            </div>
            @if(auth()->user()->user_level_id == 3)
            <a href="{{ route('admin.users.create') }}" class="bg-white text-blue-700 font-bold py-3 px-6 rounded-xl shadow-lg hover:bg-blue-50 hover:shadow-xl transition transform hover:-translate-y-0.5 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Tambah User
            </a>
            @endif
        </div>
        <!-- Decorative Circle -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
        <div class="p-8">
            <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-16">No</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Username</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">NIK</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">RT/RW</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $index => $user)
                        <tr class="hover:bg-blue-50/50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-500">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                                {{ $user->username }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $user->nama_lengkap }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $user->nik }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                @if($user->rt)
                                    RT {{ $user->rt->rt }} / RW {{ $user->rt->rw->rw }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-2">
                                    @if(auth()->user()->user_level_id == 3)
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800 transition p-1 rounded-full hover:bg-blue-100" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button onclick="openDeleteModal('{{ $user->id }}', '{{ $user->username }}')" class="text-red-600 hover:text-red-800 transition p-1 rounded-full hover:bg-red-100" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    @else
                                    <span class="text-xs text-gray-400">View Only</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeDeleteModal()"></div>
    <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full transform scale-100 transition-all relative z-10 overflow-hidden">
        <div class="p-6 text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-6">
                <svg class="h-8 w-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Hapus User?</h3>
            <p class="text-gray-500 mb-6">Apakah Anda yakin ingin menghapus user <span id="deleteUserName" class="font-bold text-gray-800"></span>? Tindakan ini tidak dapat dibatalkan.</p>
            
            <div class="flex justify-center space-x-3">
                <button onclick="closeDeleteModal()" class="bg-gray-100 text-gray-700 font-semibold py-2.5 px-6 rounded-xl hover:bg-gray-200 transition">
                    Batal
                </button>
                <form id="deleteForm" action="" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white font-semibold py-2.5 px-6 rounded-xl hover:bg-red-700 shadow-lg shadow-red-200 transition">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(id, name) {
        const modal = document.getElementById('deleteModal');
        const nameEl = document.getElementById('deleteUserName');
        const form = document.getElementById('deleteForm');
        
        nameEl.textContent = name;
        form.action = `/admin/users/${id}`;
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.querySelector('div[class*="transform"]').classList.remove('scale-95', 'opacity-0');
            modal.querySelector('div[class*="transform"]').classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
    }
</script>
@endsection
