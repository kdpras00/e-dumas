@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-3xl mx-auto">
        <!-- Back Link -->
        <div class="mb-8">
            <a href="{{ route('tracking') }}" class="text-white/70 hover:text-white font-bold transition flex items-center gap-2">
                &larr; Kembali
            </a>
        </div>

        <!-- Info Card -->
        <div class="bg-white rounded-3xl p-8 border border-gray-100 mb-8 shadow-sm">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $pengaduan->subject }}</h2>
                    <p class="text-gray-500 mt-1">Kategori: {{ $pengaduan->kategori->kategori }}</p>
                </div>
                <div class="text-left md:text-right">
                    <p class="text-gray-400 text-xs font-mono mb-6">Tiket: #{{ $pengaduan->no_pengaduan }}</p>
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-2">Status Terakhir</span>
                    <span class="text-2xl font-bold text-blue-600">{{ $pengaduan->latestDetail->status->status ?? '-' }}</span>
                </div>
            </div>
        </div>

        <!-- Timeline Section -->
        <div class="bg-white rounded-3xl p-10 border border-gray-100 shadow-sm">
            <h3 class="text-xl font-bold text-gray-900 mb-12">Timeline Progres Penanganan</h3>
            
            <div class="space-y-12">
                @foreach($pengaduan->details->sortBy('created_at') as $detail)
                <div class="flex gap-6">
                    <!-- Date column -->
                    <div class="w-24 md:w-32 flex-none text-right">
                        <div class="text-xs font-bold text-gray-900">{{ $detail->created_at->format('d M Y') }}</div>
                        <div class="text-[10px] text-gray-400 font-medium">{{ $detail->created_at->format('H:i') }} WIB</div>
                    </div>

                    <!-- Bullet column -->
                    <div class="flex-none flex flex-col items-center">
                        @php
                            $isLatest = $loop->last; // Assuming ascending order (oldest to latest)
                            $status = $detail->status->status;
                            $isFinished = in_array($status, ['Resolved', 'Cancel', 'Done']);
                            
                            $bulletClass = "w-3 h-3 rounded-full border-2 border-blue-600 shadow-sm mt-1 ";
                            if ($isLatest && !$isFinished) {
                                $bulletClass .= "bg-white animate-pulse ring-4 ring-blue-100";
                            } else {
                                $bulletClass .= "bg-blue-600";
                            }
                        @endphp
                        <div class="{{ $bulletClass }}"></div>
                        @if(!$loop->last)
                            <div class="w-px flex-grow bg-blue-600 my-2"></div>
                        @else
                            {{-- No line for the last item --}}
                        @endif
                    </div>
                    
                    <!-- Content column -->
                    <div class="flex-1 pb-10 space-y-3">
                        <h4 class="font-bold text-blue-600 uppercase tracking-wider text-sm">{{ $detail->status->status }}</h4>
                        <p class="text-gray-700 leading-relaxed text-justify">
                            {{ $detail->detail_masalah }}
                        </p>
                        
                        @if($detail->foto)
                        <div class="pt-2">
                            <button onclick="openLightbox('{{ asset('storage/' . $detail->foto) }}')" class="rounded-xl overflow-hidden border border-gray-100 block">
                                <img src="{{ asset('storage/' . $detail->foto) }}" alt="Bukti" class="h-40 w-auto object-cover hover:opacity-90 transition">
                            </button>
                        </div>
                        @endif

                        <div class="flex items-center gap-2 pt-2">
                            <img src="{{ asset('images/default-profile.jpg') }}" alt="Petugas" class="w-5 h-5 rounded-full grayscale">
                            <span class="text-xs text-gray-400">Oleh: <span class="font-bold">{{ $detail->user->nama_lengkap }}</span></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
