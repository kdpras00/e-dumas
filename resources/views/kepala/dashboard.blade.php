@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-blue-700 to-blue-900 rounded-2xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold tracking-wide">Dashboard Kepala Kelurahan</h1>
            <p class="text-blue-100 mt-2 text-sm">Ringkasan statistik dan laporan pengaduan masyarakat.</p>
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

    <!-- Quick Access Menu -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <a href="{{ route('admin.users.index', ['role' => 'warga']) }}" class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-lg transition flex items-center group">
            <div class="p-4 bg-blue-50 rounded-full text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-bold text-gray-800">Data Warga</h3>
                <p class="text-sm text-gray-500">Lihat data masyarakat terdaftar</p>
            </div>
            <div class="ml-auto text-gray-400 group-hover:translate-x-1 transition transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>

        <a href="{{ route('admin.users.index', ['role' => 'petugas']) }}" class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-lg transition flex items-center group">
            <div class="p-4 bg-purple-50 rounded-full text-purple-600 group-hover:bg-purple-600 group-hover:text-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-bold text-gray-800">Data Petugas</h3>
                <p class="text-sm text-gray-500">Lihat data petugas lapangan</p>
            </div>
            <div class="ml-auto text-gray-400 group-hover:translate-x-1 transition transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </a>
    </div>
    <!-- Recent Reports Table -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 min-h-[400px]">
        <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Laporan Pengaduan Terbaru</h3>
                <p class="text-sm text-gray-500 mt-1">Daftar laporan yang masuk dari masyarakat.</p>
            </div>
            <!-- Optional: You could add a filter/download button here -->
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-16">No</th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Tiket ID</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Subjek</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pengaduans as $index => $pengaduan)
                    <tr class="hover:bg-blue-50/50 transition duration-150 group">
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-500">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-blue-600">#{{ $pengaduan->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ Str::limit($pengaduan->subject, 40) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $pengaduan->kategori->kategori }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @php
                                $status = $pengaduan->latestDetail->status->status ?? 'Unknown';
                                $statusColor = match($status) {
                                    'Pending' => 'bg-yellow-100 text-yellow-800',
                                    'Proses' => 'bg-blue-100 text-blue-800',
                                    'Selesai' => 'bg-green-100 text-green-800',
                                    'Ditolak' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100 text-gray-800'
                                };
                            @endphp
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                {{ $status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $pengaduan->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="text-blue-600 hover:text-blue-900 font-semibold hover:underline">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-lg font-medium text-gray-900">Belum ada pengaduan</p>
                                <p class="text-sm mt-1">Data pengaduan akan muncul di sini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
