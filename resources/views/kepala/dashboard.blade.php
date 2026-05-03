@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Card -->
    <div class="bg-white rounded-3xl shadow-2xl mb-8 relative overflow-hidden border border-white/20">
        <div class="p-10">
            <h1 class="text-3xl font-bold text-blue-900 tracking-wide">Dashboard Kepala Kelurahan</h1>
            <p class="text-gray-500 mt-2 text-sm">Ringkasan statistik dan laporan pengaduan masyarakat.</p>
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

    <!-- Quick Access Menu -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <a href="{{ route('admin.users.index', ['role' => 'warga']) }}" class="bg-white p-10 rounded-3xl shadow-xl border border-gray-50 hover:shadow-2xl transition flex items-center group">
            <div>
                <h3 class="text-xl font-bold text-blue-900 group-hover:text-blue-600 transition">Data Warga</h3>
                <p class="text-sm text-gray-500 mt-2">Lihat daftar warga terdaftar</p>
            </div>
        </a>

        <a href="{{ route('admin.petugas.index') }}" class="bg-white p-10 rounded-3xl shadow-xl border border-gray-50 hover:shadow-2xl transition flex items-center group">
            <div>
                <h3 class="text-xl font-bold text-blue-900 group-hover:text-blue-600 transition">Data Petugas</h3>
                <p class="text-sm text-gray-500 mt-2">Lihat daftar petugas lapangan</p>
            </div>
        </a>

        <a href="{{ route('admin.laporan.index') }}" class="bg-white p-10 rounded-3xl shadow-xl border border-gray-50 hover:shadow-2xl transition flex items-center group">
            <div>
                <h3 class="text-xl font-bold text-blue-900 group-hover:text-blue-600 transition">Rekap Laporan</h3>
                <p class="text-sm text-gray-500 mt-2">Analisis data statistik pengaduan</p>
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">{{ Str::limit($pengaduan->subject, 40) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">
                                {{ $pengaduan->kategori->kategori }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @php
                                $status = $pengaduan->latestDetail->status->status ?? 'Unknown';
                                $statusColor = match($status) {
                                    'Pending' => 'text-yellow-600',
                                    'Proses' => 'text-blue-600',
                                    'Selesai' => 'text-green-600',
                                    'Ditolak' => 'text-red-500',
                                    default => 'text-gray-500'
                                };
                            @endphp
                            <span class="text-xs font-bold {{ $statusColor }}">
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
