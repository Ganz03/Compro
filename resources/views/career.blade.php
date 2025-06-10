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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <style>
        .rotate-180 {
            transform: rotate(180deg);
        }

            .prose p {
        margin-bottom: 1rem;
        line-height: 1.7;
    }
    
    .prose strong {
        color: #374151;
        font-weight: 600;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        .text-4xl {
            font-size: 2rem;
        }
        
        .p-8 {
            padding: 1.5rem;
        }
        
        .p-6 {
            padding: 1rem;
        }
    }
            .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .mobile-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Mobile Menu Slide */
        .mobile-menu-slide {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background-color: white;
            z-index: 9999;
            transition: right 0.3s ease;
            overflow-y: auto;
            padding: 20px 0;
        }

        .mobile-menu-slide.active {
            right: 0;
        }

        /* Close button */
        .close-menu-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }

        /* Menu items styling */
        .mobile-menu-item {
            display: block;
            padding: 15px 25px;
            color: #333;
            text-decoration: none;
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s ease;
        }

        .mobile-menu-item:hover {
            background-color: #f8f9fa;
            color: #007bff;
            text-decoration: none;
        }

        /* Dropdown styling for mobile */
        .mobile-dropdown {
            background-color: #f8f9fa;
        }

        .mobile-dropdown-item {
            display: block;
            padding: 12px 40px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
            border-bottom: 1px solid #e9ecef;
        }

        .mobile-dropdown-item:hover {
            background-color: #e9ecef;
            color: #007bff;
            text-decoration: none;
        }

        /* Arrow rotation */
        .dropdown-arrow {
            transition: transform 0.2s ease;
        }

        .dropdown-arrow.rotate {
            transform: rotate(180deg);
        }
    
    /* Animation for cards */
    .bg-white {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .bg-white:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    </style>
</head>
<body class="font-sans antialiased bg-transparent">
    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>

    <!-- Mobile Menu Slide -->
    <div class="mobile-menu-slide" id="mobile-menu-slide">
        <button class="close-menu-btn" id="close-menu-btn">
            <i class="fas fa-times"></i>
        </button>
        
        <div style="margin-top: 60px;">
            <!-- Our Business Dropdown -->
            <div>
                <a href="#" class="mobile-menu-item flex justify-between items-center" id="mobile-business-toggle">
                    Our Business
                    <i class="fas fa-chevron-down dropdown-arrow" id="mobile-business-arrow"></i>
                </a>
                <div class="mobile-dropdown hidden" id="mobile-business-dropdown">
                    @foreach($navigationSpbus as $navSpbu)
                        <a href="{{ route('spbu.show', $navSpbu->slug) }}" class="mobile-dropdown-item">
                            SPBU {{ $navSpbu->code }} {{ strtoupper($navSpbu->name) }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Other Menu Items -->
            <a href="{{ route('aboutus') }}" class="mobile-menu-item">About Us</a>
            <a href="{{ route('career') }}" class="mobile-menu-item">Career</a>
            <a href="{{ route('news.index') }}" class="mobile-menu-item">News</a>
            <a href="{{ route('contact') }}" class="mobile-menu-item">Contact</a>
        </div>
    </div>

    <!-- Header - Kembali ke versi original -->
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
                            <a href="{{ route('spbu.show', $navSpbu->slug) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-black">
                                SPBU {{ $navSpbu->code }} {{ strtoupper($navSpbu->name) }}
                            </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Other navigation items -->
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
    </header>

    <main class="flex-grow">
        <!-- Career Section -->
        <section id="career" class="py-28 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-6">
        <!-- Section Title -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Career Opportunities</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Bergabunglah dengan tim profesional kami dan kembangkan karir Anda bersama PT. Sidorejo Makmur Sejahtera
            </p>
        </div>

        @if($career && $career->description)
            <!-- Job Listings Container -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
                    
                    <!-- Header Card -->
                    <div class="bg-gradient-to-r from-red-600 to-red-700 text-white p-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h2zm4-3a1 1 0 00-1 1v1h2V4a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold">Lowongan Kerja Tersedia</h2>
                                <p class="text-red-100">Mari bergabung dengan keluarga besar kami</p>
                            </div>
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="p-8">
                        <div class="prose prose-lg max-w-none">
                            <div class="text-gray-700 leading-relaxed space-y-6">
                                {!! nl2br(e($career->description)) !!}
                            </div>
                        </div>

                        <!-- Application Instructions -->
                        <div class="mt-8 p-6 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-blue-800 mb-2">Cara Melamar</h3>
                                    <p class="text-blue-700">
                                        Silakan kirimkan CV, surat lamaran, dan fotokopi KTP ke email: 
                                        <a href="sidorejomakmursejahtera@gmail.com" 
                                           class="font-semibold underline hover:text-blue-900">
                                            sidorejomakmursejahtera@gmail.com
                                        </a>
                                    </p>
                                    <p class="text-blue-600 text-sm mt-2">
                                        <strong>Subjek:</strong> Lamaran_Posisi_Nama Lengkap
                                        <br>
                                        <strong>Contoh:</strong> Lamaran_OperatorSPBU_AhmadYusuf
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <!-- Empty State -->
            <div class="max-w-2xl mx-auto text-center">
                <div class="bg-white rounded-lg shadow-lg p-12 border border-gray-200">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6"></path>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Belum Ada Lowongan</h3>
                    <p class="text-gray-600 mb-6">
                        Maaf, untuk saat ini tidak ada lowongan kerja yang tersedia. 
                        Silakan cek kembali secara berkala untuk update terbaru.
                    </p>
                    
                    <div class="space-y-3">
                        <p class="text-sm text-gray-500">
                            Atau Anda dapat mengirimkan CV Anda untuk pertimbangan di masa mendatang:
                        </p>
                        <a href="mailto:sidorejomakmursejahtera@gmail.com" 
                           class="inline-flex items-center px-6 py-2 bg-gray-600 text-white font-medium rounded-lg hover:bg-gray-700 transition-colors duration-300">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                            Kirim CV
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
    </main>

    <!-- Footer -->
       <footer class="bg-[#816C6B] text-white py-8 md:py-12">
        <div class="container mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 lg:col-span-1">
                    <div class="flex flex-col items-start">
                        <div class="flex items-center space-x-3 mb-4">
                            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-10 md:h-12 w-auto">
                            <span class="text-lg md:text-xl font-bold text-white">PT. SIDOREJO MAKMUR SEJAHTERA</span>
                        </div>
                        <p class="text-sm leading-relaxed text-gray-300 mb-4">
                            PT SIDOREJO MAKMUR SEJAHTERA adalah perusahaan yang bergerak dalam bidang migas dan retail.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white hover:text-yellow-400 transition-colors"><i class="fab fa-instagram text-xl"></i></a>
                            <a href="#" class="text-white hover:text-yellow-400 transition-colors"><i class="fab fa-linkedin text-xl"></i></a>
                            <a href="#" class="text-white hover:text-yellow-400 transition-colors"><i class="fab fa-facebook text-xl"></i></a>
                        </div>
                    </div>
                </div>

                <!-- About Us Section -->
                <div class="col-span-1">
                    <h3 class="font-semibold text-lg mb-4">About Us</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('aboutus') }}" class="text-gray-300 hover:text-white transition-colors">Profile</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Visi & Misi</a></li>
                    </ul>
                </div>

                <!-- Business Section -->
                <div class="col-span-1">
                    <h3 class="font-semibold text-lg mb-4">Our Business</h3>
                    <ul class="space-y-2">
                        @foreach($allSpbus as $footerSpbu)
                            <li>
                                <a href="{{ route('spbu.show', $footerSpbu->slug) }}" 
                                class="text-gray-300 hover:text-white transition-colors {{ 
                                    request()->route('slug') === $footerSpbu->slug ? 'text-white font-bold' : '' 
                                }}">
                                    SPBU {{ $footerSpbu->code }} {{ $footerSpbu->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact Section -->
                <div class="col-span-1">
                    <h3 class="font-semibold text-lg mb-4">Contact</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-map-marker-alt text-yellow-400 mt-1 flex-shrink-0"></i>
                            <p class="text-sm text-gray-300 leading-relaxed">
                                Jl. Raya Semarang - Demak No. Km. 13, Bandungrjeo, Kec. Mranggen, Kabupaten Demak, Jawa Tengah 59567
                            </p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-phone text-yellow-400 flex-shrink-0"></i>
                            <p class="text-sm text-gray-300">+62 8123-2321-1234</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-envelope text-yellow-400 flex-shrink-0"></i>
                            <p class="text-sm text-gray-300">spbu4459518@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-600 mt-8 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-300 mb-4 md:mb-0">&copy; 2025 PT Sidorejo Makmur Sejahtera. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script AOS dan Typed.js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuToggle = document.getElementById("menu-toggle");
            const mobileMenuSlide = document.getElementById("mobile-menu-slide");
            const mobileMenuOverlay = document.getElementById("mobile-menu-overlay");
            const closeMenuBtn = document.getElementById("close-menu-btn");
            const businessToggle = document.getElementById("mobile-business-toggle");
            const businessDropdown = document.getElementById("mobile-business-dropdown");
            const businessArrow = document.getElementById("mobile-business-arrow");

            // Open mobile menu
            menuToggle.addEventListener("click", function () {
                mobileMenuSlide.classList.add("active");
                mobileMenuOverlay.classList.add("active");
                document.body.style.overflow = "hidden"; // Prevent scrolling
            });

            // Close mobile menu function
            function closeMobileMenu() {
                mobileMenuSlide.classList.remove("active");
                mobileMenuOverlay.classList.remove("active");
                document.body.style.overflow = "auto"; // Restore scrolling
                
                // Reset dropdown
                businessDropdown.classList.add("hidden");
                businessArrow.classList.remove("rotate");
            }

            // Close menu when clicking close button
            closeMenuBtn.addEventListener("click", closeMobileMenu);

            // Close menu when clicking overlay
            mobileMenuOverlay.addEventListener("click", closeMobileMenu);

            // Toggle business dropdown in mobile menu
            businessToggle.addEventListener("click", function(e) {
                e.preventDefault();
                businessDropdown.classList.toggle("hidden");
                businessArrow.classList.toggle("rotate");
            });

            // Close menu when clicking on menu items (except dropdown toggle)
            const menuItems = document.querySelectorAll('.mobile-menu-item:not(#mobile-business-toggle), .mobile-dropdown-item');
            menuItems.forEach(item => {
                item.addEventListener('click', closeMobileMenu);
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
