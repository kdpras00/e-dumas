<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-DUMAS - Pengaduan Masyarakat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #EBF5FF; /* Light blue background from design */
        }
        .font-serif {
            font-family: 'Merriweather', serif;
        }
    </style>
</head>
<body class="text-gray-800 antialiased min-h-screen flex flex-col">
    <nav class="py-6">
        <div class="container mx-auto px-8 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <img src="{{ asset('img/logo-1.png') }}" alt="E-Dumas Logo" class="h-10 w-auto object-contain drop-shadow-sm">
                    <span class="text-3xl font-bold text-blue-900 tracking-tighter font-serif" style="text-shadow: 0 1px 2px rgba(0,0,0,0.05);">e-dumas</span>
                </div>
            </div>
            <div class="flex items-center gap-6 text-sm font-semibold text-gray-700">
                @guest
                    <a href="/" class="hover:text-blue-600">Beranda</a>
                    <span class="text-gray-400">|</span>
                    <a href="{{ route('about') }}" class="hover:text-blue-600">Tentang E-DUMAS</a>
                    <span class="text-gray-400">|</span>
                    @if (request()->routeIs('login'))

                    @else
                        <a href="{{ route('login') }}" class="bg-white text-blue-900 px-6 py-2 rounded-full shadow-sm hover:shadow-md transition">Masuk</a>
                    @endif
                @endguest

                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-white text-blue-900 px-6 py-2 rounded-full shadow-sm hover:shadow-md transition">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center px-4">
        @yield('content')
    </main>
    
    <footer class="py-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} E-DUMAS. All rights reserved.
    </footer>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden bg-black/90 flex items-center justify-center p-4" onclick="closeLightbox()">
        <div class="relative max-w-4xl max-h-screen w-full flex flex-col items-center">
            <button onclick="closeLightbox()" class="absolute -top-12 right-0 text-white hover:text-gray-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img id="lightbox-image" src="" alt="Full Preview" class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl">
        </div>
    </div>

    <script>
        // SweetAlert2 Global Configuration
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if(session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif

        @if(session('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '<ul class="text-left">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            });
        @endif

        function openLightbox(imageSrc) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            
            if (imageSrc && imageSrc !== '#') {
                lightboxImage.src = imageSrc;
                lightbox.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            }
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
            document.body.style.overflow = ''; // Restore scrolling
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>
</body>
</html>
