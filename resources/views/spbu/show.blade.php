{{-- resources/views/spbu/show.blade.php --}}
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $spbu->name }} - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <style>
        /* Apply the background to the entire page */
        body {
            /* background-image: url("{{ asset('images/Desain tanpa judul.svg') }}");  */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            backdrop-filter: blur(8px); /* Efek blur langsung pada body */
            -webkit-backdrop-filter: blur(8px); /* Untuk kompatibilitas dengan Safari */
        }
        .team-section {
            text-align: center;
            margin: 50px 0;
        }

        .team-section h2 {
            font-size: 2em;
            margin-bottom: 30px;
        }

        .team-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .team-member {
            position: relative;
            width: 500px; /* Ukuran card */
            margin: 0 20px;
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 16px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .team-member:hover {
            transform: scale(1.05); /* Efek zoom-in saat hover */
        }

        .team-member img {
            width: 14rem; /* Ukuran gambar lebih kecil (16rem atau 256px) */
            height: 14rem; /* Ukuran gambar lebih kecil (16rem atau 256px) */
            border-radius:0;
            object-fit: cover;
            margin-bottom: 20px;
            position: absolute;
            top: -4rem; /* Membuat gambar keluar lebih sedikit */
            left: 50%;
            transform: translateX(-50%);
        }

        .team-member-info {
            margin-top: 12rem; /* Mengurangi jarak antara gambar dan teks */
        }

        .team-member-info h3 {
            font-size: 1.2em;
            margin: 5px 0;
            font-weight: bold;
        }

        .team-member-info p {
            font-size: 1em;
            color: gray;
        }

         .services-section {
            text-align: center;
            margin: 50px 0;
        }

        .services-section h2 {
            font-size: 2em;
            margin-bottom: 30px;
        }

        .service-card {
            background-color: white;
            padding: 16px;
            border-radius: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%; /* Make the card responsive */
            max-width: 570px; /* Set a maximum width */
            margin: 0 auto;
        }

        .service-card:hover {
            transform: scale(1.05); /* Card zoom effect on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
        }

        .service-img {
            width: 18rem; /* Resize image to fit inside the card */
            height: 18rem;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            position: absolute;
            top: -4rem; /* Make the image stand out */
            left: 50%;
            transform: translateX(-50%);
        }

        .service-card h3 {
            margin-top: 20px;
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
        }

        .service-card p {
            font-size: 1em;
            color: gray;
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
                <span class="text-xl font-bold text-black">PT. SIDOREJO MAKMUR SEJAHTERA</span>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center gap-x-6">
                <!-- Dropdown menu Our Business -->
                <div class="relative" x-data="{ open: false }">
                    <a href="#" @click.prevent="open = !open" class="text-black hover:text-blue-500 flex items-center">
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
                <a href="{{ route('aboutus') }}" class="text-black hover:text-blue-500">About Us</a>
                <a href="{{ route('career') }}" class="text-black hover:text-blue-500">Career</a>
                <a href="{{ route('news.index') }}" class="text-black hover:text-blue-500">News</a>
                <a href="{{ route('contact') }}" class="text-black hover:text-blue-500">Contact</a>
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
            <a href="{{ route('aboutus') }}" class="block text-black hover:text-blue-500">About Us</a>
            <a href="{{ route('career') }}" class="block text-black hover:text-blue-500">Career</a>
            <a href="{{ route('news.index') }}" class="block text-black hover:text-blue-500">News</a>
            <a href="{{ route('contact') }}" class="block text-black hover:text-blue-500">Contact</a>
        </nav>
    </header>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-screen text-white" style="background-image: url('{{ $spbu->hero_image ? asset('images/spbu/' . $spbu->hero_image) : asset('images/background-image.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto relative z-10 flex flex-col justify-center items-center h-full text-center px-4">
            <h1 class="text-4xl md:text-6xl font-bold">
                <span>SPBU {{ $spbu->code }} {{ strtoupper($spbu->name) }}</span>
            </h1>
            <p class="mt-4 text-lg md:text-xl" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                Energi untuk Hari Ini dan Masa Depan dengan Layanan Terpercaya yang Siap Memenuhi Kebutuhan Anda
            </p>
        </div>
    </section>

   <!-- About Section -->
   <section id="about" class="py-16">
       <div class="container mx-auto flex flex-col md:flex-row items-center md:space-x-10 px-6">
           <div class="md:w-1/2 text-center md:text-left" data-aos="fade-right" data-aos-duration="1000">
               <p class="text-lg font-medium text-gray-800">Tentang Kami</p>
               <h1 class="text-4xl font-semibold text-gray-700 mt-4">SPBU {{ $spbu->code }} {{ $spbu->name }}</h1>
               <p class="mt-4 text-gray-600">{{ $spbu->description }}</p>
           </div>
           <div style="width: 600px; margin-top: 2rem;" data-aos="fade-left" data-aos-duration="1000">
               <img src="{{ $spbu->thumbnail_image ? asset('images/spbu/' . $spbu->thumbnail_image) : asset('images/station-image1.jpg') }}" alt="Gas Station" class="rounded-lg shadow-lg">
           </div>
       </div>
   </section>

   @if(count($teams) > 0)
   <section class="team-section py-12 bg-cover bg-center" data-aos="fade-up" data-aos-duration="1500">
       <h2 class="text-3xl font-semibold mb-8 text-black">Tim Kami</h2>
       <div class="team-container flex justify-center gap-12 flex-wrap">
           @foreach($teams as $team)
           <div class="team-member bg-white p-8 rounded-2xl shadow-xl text-center w-90 transform transition duration-300 hover:scale-105 relative">
               <img src="{{ asset('images/team/' . $team->photo) }}" alt="{{ $team->name }}" class="mx-auto mb-4 object-cover w-56 h-56 rounded-lg block">
               <div class="team-member-info mt-36">
                   <h3 class="text-xl font-semibold text-gray-800">{{ $team->name }}</h3>
                   <p class="text-gray-500">{{ $team->position }}</p>
               </div>
           </div>
           @endforeach
       </div>
   </section>
   @endif

   @if(count($facilities) > 0)
    <section class="services-section py-12 bg-cover bg-center" data-aos="fade-up" data-aos-duration="1500">
        <h2 class="text-3xl font-semibold mb-8 text-black text-center">Fasilitas & Layanan Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($facilities as $facility)
            <div class="service-card text-center transform transition duration-300 hover:scale-105 hover:shadow-lg p-4 bg-white rounded-lg">
                <div class="mb-3 overflow-hidden rounded-lg aspect-[4/3] relative">
                    <img src="{{ asset('images/fasilitas/' . $facility->image) }}" alt="{{ $facility->name }}" class="w-full h-full object-cover absolute inset-0">
                </div>
                <h3 class="text-lg font-semibold text-gray-800">{{ $facility->name }}</h3>
                @if($facility->description)
                <p class="text-gray-600 px-4 mt-2">{{ $facility->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </section>
   @endif

   <section class="google-map-section py-12">
       <h2 class="text-3xl font-semibold mb-8 text-black text-center">Lokasi Kami</h2>
       <div class="container mx-auto px-4">
           <div class="google-map-embed">
               <!-- Embed Google Maps -->
               <iframe 
                   src="{{ $spbu->google_maps_embed }}" 
                   width="100%" 
                   height="450" 
                   style="border:0; border-radius: 8px;" 
                   allowfullscreen="" 
                   loading="lazy" 
                   referrerpolicy="no-referrer-when-downgrade">
               </iframe>
           </div>
       </div>
   </section>

   <footer class="bg-[#816C6B] text-white py-12">
       <div class="container mx-auto px-8">
           <div class="flex flex-wrap justify-between gap-x-4 gap-y-8">
               <!-- Company Info -->
               <div class="w-full md:w-auto">
                   <div>
                       <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-12 mb-4">
                       <span class="text-xl font-bold text-white">PT. SIDOREJO MAKMUR SEJAHTERA</span>
                   </div>
                   <p class="text-sm leading-relaxed mt-4">
                       PT SIDOREJO MAKMUR SEJAHTERA adalah perusahaan yang bergerak dalam bidang migas dan retail.
                   </p>
                   <div class="flex space-x-4 mt-4">
                       <a href="#" class="text-white hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
                       <a href="#" class="text-white hover:text-yellow-400"><i class="fab fa-linkedin"></i></a>
                       <a href="#" class="text-white hover:text-yellow-400"><i class="fab fa-facebook"></i></a>
                   </div>
               </div>

               <!-- About Us Section -->
               <div class="w-full md:w-auto">
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
               <div class="w-full md:w-auto">
                   <h3 class="font-semibold text-lg mb-4">Contact</h3>
                   <p class="text-sm text-gray-300 leading-relaxed">
                       {{ $spbu->address }}, {{ $spbu->city }}, {{ $spbu->province }}, {{ $spbu->postal_code }}
                   </p>
                   <p class="mt-2 text-sm text-gray-300">Phone: {{ $spbu->phone }}</p>
                   <p class="mt-2 text-sm text-gray-300">Email: {{ $spbu->email }}</p>
               </div>
           </div>

           <!-- Footer Bottom (Aligned to the Left) -->
           <div class="container mt-8">
               <p>&copy; {{ date('Y') }} PT Sidorejo Makmur Sejahtera. All rights reserved.</p>
           </div>
       </div>
   </footer>

   <!-- Script AOS dan Typed.js -->
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
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
       document.addEventListener("DOMContentLoaded", function () {
           // Toggle Mobile Menu
           const menuToggle = document.getElementById("menu-toggle");
           const mobileMenu = document.getElementById("mobile-menu");

           if (menuToggle && mobileMenu) {
               menuToggle.addEventListener("click", function () {
                   mobileMenu.classList.toggle("hidden");
               });
           }

           // Inisialisasi Typed.js untuk teks hero
           if (document.getElementById("typed-line-1") && document.getElementById("typed-line-2")) {
               new Typed("#typed-line-1", {
                   strings: ["Pelayanan Prima Untuk"],
                   typeSpeed: 50,
                   backSpeed: 30,
                   showCursor: false,
                   onComplete: function () {
                       new Typed("#typed-line-2", {
                           strings: ["Kenyamanan Anda"],
                           typeSpeed: 50,
                           backSpeed: 30,
                           showCursor: false,
                           onComplete: function () {
                               // Setelah Typed.js selesai, baru jalankan AOS
                               setTimeout(() => {
                                   AOS.init();
                               }, 500);
                           }
                       });
                   }
               });
           } else {
               // Jika Typed.js tidak ada, langsung inisialisasi AOS
               AOS.init();
           }
       });
   </script>
</body>
</html>