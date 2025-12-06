@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">
    <!-- Header Card -->
    <div class="bg-blue-700 rounded-2xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold tracking-wide">Dashboard Admin</h1>
            <p class="text-blue-100 mt-2 text-sm">Ringkasan statistik dan manajemen sistem pengaduan masyarakat.</p>
        </div>
        <!-- Decorative Circle -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-10">
        <!-- Total Pengaduan -->
        <div class="bg-white p-5 rounded-2xl shadow-md hover:shadow-lg transition duration-300 border-l-4 border-blue-500 relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalPengaduan }}</h3>
                    <p class="text-[10px] text-gray-400 mt-1">Semua laporan</p>
                </div>
                <div class="p-2 bg-blue-50 rounded-xl text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l5.414 5.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Open -->
        <div class="bg-white p-5 rounded-2xl shadow-md hover:shadow-lg transition duration-300 border-l-4 border-yellow-400 relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Open</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $open }}</h3>
                    <p class="text-[10px] text-gray-400 mt-1">Baru masuk</p>
                </div>
                <div class="p-2 bg-yellow-50 rounded-xl text-yellow-600 group-hover:bg-yellow-500 group-hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- On Progress -->
        <div class="bg-white p-5 rounded-2xl shadow-md hover:shadow-lg transition duration-300 border-l-4 border-blue-500 relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">On Progress</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $onProgress }}</h3>
                    <p class="text-[10px] text-gray-400 mt-1">Sedang proses</p>
                </div>
                <div class="p-2 bg-blue-50 rounded-xl text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Resolved -->
        <div class="bg-white p-5 rounded-2xl shadow-md hover:shadow-lg transition duration-300 border-l-4 border-green-500 relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Resolved</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $resolved }}</h3>
                    <p class="text-[10px] text-gray-400 mt-1">Telah selesai</p>
                </div>
                <div class="p-2 bg-green-50 rounded-xl text-green-600 group-hover:bg-green-600 group-hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Close -->
        <div class="bg-white p-5 rounded-2xl shadow-md hover:shadow-lg transition duration-300 border-l-4 border-gray-500 relative overflow-hidden group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Close</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $close }}</h3>
                    <p class="text-[10px] text-gray-400 mt-1">Ditutup</p>
                </div>
                <div class="p-2 bg-gray-50 rounded-xl text-gray-600 group-hover:bg-gray-600 group-hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Management Section -->
    <div class="mb-6 flex items-center">
        <div class="w-1 h-8 bg-blue-600 rounded-full mr-3"></div>
        <h2 class="text-xl font-bold text-gray-800">Menu Manajemen</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Kelola Pengguna -->
        <a href="{{ route('admin.users.index') }}" class="group bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-transparent hover:border-blue-100">
            <div class="flex items-center space-x-4">
                <div class="p-4 bg-blue-100 text-blue-600 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition">Kelola Pengguna</h3>
                    <p class="text-sm text-gray-500 mt-1">Manajemen data user & petugas</p>
                </div>
            </div>
        </a>

        <!-- Kelola Kategori -->
        <a href="{{ route('admin.categories.index') }}" class="group bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-transparent hover:border-purple-100">
            <div class="flex items-center space-x-4">
                <div class="p-4 bg-purple-100 text-purple-600 rounded-2xl group-hover:bg-purple-600 group-hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-purple-600 transition">Kelola Kategori</h3>
                    <p class="text-sm text-gray-500 mt-1">Kategori pengaduan</p>
                </div>
            </div>
        </a>

        <!-- Kelola RT -->
        <a href="{{ route('admin.rt.index') }}" class="group bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-transparent hover:border-blue-100">
            <div class="flex items-center space-x-4">
                <div class="p-4 bg-teal-100 text-teal-600 rounded-2xl group-hover:bg-teal-600 group-hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-teal-600 transition">Kelola RT</h3>
                    <p class="text-sm text-gray-500 mt-1">Master data RT</p>
                </div>
            </div>
        </a>

        <!-- Kelola RW -->
        <a href="{{ route('admin.rw.index') }}" class="group bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-transparent hover:border-indigo-100">
            <div class="flex items-center space-x-4">
                <div class="p-4 bg-indigo-100 text-indigo-600 rounded-2xl group-hover:bg-indigo-600 group-hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-600 transition">Kelola RW</h3>
                    <p class="text-sm text-gray-500 mt-1">Master data RW</p>
                </div>
            </div>
        </a>



        <!-- Kelola Pengaduan (NEW) -->
        <a href="{{ route('admin.pengaduan.index') }}" class="group bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-transparent hover:border-orange-100">
            <div class="flex items-center space-x-4">
                <div class="p-4 bg-orange-100 text-orange-600 rounded-2xl group-hover:bg-orange-600 group-hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-orange-600 transition">Kelola Pengaduan</h3>
                    <p class="text-sm text-gray-500 mt-1">Daftar & Tindak Lanjut</p>
                </div>
            </div>
        </a>

        <!-- Laporan -->
        <a href="{{ route('admin.laporan.index') }}" class="group bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-transparent hover:border-green-100">
            <div class="flex items-center space-x-4">
                <div class="p-4 bg-green-100 text-green-600 rounded-2xl group-hover:bg-green-600 group-hover:text-white transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l5.414 5.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900 group-hover:text-green-600 transition">Laporan</h3>
                    <p class="text-sm text-gray-500 mt-1">Rekapitulasi statistik</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
