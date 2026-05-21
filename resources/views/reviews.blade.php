@extends('layouts.marketing')

@section('title', 'Policy Impact | Expert Testimonials & Regional Insights')

@section('content')
<div class="pt-8 pb-16">
    <!-- Header Badge -->
    <div class="text-center">
        <div class="inline-flex items-center gap-1.5 bg-[#e4e4e1] text-[#18181b]/80 px-4 py-1.5 rounded-full text-[10px] font-extrabold tracking-widest uppercase border border-black/5 mb-8 shadow-sm">
            Planning & Policy Impact
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight text-[#18181b] leading-tight">
            Shaping Sustainable<br>Resource Allocation.
        </h1>
        <p class="mt-6 text-sm md:text-base text-black/55 max-w-2xl mx-auto leading-relaxed">
            Read how state water boards, agricultural economists, and rural planning bodies utilize our regional assessment databases to design localized, sustainable agricultural frameworks.
        </p>
    </div>

    <!-- Review Grid -->
    <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Review 1 -->
        <div class="bg-white rounded-3xl p-8 border border-[#e4e4e7] shadow-sm flex flex-col justify-between hover:shadow-md transition">
            <div>
                <!-- Category Tag -->
                <div class="text-[10px] font-bold text-black/40 uppercase tracking-widest mb-6">Groundwater Policy Restructuring</div>
                <p class="text-sm text-[#18181b] font-medium leading-relaxed">
                    "The micro-level tube well depth mapping across 1,200 panchayats provided the empirical evidence needed to implement recharge zoning and regulate extraction."
                </p>
            </div>
            <div class="mt-8 border-t border-[#e4e4e7]/60 pt-6">
                <span class="block text-sm font-bold text-[#18181b]">Dr. Sunita Rao</span>
                <span class="block text-[10px] text-black/40 font-semibold uppercase tracking-wider mt-1">Director, State Water Resources Board</span>
            </div>
        </div>

        <!-- Review 2 -->
        <div class="bg-white rounded-3xl p-8 border border-[#e4e4e7] shadow-sm flex flex-col justify-between hover:shadow-md transition">
            <div>
                <!-- Category Tag -->
                <div class="text-[10px] font-bold text-black/40 uppercase tracking-widest mb-6">Targeted Subsidy Optimization</div>
                <p class="text-sm text-[#18181b] font-medium leading-relaxed">
                    "Correlating land holding sizes with actual cropping patterns has allowed our department to design fertilizer and drip irrigation incentives that directly benefit smallholders."
                </p>
            </div>
            <div class="mt-8 border-t border-[#e4e4e7]/60 pt-6">
                <span class="block text-sm font-bold text-[#18181b]">Prof. Rajeev Sen</span>
                <span class="block text-[10px] text-black/40 font-semibold uppercase tracking-wider mt-1">Agricultural Economist</span>
            </div>
        </div>

        <!-- Review 3 -->
        <div class="bg-white rounded-3xl p-8 border border-[#e4e4e7] shadow-sm flex flex-col justify-between hover:shadow-md transition">
            <div>
                <!-- Category Tag -->
                <div class="text-[10px] font-bold text-black/40 uppercase tracking-widest mb-6">Monsoon Contingency Planning</div>
                <p class="text-sm text-[#18181b] font-medium leading-relaxed">
                    "Analyzing historical cropping patterns alongside well depth trends has helped us forecast crop stress and establish drought contingency plans months ahead."
                </p>
            </div>
            <div class="mt-8 border-t border-[#e4e4e7]/60 pt-6">
                <span class="block text-sm font-bold text-[#18181b]">K. Raghavan</span>
                <span class="block text-[10px] text-black/40 font-semibold uppercase tracking-wider mt-1">Chief Agricultural Planner</span>
            </div>
        </div>
    </div>
</div>
@endsection
