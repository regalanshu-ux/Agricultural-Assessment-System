<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroGeo Assessment | @yield('title')</title>
    
    <!-- Google Fonts: Plus Jakarta Sans for UI, Playfair Display for Serifs -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('styles')
</head>
<body style="position: relative; overflow-x: hidden;">
    <!-- Grid Guidelines & Scattered Plus Signs matching homepage -->
    <div class="grid-lines-wrapper">
        <div class="grid-line"></div>
        <div class="grid-line hidden-sm"></div>
        <div class="grid-line hidden-md"></div>
        <div class="grid-line"></div>
        <div class="grid-line hidden-md"></div>
        <div class="grid-line hidden-sm"></div>
        <div class="grid-line"></div>
    </div>
    
    <div class="floating-plus" style="top: 15%; left: 8%;">+</div>
    <div class="floating-plus" style="top: 25%; right: 12%;">+</div>
    <div class="floating-plus" style="top: 45%; left: 18%;">+</div>
    <div class="floating-plus" style="top: 70%; right: 20%;">+</div>

    <header>
        <nav style="position: relative; z-index: 10;">
            <a href="{{ route('home') }}" class="brand">
                <div class="brand-logo" style="display: flex; flex-direction: column; gap: 3px; width: 24px; height: 24px; justify-content: center; align-items: center; margin-right: 0.25rem;">
                    <div style="display: flex; gap: 3px;">
                        <span style="width: 6px; height: 6px; border-radius: 50%; background-color: #18181b;"></span>
                        <span style="width: 6px; height: 6px; border-radius: 50%; background-color: rgba(24, 24, 27, 0.5);"></span>
                    </div>
                    <div style="display: flex; gap: 3px; align-items: center;">
                        <span style="width: 6px; height: 6px; border-radius: 50%; background-color: #18181b;"></span>
                        <span style="width: 6px; height: 6px; border-radius: 50%; background-color: #18181b;"></span>
                        <span style="width: 6px; height: 6px; border-radius: 50%; background-color: rgba(24, 24, 27, 0.2);"></span>
                    </div>
                </div>
                <span style="font-weight: 800; font-size: 1.25rem; tracking-tight: -0.025em; font-family: 'Plus Jakarta Sans', sans-serif;">AgroGeo</span>
            </a>
            <div class="nav-links" style="display: flex; align-items: center; gap: 1rem; position: relative; z-index: 10;">
                @auth
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('assessments.index') }}" class="{{ request()->routeIs('assessments.index') || request()->routeIs('assessments.show') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('assessments.create') }}" class="{{ request()->routeIs('assessments.create') ? 'active' : '' }}">New Assessment</a>
                    <div class="nav-divider" style="width: 1px; height: 24px; background-color: var(--border-color); margin: 0 0.25rem;"></div>
                    <span class="user-name-display" style="font-weight: 600; color: var(--text-main); font-size: 0.85rem; margin-right: 0.25rem;">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn" style="background: none; border: 1px solid var(--border-color); color: var(--text-main); font-weight: 600; cursor: pointer; padding: 0.4rem 1rem; font-family: inherit; font-size: 0.85rem; border-radius: 9999px; transition: var(--transition);">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary" style="padding: 0.5rem 1.25rem;">Register</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="container">
        @if(session('success'))
            <div class="alert alert-success">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
