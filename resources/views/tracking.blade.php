@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-xl mx-auto">
        <!-- Search Card -->
        <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm">
            <div class="p-8 border-b border-gray-50 text-center">
                <h1 class="text-2xl font-bold text-gray-900">Lacak Pengaduan</h1>
                <p class="text-gray-500 text-sm mt-1">Masukkan nomor tiket untuk melihat status</p>
            </div>
            
            <div class="p-8">
                <form action="{{ route('tracking.post') }}" method="POST" class="space-y-8">
                    @csrf
                    <div>
                        <label for="no_pengaduan" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3 text-center">Nomor Pengaduan</label>
                        <input type="text" name="no_pengaduan" id="no_pengaduan" value="{{ old('no_pengaduan', $pengaduan->no_pengaduan ?? '') }}" 
                            class="block w-full px-4 py-4 bg-gray-50 border border-gray-100 rounded-2xl text-gray-900 font-mono font-bold focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-center" 
                            placeholder="YYYYMMDD-XXX" required>
                    </div>
                    
                    <div>
                        <label for="captcha" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3 text-center">Captcha</label>
                        <div class="flex flex-col items-center gap-4">
                            <div class="flex items-center gap-4">
                                <div class="captcha-img rounded-xl overflow-hidden border border-gray-100">
                                    {!! captcha_img('default') !!}
                                </div>
                                <button type="button" class="reload-captcha text-gray-400 hover:text-blue-600 font-bold text-xs uppercase tracking-widest transition">
                                    Refresh
                                </button>
                            </div>
                            <input type="text" name="captcha" id="captcha" 
                                class="block w-full px-4 py-4 bg-gray-50 border border-gray-100 rounded-2xl text-gray-900 font-bold focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-center" 
                                placeholder="Masukkan kode" required>
                        </div>
                    </div>
                    
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-2xl transition shadow-lg shadow-blue-200">
                            Lacak Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reloadBtn = document.querySelector('.reload-captcha');
        if (reloadBtn) {
            reloadBtn.addEventListener('click', function() {
                const img = document.querySelector('.captcha-img img');
                img.src = '/captcha/default?' + Math.random();
            });
        }
    });
</script>
@endsection
