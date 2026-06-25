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
    <nav class="absolute top-0 left-0 w-full z-50 py-4 md:py-8 transition-all duration-300">
        <div class="container mx-auto px-6 md:px-8 flex justify-between items-center">
            <!-- Left: Logo -->
            <div class="flex justify-start">
                <img src="{{ asset('images/e-dumaslogo2.png') }}" alt="Logo" class="h-8 md:h-10 w-auto brightness-0 invert">
            </div>

            <!-- Center: Links (Only visible on MD and up) -->
            <div class="hidden md:flex flex-1 justify-center items-center gap-8 text-sm font-medium text-white">
                @guest
                    <a href="/" class="hover:text-blue-200 transition relative after:absolute after:bottom-[-4px] after:left-0 after:w-0 after:h-[2px] after:bg-blue-200 after:transition-all hover:after:w-full">Beranda</a>
                    <a href="{{ route('about') }}" class="hover:text-blue-200 transition relative after:absolute after:bottom-[-4px] after:left-0 after:w-0 after:h-[2px] after:bg-blue-200 after:transition-all hover:after:w-full">Tentang E-DUMAS</a>
                    <a href="{{ route('tracking') }}" class="hover:text-blue-200 transition relative after:absolute after:bottom-[-4px] after:left-0 after:w-0 after:h-[2px] after:bg-blue-200 after:transition-all hover:after:w-full">Lacak Pengaduan</a>
                @endguest
            </div>

            <!-- Right: Auth Actions (Only visible on MD and up) -->
            <div class="hidden md:flex items-center gap-4 justify-end">
                @guest
                    @if (!request()->routeIs('login'))
                        <a href="{{ route('login') }}" class="bg-white/20 backdrop-blur-md text-white border border-white/30 px-8 py-2.5 rounded-full hover:bg-white hover:text-blue-900 transition-all font-bold shadow-lg">Masuk</a>
                    @endif
                @endguest

                @auth
                    <div class="relative group">
                        <button class="flex items-center gap-3 focus:outline-none">
                            <div class="text-right">
                                <p class="text-sm font-bold text-white leading-none capitalize tracking-wide">{{ auth()->user()->nama_lengkap ?? auth()->user()->username }}</p>
                                <p class="text-[10px] text-blue-200 font-bold uppercase tracking-widest mt-1">{{ auth()->user()->level->user_level }}</p>
                            </div>
                            <img src="{{ asset('images/default-profile.jpg') }}" alt="Profile" class="h-10 w-10 rounded-full object-cover border-2 border-white/30 shadow-sm">
                            <svg class="w-4 h-4 text-white/80 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right border border-gray-100">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 font-bold hover:bg-red-50 flex items-center gap-2 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <!-- Hamburger Button (Only visible on mobile/tablet) -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-white hover:text-blue-200 focus:outline-none" aria-label="Toggle menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="hamburger-icon" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer/Dropdown Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-blue-900/95 backdrop-blur-lg border-t border-white/10 px-6 py-4 space-y-4">
            @guest
            <div class="flex flex-col gap-4 text-sm font-medium text-white">
                <a href="/" class="hover:text-blue-200 py-2 border-b border-white/5">Beranda</a>
                <a href="{{ route('about') }}" class="hover:text-blue-200 py-2 border-b border-white/5">Tentang E-DUMAS</a>
                <a href="{{ route('tracking') }}" class="hover:text-blue-200 py-2 border-b border-white/5">Lacak Pengaduan</a>
            </div>
            @endguest
            
            <div class="pt-4 flex flex-col gap-4">
                @guest
                    @if (!request()->routeIs('login'))
                        <a href="{{ route('login') }}" class="w-full text-center bg-white text-blue-900 py-2.5 rounded-full font-bold shadow-lg">Masuk</a>
                    @endif
                @endguest

                @auth
                    <div class="flex items-center gap-4 py-2 border-b border-white/10">
                        <img src="{{ asset('images/default-profile.jpg') }}" alt="Profile" class="h-12 w-12 rounded-full object-cover border-2 border-white/30 shadow-sm">
                        <div class="text-left flex-1">
                            <p class="text-sm font-bold text-white capitalize tracking-wide">{{ auth()->user()->nama_lengkap ?? auth()->user()->username }}</p>
                            <p class="text-[10px] text-blue-200 font-bold uppercase tracking-widest mt-0.5">{{ auth()->user()->level->user_level }}</p>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="w-full mt-2">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 text-sm text-red-400 font-bold flex items-center gap-2 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
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

        // Mobile Menu Toggle logic
        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const hamburgerIcon = document.getElementById('hamburger-icon');
            const closeIcon = document.getElementById('close-icon');

            if (menuButton && mobileMenu) {
                menuButton.addEventListener('click', () => {
                    const isHidden = mobileMenu.classList.contains('hidden');
                    if (isHidden) {
                        mobileMenu.classList.remove('hidden');
                        hamburgerIcon.classList.add('hidden');
                        closeIcon.classList.remove('hidden');
                    } else {
                        mobileMenu.classList.add('hidden');
                        hamburgerIcon.classList.remove('hidden');
                        closeIcon.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
