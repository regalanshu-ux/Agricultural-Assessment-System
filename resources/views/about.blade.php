@extends('layouts.marketing')

@section('title', 'About the Project | AgroGeo Research Origins')

@section('content')
<div class="pt-8 pb-16">
    <!-- Header Badge -->
    <div class="text-center">
        <div class="inline-flex items-center gap-1.5 bg-[#e4e4e1] text-[#18181b]/80 px-4 py-1.5 rounded-full text-[10px] font-extrabold tracking-widest uppercase border border-black/5 mb-8 shadow-sm">
            Project Background
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-[#18181b] leading-tight">
            Addressing the Agricultural<br>Data Gap.
        </h1>
        <p class="mt-6 text-sm md:text-base text-black/55 max-w-2xl mx-auto leading-relaxed">
            AgroGeo is a research-driven project designed to collect, process, and present critical structural data on farming patterns and aquifer status across various regions of the country.
        </p>
    </div>

    <!-- 2 Column Mission Section -->
    <div class="mt-16 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center">
        <!-- Visual side: Premium styling with image overlay -->
        <div class="lg:col-span-6 relative aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl border border-white/20">
            <img src="/images/agriculture_landscape.png" alt="AgroGeo Farmlands" class="w-full h-full object-cover filter saturate-[0.85] brightness-90">
            <div class="absolute inset-0 bg-[#18181b]/10 mix-blend-overlay"></div>
        </div>

        <!-- Content side -->
        <div class="lg:col-span-6 flex flex-col gap-6">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#18181b] tracking-tight">
                Our Research Core
            </h2>
            <p class="text-sm text-black/60 leading-relaxed font-medium">
                With regional agricultural planning severely constrained by a lack of integrated data on land holding fragmentation and groundwater reserves, this project establishes a robust empirical database for policy interventions.
            </p>
            
            <!-- Bullet points with dots -->
            <div class="flex flex-col gap-4 mt-2">
                <div class="flex gap-4 items-start">
                    <span class="w-2 h-2 rounded-full bg-[#18181b] mt-2 shrink-0"></span>
                    <div>
                        <h4 class="font-bold text-sm text-[#18181b]">Empirical Land Assessment</h4>
                        <p class="text-xs text-black/50 mt-1 leading-relaxed">Evaluating the transition of holding sizes and fragmentation to optimize regional subsidy distribution.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <span class="w-2 h-2 rounded-full bg-[#18181b] mt-2 shrink-0"></span>
                    <div>
                        <h4 class="font-bold text-sm text-[#18181b]">Irrigation & Aquifer Profiles</h4>
                        <p class="text-xs text-black/50 mt-1 leading-relaxed">Mapping groundwater reliance, tube well depth metrics, and active irrigation infrastructures across diverse soil systems.</p>
                    </div>
                </div>
                <div class="flex gap-4 items-start">
                    <span class="w-2 h-2 rounded-full bg-[#18181b] mt-2 shrink-0"></span>
                    <div>
                        <h4 class="font-bold text-sm text-[#18181b]">Data-Backed Policy Design</h4>
                        <p class="text-xs text-black/50 mt-1 leading-relaxed">Translating high-density datasets into actionable policy models for state-level departments and planning authorities.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
