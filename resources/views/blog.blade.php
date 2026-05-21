@extends('layouts.marketing')

@section('title', 'Research | Academic Papers & Policy Briefs')

@section('content')
<div class="pt-8 pb-16">
    <!-- Header Badge -->
    <div class="text-center">
        <div class="inline-flex items-center gap-1.5 bg-[#e4e4e1] text-[#18181b]/80 px-4 py-1.5 rounded-full text-[10px] font-extrabold tracking-widest uppercase border border-black/5 mb-8 shadow-sm">
            Research Repository
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-[#18181b] leading-tight">
            Academic Briefs &<br>Resource Policy Memos.
        </h1>
        <p class="mt-6 text-sm md:text-base text-black/55 max-w-2xl mx-auto leading-relaxed">
            Access our latest research publications, field briefs, and quantitative analysis detailing agricultural structural trends and aquifer health across the nation.
        </p>
    </div>

    <!-- Blog Posts Grid -->
    <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Post 1 -->
        <article class="bg-white rounded-3xl overflow-hidden border border-[#e4e4e7] shadow-sm hover:shadow-md transition flex flex-col justify-between">
            <div class="p-8">
                <!-- Date / Read Time -->
                <div class="flex gap-3 text-[10px] text-black/45 font-bold uppercase tracking-wider mb-4">
                    <span>May 19, 2026</span>
                    <span>•</span>
                    <span>Research Brief</span>
                </div>
                <h3 class="text-xl font-extrabold text-[#18181b] leading-snug tracking-tight hover:underline cursor-pointer">
                    Land Fragmentation and Smallholder Viability: A Cross-State Analysis
                </h3>
                <p class="text-xs text-black/50 mt-4 leading-relaxed font-medium">
                    An empirical review of how small, non-contiguous land holdings impact the adoption rate of modern micro-irrigation systems and mechanical harvesting across diverse agricultural zones.
                </p>
            </div>
            <div class="px-8 pb-8">
                <span class="text-xs font-bold text-[#18181b] uppercase tracking-wider border-b border-black/20 pb-0.5 hover:border-black cursor-pointer transition">
                    Read Brief →
                </span>
            </div>
        </article>

        <!-- Post 2 -->
        <article class="bg-white rounded-3xl overflow-hidden border border-[#e4e4e7] shadow-sm hover:shadow-md transition flex flex-col justify-between">
            <div class="p-8">
                <div class="flex gap-3 text-[10px] text-black/45 font-bold uppercase tracking-wider mb-4">
                    <span>May 12, 2026</span>
                    <span>•</span>
                    <span>Academic Paper</span>
                </div>
                <h3 class="text-xl font-extrabold text-[#18181b] leading-snug tracking-tight hover:underline cursor-pointer">
                    Aquifer Depletion and Tube Well Expansion in Water-Stressed Grain Belts
                </h3>
                <p class="text-xs text-black/50 mt-4 leading-relaxed font-medium">
                    Correlating agricultural well depths with regional crop patterns, highlighting the systemic depletion risks of growing water-intensive cash crops in arid plains.
                </p>
            </div>
            <div class="px-8 pb-8">
                <span class="text-xs font-bold text-[#18181b] uppercase tracking-wider border-b border-black/20 pb-0.5 hover:border-black cursor-pointer transition">
                    Read Paper →
                </span>
            </div>
        </article>

        <!-- Post 3 -->
        <article class="bg-white rounded-3xl overflow-hidden border border-[#e4e4e7] shadow-sm hover:shadow-md transition flex flex-col justify-between">
            <div class="p-8">
                <div class="flex gap-3 text-[10px] text-black/45 font-bold uppercase tracking-wider mb-4">
                    <span>May 02, 2026</span>
                    <span>•</span>
                    <span>Policy Memo</span>
                </div>
                <h3 class="text-xl font-extrabold text-[#18181b] leading-snug tracking-tight hover:underline cursor-pointer">
                    Sustainable Crop Transitions: Shifting from Paddy to Low-Water Millets
                </h3>
                <p class="text-xs text-black/50 mt-4 leading-relaxed font-medium">
                    Modeling state-wide water-table recovery and smallholder income trends under proposed economic subsidies for shifting crop selection away from rice.
                </p>
            </div>
            <div class="px-8 pb-8">
                <span class="text-xs font-bold text-[#18181b] uppercase tracking-wider border-b border-black/20 pb-0.5 hover:border-black cursor-pointer transition">
                    Read Memo →
                </span>
            </div>
        </article>

    </div>
</div>
@endsection
