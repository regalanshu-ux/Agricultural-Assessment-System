<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AgroGeo | @yield('title', 'Assessment of Land Holding, Irrigation, and Cropping Patterns')</title>

        <!-- Fonts: Plus Jakarta Sans for UI, Playfair Display for Serifs -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                                serif: ['"Playfair Display"', 'serif'],
                            }
                        }
                    }
                }
            </script>
        @endif

        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
            .font-serif-playfair {
                font-family: 'Playfair Display', serif;
            }
            /* Custom grid background */
            .grid-deco {
                background-size: 80px 80px;
                background-image: 
                    linear-gradient(to right, rgba(24, 24, 27, 0.025) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(24, 24, 27, 0.025) 1px, transparent 1px);
            }
        </style>
        @stack('styles')
    </head>
    <body class="bg-[#f8f8f6] text-[#18181b] min-h-screen relative overflow-x-hidden antialiased flex flex-col justify-between">

        <!-- Grid Guideline Deco Lines & Scattered Plus (+) Signs -->
        <div class="absolute inset-0 grid-deco pointer-events-none z-0"></div>
        <div class="absolute inset-0 pointer-events-none z-0 max-w-7xl mx-auto px-6 lg:px-8 flex justify-between">
            <div class="w-px bg-black/5 h-full hidden sm:block"></div>
            <div class="w-px bg-black/5 h-full hidden md:block"></div>
            <div class="w-px bg-black/5 h-full"></div>
            <div class="w-px bg-black/5 h-full hidden md:block"></div>
            <div class="w-px bg-black/5 h-full hidden sm:block"></div>
        </div>

        <!-- Floating Plus (+) Signs exactly placed at design coordinates -->
        <div class="absolute top-[20%] left-[10%] text-black/25 font-light text-xl select-none pointer-events-none z-0 hidden lg:block">+</div>
        <div class="absolute top-[15%] right-[22%] text-black/25 font-light text-xl select-none pointer-events-none z-0 hidden lg:block">+</div>
        <div class="absolute top-[28%] left-[28%] text-black/25 font-light text-sm select-none pointer-events-none z-0 hidden lg:block">+</div>
        <div class="absolute top-[32%] right-[26%] text-black/25 font-light text-xl select-none pointer-events-none z-0 hidden lg:block">+</div>

        <!-- Premium Navbar Header -->
        <header class="w-full max-w-7xl mx-auto px-6 lg:px-8 py-6 relative z-10 shrink-0">
            <nav class="flex items-center justify-between">
                <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <!-- Abstract Dot Cluster Logo matching image -->
                        <div class="flex flex-col gap-1 w-6 h-6 justify-center items-center">
                            <div class="flex gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#18181b]"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-[#18181b]/50"></span>
                            </div>
                            <div class="flex gap-1 items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#18181b]"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-[#18181b]"></span>
                                <span class="w-1.5 h-1.5 rounded-full bg-[#18181b]/20"></span>
                            </div>
                        </div>
                        <span class="font-extrabold text-xl tracking-tight text-[#18181b]">AgroGeo</span>
                    </a>
                </div>

                <!-- Center Pill Menu -->
                <div class="hidden md:flex items-center bg-[#18181b] rounded-full p-1 shadow-md border border-white/5">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-white text-black' : 'text-white/70 hover:text-white' }} px-4 py-1.5 rounded-full text-xs font-semibold tracking-wide transition">Home</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-white text-black' : 'text-white/70 hover:text-white' }} px-4 py-1.5 rounded-full text-xs font-semibold tracking-wide transition">About Us</a>
                    <a href="{{ route('reviews') }}" class="{{ request()->routeIs('reviews') ? 'bg-white text-black' : 'text-white/70 hover:text-white' }} px-4 py-1.5 rounded-full text-xs font-semibold tracking-wide transition">Policy Impact</a>
                    <a href="{{ route('products') }}" class="{{ request()->routeIs('products') ? 'bg-white text-black' : 'text-white/70 hover:text-white' }} px-4 py-1.5 rounded-full text-xs font-semibold tracking-wide transition">Methodology</a>
                    <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'bg-white text-black' : 'text-white/70 hover:text-white' }} px-4 py-1.5 rounded-full text-xs font-semibold tracking-wide transition">Research</a>
                </div>

                <!-- Authentication Actions -->
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ route('assessments.index') }}" class="text-xs font-bold uppercase tracking-wider text-[#18181b] hover:opacity-80 transition">Dashboard</a>
                        <a href="{{ route('assessments.index') }}" class="px-5 py-2.5 bg-[#18181b] hover:bg-black text-white rounded-full text-xs font-bold uppercase tracking-wider shadow transition">Go to Panel</a>
                    @else
                        <a href="{{ route('login') }}" class="text-xs font-bold uppercase tracking-wider text-[#18181b]/70 hover:text-[#18181b] transition">Sign In</a>
                        <a href="{{ route('register') }}" class="px-5 py-2.5 bg-transparent hover:bg-[#18181b] text-[#18181b] hover:text-white border border-[#18181b] rounded-full text-xs font-bold uppercase tracking-wider transition duration-300">Sign up Free</a>
                    @endauth
                </div>
            </nav>
        </header>

        <!-- Main Content Area -->
        <main class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-8 py-8 flex-grow">
            @yield('content')
        </main>

        <!-- Elegant Footer Border decoration -->
        <footer class="w-full border-t border-[#e4e4e7] py-6 text-center text-xs text-black/45 relative z-10 bg-white shrink-0 mt-auto">
            <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                <span class="font-medium">© 2026 AgroGeo Project. All rights reserved.</span>
                <div class="flex gap-6">
                    <a href="#privacy" class="hover:underline transition">Privacy Policy</a>
                    <a href="#terms" class="hover:underline transition">Terms of Service</a>
                </div>
            </div>
        </footer>

        @stack('scripts')
    </body>
</html>
