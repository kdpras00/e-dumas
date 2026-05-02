@extends('layouts.app')

@section('content')

<div class="w-full">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-blue-600 to-blue-800 text-white overflow-hidden">
        <div class="absolute inset-0 bg-blue-900/20"></div>
        
        <div class="container mx-auto px-6 pt-40 pb-24 md:pt-48 md:pb-32 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="md:w-1/2 space-y-8 text-center md:text-left">
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight tracking-tight">
                        Suara Anda, <br>
                        <span id="typing-text" class="text-blue-200"></span><span class="animate-pulse">|</span>
                    </h1>
                    <p class="text-xl text-blue-50 leading-relaxed max-w-lg mx-auto md:mx-0 text-justify">
                        Sampaikan aspirasi dan pengaduan anda demi kemajuan lingkungan. Kami siap mendengar, memproses, dan menindaklanjuti setiap laporan.
                    </p>
                </div>
                
                <div class="md:w-1/2 relative">
                    <!-- Glassmorphism Card -->
                    <div class="">
                        <img src="{{ asset('images/bannerimages.png') }}" alt="Banner Image" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Complaints Section -->
    <div class="py-24 bg-gray-900 overflow-hidden">
        <div class="container mx-auto px-6 text-center">
            <div class="mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 font-poppins">Laporan Terbaru</h2>
                <p class="text-gray-400 max-w-2xl mx-auto">Pantau terus perkembangan laporan dan aspirasi yang telah disampaikan oleh warga.</p>
            </div>

            <div class="relative group">
                <!-- Slider Wrapper -->
                <div class="overflow-hidden">
                    <div id="complaint-slider" class="flex gap-6 transition-transform duration-500 ease-in-out">
                        @forelse($laporans as $laporan)
                            @php
                                $detail = $laporan->latestDetail;
                                if(!$detail) continue;
                                
                                $statusName = $detail->status->status ?? 'Menunggu';
                                $statusColor = 'text-gray-600';
                                if(strtolower($statusName) == 'menunggu' || strtolower($statusName) == 'pending') $statusColor = 'text-yellow-600';
                                elseif(strtolower($statusName) == 'proses') $statusColor = 'text-blue-600';
                                elseif(strtolower($statusName) == 'selesai') $statusColor = 'text-green-600';
                                
                                $userName = $detail->user->name ?? 'Anonim';
                                $userInitial = strtoupper(substr($userName, 0, 2));
                            @endphp
                            <!-- Dynamic Card -->
                            <div class="min-w-full md:min-w-[calc(33.333%-16px)] bg-white p-8 rounded-3xl border border-gray-100 flex flex-col justify-between text-left hover:border-blue-200 transition">
                                <div>
                                    <div class="flex justify-between items-start mb-4 pb-4 border-b border-gray-100">
                                        <h3 class="text-lg font-bold text-gray-900 pr-4 line-clamp-2">{{ $laporan->subject }}</h3>
                                        <div class="flex flex-col items-end shrink-0">
                                            <span class="text-gray-500 text-xs font-bold">{{ $laporan->created_at->format('d M Y') }}</span>
                                            <span class="text-gray-400 text-[10px]">{{ $laporan->created_at->format('H:i') }} WIB</span>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm leading-relaxed mb-6 line-clamp-3 text-justify">{{ $detail->detail_masalah }}</p>
                                </div>
                                <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold text-xs">{{ $userInitial }}</div>
                                        <div>
                                            <p class="text-xs font-bold text-gray-900">{{ $userName }}</p>
                                            <p class="text-[10px] text-gray-500 font-medium">Warga</p>
                                        </div>
                                    </div>
                                    <div class="text-xs font-bold">
                                        <span class="text-gray-400 font-medium">Status : </span>
                                        <span class="{{ $statusColor }}">{{ $statusName }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="min-w-full bg-white p-8 rounded-3xl border border-gray-100 text-center">
                                <p class="text-gray-500 font-medium">Belum ada laporan pengaduan saat ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Slider Controls (Dots) -->
                <div class="flex justify-center gap-3 mt-12" id="dots-container"></div>
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
                    <div class="flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">1. Tulis Laporan</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Laporkan keluhan anda dengan jelas dan sertakan bukti foto jika ada.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center group">
                    <div class="flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">2. Verifikasi</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Laporan anda akan diverifikasi dan diteruskan ke petugas terkait.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center group">
                    <div class="flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">3. Tindak Lanjut</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Petugas akan menindaklanjuti laporan dan melakukan perbaikan.</p>
                </div>

                <!-- Step 4 -->
                <div class="text-center group">
                    <div class="flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                <a href="{{ route('login') }}" class="inline-block bg-white text-blue-600 font-bold py-3 px-8 rounded-full hover:bg-gray-100 transition duration-300">
                    Masuk
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    // Typewriter Effect
    const text = "Perubahan Kita.";
    const typingText = document.getElementById("typing-text");
    let index = 0;
    let isDeleting = false;
    let speed = 150;

    function type() {
        const currentText = text.substring(0, index);
        typingText.textContent = currentText;

        if (!isDeleting && index < text.length) {
            index++;
            speed = 150;
        } else if (isDeleting && index > 0) {
            index--;
            speed = 75;
        } else {
            isDeleting = !isDeleting;
            speed = isDeleting ? 2000 : 500;
        }

        setTimeout(type, speed);
    }

    // Slider Logic
    const slider = document.getElementById('complaint-slider');
    const dotsContainer = document.getElementById('dots-container');
    const cards = slider.children;
    let currentSlide = 0;
    let autoSlideInterval;

    function updateSlider() {
        const cardWidth = cards[0].offsetWidth + 24; // width + gap
        slider.style.transform = `translateX(-${currentSlide * cardWidth}px)`;
        
        // Update dots
        const dots = dotsContainer.children;
        Array.from(dots).forEach((dot, i) => {
            dot.classList.toggle('bg-blue-600', i === currentSlide);
            dot.classList.toggle('w-8', i === currentSlide);
            dot.classList.toggle('bg-gray-300', i !== currentSlide);
            dot.classList.toggle('w-3', i !== currentSlide);
        });
    }

    function createDots() {
        const visibleCards = window.innerWidth >= 768 ? cards.length - 2 : cards.length;
        const totalDots = Math.max(1, visibleCards);
        dotsContainer.innerHTML = '';
        for (let i = 0; i < totalDots; i++) {
            const dot = document.createElement('button');
            dot.className = 'h-3 rounded-full transition-all duration-300 bg-gray-300 w-3';
            dot.onclick = () => {
                currentSlide = i;
                updateSlider();
                resetAutoSlide();
            };
            dotsContainer.appendChild(dot);
        }
        updateSlider();
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            const visibleCards = window.innerWidth >= 768 ? cards.length - 2 : cards.length;
            const totalDots = Math.max(1, visibleCards);
            currentSlide = (currentSlide + 1) % totalDots;
            updateSlider();
        }, 5000); // Bergeser setiap 5 detik
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }

    // Pause auto slide on hover
    slider.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
    slider.addEventListener('mouseleave', startAutoSlide);

    document.addEventListener("DOMContentLoaded", () => {
        type();
        createDots();
        startAutoSlide();
        window.addEventListener('resize', createDots);
    });
</script>
@endsection
