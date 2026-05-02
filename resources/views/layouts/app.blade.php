<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-DUMAS - Pengaduan Masyarakat</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #EBF5FF; /* Light blue background from design */
        }
        .font-serif {
            font-family: 'Merriweather', serif;
        }
    </style>
</head>
<body class="text-gray-800 antialiased min-h-screen flex flex-col">
    <nav class="absolute top-0 left-0 w-full z-50 py-6 transition-all duration-300">
        <div class="container mx-auto px-8 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <!-- Logo -->
                <img src="{{ asset('storage/images/e-dumaslogo2.png') }}" alt="Logo" class="h-10 w-auto {{ Request::is('/') || Request::is('about') || Request::is('login') ? 'brightness-0 invert' : '' }}">
            </div>
            <div class="flex items-center gap-8 text-sm font-medium {{ Request::is('/') || Request::is('about') || Request::is('login') ? 'text-white' : 'text-gray-700' }}">
                @guest
                    <a href="/" class="hover:text-blue-200 transition relative after:absolute after:bottom-[-4px] after:left-0 after:w-0 after:h-[2px] after:bg-blue-200 after:transition-all hover:after:w-full">Beranda</a>
                    <a href="{{ route('about') }}" class="hover:text-blue-200 transition relative after:absolute after:bottom-[-4px] after:left-0 after:w-0 after:h-[2px] after:bg-blue-200 after:transition-all hover:after:w-full">Tentang E-DUMAS</a>
                    @if (!request()->routeIs('login'))
                        <a href="{{ route('login') }}" class="bg-white/20 backdrop-blur-md text-white border border-white/30 px-6 py-2.5 rounded-full hover:bg-white hover:text-blue-900 transition-all font-bold shadow-lg">Masuk</a>
                    @endif
                @endguest

                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-white/20 backdrop-blur-md text-white border border-white/30 px-6 py-2.5 rounded-full hover:bg-white hover:text-blue-900 transition-all font-bold shadow-lg">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-grow flex flex-col">
        @yield('content')
    </main>
    
    @if(!Request::is('login') && !Request::is('register') && !Request::is('forgot-password'))
        @include('partials.footer')
    @endif

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
