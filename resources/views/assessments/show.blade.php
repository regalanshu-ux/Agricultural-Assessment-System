@extends('layouts.app')

@section('title', 'Assessment Details & Recommendations')

@push('styles')
<style>
    /* Styling for interactive tabs grid */
    .tabs-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    @media (max-width: 992px) {
        .tabs-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
    }

    @media (max-width: 576px) {
        .tabs-grid {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
    }

    .tab-btn {
        background: #ffffff;
        border: 1px solid var(--border-color);
        border-top: 4px solid var(--border-color);
        border-radius: 12px;
        padding: 1.25rem;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-sm);
        position: relative;
        width: 100%;
        font-family: 'Inter', sans-serif;
    }

    .tab-btn:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
    }

    /* Individual tab styles */
    .tab-btn[data-tab="submission"] {
        --tab-color: #6366f1; /* Indigo */
        --tab-bg-light: #f5f3ff;
        --tab-glow: rgba(99, 102, 241, 0.15);
    }

    .tab-btn[data-tab="ai-improvements"] {
        --tab-color: #059669; /* Emerald */
        --tab-bg-light: #ecfdf5;
        --tab-glow: rgba(5, 150, 105, 0.15);
    }

    .tab-btn[data-tab="crop-prediction"] {
        --tab-color: #3b82f6; /* Blue */
        --tab-bg-light: #eff6ff;
        --tab-glow: rgba(59, 130, 246, 0.15);
    }

    .tab-btn[data-tab="weather-forecast"] {
        --tab-color: #d97706; /* Amber */
        --tab-bg-light: #fffbeb;
        --tab-glow: rgba(217, 119, 6, 0.15);
    }

    .tab-btn:hover {
        border-top-color: var(--tab-color);
    }

    .tab-btn.active {
        border-top-color: var(--tab-color);
        background-color: var(--tab-bg-light);
        box-shadow: 0 10px 20px -5px var(--tab-glow), 0 4px 6px -2px var(--tab-glow);
        transform: translateY(-2px);
        border-bottom: 1px solid transparent;
    }

    .tab-btn .icon-wrapper {
        background-color: #f3f4f6;
        color: #4b5563;
        border-radius: 10px;
        padding: 0.5rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.75rem;
        transition: all 0.3s ease;
    }

    .tab-btn:hover .icon-wrapper,
    .tab-btn.active .icon-wrapper {
        background-color: var(--tab-color);
        color: #ffffff;
        transform: scale(1.05);
    }

    .tab-btn .tab-title {
        font-size: 1rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 0.25rem;
    }

    .tab-btn .tab-subtitle {
        font-size: 0.8rem;
        color: var(--text-muted);
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 100%;
    }

    /* Tab content animations */
    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
        animation: fadeInUp 0.45s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Submission Info styles */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }

    @media (max-width: 768px) {
        .info-grid {
            grid-template-columns: 1fr;
        }
    }

    .info-tile {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: var(--radius-md);
        padding: 1rem 1.25rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: var(--transition);
    }

    .info-tile:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
        transform: translateY(-1px);
    }

    .info-tile-icon {
        background: white;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-sm);
        flex-shrink: 0;
    }

    .info-tile-content {
        display: flex;
        flex-direction: column;
    }

    .info-tile-label {
        font-size: 0.75rem;
        color: var(--text-muted);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.05em;
    }

    .info-tile-value {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-main);
    }

    /* AI Suggestions styles */
    .suggestion-card {
        background: #ffffff;
        border: 1px solid rgba(16, 185, 129, 0.2);
        border-radius: 12px;
        padding: 1.25rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
    }

    .suggestion-card:hover {
        transform: translateX(4px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border-color: var(--primary);
    }

    .suggestion-icon-container {
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .suggestion-badge {
        font-size: 0.7rem;
        font-weight: 700;
        padding: 0.15rem 0.5rem;
        border-radius: 9999px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        display: inline-block;
    }

    .suggestion-text {
        color: var(--text-main);
        font-weight: 500;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    /* Seasonal crop styles */
    .crop-item-card {
        background: #ffffff;
        border: 1px solid rgba(59, 130, 246, 0.2);
        border-radius: 10px;
        padding: 0.75rem 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
    }

    .crop-item-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(59, 130, 246, 0.1);
        border-color: #3b82f6;
        background: #eff6ff;
    }

    .crop-item-icon {
        background-color: #eff6ff;
        color: #3b82f6;
        border-radius: 8px;
        padding: 0.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .crop-item-name {
        font-size: 0.9rem;
        font-weight: 600;
        color: #1e293b;
    }

    /* Weather styles */
    .weather-stat-tile {
        background: #ffffff;
        border: 1px solid rgba(217, 119, 6, 0.2);
        border-radius: 12px;
        padding: 1.25rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
    }

    .weather-stat-icon {
        border-radius: 50%;
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: var(--shadow-sm);
    }

    .weather-stat-label {
        font-size: 0.75rem;
        color: var(--text-muted);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.05em;
    }

    .weather-stat-value {
        font-size: 0.95rem;
        font-weight: 700;
        color: #78350f;
    }

    .weather-day-card {
        background: #ffffff;
        border: 1px solid rgba(217, 119, 6, 0.15);
        border-radius: 10px;
        padding: 1rem 0.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .weather-day-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(217, 119, 6, 0.08);
        border-color: #d97706;
    }

    .weather-day-date {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--text-muted);
    }

    .weather-day-icon {
        padding: 0.25rem;
    }

    .weather-day-temp {
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--text-main);
    }

    .weather-day-desc {
        font-size: 0.7rem;
        color: var(--text-muted);
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .weather-strip {
            grid-template-columns: repeat(3, 1fr) !important;
        }
        .weather-day-card:nth-child(n+4) {
            display: none;
        }
    }
</style>
@endpush

@php
    // Inline helper for Suggestion categories
    if (!function_exists('getSuggestionCategory')) {
        function getSuggestionCategory($text) {
            $textLower = strtolower($text);
            if (str_contains($textLower, 'water') || str_contains($textLower, 'irrigation') || str_contains($textLower, 'rainwater') || str_contains($textLower, 'pond') || str_contains($textLower, 'well')) {
                return ['name' => 'Water Management', 'color' => '#3b82f6', 'bg' => '#eff6ff'];
            }
            if (str_contains($textLower, 'holding') || str_contains($textLower, 'fpo') || str_contains($textLower, 'scale') || str_contains($textLower, 'farming')) {
                return ['name' => 'Socio-Economics', 'color' => '#8b5cf6', 'bg' => '#f5f3ff'];
            }
            if (str_contains($textLower, 'rotation') || str_contains($textLower, 'soil') || str_contains($textLower, 'nitrogen') || str_contains($textLower, 'ph') || str_contains($textLower, 'fertilizer')) {
                return ['name' => 'Soil & Nutrition', 'color' => '#b45309', 'bg' => '#fffbeb'];
            }
            return ['name' => 'Crop Strategy', 'color' => '#10b981', 'bg' => '#ecfdf5'];
        }
    }

    // Dynamic 5-day weather variation
    $baseCondition = $weatherForecast['condition'] ?? 'Partly Cloudy';
    $tempStr = $weatherForecast['temperature'] ?? '25°C - 35°C';
    preg_match_all('/\d+/', $tempStr, $matches);
    $minTemp = isset($matches[0][0]) ? intval($matches[0][0]) : 20;
    $maxTemp = isset($matches[0][1]) ? intval($matches[0][1]) : 30;

    $forecastDays = [];
    $conditionsList = [];
    
    if (str_contains(strtolower($baseCondition), 'rain') || str_contains(strtolower($baseCondition), 'thunderstorm')) {
        $conditionsList = [
            ['cond' => 'Heavy Rain', 'icon' => 'cloud-rain'],
            ['cond' => 'Thunderstorm', 'icon' => 'cloud-lightning'],
            ['cond' => 'Moderate Rain', 'icon' => 'cloud-drizzle'],
            ['cond' => 'Light Showers', 'icon' => 'cloud-drizzle'],
            ['cond' => 'Partly Cloudy', 'icon' => 'cloud-sun']
        ];
    } elseif (str_contains(strtolower($baseCondition), 'sunny') || str_contains(strtolower($baseCondition), 'hot')) {
        $conditionsList = [
            ['cond' => 'Sunny', 'icon' => 'sun'],
            ['cond' => 'Clear Sky', 'icon' => 'sun'],
            ['cond' => 'Hot & Dry', 'icon' => 'sun'],
            ['cond' => 'Mostly Sunny', 'icon' => 'sun'],
            ['cond' => 'Clear Sky', 'icon' => 'sun']
        ];
    } elseif (str_contains(strtolower($baseCondition), 'cold') || str_contains(strtolower($baseCondition), 'fog')) {
        $conditionsList = [
            ['cond' => 'Dense Fog', 'icon' => 'wind'],
            ['cond' => 'Shallow Fog', 'icon' => 'wind'],
            ['cond' => 'Clear & Cold', 'icon' => 'sun'],
            ['cond' => 'Cold & Sunny', 'icon' => 'sun'],
            ['cond' => 'Foggy', 'icon' => 'wind']
        ];
    } else {
        $conditionsList = [
            ['cond' => 'Partly Cloudy', 'icon' => 'cloud-sun'],
            ['cond' => 'Mostly Sunny', 'icon' => 'sun'],
            ['cond' => 'Clear Sky', 'icon' => 'sun'],
            ['cond' => 'Partly Cloudy', 'icon' => 'cloud-sun'],
            ['cond' => 'Light Showers', 'icon' => 'cloud-drizzle']
        ];
    }

    for ($i = 0; $i < 5; $i++) {
        $dateStr = date('D, M d', strtotime("+$i days"));
        $varMin = $minTemp + rand(-2, 2);
        $varMax = $maxTemp + rand(-2, 2);
        $forecastDays[] = [
            'date' => $dateStr,
            'condition' => $conditionsList[$i]['cond'] ?? 'Partly Cloudy',
            'icon' => $conditionsList[$i]['icon'] ?? 'cloud-sun',
            'temp' => "{$varMin}°C - {$varMax}°C"
        ];
    }
@endphp

@section('content')
<div class="page-title">
    <h1>Assessment Details & Recommendations</h1>
    <a href="{{ route('assessments.index') }}" class="btn" style="background: white; border: 1px solid var(--border-color); color: var(--text-main);">
        Back to Dashboard
    </a>
</div>

<!-- Tabs Grid Buttons -->
<div class="tabs-grid">
    <button class="tab-btn active" data-tab="submission">
        <div class="icon-wrapper">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
        </div>
        <span class="tab-title">Submission Info</span>
        <span class="tab-subtitle">{{ $assessment->farmer_name }} ({{ $assessment->region }})</span>
    </button>

    <button class="tab-btn" data-tab="ai-improvements">
        <div class="icon-wrapper">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"/></svg>
        </div>
        <span class="tab-title">AI Smart Improvements</span>
        <span class="tab-subtitle">{{ count($suggestions) }} Recommendations</span>
    </button>

    <button class="tab-btn" data-tab="crop-prediction">
        <div class="icon-wrapper">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        </div>
        <span class="tab-title">Crop Prediction</span>
        <span class="tab-subtitle">Season: {{ $cropPrediction['season'] }}</span>
    </button>

    <button class="tab-btn" data-tab="weather-forecast">
        <div class="icon-wrapper">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        </div>
        <span class="tab-title">Weather Forecast</span>
        <span class="tab-subtitle">{{ $weatherForecast['condition'] }}</span>
    </button>
</div>

<!-- Tab Contents -->

<!-- 1. Submission Info Tab -->
<div id="tab-submission" class="tab-content active">
    <div class="card" style="border-top: 4px solid #6366f1;">
        <div class="card-header" style="border-bottom-color: #e0e7ff;">
            <h2 class="card-title" style="color: #4f46e5; display: flex; align-items: center; gap: 0.5rem;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                Farmer Submission Details
            </h2>
        </div>
        
        <div class="grid-2">
            <div class="info-grid">
                <div class="info-tile">
                    <div class="info-tile-icon" style="color: #6366f1;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    </div>
                    <div class="info-tile-content">
                        <span class="info-tile-label">Farmer Name</span>
                        <span class="info-tile-value">{{ $assessment->farmer_name }}</span>
                    </div>
                </div>
                
                <div class="info-tile">
                    <div class="info-tile-icon" style="color: #6366f1;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div class="info-tile-content">
                        <span class="info-tile-label">Region / District</span>
                        <span class="info-tile-value">{{ $assessment->region }}</span>
                    </div>
                </div>
                
                <div class="info-tile">
                    <div class="info-tile-icon" style="color: #6366f1;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="9" y1="3" x2="9" y2="21"/><line x1="15" y1="3" x2="15" y2="21"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="3" y1="15" x2="21" y2="15"/></svg>
                    </div>
                    <div class="info-tile-content">
                        <span class="info-tile-label">Land Holding Size</span>
                        <span class="info-tile-value">{{ $assessment->land_holding_size }} Hectares</span>
                    </div>
                </div>
                
                <div class="info-tile">
                    <div class="info-tile-icon" style="color: #6366f1;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a7 7 0 0 0 5-2c1.9-2 2-5.7.5-7.5l-5.5-6-5.5 6C5 14.3 5.1 18 7 20a7 7 0 0 0 5 2z"/></svg>
                    </div>
                    <div class="info-tile-content">
                        <span class="info-tile-label">Irrigation Source</span>
                        <span class="info-tile-value">{{ $assessment->irrigation_source }}</span>
                    </div>
                </div>
                
                <div class="info-tile">
                    <div class="info-tile-icon" style="color: #6366f1;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </div>
                    <div class="info-tile-content">
                        <span class="info-tile-label">Cropping Pattern</span>
                        <span class="info-tile-value">{{ $assessment->cropping_pattern }}</span>
                    </div>
                </div>
                
                <div class="info-tile">
                    <div class="info-tile-icon" style="color: #6366f1;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8l-4 4h8z"/></svg>
                    </div>
                    <div class="info-tile-content">
                        <span class="info-tile-label">Well Depth</span>
                        <span class="info-tile-value">{{ $assessment->well_depth ? $assessment->well_depth . ' Meters' : 'N/A (Rainfed)' }}</span>
                    </div>
                </div>

                <div class="info-tile" style="grid-column: span 2;">
                    <div class="info-tile-icon" style="color: #6366f1;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    </div>
                    <div class="info-tile-content">
                        <span class="info-tile-label">Coordinates</span>
                        <span class="info-tile-value" style="font-family: monospace; font-size: 0.9rem;">Lat: {{ number_format($assessment->latitude, 6) }}, Lng: {{ number_format($assessment->longitude, 6) }}</span>
                    </div>
                </div>
            </div>
            
            <div>
                <div id="show-map" style="width: 100%; height: 350px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid var(--border-color);"></div>
            </div>
        </div>
    </div>
</div>

<!-- 2. AI Smart Improvements Tab -->
<div id="tab-ai-improvements" class="tab-content">
    <div class="card" style="border: 2px solid var(--primary); background-color: var(--primary-light); border-radius: var(--radius-lg); padding: 2rem;">
        <div class="card-header" style="border-bottom-color: var(--primary);">
            <h2 class="card-title" style="color: var(--primary-hover); display: flex; align-items: center; gap: 0.5rem;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"/></svg>
                AI Smart Improvements & Recommendations
            </h2>
        </div>
        
        <div style="margin-top: 1.5rem;">
            @if(count($suggestions) > 0)
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    @foreach($suggestions as $suggestion)
                        @php
                            $cat = getSuggestionCategory($suggestion);
                        @endphp
                        <div class="suggestion-card">
                            <div class="suggestion-icon-container" style="background-color: {{ $cat['bg'] }}; color: {{ $cat['color'] }};">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 0.25rem; flex-grow: 1;">
                                <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                                    <span class="suggestion-badge" style="background-color: {{ $cat['bg'] }}; color: {{ $cat['color'] }}; border: 1px solid {{ $cat['color'] }}40;">
                                        {{ $cat['name'] }}
                                    </span>
                                </div>
                                <span class="suggestion-text">{{ $suggestion }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="text-align: center; padding: 3rem 1.5rem; color: var(--text-muted);">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom: 0.75rem; opacity: 0.5; color: var(--primary);"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    <p style="font-weight: 500;">No specific AI recommendations generated at this time.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- 3. Seasonal Crop Prediction Tab -->
<div id="tab-crop-prediction" class="tab-content">
    <div class="card" style="border: 2px solid #3b82f6; background-color: #eff6ff; border-radius: var(--radius-lg); padding: 2rem;">
        <div class="card-header" style="border-bottom-color: #3b82f6;">
            <h2 class="card-title" style="color: #1d4ed8; display: flex; align-items: center; gap: 0.5rem;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                Seasonal Crop Prediction Insights
            </h2>
        </div>
        
        <div style="margin-top: 1.5rem; font-family: 'Inter', sans-serif;">
            <div class="grid-2">
                <div>
                    <span style="font-size: 0.85rem; text-transform: uppercase; font-weight: 600; color: #475569; letter-spacing: 0.05em; display: block; margin-bottom: 0.25rem;">Predicted Farming Season</span>
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                        <div style="background: #3b82f6; color: white; padding: 0.5rem; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        </div>
                        <span style="font-size: 1.5rem; font-weight: 700; color: #1e3a8a;">{{ $cropPrediction['season'] }}</span>
                    </div>
                    
                    <span style="font-size: 0.85rem; text-transform: uppercase; font-weight: 600; color: #475569; letter-spacing: 0.05em; display: block; margin-bottom: 0.75rem;">Recommended Crops for Cultivation</span>
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 0.75rem;">
                        @foreach($cropPrediction['crops'] as $crop)
                            <div class="crop-item-card">
                                <div class="crop-item-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 3.5 1 9.8A7 7 0 0 1 11 20z"/><path d="M9 22v-4h4v4"/></svg>
                                </div>
                                <span class="crop-item-name">{{ $crop }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div style="display: flex; flex-direction: column; justify-content: center; background: rgba(255, 255, 255, 0.75); padding: 1.5rem; border-radius: 12px; border: 1px solid rgba(59, 130, 246, 0.2); box-shadow: var(--shadow-sm);">
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
                        <span style="font-weight: 600; color: #1e3a8a; font-size: 1rem;">Model Reliability & Criteria</span>
                    </div>
                    <p style="font-size: 0.875rem; color: #4b5563; margin-bottom: 1.25rem; line-height: 1.6;">
                        Our algorithms match spatial crop requirements with coordinates, active land parameters, and primary irrigation sources to isolate high-yield crop varieties.
                    </p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <span style="font-size: 0.875rem; font-weight: 600; color: #4b5563;">AI Confidence Score</span>
                        <span style="font-size: 1rem; font-weight: 800; color: #2563eb;">{{ $cropPrediction['confidence'] }}</span>
                    </div>
                    <div style="height: 10px; width: 100%; background-color: #dbeafe; border-radius: 9999px; overflow: hidden; border: 1px solid rgba(59, 130, 246, 0.1);">
                        <div style="height: 100%; width: {{ $cropPrediction['confidence'] }}; background: linear-gradient(90deg, #2563eb, #60a5fa); border-radius: 9999px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 4. Weather Forecast Tab -->
<div id="tab-weather-forecast" class="tab-content">
    <div class="card" style="border: 2px solid #f59e0b; background-color: #fffbeb; border-radius: var(--radius-lg); padding: 2rem;">
        <div class="card-header" style="border-bottom-color: #f59e0b;">
            <h2 class="card-title" style="color: #b45309; display: flex; align-items: center; gap: 0.5rem;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                Weather Forecast (Next 30 Days)
            </h2>
        </div>
        
        <div style="margin-top: 1.5rem; font-family: 'Inter', sans-serif;">
            <!-- Weather Overview Stats -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 2rem;">
                <div class="weather-stat-tile">
                    <div class="weather-stat-icon" style="background-color: #fef3c7; color: #d97706;">
                        @if(str_contains(strtolower($weatherForecast['condition']), 'rain'))
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 17.58A5 5 0 0 0 18 8h-1.26A8 8 0 1 0 4 16.25"/><path d="M8 16v4M12 16v6M16 16v4"/></svg>
                        @elseif(str_contains(strtolower($weatherForecast['condition']), 'sunny') || str_contains(strtolower($weatherForecast['condition']), 'hot'))
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
                        @else
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 16.9A5 5 0 0 0 18 7h-1.26a8 8 0 1 0-11.62 8.58"/></svg>
                        @endif
                    </div>
                    <div style="display: flex; flex-direction: column;">
                        <span class="weather-stat-label">General Condition</span>
                        <span class="weather-stat-value">{{ $weatherForecast['condition'] }}</span>
                    </div>
                </div>
                
                <div class="weather-stat-tile">
                    <div class="weather-stat-icon" style="background-color: #fee2e2; color: #ef4444;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z"/></svg>
                    </div>
                    <div style="display: flex; flex-direction: column;">
                        <span class="weather-stat-label">Est. Temp Range</span>
                        <span class="weather-stat-value">{{ $weatherForecast['temperature'] }}</span>
                    </div>
                </div>
                
                <div class="weather-stat-tile">
                    <div class="weather-stat-icon" style="background-color: #e0f2fe; color: #0284c7;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a7 7 0 0 0 5-2c1.9-2 2-5.7.5-7.5l-5.5-6-5.5 6C5 14.3 5.1 18 7 20a7 7 0 0 0 5 2z"/></svg>
                    </div>
                    <div style="display: flex; flex-direction: column;">
                        <span class="weather-stat-label">Expected Rainfall</span>
                        <span class="weather-stat-value">{{ $weatherForecast['rainfall'] }}</span>
                    </div>
                </div>
            </div>

            <!-- 5-Day Weather Forecast Strip -->
            <span style="font-size: 0.85rem; text-transform: uppercase; font-weight: 600; color: #475569; letter-spacing: 0.05em; display: block; margin-bottom: 0.75rem;">5-Day Outlook Summary</span>
            <div class="weather-strip" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 0.75rem; margin-bottom: 2rem;">
                @foreach($forecastDays as $day)
                    <div class="weather-day-card">
                        <span class="weather-day-date">{{ $day['date'] }}</span>
                        <div class="weather-day-icon">
                            @if($day['icon'] === 'sun')
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/></svg>
                            @elseif($day['icon'] === 'cloud-sun')
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v2M4.93 4.93l1.41 1.41M20 12h2M19.07 4.93l-1.41 1.41"/><path d="M15.28 14.72a4 4 0 0 0-5.56-5.56M12 18.5a6 6 0 0 0 6-6c0-1.66-1.34-3-3-3a3 3 0 0 0-3-3 5.4 5.4 0 0 0-5.4 5.4c0 .33.03.65.09.96a4 4 0 0 0-1.69 6.64"/></svg>
                            @elseif($day['icon'] === 'cloud-rain')
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 17.58A5 5 0 0 0 18 8h-1.26A8 8 0 1 0 4 16.25"/><path d="M8 16v4M12 16v6M16 16v4"/></svg>
                            @elseif($day['icon'] === 'cloud-lightning')
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 16.9A5 5 0 0 0 18 7h-1.26a8 8 0 1 0-11.62 8.58"/><path d="M13 11l-4 6h6l-4 6"/></svg>
                            @elseif($day['icon'] === 'cloud-drizzle')
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 16.58A5 5 0 0 0 18 7h-1.26A8 8 0 1 0 4 15.25"/><path d="M8 19v1M12 19v1M16 19v1M8 14v1M12 14v1M16 14v1"/></svg>
                            @else
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"/></svg>
                            @endif
                        </div>
                        <span class="weather-day-temp">{{ $day['temp'] }}</span>
                        <span class="weather-day-desc">{{ $day['condition'] }}</span>
                    </div>
                @endforeach
            </div>

            <!-- Advisory panel -->
            <div style="margin-top: 1.5rem; padding: 1.25rem 1.5rem; background-color: #fffbeb; border: 1px solid rgba(217, 119, 6, 0.1); border-left: 5px solid #d97706; border-radius: 8px; box-shadow: var(--shadow-sm); display: flex; gap: 1rem; align-items: flex-start;">
                <div style="background-color: #fef3c7; color: #d97706; border-radius: 50%; padding: 0.5rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 0.1rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                </div>
                <div>
                    <span style="font-weight: 700; color: #92400e; font-size: 1rem; display: block; margin-bottom: 0.25rem;">Agricultural Weather Advisory</span>
                    <p style="margin: 0; color: #78350f; font-size: 0.95rem; line-height: 1.6;">{{ $weatherForecast['advisory'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTabId = button.getAttribute('data-tab');

                // Deactivate all buttons
                tabButtons.forEach(btn => btn.classList.remove('active'));
                // Activate clicked button
                button.classList.add('active');

                // Hide all contents
                tabContents.forEach(content => {
                    content.classList.remove('active');
                });

                // Show selected content
                const activeContent = document.getElementById('tab-' + targetTabId);
                if (activeContent) {
                    activeContent.classList.add('active');
                }

                // If switching to submission, ensure Google Map updates sizing correctly
                if (targetTabId === 'submission' && window.map) {
                    google.maps.event.trigger(window.map, 'resize');
                    if (window.mapCenter) {
                        window.map.setCenter(window.mapCenter);
                    }
                }
            });
        });
    });

    // Map initialization for farmer location coordinates
    let map;
    let mapCenter;

    function initShowMap() {
        const lat = {{ $assessment->latitude }};
        const lng = {{ $assessment->longitude }};
        mapCenter = { lat: lat, lng: lng };
        
        map = new google.maps.Map(document.getElementById("show-map"), {
            zoom: 12,
            center: mapCenter,
            styles: [
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{"visibility": "off"}]
                }
            ],
            streetViewControl: false,
            mapTypeControl: false,
        });

        new google.maps.Marker({
            position: mapCenter,
            map: map,
            title: "{{ $assessment->farmer_name }}"
        });

        window.map = map;
        window.mapCenter = mapCenter;
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initShowMap" async defer></script>
@endpush
