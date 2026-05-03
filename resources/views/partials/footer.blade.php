<footer class="bg-gray-900 text-white pt-20 pb-10">
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-12 mb-16">
            <!-- Brand & Description -->
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('images/e-dumaslogo2.png') }}" alt="Logo" class="h-10 w-auto brightness-0 invert">
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">
                    Platform pengaduan masyarakat yang transparan dan responsif untuk lingkungan yang lebih baik. Suara anda adalah prioritas kami.
                </p>
                <div class="flex gap-4">
                    <!-- Clean minimal footer - social links removed -->
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-bold mb-6 font-poppins">Navigasi</h4>
                <ul class="space-y-4 text-gray-400 text-sm">
                    <li><a href="/" class="hover:text-blue-500 transition">Beranda</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-blue-500 transition">Tentang E-DUMAS</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-blue-500 transition">Masuk</a></li>
                </ul>
            </div>

            <!-- Features -->
            <div>
                <h4 class="text-lg font-bold mb-6 font-poppins">Layanan</h4>
                <ul class="space-y-4 text-gray-400 text-sm">
                    <li><a href="{{ route('login') }}" class="hover:text-blue-500 transition">Buat Pengaduan</a></li>
                    <li><a href="{{ route('tracking') }}" class="hover:text-blue-500 transition">Lacak Pengaduan</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-bold mb-6 font-poppins">Kontak Kami</h4>
                <ul class="space-y-4 text-gray-400 text-sm">
                    <li>Jl. Raya Kelurahan No. 123, Kota Sejahtera</li>
                    <li>info@e-dumas.go.id</li>
                    <li>(021) 555-0123</li>
                </ul>
            </div>
        </div>

        <div class="pt-8 text-center text-gray-500 text-xs font-poppins">
            <p>&copy; {{ date('Y') }} E-DUMAS. Semua hak dilindungi undang-undang.</p>
        </div>
    </div>
</footer>
