@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">
    <!-- Header Card -->
    <div class="bg-white rounded-3xl shadow-2xl mb-8 relative overflow-hidden border border-white/20">
        <div class="p-10">
            <h1 class="text-3xl font-bold text-blue-900 tracking-wide">Dashboard Admin</h1>
            <p class="text-gray-500 mt-2 text-sm">Ringkasan statistik dan manajemen sistem pengaduan masyarakat.</p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-12">
        <!-- Total Pengaduan -->
        <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 relative overflow-hidden group">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total</p>
                <h3 class="text-3xl font-bold text-blue-900">{{ $totalPengaduan }}</h3>
                <p class="text-xs text-gray-400 mt-2">Semua laporan</p>
            </div>
        </div>

        <!-- Open -->
        <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 relative overflow-hidden group">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Open</p>
                <h3 class="text-3xl font-bold text-blue-900">{{ $open }}</h3>
                <p class="text-xs text-gray-400 mt-2">Baru masuk</p>
            </div>
        </div>

        <!-- On Progress -->
        <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 relative overflow-hidden group">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">On Progress</p>
                <h3 class="text-3xl font-bold text-blue-900">{{ $onProgress }}</h3>
                <p class="text-xs text-gray-400 mt-2">Sedang proses</p>
            </div>
        </div>

        <!-- Done -->
        <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 relative overflow-hidden group">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Done</p>
                <h3 class="text-3xl font-bold text-blue-900">{{ $done }}</h3>
                <p class="text-xs text-gray-400 mt-2">Telah selesai</p>
            </div>
        </div>

        <!-- Cancel -->
        <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 relative overflow-hidden group">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Cancel</p>
                <h3 class="text-3xl font-bold text-blue-900">{{ $cancel }}</h3>
                <p class="text-xs text-gray-400 mt-2">Dibatalkan</p>
            </div>
        </div>
    </div>

    <!-- Management Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-white tracking-tight">Menu Manajemen</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Kelola Pengguna -->
        <a href="{{ route('admin.users.index') }}" class="group bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 hover:border-blue-100">
            <div>
                <h3 class="text-xl font-bold text-blue-900 group-hover:text-blue-600 transition">Kelola Pengguna</h3>
                <p class="text-sm text-gray-500 mt-2">Manajemen data user & petugas</p>
            </div>
        </a>

        <!-- Kelola Kategori -->
        <a href="{{ route('admin.categories.index') }}" class="group bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 hover:border-blue-100">
            <div>
                <h3 class="text-xl font-bold text-blue-900 group-hover:text-blue-600 transition">Kelola Kategori</h3>
                <p class="text-sm text-gray-500 mt-2">Kategori pengaduan</p>
            </div>
        </a>

        <!-- Kelola RT -->
        <a href="{{ route('admin.rt.index') }}" class="group bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 hover:border-blue-100">
            <div>
                <h3 class="text-xl font-bold text-blue-900 group-hover:text-blue-600 transition">Kelola RT</h3>
                <p class="text-sm text-gray-500 mt-2">Master data RT</p>
            </div>
        </a>

        <!-- Kelola RW -->
        <a href="{{ route('admin.rw.index') }}" class="group bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 hover:border-blue-100">
            <div>
                <h3 class="text-xl font-bold text-blue-900 group-hover:text-blue-600 transition">Kelola RW</h3>
                <p class="text-sm text-gray-500 mt-2">Master data RW</p>
            </div>
        </a>

        <!-- Kelola Pengaduan -->
        <a href="{{ route('admin.pengaduan.index') }}" class="group bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 hover:border-blue-100">
            <div>
                <h3 class="text-xl font-bold text-blue-900 group-hover:text-blue-600 transition">Kelola Pengaduan</h3>
                <p class="text-sm text-gray-500 mt-2">Daftar & Tindak Lanjut</p>
            </div>
        </a>

        <!-- Rekap Laporan -->
        <a href="{{ route('admin.laporan.index') }}" class="group bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-50 hover:border-blue-100">
            <div>
                <h3 class="text-xl font-bold text-blue-900 group-hover:text-blue-600 transition">Laporan</h3>
                <p class="text-sm text-gray-500 mt-2">Rekapitulasi statistik</p>
            </div>
        </a>
    </div>
</div>
@endsection
