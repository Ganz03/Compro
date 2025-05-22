<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="font-sans antialiased flex flex-col min-h-screen">

    <!-- Header -->
    <header class="absolute w-full z-50">
        <div class="container mx-auto flex items-center justify-between py-4 px-16">
            <!-- Logo dan Nama Perusahaan -->
            <div class="flex items-center space-x-4">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-10">
                </a>
                <span class="text-xl font-bold text-black flex-grow">PT. SIDOREJO MAKMUR SEJAHTERA</span>
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
        <nav id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-white shadow-lg flex flex-col space-y-2 p-4">
            <a href="#" class="block text-black hover:text-blue-300">Our Business</a>
            <a href="{{ route('aboutus') }}" class="block text-black hover:text-blue-300">About Us</a>
            <a href="{{ route('career') }}" class="block text-black hover:text-blue-300">Career</a>
            <a href="{{ route('news.index') }}" class="block text-black hover:text-blue-300">News</a>
            <a href="{{ route('contact') }}" class="block text-black hover:text-blue-300">Contact</a>
        </nav>
    </header>

    <main class="flex-grow">
        <!-- Career Section -->
        <section id="career" class="py-16 text-center">
            <div class="container mx-auto px-6">
                <h1 class="text-4xl font-semibold text-gray-700 mb-6">Career</h1>
                
                @if($career)
                    <h2 class="text-lg text-gray-700 mb-6">{{ $career->description }}</h2>
                @else
                    <h2 class="text-lg text-gray-700 mb-6">Maaf, untuk saat ini tidak ada lowongan kerja.</h2>
                @endif
            </div>
        </section>
    </main>

    <!-- Footer -->
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
                    <div>
                        <h3 class="font-semibold text-lg mb-4">Career</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white">SPBU 44.581.24 Kaliceret</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">SPBU 44.595.13 Karanganyar</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">SPBU 44.595.18 Bandungrjeo</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">SPBU 44.507.19 Bringin</a></li>
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

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuToggle = document.getElementById("menu-toggle");
            const mobileMenu = document.getElementById("mobile-menu");
            menuToggle.addEventListener("click", function () {
                mobileMenu.classList.toggle("hidden");
            });
        });
    </script>
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

</body>
</html>
