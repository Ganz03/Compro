<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <style>
        /* Apply the background to the entire page */
        body {
            background-image: url("{{ asset('images/background.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            overflow-x: hidden;
        }
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="font-sans antialiased bg-transparent">
    <!-- Header -->
    <header class="absolute top-0 left-0 w-full z-50 bg-transparent bg-opacity-0">
        <div class="container mx-auto flex items-center justify-between py-4 px-6 md:px-16">
            <!-- Logo dan Nama Perusahaan -->
            <div class="flex items-center space-x-4">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-10">
                </a>
                <span class="text-xl font-bold text-white">PT. SIDOREJO MAKMUR SEJAHTERA</span>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center gap-x-6">
                <!-- Dropdown menu Our Business -->
                <div class="relative" x-data="{ open: false }">
                    <a href="#" @click.prevent="open = !open" class="text-white hover:text-blue-500 flex items-center">
                        Our Business
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" :class="{'rotate-180': open}">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                    
                    <!-- Dropdown items -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" 
                        x-transition:enter-start="transform opacity-0 scale-95" 
                        x-transition:enter-end="transform opacity-100 scale-100" 
                        x-transition:leave="transition ease-in duration-75" 
                        x-transition:leave-start="transform opacity-100 scale-100" 
                        x-transition:leave-end="transform opacity-0 scale-95" 
                        class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        
                        @foreach($navigationSpbus as $navSpbu)
                            <a href="{{ route('spbu.show', $navSpbu->slug) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">
                                SPBU {{ $navSpbu->code }} {{ strtoupper($navSpbu->name) }}
                            </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Other navigation items remain unchanged -->
                <a href="{{ route('aboutus') }}" class="text-white hover:text-blue-500">About Us</a>
                <a href="{{ route('career') }}" class="text-white hover:text-blue-500">Career</a>
                <a href="{{ route('news.index') }}" class="text-white hover:text-blue-500">News</a>
                <a href="{{ route('contact') }}" class="text-white hover:text-blue-500">Contact</a>
            </nav>

            <!-- Hamburger Menu Button (Mobile) -->
            <button id="menu-toggle" class="md:hidden text-black focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <nav id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white flex flex-col space-y-2 p-4 shadow-md z-50">
            <!-- Mobile dropdown menu untuk Our Business dengan Alpine.js -->
            <div x-data="{ open: false }">
                <a href="#" @click.prevent="open = !open" class="flex justify-between items-center text-black hover:text-blue-500">
                    Our Business
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" 
                        :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                
                <!-- Submenu untuk SPBU dengan animasi -->
                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="pl-4 mt-2 space-y-2 border-l-2 border-gray-200">
                    @foreach($navigationSpbus as $navSpbu)
                        <a href="{{ route('spbu.show', $navSpbu->slug) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">
                            SPBU {{ $navSpbu->code }} {{ strtoupper($navSpbu->name) }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Menu lainnya tetap sama -->
            <a href="{{ route('aboutus') }}" class="block text-white hover:text-blue-500">About Us</a>
            <a href="{{ route('career') }}" class="block text-white hover:text-blue-500">Career</a>
            <a href="{{ route('news.index') }}" class="block text-white hover:text-blue-500">News</a>
            <a href="{{ route('contact') }}" class="block text-white hover:text-blue-500">Contact</a>
        </nav>
    </header>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-screen text-white" style="background-image: url('{{ asset('images/hero_section/' . $heroSection->background_image) }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto relative z-10 flex flex-col justify-center items-center h-full text-center px-4">
            <h1 class="text-4xl md:text-6xl font-bold">
                <span id="typed-line-1">{{ $heroSection->typed_line_1 }}</span><br>
                <span id="typed-line-2">{{ $heroSection->typed_line_2 }}</span>
            </h1>
            <p class="mt-4 text-lg md:text-xl" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                {{ $heroSection->description }}
            </p>
        </div>
    </section>

    <!-- About Section -->
    <section id="about-alt2" class="py-16">
        <div class="container mx-auto max-w-7xl">
            <div class="backdrop-blur-lg bg-white/20 rounded-2xl shadow-xl border border-white/30 p-8">
                <div class="flex flex-col md:flex-row items-center md:space-x-10 px-4 lg:px-6">
                    <div class="md:w-1/2 text-center md:text-left" data-aos="fade-right" data-aos-duration="1000">
                        <p class="text-lg font-medium text-gray-800">Tentang Kami</p>
                        <h1 class="text-4xl font-semibold text-gray-700 mt-4">{{ $aboutUs->company_name }}</h1>
                        <p class="mt-4 text-gray-600">{{ $aboutUs->company_description }}</p>
                        <a href="{{ route('aboutus') }}" class="inline-block mt-6 px-6 py-3 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition-colors">Tentang Kami</a>
                    </div>
                    <div class="md:w-1/2 mt-8 md:mt-0" data-aos="fade-left" data-aos-duration="1000">
                        @if($aboutUs->image_name)
                            <img src="{{ asset('images/aboutus/' . $aboutUs->image_name) }}" alt="Image" class="rounded-lg shadow-lg w-full max-w-[600px] mx-auto">
                        @else
                            <p>No image available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section id="vision-mission" class="py-16">
        <div class="container mx-auto px-6 ">
            <h2 class="text-3xl font-bold text-center text-gray-800" data-aos="fade-up" data-aos-duration="1000">Visi & Misi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
                @if($visiMisi)
                <!-- Vision -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center" data-aos="fade-right" data-aos-duration="1000">
                    <div class="flex items-center justify-center mb-4">
                        <div class="bg-red-500 text-white rounded-full p-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m9 13l3-3m0 0l-3-3m3 3H9"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Visi</h3>
                    <p class="mt-4 text-gray-600 md:text-left">{{ $visiMisi->visi }}</p>
                </div>

                <!-- Mission -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center" data-aos="fade-left" data-aos-duration="1000">
                    <div class="flex items-center justify-center mb-4">
                        <div class="bg-red-500 text-white rounded-full p-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m-4 4h1a4 4 0 004 4h4a4 4 0 004-4h1m-1-8h1m-1 0a4 4 0 00-4-4H9a4 4 0 00-4 4m1 0h1"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Misi</h3>
                    <p class="mt-4 text-gray-600 md:text-left">{{ $visiMisi->misi }}</p>
                </div>
                @else
                <div class="col-span-2 text-center text-gray-500">
                    Data visi dan misi belum tersedia
                </div>
                @endif
            </div>
        </div>
    </section>


    <!-- Business Units Section -->
    <section id="business-units" class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 text-center" data-aos="fade-up" data-aos-duration="1000">Unit Bisnis Kami</h2>
            <div class="flex flex-wrap justify-center gap-6 mt-10">
                
                @foreach($layoutGroups as $index => $group)
                    @php 
                        $spbu = $group['spbu'];
                        $width = $group['width'];
                        $color = $group['color'];
                        $animationDirection = $index % 4 == 0 ? 'fade-right' : ($index % 4 == 1 ? 'fade-up' : ($index % 4 == 2 ? 'fade-left' : 'fade-up'));
                    @endphp
                    
                    <!-- Card for {{ $spbu->name }} -->
                    <div class="relative bg-white rounded-[25px] overflow-hidden shadow-lg h-[391px] 
                    {{ $width === 'wide' ? 'w-[715px]' : 'w-[505px]' }}" 
                    data-aos="{{ $animationDirection }}" data-aos-duration="1000">
                        <!-- Colored accent -->
                        <div class="absolute top-0 left-0 w-[50%] h-full"
                            :style="{
                                'clip-path': 'polygon(0px 0px, 90px 0px, 195px 431px, 0px 431px)',
                                'background-color': '{{ $color }}',
                                'opacity': '0.7',
                                'z-index': '10',
                                'border-radius': '0px'
                            }">
                        </div>
                                                
                        <!-- Gambar -->
                        <img src="{{ $spbu->thumbnail_image ? asset('images/spbu/' . $spbu->thumbnail_image) : '' }}" alt="SPBU {{ $spbu->name }}" class="absolute inset-0 w-full h-full object-cover">
                        
                        <!-- Overlay konten -->
                        <div class="absolute inset-0 flex flex-col justify-between z-20 p-6">
                            <!-- Logo Pertamina di kiri atas -->
                            <div class="absolute" style="top: 0; left: -1px; transform: translateY(-25px);">
                                <img src="{{ asset('images/pertamina-logo.png') }}" alt="Pertamina Logo" class="h-40">
                            </div>

                            <!-- Teks Judul dan Deskripsi -->
                            <div class="text-white">
                                <h3 class="text-2xl font-bold mt-28">SPBU {{ $spbu->code }}</h3>
                                <p class="mt-6 text-sm leading-relaxed">
                                    SPBU {{ $spbu->code }} {{ $spbu->name }}<br>
                                    @if($spbu->established_year < 2010)
                                        merupakan SPBU pertama yang didirikan oleh Sidorejo<br>
                                        pada tahun {{ $spbu->established_year }} dan sampai saat ini masih beroperasi
                                    @else
                                        merupakan salah satu SPBU kami <br>
                                        yang sudah didirikan pada tahun {{ $spbu->established_year }}
                                    @endif
                                </p>
                            </div>

                            <!-- Tombol -->
                            <div class="mt-6">
                                <a href="{{ route('spbu.show', $spbu->slug) }}" class="inline-block px-6 py-2 bg-white text-[#C8A151] font-medium rounded-full shadow hover:bg-gray-100 border border-[#C8A151]">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section id="partners" class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12" data-aos="fade-up" data-aos-duration="1000">Mitra Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-8 gap-x-4 md:gap-x-6 justify-items-center">
                @foreach($partners as $partner)
                    <!-- Partner Card -->
                    <div class="bg-white rounded-lg shadow-lg text-center w-full max-w-[300px] h-[223px] flex flex-col items-center justify-center p-4 hover:shadow-xl transition-shadow mx-2" 
                        data-aos="fade-right" 
                        data-aos-duration="1000">
                        <img src="{{ asset('images/partner/' . $partner->image) }}" 
                            alt="{{ $partner->name }}" 
                            class="w-32 h-32 object-contain">
                        <h3 class="text-lg font-semibold text-gray-800 mt-4">
                            <a href="{{ $partner->url }}" 
                            class=" hover:text-blue-700 transition-colors"
                            rel="noopener noreferrer">
                                {{ $partner->name }}
                            </a>
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 text-center" data-aos="fade-up" data-aos-duration="1000">
                Berita Kami
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-[20px] mt-10 justify-items-center">
                @forelse($news as $item)
                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg w-[400px] h-[280px]" 
                        data-aos="fade-up" data-aos-duration="1000">
                        
                        <a href="{{ route('news.show', $item->slug) }}" class="block">
                            @if($item->featured_image)
                                <img src="{{ asset('images/news/' . $item->featured_image) }}" 
                                    alt="{{ $item->title }}" 
                                    class="w-full h-[140px] object-cover transition-transform duration-500 hover:scale-110">
                            @else
                                <img src="https://via.placeholder.com/400x140?text=No+Image" 
                                    alt="Placeholder" 
                                    class="w-full h-[140px] object-cover">
                            @endif
                        </a>
                        
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 line-clamp-2">
                                <a href="{{ route('news.show', $item->slug) }}" class="hover:text-blue-600">
                                    {{ $item->title }}
                                </a>
                            </h3>
                            <p class="text-gray-600 mt-2">
                                Artikel | {{ $item->published_at->format('F d, Y') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">
                        Tidak ada berita untuk ditampilkan.
                    </p>
                @endforelse
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('news.index') }}" 
                class="inline-block px-6 py-3 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600"
                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                    Berita Kami
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-[#816C6B] text-white py-12">
    <div class="container mx-auto px-8">
        <div class="flex justify-between gap-x-40">
            <!-- Company Info -->
            <div>
                <div>
                    <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-12 mb-4">
                    <span class="text-xl font-bold text-white">PT. SIDOREJO MAKMUR SEJAHTERA</span>
                </div>
                <p class="text-sm leading-relaxed">
                    PT SIDOREJO MAKMUR SEJAHTERA adalah perusahaan yang bergerak dalam bidang migas dan retail.
                </p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-white hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white hover:text-yellow-400"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-white hover:text-yellow-400"><i class="fab fa-facebook"></i></a>
                </div>
            </div>

            <!-- About Us Section (Ensure it stays in one line) -->
            <div>
                <h3 class="font-semibold text-lg mb-4">About Us</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">Profile</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Visi & Misi</a></li>
                </ul>
            </div>

            <!-- Career Section -->
            <div class="w-full md:w-auto">
                   <h3 class="font-semibold text-lg mb-4">Career</h3>
                   <ul class="space-y-2">
                       @foreach($allSpbus as $footerSpbu)
                           <li>
                               <a href="{{ route('spbu.show', $footerSpbu->slug) }}" 
                                  class="text-gray-300 hover:text-white {{ $spbu->id === $footerSpbu->id ? 'font-bold text-white' : '' }}">
                                  SPBU {{ $footerSpbu->code }} {{ $footerSpbu->name }}
                               </a>
                           </li>
                       @endforeach
                   </ul>
               </div>

            <!-- Contact Section -->
            <div>
                <h3 class="font-semibold text-lg mb-4">Contact</h3>
                <p class="text-sm text-gray-300 leading-relaxed">
                    Jl. Raya Semarang - Demak No. Km. 13, Bandungrjeo, Kec. Mranggen, Kabupaten Demak, Jawa Tengah 59567
                </p>
                <p class="mt-2 text-sm text-gray-300">Phone: +62 8123-2321-1234</p>
                <p class="mt-2 text-sm text-gray-300">Email: spbu4459518@gmail.com</p>
            </div>
        </div>

        <!-- Footer Bottom (Aligned to the Left) -->
        <div class="container">
            <p>&copy; 2025 PT Sidorejo Makmur Sejahtera. All rights reserved.</p>
        </div>
    </div>
</footer>




    <!-- Script AOS dan Typed.js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function toggleDropdown(event) {
            event.preventDefault();
            const container = event.currentTarget.closest('.dropdown-container');
            const dropdown = container.querySelector('.dropdown-menu');
            const arrow = container.querySelector('.dropdown-arrow');
            
            dropdown.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function closeDropdown(e) {
                if (!container.contains(e.target)) {
                    dropdown.classList.add('hidden');
                    arrow.classList.remove('rotate-180');
                    document.removeEventListener('click', closeDropdown);
                }
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi AOS dengan konfigurasi scroll berulang
            AOS.init({
                once: false, // Diubah menjadi false untuk memungkinkan animasi berulang
                duration: 1000,
                mirror: false,
                offset: 120 // Tambahkan offset untuk trigger lebih awal
            });

            // Toggle Mobile Menu
            const menuToggle = document.getElementById("menu-toggle");
            const mobileMenu = document.getElementById("mobile-menu");

            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener("click", function() {
                    mobileMenu.classList.toggle("hidden");
                });
            }

            // Ambil data dari Blade
            const typedLine1 = @json($heroSection->typed_line_1 ?? '');
            const typedLine2 = @json($heroSection->typed_line_2 ?? '');
            
            // Inisialisasi variabel untuk instance Typed
            let typed1 = null;
            let typed2 = null;

            // Fungsi reset animasi
            const resetTypedAnimation = () => {
                const target1 = document.getElementById("typed-line-1");
                const target2 = document.getElementById("typed-line-2");
                
                if (typed1) typed1.destroy();
                if (typed2) typed2.destroy();
                
                target1.textContent = '';
                target2.textContent = '';
            };

            // Fungsi utama untuk animasi
            const initTypedAnimation = () => {
                const target1 = document.getElementById("typed-line-1");
                const target2 = document.getElementById("typed-line-2");

                resetTypedAnimation();

                typed1 = new Typed(target1, {
                    strings: [typedLine1],
                    typeSpeed: 50,
                    backSpeed: 30,
                    loop: false,
                    showCursor: false,
                    onComplete: function() {
                        typed2 = new Typed(target2, {
                            strings: [typedLine2],
                            typeSpeed: 50,
                            backSpeed: 30,
                            loop: false,
                            showCursor: false,
                            startDelay: 300
                        });
                    }
                });
            };

            // Observer untuk mendeteksi ketika hero section masuk viewport
            const heroSection = document.querySelector('section.relative.bg-cover');
            const observerOptions = {
                threshold: 0.5 // Trigger ketika 50% elemen terlihat
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Jalankan animasi ketika masuk viewport
                        if (typedLine1 && typedLine2) {
                            initTypedAnimation();
                        }
                    } else {
                        // Reset animasi ketika keluar viewport
                        resetTypedAnimation();
                    }
                });
            }, observerOptions);

            if (heroSection) {
                observer.observe(heroSection);
            }

            // Fallback jika data tidak ada
            if (!typedLine1 || !typedLine2) {
                console.warn('Data typed lines tidak tersedia di database');
                document.getElementById('typed-line-1').textContent = 'Default Text 1';
                document.getElementById('typed-line-2').textContent = 'Default Text 2';
            }
        });
    </script>
</body>
</html>