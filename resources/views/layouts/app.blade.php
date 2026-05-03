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
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            background-attachment: fixed;
            min-height: 100vh;
        }
        .font-serif {
            font-family: 'Merriweather', serif;
        }
    </style>
</head>
<body class="text-gray-800 antialiased min-h-screen flex flex-col">
    @php
        $isHeroPage = Request::is('/') || Request::is('about') || Request::is('login');
    @endphp
    <nav class="absolute top-0 left-0 w-full z-50 py-8 transition-all duration-300">
        <div class="container mx-auto px-8 flex justify-between items-center">
            <!-- Left: Logo -->
            <div class="w-1/4 flex justify-start">
                <img src="{{ asset('images/e-dumaslogo2.png') }}" alt="Logo" class="h-10 w-auto brightness-0 invert">
            </div>

            <!-- Center: Links (Only for Guests) -->
            <div class="flex-1 flex justify-center items-center gap-8 text-sm font-medium text-white">
                @guest
                    <a href="/" class="hover:text-blue-200 transition relative after:absolute after:bottom-[-4px] after:left-0 after:w-0 after:h-[2px] after:bg-blue-200 after:transition-all hover:after:w-full">Beranda</a>
                    <a href="{{ route('about') }}" class="hover:text-blue-200 transition relative after:absolute after:bottom-[-4px] after:left-0 after:w-0 after:h-[2px] after:bg-blue-200 after:transition-all hover:after:w-full">Tentang E-DUMAS</a>
                @endguest
            </div>

            <!-- Right: Auth Actions -->
            <div class="w-1/4 flex justify-end items-center">
                @guest
                    @if (!request()->routeIs('login'))
                        <a href="{{ route('login') }}" class="bg-white/20 backdrop-blur-md text-white border border-white/30 px-8 py-2.5 rounded-full hover:bg-white hover:text-blue-900 transition-all font-bold shadow-lg">Masuk</a>
                    @endif
                @endguest

                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-white/20 backdrop-blur-md text-white border border-white/30 px-8 py-2.5 rounded-full hover:bg-white hover:text-red-600 transition-all font-bold shadow-lg flex items-center gap-2 group uppercase tracking-widest text-xs">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-grow flex flex-col {{ $isHeroPage ? '' : 'pt-28' }}">
        @yield('content')
    </main>
    
    @if(Request::is('/') || Request::is('about'))
        @include('partials.footer')
    @endif

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden bg-black/90 flex items-center justify-center p-4" onclick="closeLightbox()">
        <div class="relative max-w-4xl max-h-screen w-full flex flex-col items-center">
            <button onclick="closeLightbox()" class="absolute -top-12 right-0 text-white hover:text-gray-300 focus:outline-none font-bold uppercase tracking-widest text-sm">
                Close
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
