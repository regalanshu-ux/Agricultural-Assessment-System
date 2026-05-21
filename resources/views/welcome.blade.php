@extends('layouts.marketing')

@section('title', 'National Agricultural Assessment Portal')

@section('content')
<div class="text-center pt-8">
    <!-- Bullet Badge -->
    <div class="inline-flex items-center gap-1.5 bg-[#e4e4e1] text-[#18181b]/80 px-4 py-1.5 rounded-full text-[10px] font-extrabold tracking-widest uppercase border border-black/5 mb-8 shadow-sm">
        <span class="w-1.5 h-1.5 rounded-full bg-[#18181b] animate-pulse"></span>
        National Research Initiative
    </div>

    <!-- Main Premium Heading -->
    <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-extrabold tracking-tight text-[#18181b] max-w-5xl mx-auto leading-[0.98]">
        Mapping Land, Water,<br>and Cropping Patterns.
    </h1>

    <!-- Subtitle -->
    <p class="mt-6 text-sm md:text-base text-black/50 max-w-2xl mx-auto leading-relaxed font-medium">
        An empirical, multi-regional assessment of land holdings, irrigation systems, seasonal cropping patterns, and well depths to empower policy-making and optimal resource planning across the country.
    </p>

    <!-- Action Button CTA -->
    <div class="mt-8">
        @auth
            <a href="{{ route('assessments.index') }}" class="inline-flex items-center gap-2 bg-[#18181b] hover:bg-black text-white px-7 py-3 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-0.5">
                Open AgroGeo Dashboard
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path></svg>
            </a>
        @else
            <a href="{{ route('register') }}" class="inline-flex items-center gap-2 bg-[#18181b] hover:bg-black text-white px-7 py-3 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-0.5">
                Get Started
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path></svg>
            </a>
        @endauth
    </div>

    <!-- 4. Hero Landscape Image Showcase -->
    <div class="mt-16 w-full relative group">
        <div class="relative w-full aspect-[21/10] overflow-hidden rounded-[2rem] shadow-2xl border border-white/20">
            <!-- Clean generated landscape image -->
            <img src="/images/agriculture_landscape.png" alt="AgroGeo Agriculture Fields" class="w-full h-full object-cover transform scale-100 group-hover:scale-102 transition duration-[3s]">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>

            <!-- Overlay Left Text: Serif Font matching image perfectly -->
            <div class="absolute bottom-6 left-6 md:bottom-12 md:left-12 text-left z-10">
                <h2 class="text-white text-3xl md:text-5xl lg:text-6xl font-serif-playfair leading-tight drop-shadow-md">
                    Pioneering Regional<br>Agricultural Intelligence.
                </h2>
            </div>

            <!-- Overlay Right Link: Underlined tracking link -->
            <div class="absolute bottom-6 right-6 md:bottom-12 md:right-12 text-right z-10">
                <a href="{{ route('products') }}" class="text-white text-xs md:text-sm font-bold uppercase tracking-wider underline decoration-2 underline-offset-4 hover:text-[#dcfce7] transition drop-shadow-md">
                    Explore Research Methodology
                </a>
            </div>
        </div>
    </div>

    <!-- 5. Horizontal Stats Section -->
    <div class="mt-12 bg-white rounded-3xl border border-[#e4e4e7] p-8 md:p-12 shadow-sm grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-4 relative z-10 text-center">
        <div class="md:border-r border-[#e4e4e7] last:border-0 px-2">
            <span class="block text-4xl md:text-5xl font-black text-[#18181b] tracking-tight">15+</span>
            <span class="block text-[10px] text-black/55 font-bold uppercase tracking-widest mt-3">Regions Assessed</span>
        </div>
        <div class="md:border-r border-[#e4e4e7] last:border-0 px-2">
            <span class="block text-4xl md:text-5xl font-black text-[#18181b] tracking-tight">14,500+</span>
            <span class="block text-[10px] text-black/55 font-bold uppercase tracking-widest mt-3">Farms Surveyed</span>
        </div>
        <div class="md:border-r border-[#e4e4e7] last:border-0 px-2">
            <span class="block text-4xl md:text-5xl font-black text-[#18181b] tracking-tight">12,400+</span>
            <span class="block text-[10px] text-black/55 font-bold uppercase tracking-widest mt-3">Wells Mapped</span>
        </div>
        <div>
            <span class="block text-4xl md:text-5xl font-black text-[#18181b] tracking-tight">4.8 ha</span>
            <span class="block text-[10px] text-black/55 font-bold uppercase tracking-widest mt-3">Avg Holding Size</span>
        </div>
    </div>

    <!-- 6. Asymmetric Modern Bottom Content Section -->
    <div class="mt-20 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 text-left items-start relative z-10 pb-16">
        <!-- Left Details / Year & Tags -->
        <div class="lg:col-span-4 flex flex-col justify-between h-full min-h-[140px]">
            <div class="text-[#18181b]/35 font-extrabold text-lg tracking-wider">2026</div>
            <div class="flex flex-wrap gap-x-6 gap-y-2 mt-8 lg:mt-0">
                <span class="text-[#18181b]/70 hover:text-[#18181b] transition font-bold text-xs uppercase tracking-wider border-b border-black/10 pb-1 cursor-pointer">Land Holding</span>
                <span class="text-[#18181b]/70 hover:text-[#18181b] transition font-bold text-xs uppercase tracking-wider border-b border-black/10 pb-1 cursor-pointer">Irrigation Sources</span>
                <span class="text-[#18181b]/70 hover:text-[#18181b] transition font-bold text-xs uppercase tracking-wider border-b border-black/10 pb-1 cursor-pointer">Cropping Patterns</span>
                <span class="text-[#18181b]/70 hover:text-[#18181b] transition font-bold text-xs uppercase tracking-wider border-b border-black/10 pb-1 cursor-pointer">Aquifer Depths</span>
            </div>
        </div>

        <!-- Right Core Heading Statement -->
        <div class="lg:col-span-8">
            <h3 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#18181b] leading-[1.1] tracking-tight">
                A critical shortage of integrated regional data limits effective irrigation planning and sustainable land distribution policies.
            </h3>
        </div>
    </div>
</div>
@endsection
