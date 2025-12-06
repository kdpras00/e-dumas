@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-800 md:ml-2">Buat Pengaduan</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Buat Laporan Baru</h2>
                <p class="text-blue-100 text-sm mt-1">Sampaikan aspirasi atau keluhan Anda kepada kami.</p>
            </div>
            
            <div class="p-8">
                <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-8 mb-8">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="kategori_id">Kategori Laporan</label>
                            <div class="relative">
                                <select class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200 appearance-none bg-white" id="kategori_id" name="kategori_id" required>
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="subject">Subjek Laporan</label>
                            <input class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200" id="subject" type="text" name="subject" placeholder="Contoh: Jalan Rusak di RT 01" required>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="detail_masalah">Detail Masalah</label>
                            <textarea class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition duration-200 h-48 resize-none" id="detail_masalah" name="detail_masalah" placeholder="Jelaskan detail permasalahan yang Anda alami..." required></textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2 ml-1" for="foto">Foto Bukti (Opsional)</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:bg-gray-50 transition relative">
                                <div id="upload-placeholder" class="space-y-1 text-center relative z-10">
                                    <label for="foto" class="absolute inset-0 w-full h-full cursor-pointer"></label>
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600 justify-center relative z-20 pointer-events-none">
                                        <span class="relative bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Upload a file</span>
                                        </span>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                                <div id="image-preview" class="hidden text-center w-full relative z-20">
                                    <img src="" alt="Preview" class="max-h-64 rounded-lg shadow-sm mx-auto object-contain cursor-zoom-in hover:opacity-90 transition" onclick="event.stopPropagation(); openLightbox(this.src)">
                                    <div class="mt-3">
                                        <span class="text-xs text-gray-500 block mb-2">Klik gambar untuk memperbesar</span>
                                        <button type="button" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold py-2 px-4 rounded-full transition" onclick="document.getElementById('foto').click()">
                                            Ganti Gambar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <input id="foto" name="foto" type="file" class="sr-only" onchange="previewImage(this)">
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('dashboard') }}" class="px-6 py-3 rounded-xl text-gray-500 font-semibold hover:bg-gray-50 transition">
                            Batal
                        </a>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-blue-200 transition transform hover:-translate-y-0.5" type="submit">
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        const placeholder = document.getElementById('upload-placeholder');
        const preview = document.getElementById('image-preview');
        const img = preview.querySelector('img');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                img.src = e.target.result;
                placeholder.classList.add('hidden');
                preview.classList.remove('hidden');
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            img.src = '';
            placeholder.classList.remove('hidden');
            preview.classList.add('hidden');
        }
    }
</script>
@endsection
