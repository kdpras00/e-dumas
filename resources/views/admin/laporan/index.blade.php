@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Rekap Laporan</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Header Card -->
    <div class="bg-blue-700 rounded-2xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-wide">Rekap Laporan</h1>
                <p class="text-blue-100 mt-1 text-sm">Ringkasan aktivitas pengaduan masyarakat</p>
            </div>
            <div class="bg-white/20 px-6 py-3 rounded-xl border border-white/30 backdrop-blur-sm shadow-lg">
                <span class="text-white font-bold text-base flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 011.414.586l5.414 5.414a1 1 0 01.586 1.414V19a2 2 0 01-2 2z" />
                    </svg>
                    Total Data: {{ $reports->count() }}
                </span>
            </div>
        </div>
        <!-- Decorative Circle -->
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
        <div class="p-8">
            <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider w-16">No</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Tahun - Bulan</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Last Status</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">RW</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">RT</th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($reports as $index => $report)
                        <tr class="hover:bg-blue-50/50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-500">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $report->periode }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @php
                                    $statusClass = match($report->status_name) {
                                        'Open' => 'bg-yellow-100 text-yellow-800',
                                        'On Progress' => 'bg-blue-100 text-blue-800',
                                        'Resolved' => 'bg-green-100 text-green-800',
                                        'Close' => 'bg-gray-100 text-gray-800',
                                        default => 'bg-gray-100 text-gray-800'
                                    };
                                @endphp
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                                    {{ $report->status_name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-600 font-medium">
                                {{ $report->rw_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-600 font-medium">
                                {{ $report->rt_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-800 font-bold text-sm">
                                    {{ $report->jumlah }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-lg font-medium text-gray-900">Belum ada data laporan</p>
                                    <p class="text-sm text-gray-400 mt-1">Data pengaduan akan muncul di sini setelah tersedia.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Footer Note -->
            <div class="mt-6 text-right">
                <p class="text-xs text-gray-500 italic">
                    * Data diperbarui secara real-time berdasarkan aktivitas pengaduan.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
