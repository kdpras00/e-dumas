@extends('layouts.app')

@section('content')

<div class="w-full">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-blue-600 to-blue-800 text-white overflow-hidden">
        <div class="absolute inset-0">
            <svg class="absolute bottom-0 left-0 transform scale-150 opacity-10" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="250" cy="250" r="250" fill="white"/>
            </svg>
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        </div>
        
        <div class="container mx-auto px-6 py-24 md:py-32 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="md:w-1/2 space-y-8 text-center md:text-left">
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight tracking-tight">
                        Suara Anda, <br>
                        <span class="text-blue-200">Perubahan Kita.</span>
                    </h1>
                    <p class="text-xl text-blue-50 leading-relaxed max-w-lg mx-auto md:mx-0">
                        Sampaikan aspirasi dan pengaduan anda demi kemajuan lingkungan. Kami siap mendengar, memproses, dan menindaklanjuti setiap laporan.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="#alur" class="bg-blue-700/50 backdrop-blur-sm text-white border border-white/30 px-8 py-4 rounded-full font-bold text-lg hover:bg-blue-700/70 transition">
                            Pelajari Alur
                        </a>
                    </div>
                </div>
                
                <div class="md:w-1/2 relative">
                    <!-- Glassmorphism Card -->
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-3xl shadow-2xl transform rotate-2 hover:rotate-0 transition duration-500">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-green-400 rounded-full flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-white">Laporan Selesai</h3>
                                <p class="text-blue-100 text-sm">Jalan Berlubang di RT 05</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="h-2 bg-white/20 rounded-full w-3/4"></div>
                            <div class="h-2 bg-white/20 rounded-full w-1/2"></div>
                            <div class="h-2 bg-white/20 rounded-full w-5/6"></div>
                        </div>
                        <div class="mt-8 flex items-center justify-between text-sm text-blue-100">
                            <span>Status: <span class="text-green-300 font-bold">Terverifikasi</span></span>
                            <span>Baru saja</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-24 bg-white" id="alur">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Bagaimana Cara Kerjanya?</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Proses pengaduan di E-DUMAS dirancang sesederhana mungkin agar anda bisa fokus pada apa yang penting.</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 transition duration-300 shadow-sm group-hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600 group-hover:text-white transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">1. Tulis Laporan</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Laporkan keluhan anda dengan jelas dan sertakan bukti foto jika ada.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 transition duration-300 shadow-sm group-hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600 group-hover:text-white transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">2. Verifikasi</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Laporan anda akan diverifikasi dan diteruskan ke petugas terkait.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 transition duration-300 shadow-sm group-hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600 group-hover:text-white transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">3. Tindak Lanjut</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Petugas akan menindaklanjuti laporan dan melakukan perbaikan.</p>
                </div>

                <!-- Step 4 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 transition duration-300 shadow-sm group-hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600 group-hover:text-white transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">4. Selesai</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Laporan selesai ditangani dan anda akan menerima notifikasi.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white" />
            </svg>
        </div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Siap untuk Berkontribusi?</h2>
            <p class="text-blue-200 mb-8 max-w-2xl mx-auto text-lg">Jangan biarkan masalah lingkungan anda berlarut-larut. Laporkan sekarang dan jadilah bagian dari perubahan.</p>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="inline-block bg-white text-blue-600 font-bold py-3 px-8 rounded-full hover:bg-gray-100 transition duration-300 shadow-lg transform hover:-translate-y-1">
                    Masuk
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
