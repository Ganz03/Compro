    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name') }}</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            /* Flexbox layout for full page */
            html, body {
                height: 100%;
                margin: 0;
            }

            body {
                display: flex;
                flex-direction: column;
                padding-top: 100px; /* space for fixed navbar */
            }

            /* Header/Navbar Fixed */
            header {
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 1000; /* pastikan navbar di atas elemen lain */
                background: white; /* beri background sesuai kebutuhan */
                box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* optional: tambahkan bayangan */
            }

            main {
                flex-grow: 1;
                margin-top: 20px;
                padding-bottom: 50px; /* Tambahkan ini */
            }

            /* Tambahkan margin-top di footer */
            footer {
                background-color: #816C6B;
                color: white;
                padding: 12px 0;
                margin-top: auto;
                margin-top: 40px; /* Tambahkan ini */
            }

            /* Mobile Menu Overlay */
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
        </style>
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
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

        <!-- Header -->
        <header class="w-full py-4 px-4 md:px-16 fixed top-0 left-0 right-0 z-50">
            <div class="container mx-auto flex items-center justify-between">
                <!-- Logo dan Nama Perusahaan -->
                <div class="flex items-center space-x-2 md: flex-1 min-w-0">
                    <a href="{{ url('/') }}" class="flex-shrink-0">
                        <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="h-8 md:h-10 w-auto">
                    </a>
                    <span class="text-sm md:text-xl font-bold text-black truncate">PT.SIDOREJO MAKMUR SEJAHTERA</span>
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
        </header>

        <!-- Main Content -->
        @yield('content')

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

        
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        @stack('scripts')
    </body>
    </html>