@extends('layouts.marketing')

@section('title', 'Methodology | Four Core Assessment Pillars')

@section('content')
<div class="pt-8 pb-16">
    <!-- Header Badge -->
    <div class="text-center">
        <div class="inline-flex items-center gap-1.5 bg-[#e4e4e1] text-[#18181b]/80 px-4 py-1.5 rounded-full text-[10px] font-extrabold tracking-widest uppercase border border-black/5 mb-8 shadow-sm">
            Research Methodology
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-[#18181b] leading-tight">
            Scientific Framework for<br>Regional Field Mapping.
        </h1>
        <p class="mt-6 text-sm md:text-base text-black/55 max-w-2xl mx-auto leading-relaxed">
            Our methodology integrates multi-level field surveys, GPS spatial telemetry, and aquifer profiling to assess agricultural sustainability at a granular scale.
        </p>
    </div>

    <!-- Product Showcase -->
    <div class="mt-16 bg-white rounded-3xl border border-[#e4e4e7] p-8 md:p-12 shadow-sm relative overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            <!-- Left Content Column -->
            <div class="lg:col-span-7 flex flex-col gap-6">
                <!-- Product Badge -->
                <div>
                    <span class="inline-flex bg-[#e2f1e6] text-[#0f5132] px-3.5 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase border border-[#badbcc]">
                        Core Research Framework
                    </span>
                </div>
                
                <h2 class="text-3xl font-extrabold text-[#18181b] tracking-tight">
                    Unified Assessment Model
                </h2>
                
                <p class="text-sm text-black/60 leading-relaxed">
                    The AgroGeo methodology consists of a multidimensional assessment framework designed to map every layer of the regional agricultural economy, providing an open-access platform for planning agencies.
                </p>

                <!-- Features list -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                    <div>
                        <h4 class="font-bold text-sm text-[#18181b]">1. Land Holding Pattern Assessment</h4>
                        <p class="text-xs text-black/50 mt-1 leading-relaxed">Analyzing land distribution, fragmentation index, and average plot sizes to evaluate the scalability of modern farming practices.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#18181b]">2. Irrigation Source Profiling</h4>
                        <p class="text-xs text-black/50 mt-1 leading-relaxed">Cataloging surface water (canals, tanks) vs deep groundwater extraction (borewells, tube wells) to track local water supply dynamics.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#18181b]">3. Cropping Pattern Tracking</h4>
                        <p class="text-xs text-black/50 mt-1 leading-relaxed">Monitoring seasonal rotation, crop diversity index, and the concentration of water-intensive crops in highly drought-prone regions.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-[#18181b]">4. Well Depth Telemetry</h4>
                        <p class="text-xs text-black/50 mt-1 leading-relaxed">Mapping well depth fluctuations and static water levels to evaluate aquifer pressure and define early extraction limits.</p>
                    </div>
                </div>

                <div class="mt-6 flex gap-4">
                    @auth
                        <a href="{{ route('assessments.index') }}" class="px-6 py-3 bg-[#18181b] hover:bg-black text-white rounded-full text-xs font-bold uppercase tracking-wider shadow transition">Enter Panel</a>
                    @else
                        <a href="{{ route('register') }}" class="px-6 py-3 bg-[#18181b] hover:bg-black text-white rounded-full text-xs font-bold uppercase tracking-wider shadow transition">Try it Free</a>
                        <a href="{{ route('login') }}" class="px-6 py-3 bg-transparent border border-[#18181b] text-[#18181b] rounded-full text-xs font-bold uppercase tracking-wider transition">Sign In</a>
                    @endauth
                </div>
            </div>
            
            <!-- Right Image Column -->
            <div class="lg:col-span-5 relative aspect-square rounded-2xl overflow-hidden shadow-lg border border-black/5">
                <img src="/images/agriculture_landscape.png" alt="AgroGeo Dashboard Visual" class="w-full h-full object-cover filter saturate-75 brightness-95">
                <div class="absolute inset-0 bg-gradient-to-tr from-[#18181b]/35 to-transparent"></div>
            </div>
        </div>
    </div>
</div>
@endsection
