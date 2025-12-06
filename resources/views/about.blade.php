@extends('layouts.app')

@section('content')
<div class="w-full">
    <!-- Header Section -->
    <div class="bg-blue-900 text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        </div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang E-DUMAS</h1>
            <p class="text-xl text-blue-200 max-w-2xl mx-auto">Membangun jembatan komunikasi antara masyarakat dan pemerintah untuk lingkungan yang lebih baik.</p>
        </div>
    </div>

    <!-- Vision & Mission -->
    <div class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row gap-12 items-center">
                <div class="md:w-1/2">
                    <div class="relative">
                        <div class="absolute inset-0 bg-teal-200 rounded-3xl transform rotate-3"></div>
                        <div class="relative bg-white p-10 rounded-3xl shadow-xl">
                            <h3 class="text-2xl font-bold text-blue-900 mb-6 border-b pb-4">Visi Kami</h3>
                            <p class="text-gray-600 leading-relaxed text-lg">
                                "Menjadi platform pengaduan masyarakat terdepan yang transparan, responsif, dan akuntabel, guna mewujudkan pelayanan publik yang prima dan lingkungan yang sejahtera."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 space-y-8">
                    <h3 class="text-3xl font-bold text-blue-900">Misi Kami</h3>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">Respon Cepat</h4>
                                <p class="text-gray-600">Memastikan setiap laporan ditanggapi dengan segera dan profesional.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center text-teal-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">Transparansi</h4>
                                <p class="text-gray-600">Memberikan akses terbuka bagi pelapor untuk memantau status pengaduan.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">Partisipasi Publik</h4>
                                <p class="text-gray-600">Mendorong keterlibatan aktif masyarakat dalam pembangunan daerah.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team / Contact Section -->
    <div class="py-20 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-12">Hubungi Kami</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Alamat</h4>
                    <p class="text-gray-500">Jl. Raya Kelurahan No. 123<br>Kota Sejahtera, 12345</p>
                </div>
                <div class="p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Email</h4>
                    <p class="text-gray-500">info@e-dumas.go.id<br>support@e-dumas.go.id</p>
                </div>
                <div class="p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Telepon</h4>
                    <p class="text-gray-500">(021) 555-0123<br>Senin - Jumat, 08:00 - 16:00</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
