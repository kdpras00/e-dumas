@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Master Kategori
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-800 md:ml-2">Tambah Kategori</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Tambah Kategori Baru</h2>
                <p class="text-blue-100 text-sm mt-1">Silahkan isi form dibawah ini untuk menambahkan kategori baru.</p>
            </div>
            
            <div class="p-8">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-8">
                        <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="kategori">
                            Nama Kategori
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="kategori" type="text" name="kategori" placeholder="Contoh: Infrastruktur" required>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 rounded-xl text-gray-500 font-semibold hover:bg-gray-50 transition">
                            Batal
                        </a>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-blue-200 transition transform hover:-translate-y-0.5" type="submit">
                            Simpan Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
