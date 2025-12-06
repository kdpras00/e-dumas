@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.petugas.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Master Petugas
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-800 md:ml-2">Tambah Petugas</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Tambah Petugas Baru</h2>
                <p class="text-blue-100 text-sm mt-1">Silahkan isi form dibawah ini untuk menambahkan petugas baru.</p>
            </div>
            
            <div class="p-8">
                <form action="{{ route('admin.petugas.store') }}" method="POST">
                    @csrf
                    
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-center mb-6">
                        <label class="w-1/4 text-purple-900 font-medium" for="email">Email</label>
                        <div class="w-3/4">
                            <input class="w-full border border-gray-400 rounded-lg py-2 px-4 focus:outline-none focus:border-blue-500 bg-white" id="email" type="email" name="email" required>
                        </div>
                    </div>

                    <!-- No HP -->
                    <div class="flex items-center mb-12">
                        <label class="w-1/4 text-purple-900 font-medium" for="no_hp">No. HP</label>
                        <div class="w-3/4">
                            <input class="w-full border border-gray-400 rounded-lg py-2 px-4 focus:outline-none focus:border-blue-500 bg-white" id="no_hp" type="text" name="no_hp" required>
                        </div>
                    </div>
                    
                    <div class="flex justify-center space-x-4 items-center">
                        <button class="bg-white text-blue-900 font-bold py-2 px-12 rounded-full shadow-sm hover:shadow-md transition" type="submit">
                            Submit
                        </button>
                        <span class="text-gray-400 text-sm">Reset Password</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
