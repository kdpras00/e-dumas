@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-blue-200/50 rounded-lg p-6 mb-8 border border-blue-200 shadow-sm relative overflow-hidden">
        <h1 class="text-3xl font-bold text-gray-800 italic relative z-10 tracking-wider">Petugas</h1>
        <div class="h-1 bg-gray-500 w-full mt-2 opacity-20"></div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-4 flex justify-end bg-gray-50/50 border-b border-gray-100">
            @if(auth()->user()->user_level_id == 3)
            <a href="{{ route('admin.petugas.create') }}" class="flex items-center gap-2 bg-white hover:bg-gray-50 text-gray-700 font-bold py-2 px-4 rounded-full border border-gray-300 shadow-sm transition text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah
            </a>
            @endif
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr class="bg-white">
                        <th scope="col" class="px-6 py-4 text-center text-sm font-bold text-gray-900 border-r border-gray-200 w-16">No</th>
                        <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-gray-900 border-r border-gray-200">Username</th>
                        <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-gray-900 border-r border-gray-200">Nama Lengkap</th>
                        <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-gray-900 border-r border-gray-200">NIK</th>
                        <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-gray-900 border-r border-gray-200">Email</th>
                        <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-gray-900 border-r border-gray-200 w-24">RT</th>
                        <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-gray-900 border-r border-gray-200 w-24">RW</th>
                        <th scope="col" class="px-6 py-4 text-center text-sm font-bold text-gray-900 w-48">Menu</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($petugas as $index => $p)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-gray-800 border-r border-gray-100">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 border-r border-gray-100">
                            {{ $p->username }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 border-r border-gray-100">
                            {{ $p->nama_lengkap }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 border-r border-gray-100">
                            {{ $p->nik }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 border-r border-gray-100">
                            {{ $p->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 border-r border-gray-100">
                            {{ $p->rt->rt ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 border-r border-gray-100">
                            {{ $p->rt->rw->rw ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <div class="flex justify-center space-x-3">
                                @if(auth()->user()->user_level_id == 3)
                                <a href="{{ route('admin.petugas.edit', $p->id) }}" class="bg-[#1f4e79] hover:bg-[#163a5c] text-white text-xs px-6 py-1.5 rounded-full transition shadow-sm">
                                    Edit
                                </a>
                                <button onclick="openDeleteModal('{{ $p->id }}', '{{ $p->nama_lengkap }}')" class="bg-[#c00000] hover:bg-[#900000] text-white text-xs px-6 py-1.5 rounded-full transition shadow-sm">
                                    Delete
                                </button>
                                @else
                                <span class="text-xs text-gray-500">View Only</span>
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
            <h3 class="text-xl font-bold text-gray-900 mb-2">Hapus Petugas?</h3>
            <p class="text-gray-500 mb-6">Apakah Anda yakin ingin menghapus petugas <span id="deletePetugasName" class="font-bold text-gray-800"></span>? Tindakan ini tidak dapat dibatalkan.</p>
            
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
        const nameEl = document.getElementById('deletePetugasName');
        const form = document.getElementById('deleteForm');
        
        nameEl.textContent = name;
        form.action = `/admin/petugas/${id}`;
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
