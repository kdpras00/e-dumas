@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-white/20 min-h-[600px] relative">
        <!-- Header -->
        <div class="px-8 py-10 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-blue-900 tracking-wide">Laporan Pengaduan</h1>
                <p class="text-gray-500 mt-1 text-sm">Riwayat pengaduan yang telah Anda kirimkan</p>
            </div>
            <div>
                <a href="{{ route('pengaduan.create') }}" class="bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-3.5 px-10 rounded-full shadow-lg hover:shadow-blue-500/30 transition transform hover:-translate-y-0.5">
                    Buat Pengaduan
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="p-8">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-400 uppercase tracking-widest w-16">No</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Tanggal</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Nomor Tiket</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Kategori</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Subjek</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-400 uppercase tracking-widest">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($pengaduans as $index => $pengaduan)
                        <tr class="hover:bg-blue-50/30 transition duration-150 group">
                            <td class="px-6 py-5 whitespace-nowrap text-center text-sm font-medium text-gray-400">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-500">
                                {{ $pengaduan->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm font-mono text-blue-600 font-bold group-hover:text-blue-800 transition">
                                #{{ $pengaduan->no_pengaduan }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-800">
                                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    {{ $pengaduan->kategori->kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-900 font-medium">
                                {{ Str::limit($pengaduan->subject, 40) }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-center">
                                @php
                                    $status = $pengaduan->latestDetail->status->status ?? 'Unknown';
                                    $statusColor = match($status) {
                                        'Open' => 'text-yellow-600',
                                        'On Progress' => 'text-blue-600',
                                        'Resolved' => 'text-green-600',
                                        'Cancel' => 'text-red-500',
                                        default => 'text-gray-500'
                                    };
                                @endphp
                                <span class="text-xs font-bold {{ $statusColor }} uppercase tracking-wide">
                                    {{ $status }}
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-center">
                                <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-xs uppercase tracking-widest transition">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-24 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <p class="text-xl font-bold text-gray-900">Belum ada pengaduan</p>
                                    <p class="text-sm mt-2">Aspirasi Anda sangat berharga bagi kemajuan Kelurahan.</p>
                                    <a href="{{ route('pengaduan.create') }}" class="mt-6 text-blue-600 hover:text-blue-800 font-bold text-sm uppercase tracking-widest transition">Buat Pengaduan &rarr;</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination if needed -->
            @if(method_exists($pengaduans, 'links'))
            <div class="mt-6">
                {{ $pengaduans->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
