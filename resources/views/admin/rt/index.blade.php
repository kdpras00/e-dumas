@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Card -->
    <div class="bg-blue-700 rounded-2xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-wide">Master RT</h1>
                <p class="text-blue-100 mt-1 text-sm">Kelola data Rukun Tetangga (RT)</p>
            </div>
            <a href="{{ route('admin.rt.create') }}" class="bg-white text-blue-700 font-bold py-3 px-6 rounded-xl shadow-lg hover:bg-blue-50 hover:shadow-xl transition transform hover:-translate-y-0.5 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah RT
            </a>
        </div>
        <!-- Decorative Circle -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
        <div class="p-8">
            <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-16">No</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">RT</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">RW</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($rts as $index => $rt)
                        <tr class="hover:bg-blue-50/50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-500">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                                {{ $rt->rt }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                RW {{ $rt->rw->rw }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <div class="flex justify-center space-x-3">
                                    <a href="{{ route('admin.rt.edit', $rt->id) }}" class="text-blue-600 hover:text-blue-800 transition p-1 rounded-full hover:bg-blue-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button onclick="openDeleteModal('{{ $rt->id }}', '{{ $rt->rt }}')" class="text-red-600 hover:text-red-800 transition p-1 rounded-full hover:bg-red-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
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
            <h3 class="text-xl font-bold text-gray-900 mb-2">Hapus RT?</h3>
            <p class="text-gray-500 mb-6">Apakah Anda yakin ingin menghapus RT <span id="deleteRtName" class="font-bold text-gray-800"></span>? Tindakan ini tidak dapat dibatalkan.</p>
            
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
        const nameEl = document.getElementById('deleteRtName');
        const form = document.getElementById('deleteForm');
        
        nameEl.textContent = name;
        form.action = `/admin/rt/${id}`;
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
