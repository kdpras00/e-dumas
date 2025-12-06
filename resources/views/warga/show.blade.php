@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
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
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Detail Pengaduan</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Main Content (Restored Original Layout) -->
            <div class="lg:col-span-2 space-y-8">
                
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-8">
                    <!-- Header Title (Original Style) -->
                    <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                        <h2 class="text-3xl font-bold text-white tracking-wide">Pengaduan Header</h2>
                        <div class="h-0.5 w-full bg-blue-400/30 mt-4 rounded-full"></div>
                    </div>
                    
                    <div class="p-8 bg-blue-50/30">
                        <!-- Rincian Section (Original Style) -->
                        <div class="border border-blue-200 rounded-lg overflow-hidden mb-8 shadow-sm">
                            <div class="bg-blue-100/50 px-6 py-3 border-b border-blue-200">
                                <h3 class="text-blue-900 text-lg font-bold">Rincian</h3>
                            </div>
                            <div class="bg-blue-50/50 p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Left Column -->
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-600 mb-1 ml-1">Nomor Pengaduan</label>
                                        <div class="w-full bg-white border border-gray-400 text-gray-900 text-sm rounded-lg p-3 font-semibold shadow-sm">
                                            {{ $pengaduan->id }}
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-600 mb-1 ml-1">Tanggal Pengaduan</label>
                                        <div class="w-full bg-white border border-gray-400 text-gray-900 text-sm rounded-lg p-3 font-medium shadow-sm">
                                            {{ $pengaduan->created_at->format('d-m-Y H.i') }}
                                        </div>
                                    </div>
                                </div>
        
                                <!-- Right Column -->
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-600 mb-1 ml-1">Nama Warga</label>
                                        <div class="w-full bg-white border border-gray-400 text-gray-900 text-sm rounded-lg p-3 font-medium shadow-sm">
                                            @php
                                                $originalReporter = $pengaduan->details->sortBy('id')->first()->user;
                                            @endphp
                                            {{ $originalReporter->nama_lengkap }}
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-600 mb-1 ml-1">Kategori</label>
                                        <div class="w-full bg-white border border-gray-400 text-gray-900 text-sm rounded-lg p-3 font-medium shadow-sm">
                                            {{ $pengaduan->kategori->kategori }}
                                        </div>
                                    </div>
                                </div>
        
                                <!-- Subject Full Width -->
                                <div class="col-span-1 md:col-span-2 mt-2">
                                     <label class="block text-xs font-bold text-gray-600 mb-1 ml-1">Subject</label>
                                     <div class="w-full bg-white border border-gray-400 text-gray-900 text-sm rounded-lg p-3 font-medium shadow-sm">
                                        {{ $pengaduan->subject }}
                                     </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- Pengaduan Detail Section Title (Original Style) -->
                        <div class="mb-6 mt-10">
                            <h2 class="text-3xl font-bold text-gray-800 tracking-wide">Riwayat Tindak Lanjut</h2>
                            <div class="h-0.5 w-full bg-gray-300 mt-2 rounded-full"></div>
                        </div>
        
                        <!-- Detail Blocks (Original Style) -->
                        <div class="space-y-8">
                            @foreach($pengaduan->details as $index => $detail)
                                <div class="border border-gray-400 rounded-lg overflow-hidden shadow-md bg-blue-50/20">
                                     <div class="flex flex-col md:flex-row border-b border-gray-300">
                                        <div class="p-6 w-full">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                                 <div>
                                                    <label class="block text-xs font-bold text-gray-600 mb-1 ml-1">Status</label>
                                                    <div class="w-full bg-white border border-gray-400 text-gray-900 text-sm rounded-lg p-3 font-medium shadow-sm">
                                                        {{ $detail->status->status }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="block text-xs font-bold text-gray-600 mb-1 ml-1">User</label>
                                                    <div class="w-full bg-white border border-gray-400 text-gray-900 text-sm rounded-lg p-3 font-medium shadow-sm">
                                                        {{ $detail->user->nama_lengkap }}
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="mb-4">
                                                <label class="block text-xs font-bold text-gray-600 mb-1 ml-1">Tanggal Pengaduan</label>
                                                <div class="w-full bg-white border border-gray-400 text-gray-900 text-sm rounded-lg p-3 font-medium shadow-sm md:w-1/2">
                                                    {{ $detail->created_at->format('d-m-Y H.i') }}
                                                </div>
                                            </div>
        
                                            <div>
                                                <label class="block text-xs font-bold text-gray-600 mb-1 ml-1">Detail Pengaduan</label>
                                                <div class="w-full bg-white border border-gray-400 text-gray-900 text-sm rounded-lg p-4 font-medium shadow-sm min-h-[100px]">
                                                    <p class="whitespace-pre-wrap">{{ $detail->detail_masalah }}</p>
                                                </div>
                                            </div>
                                            
                                            @if($detail->foto)
                                                <div class="mt-4">
                                                    <label class="block text-xs font-bold text-gray-600 mb-1 ml-1">Foto Bukti</label>
                                                    <div class="p-2 bg-white border border-gray-300 rounded-lg inline-block">
                                                        <img src="{{ asset('storage/' . $detail->foto) }}" alt="Bukti Foto" class="max-h-48 rounded cursor-pointer hover:opacity-90 transition" onclick="window.open(this.src, '_blank')">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                     </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Response Form (Only for Petugas/Admin) -->
                @if(in_array(Auth::user()->user_level_id, [2, 3]))
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800">Berikan Tanggapan</h3>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('pengaduan.response', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Status Saat Ini</label>
                                    <div class="flex items-center">
                                        @php
                                            $currStatusId = $pengaduan->latestDetail->status->id;
                                            $currStatusName = $pengaduan->latestDetail->status->status;
                                            $badgeColor = match($currStatusId) {
                                                1 => 'bg-yellow-100 text-yellow-800',
                                                2 => 'bg-blue-100 text-blue-800',
                                                3 => 'bg-green-100 text-green-800',
                                                4 => 'bg-gray-100 text-gray-800',
                                                default => 'bg-gray-100 text-gray-800'
                                            };
                                        @endphp
                                        <span class="px-3 py-2 rounded-lg font-bold text-sm {{ $badgeColor }}">
                                            {{ $currStatusName }}
                                        </span>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="foto">Foto Bukti (Opsional)</label>
                                    <input type="file" name="foto" id="foto" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                </div>
                            </div>
        
                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggapan">Tanggapan</label>
                                <textarea class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500 h-24 resize-none" id="tanggapan" name="tanggapan" placeholder="Tulis rincian tindak lanjut disini..." required></textarea>
                            </div>

                            @php
                                $nextStatusId = match($currStatusId) {
                                    1 => 2, // Open -> On Progress
                                    2 => 3, // On Progress -> Resolved
                                    3 => 4, // Resolved -> Close
                                    4 => null, // Closed -> End
                                    default => null
                                };
                            @endphp

                            @if($nextStatusId)
                                <input type="hidden" name="status_id" value="{{ $nextStatusId }}">
                                <div class="flex justify-end">
                                    @if($currStatusId == 1)
                                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition flex items-center gap-2 transform hover:scale-105" type="submit">
                                            <span>🚀</span> Mulai Tindak Lanjut
                                        </button>
                                    @elseif($currStatusId == 2)
                                        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition flex items-center gap-2 transform hover:scale-105" type="submit">
                                            <span>✅</span> Selesaikan Tindak Lanjut
                                        </button>
                                    @elseif($currStatusId == 3)
                                        <button class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg shadow-md transition flex items-center gap-2 transform hover:scale-105" type="submit">
                                            <span>🔒</span> Tutup Laporan
                                        </button>
                                    @endif
                                </div>
                            @else
                                <div class="flex justify-end">
                                    <button class="bg-gray-300 text-gray-500 font-bold py-2 px-6 rounded-lg cursor-not-allowed" type="button" disabled>
                                        Laporan Telah Ditutup
                                    </button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Column: Status Timeline -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 sticky top-8">
                    <h3 class="font-bold text-gray-800 text-xl mb-8 border-b pb-4">Status Timeline</h3>
                    <div class="relative pl-2">
                        <!-- Vertical Line -->
                        <div class="absolute left-[7px] top-2 bottom-2 w-0.5 bg-gray-200"></div>

                        <div class="space-y-10 relative">
                            @php
                                $orderedStatuses = [4, 3, 2, 1]; // Close, Resolved, On Progress, Open
                            @endphp

                            @foreach($orderedStatuses as $statusId)
                                @php
                                    $history = $pengaduan->details->where('status_id', $statusId)->sortByDesc('created_at')->first();
                                    $isReached = $history ? true : false;
                                    $currentStatusId = $pengaduan->latestDetail->status_id;
                                    
                                    $statusName = match($statusId) {
                                        1 => 'Open',
                                        2 => 'On Progress',
                                        3 => 'Resolved',
                                        4 => 'Close',
                                        default => 'Unknown'
                                    };
                                @endphp

                                <div class="relative pl-8">
                                    <!-- Dot -->
                                    <div class="absolute left-0 top-1.5 w-4 h-4 rounded-full border-2 {{ $isReached ? 'bg-white border-blue-600' : 'bg-gray-100 border-gray-300' }} z-10">
                                        @if($currentStatusId == $statusId)
                                            <div class="absolute inset-0.5 bg-blue-600 rounded-full"></div>
                                        @endif
                                    </div>
                                    
                                    <!-- Content -->
                                    <div>
                                        <h4 class="text-base font-bold {{ $isReached ? 'text-blue-600' : 'text-gray-400' }}">
                                            {{ $statusId }}. {{ $statusName }}
                                        </h4>
                                        @if($history)
                                            <p class="text-xs text-blue-400 font-medium mt-1">
                                                {{ $history->created_at->format('Y-M-d H:i:s') }}
                                            </p>
                                        @else
                                            <p class="text-xs text-gray-300 mt-1">-</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection