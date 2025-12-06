@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 min-h-[600px] relative">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-white tracking-wide">Kelola Pengaduan</h1>
                <p class="text-blue-100 mt-1 text-sm">Daftar semua pengaduan masyarakat</p>
            </div>
        </div>

        <!-- Table -->
        <div class="p-8">
            <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-16">No</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Pelapor</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Subjek</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($pengaduans as $index => $pengaduan)
                        <tr class="hover:bg-blue-50/50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-500">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $pengaduan->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">
                                @php
                                    // Get the user who created the first detail (the original reporter)
                                    $reporter = $pengaduan->details->sortBy('id')->first()->user ?? null;
                                @endphp
                                {{ $reporter ? $reporter->nama_lengkap : 'Unknown' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    {{ $pengaduan->kategori->kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                {{ Str::limit($pengaduan->subject, 30) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @php
                                    $status = $pengaduan->latestDetail->status->status ?? 'Unknown';
                                    $statusClass = match($status) {
                                        'Open' => 'bg-yellow-100 text-yellow-800',
                                        'On Progress' => 'bg-blue-100 text-blue-800',
                                        'Resolved' => 'bg-green-100 text-green-800',
                                        'Close' => 'bg-gray-100 text-gray-800',
                                        default => 'bg-gray-100 text-gray-800'
                                    };
                                @endphp
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-600 hover:text-white transition duration-200" title="Lihat Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <p>Belum ada data pengaduan.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
