@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-title">
    <h1>Dashboard</h1>
    <a href="{{ route('assessments.create') }}" class="btn btn-primary">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        New Assessment
    </a>
</div>

<div class="dashboard-layout">
    <!-- Left Sidebar Taskbar -->
    <aside class="dashboard-sidebar">
        <h2 class="sidebar-title">Sections</h2>
        <ul class="sidebar-menu">
            <li>
                <button class="sidebar-item-btn active" data-tab="registered-farmers">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    Registered Farmers
                </button>
            </li>
            <li>
                <button class="sidebar-item-btn" data-tab="crop-distribution">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    Crop Acreage Graph
                </button>
            </li>
            <li>
                <button class="sidebar-item-btn" data-tab="irrigation-monitoring">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a7 7 0 0 0 5-2c1.9-2 2-5.7.5-7.5l-5.5-6-5.5 6C5 14.3 5.1 18 7 20a7 7 0 0 0 5 2z"></path></svg>
                    Irrigation Monitoring
                </button>
            </li>
            <li>
                <button class="sidebar-item-btn" data-tab="cropping-analyzer">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    Cropping Analyzer
                </button>
            </li>
            <li>
                <button class="sidebar-item-btn" data-tab="geographic-visualization">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21"></polygon><line x1="9" y1="3" x2="9" y2="18"></line><line x1="15" y1="6" x2="15" y2="21"></line></svg>
                    Geographic Map
                </button>
            </li>
            <li>
                <button class="sidebar-item-btn" data-tab="reports-analytics">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    Reports & Analytics
                </button>
            </li>
            <li>
                <button class="sidebar-item-btn" data-tab="agricultural-planning">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                    Agricultural Planning
                </button>
            </li>
        </ul>
    </aside>

    <!-- Main Content Area -->
    <main class="dashboard-content">

        <!-- 1. Registered Farmers Section -->
        <section id="tab-registered-farmers" class="dashboard-tab-panel active">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap;">
                    <h2 class="card-title">Registered Farmers</h2>
                    <div style="display: flex; gap: 0.5rem;">
                        <button class="btn btn-primary" style="padding: 0.4rem 0.85rem; font-size: 0.8rem; display: flex; align-items: center; gap: 0.35rem;" onclick="exportCSV()">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                            Export Directory (CSV)
                        </button>
                        <button class="btn" style="padding: 0.4rem 0.85rem; font-size: 0.8rem; background-color: white; border: 1px solid var(--border-color); color: var(--text-main); display: flex; align-items: center; gap: 0.35rem;" onclick="printReport()">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="6 9 6 2 18 2 18 9"></polygon><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                            Print Brief (PDF)
                        </button>
                    </div>
                </div>
                <div class="search-wrapper">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" id="farmersSearch" class="search-input" placeholder="Search by name or state...">
                </div>
                <div class="table-responsive">
                    <table class="custom-table" id="farmersTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>State/Region</th>
                                <th>Land Size (ha)</th>
                                <th>Crop Grown</th>
                                <th>Irrigation</th>
                                <th>Well Depth (m)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($assessments as $a)
                            <tr data-name="{{ strtolower($a->farmer_name) }}" data-region="{{ strtolower($a->region) }}">
                                <td><strong><a href="{{ route('assessments.show', $a) }}">{{ $a->farmer_name }}</a></strong></td>
                                <td>{{ $a->region }}</td>
                                <td>{{ number_format($a->land_holding_size, 1) }}</td>
                                <td><span style="font-weight: 500;">{{ $a->crop_grown }}</span></td>
                                <td>
                                    <span class="badge badge-{{ strtolower(str_replace(' ', '', $a->irrigation_source)) }}">
                                        {{ $a->irrigation_source }}
                                    </span>
                                </td>
                                <td>{{ $a->well_depth ? number_format($a->well_depth, 1) . ' m' : 'N/A' }}</td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <button class="btn" style="padding: 0.35rem 0.65rem; font-size: 0.85rem; background-color: #f1f5f9; color: var(--text-main); border: 1px solid var(--border-color);" onclick="openEditModal({{ json_encode($a) }})">
                                            Edit
                                        </button>
                                        <form action="{{ route('assessments.destroy', $a) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" style="padding: 0.35rem 0.65rem; font-size: 0.85rem; background-color: #fee2e2; color: #b91c1c; border: 1px solid #fca5a5;">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 2rem;">No registered farmers found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- 2. Crop Grown Graph Section -->
        <section id="tab-crop-distribution" class="dashboard-tab-panel">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Crop Grown vs. Land Area (Hectares)</h2>
                </div>
                <div class="chart-container" style="height: 400px;">
                    <canvas id="cropHectaresChart"></canvas>
                </div>
                <div style="margin-top: 1.5rem; padding: 1rem; background-color: #f8fafc; border-radius: var(--radius-md); border: 1px solid var(--border-color); font-size: 0.9rem;">
                    <strong>🌾 Analysis:</strong> Crop distributions show the agricultural footprint across your database. Larger bars represent dominant crops, aiding regional production forecasting.
                </div>
            </div>
        </section>

        <!-- 3. Irrigation Sources Monitoring Section -->
        <section id="tab-irrigation-monitoring" class="dashboard-tab-panel">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Irrigation Practices all over India</h2>
                </div>
                <div class="grid-2" style="margin-bottom: 2rem;">
                    <div>
                        <h3 style="font-size: 1.1rem; margin-bottom: 1rem; color: var(--text-main); font-weight: 600;">Water Resource Breakdown</h3>
                        <div class="chart-container" style="height: 300px;">
                            <canvas id="irrigationPracticeChart"></canvas>
                        </div>
                    </div>
                    <div>
                        <h3 style="font-size: 1.1rem; margin-bottom: 1rem; color: var(--text-main); font-weight: 600;">Average Well Depth by Region</h3>
                        <div class="chart-container" style="height: 300px;">
                            <canvas id="wellDepthRegionChart"></canvas>
                        </div>
                    </div>
                </div>
                <div style="padding: 1.25rem; background-color: #eff6ff; border-radius: var(--radius-md); border: 1px solid #bfdbfe; color: #1e3a8a; font-size: 0.95rem; line-height: 1.5;">
                    <strong>💧 Key Water Insights:</strong>
                    <ul style="margin-left: 1.5rem; margin-top: 0.5rem;">
                        <li><strong>Groundwater Alert:</strong> Regions with Tube Wells showing average depths over 50 meters need micro-irrigation systems to prevent aquifer depletion.</li>
                        <li><strong>Surface Water:</strong> Canal irrigation reduces stress on aquifers but is highly dependent on seasonal monsoon releases.</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 4. Cropping Pattern Analyzer Section -->
        <section id="tab-cropping-analyzer" class="dashboard-tab-panel">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Cropping Pattern Analyzer by State</h2>
                </div>
                <div class="search-wrapper" style="margin-bottom: 1.5rem;">
                    <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" id="stateAnalyzerSearch" class="search-input" placeholder="Type a state name (e.g. Punjab, Uttar Pradesh, Gujarat, Telangana)..." list="stateList">
                    <datalist id="stateList">
                        @foreach($assessments->pluck('region')->unique() as $region)
                            <option value="{{ $region }}"></option>
                        @endforeach
                    </datalist>
                </div>

                <div id="analyzerEmptyState" style="text-align: center; padding: 4rem 2rem; color: var(--text-muted);">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom: 1rem; opacity: 0.6;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <p style="font-size: 1.1rem; font-weight: 500;">Search and enter a State above to view its cropping pattern and regional metrics.</p>
                </div>

                <div id="analyzerResults" style="display: none;">
                    <div class="grid-2" style="margin-bottom: 2rem;">
                        <div style="background-color: #f8fafc; border-radius: var(--radius-md); padding: 1.5rem; border: 1px solid var(--border-color); display: flex; flex-direction: column; justify-content: center; gap: 1rem;">
                            <div>
                                <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: var(--text-muted); letter-spacing: 0.05em; display: block; margin-bottom: 0.25rem;">Selected State</span>
                                <h3 id="analyzerStateName" style="font-size: 1.8rem; font-weight: 700; color: var(--primary);">Punjab</h3>
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                                <div class="stat-card" style="margin: 0; padding: 1rem;">
                                    <span class="stat-value" id="analyzerTotalFarmers" style="font-size: 1.5rem;">0</span>
                                    <span class="stat-label" style="font-size: 0.7rem;">Farmers</span>
                                </div>
                                <div class="stat-card" style="margin: 0; padding: 1rem;">
                                    <span class="stat-value" id="analyzerTotalAcreage" style="font-size: 1.5rem;">0</span>
                                    <span class="stat-label" style="font-size: 0.7rem;">Hectares</span>
                                </div>
                                <div class="stat-card" style="margin: 0; padding: 1rem; grid-column: span 2;">
                                    <span class="stat-value" id="analyzerAvgWell" style="font-size: 1.5rem;">0</span>
                                    <span class="stat-label" style="font-size: 0.7rem;">Avg Well Depth</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 style="font-size: 1rem; margin-bottom: 0.75rem; color: var(--text-main); font-weight: 600;">Cropping Pattern Breakdown</h3>
                            <div class="chart-container" style="height: 250px;">
                                <canvas id="analyzerChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <h3 style="font-weight: 600; font-size: 1.1rem; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                        Farmers in this State
                    </h3>
                    <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Farmer Name</th>
                                    <th>Land (ha)</th>
                                    <th>Crop</th>
                                    <th>Irrigation</th>
                                    <th>Well Depth</th>
                                </tr>
                            </thead>
                            <tbody id="analyzerTableBody">
                                <!-- Populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Geographic Visualization Section -->
        <section id="tab-geographic-visualization" class="dashboard-tab-panel">
            <div class="card" style="padding: 1.5rem;">
                <div class="card-header" style="margin-bottom: 1rem;">
                    <h2 class="card-title">Geographic Visualization using Google Maps</h2>
                </div>
                <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 1rem;">
                    Display farms, irrigation sources, and wells on an interactive map to analyze data geographically.
                </p>
                <div class="map-container-relative">
                    <!-- Layer control overlaid on map -->
                    <div class="map-layer-control">
                        <h3>Layers</h3>
                        <label>
                            <input type="checkbox" id="layerFarms" checked onchange="toggleLayers()">
                            <span style="display:inline-block; width:12px; height:12px; background:#10b981; border-radius:50%; margin:0 3px;"></span> Farms
                        </label>
                        <label>
                            <input type="checkbox" id="layerIrrigation" checked onchange="toggleLayers()">
                            <span style="display:inline-block; width:12px; height:12px; background:#3b82f6; border-radius:50%; margin:0 3px;"></span> Irrigation Sources
                        </label>
                        <label>
                            <input type="checkbox" id="layerWells" checked onchange="toggleLayers()">
                            <span style="display:inline-block; width:12px; height:12px; background:#f59e0b; border-radius:50%; margin:0 3px;"></span> Wells
                        </label>
                        <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 0.25rem 0;">
                        <h3>GIS Telemetry</h3>
                        <label>
                            <input type="checkbox" id="layerAquifers" checked onchange="toggleLayers()">
                            <span style="display:inline-block; width:12px; height:12px; background:rgba(239, 68, 68, 0.4); border: 1px solid #ef4444; border-radius:3px; margin:0 3px;"></span> Aquifers
                        </label>
                        <label>
                            <input type="checkbox" id="layerPlots" checked onchange="toggleLayers()">
                            <span style="display:inline-block; width:12px; height:12px; border: 1.5px solid #10b981; border-radius:3px; margin:0 3px;"></span> Cadastral Plots
                        </label>
                        <label>
                            <input type="checkbox" id="layerStress" checked onchange="toggleLayers()">
                            <span style="display:inline-block; width:12px; height:12px; background:radial-gradient(circle, #f97316 0%, transparent 70%); border-radius:50%; margin:0 3px;"></span> Crop Stress Glow
                        </label>
                    </div>
                    <div id="map" style="width: 100%; height: 100%;"></div>
                </div>
            </div>
        </section>

        <!-- 6. Generate Reports and Analytics Section -->
        <section id="tab-reports-analytics" class="dashboard-tab-panel">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Reports and Analytics</h2>
                </div>
                <div class="stats-grid" style="margin-bottom: 2rem;">
                    <div class="stat-card">
                        <div class="stat-value">{{ $assessments->count() }}</div>
                        <div class="stat-label">Total Farms</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">{{ number_format($assessments->avg('land_holding_size'), 1) }} ha</div>
                        <div class="stat-label">Avg Land Size</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value" style="color: #ef4444;">
                            {{ $assessments->where('well_depth', '>', 50)->count() }}
                        </div>
                        <div class="stat-label">Deep Wells (>50m)</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value" style="color: #3b82f6;">
                            {{ number_format(($assessments->where('irrigation_source', '!=', 'Rainfed')->count() / max(1, $assessments->count())) * 100, 0) }}%
                        </div>
                        <div class="stat-label">Irrigated Lands</div>
                    </div>
                </div>

                <div class="grid-2" style="margin-bottom: 2rem;">
                    <div class="card" style="padding: 1.25rem; margin: 0; box-shadow: none;">
                        <h3 style="font-size: 1rem; margin-bottom: 1rem; font-weight: 600;">Average Land Size by State</h3>
                        <div class="chart-container" style="height: 250px;">
                            <canvas id="avgLandStateChart"></canvas>
                        </div>
                    </div>
                    <div class="card" style="padding: 1.25rem; margin: 0; box-shadow: none;">
                        <h3 style="font-size: 1rem; margin-bottom: 1rem; font-weight: 600;">Average Well Depth by State</h3>
                        <div class="chart-container" style="height: 250px;">
                            <canvas id="avgWellStateChart"></canvas>
                        </div>
                    </div>
                </div>

                <div style="border-top: 1px solid var(--border-color); padding-top: 1.5rem; display: flex; gap: 1rem;">
                    <button class="btn btn-primary" onclick="exportCSV()">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Export CSV Directory
                    </button>
                    <button class="btn" style="background-color: white; border: 1px solid var(--border-color); color: var(--text-main);" onclick="printReport()">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="6 9 6 2 18 2 18 9"></polygon><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                        Print Summary Report
                    </button>
                </div>
            </div>
        </section>

        <!-- 7. Improve Agricultural Planning Section -->
        <section id="tab-agricultural-planning" class="dashboard-tab-panel">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Improve Agricultural Planning</h2>
                </div>
                
                <div class="calculator-grid" style="margin-bottom: 2.5rem;">
                    <!-- Calculator Inputs -->
                    <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                        <h3 style="font-size: 1.1rem; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="9"></line><line x1="9" y1="13" x2="15" y2="13"></line><line x1="9" y1="17" x2="15" y2="17"></line></svg>
                            Water Allocation Calculator
                        </h3>
                        <div class="grid-2">
                            <div class="form-group" style="margin: 0;">
                                <label for="calcState" class="form-label">Target State</label>
                                <select id="calcState" class="form-control" onchange="runPlanningCalculator()">
                                    @foreach($assessments->pluck('region')->unique() as $region)
                                        <option value="{{ $region }}">{{ $region }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="margin: 0;">
                                <label for="calcCrop" class="form-label">Crop Cultivating</label>
                                <select id="calcCrop" class="form-control" onchange="runPlanningCalculator()">
                                    <option value="Wheat">Wheat</option>
                                    <option value="Paddy (Rice)">Paddy (Rice)</option>
                                    <option value="Cotton">Cotton</option>
                                    <option value="Sugarcane">Sugarcane</option>
                                    <option value="Soybean">Soybean</option>
                                    <option value="Mustard">Mustard</option>
                                    <option value="Maize">Maize</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="margin: 0;">
                            <label for="calcSize" class="form-label">Land Size (Hectares)</label>
                            <input type="number" id="calcSize" class="form-control" value="2.0" step="0.1" min="0.1" oninput="runPlanningCalculator()">
                        </div>
                    </div>

                    <!-- Calculator Results -->
                    <div class="calc-result-card" id="calcResult">
                        <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: var(--text-muted); letter-spacing: 0.05em; display: block; margin-bottom: 0.25rem;">Estimated Water Need</span>
                        <div style="font-size: 2.2rem; font-weight: 800; color: #2563eb; margin-bottom: 0.5rem;" id="calcWaterVal">
                            12,000,000 Liters
                        </div>
                        <span style="font-size: 0.85rem; font-weight: 600; color: var(--text-main); margin-bottom: 0.75rem;">
                            Recommended: <span id="calcFreqVal">3 Sowing Irrigations</span>
                        </span>
                        <div id="calcWarningVal" style="font-size: 0.8rem; padding: 0.5rem; background-color: #fee2e2; border: 1px solid #fca5a5; color: #b91c1c; border-radius: 4px; display: none;">
                            ⚠️ Regional Alert: Deep water tables observed.
                        </div>
                    </div>
                </div>

                <div style="border-top: 1px solid var(--border-color); margin: 2rem 0; padding-top: 2rem;"></div>

                <div class="calculator-grid" style="margin-bottom: 2.5rem;">
                    <!-- Simulator Controls -->
                    <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                        <h3 style="font-size: 1.1rem; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            Monsoon Deficit & Drought Contingency Simulator
                        </h3>
                        <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.5; margin: 0;">
                            Simulate hypothetical rainfall deficits to evaluate regional water resource depletion and test contingency crop-shifting strategies.
                        </p>
                        
                        <div class="form-group" style="margin: 0;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                <label for="simDeficitRange" class="form-label" style="margin: 0; font-weight: 700;">Monsoon Rainfall Deficit</label>
                                <span id="simDeficitVal" style="font-size: 0.85rem; font-weight: 800; color: #10b981; padding: 0.15rem 0.5rem; background-color: #d1fae5; border-radius: var(--radius-md);">0% (Normal Monsoon)</span>
                            </div>
                            <input type="range" id="simDeficitRange" class="form-control-range" value="0" min="0" max="50" step="5" style="width: 100%; cursor: pointer;" oninput="runDroughtSimulator()">
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="form-group" style="margin: 0;">
                                <label for="simState" class="form-label">Simulation Target State</label>
                                <select id="simState" class="form-control" onchange="runDroughtSimulator()">
                                    @foreach($assessments->pluck('region')->unique() as $region)
                                        <option value="{{ $region }}">{{ $region }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="margin: 0;">
                                <label for="simBaselineCrop" class="form-label">Current Crop Selection</label>
                                <select id="simBaselineCrop" class="form-control" onchange="runDroughtSimulator()">
                                    <option value="Paddy (Rice)">Paddy (Rice)</option>
                                    <option value="Sugarcane">Sugarcane</option>
                                    <option value="Wheat">Wheat</option>
                                    <option value="Cotton">Cotton</option>
                                    <option value="Soybean">Soybean</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Simulator Results Gauge -->
                    <div class="calc-result-card" style="background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%); border-color: #fed7aa;">
                        <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #c2410c; letter-spacing: 0.05em; display: block; margin-bottom: 0.25rem;">Aquifer Stress Index</span>
                        <div style="display: flex; align-items: baseline; gap: 0.5rem; margin-bottom: 0.5rem;">
                            <div style="font-size: 1.8rem; font-weight: 800; color: #ea580c;" id="simStressVal">
                                Stable (12%)
                            </div>
                        </div>
                        
                        <!-- Mini progress bar -->
                        <div style="width: 100%; height: 8px; background-color: #e2e8f0; border-radius: 4px; overflow: hidden; margin-bottom: 0.75rem;">
                            <div id="simStressProgress" style="width: 12%; height: 100%; background-color: #10b981; transition: all 0.3s ease;"></div>
                        </div>

                        <div id="simAlertBadge" style="font-size: 0.8rem; font-weight: 700; padding: 0.35rem 0.5rem; background-color: #d1fae5; color: #065f46; border-radius: 4px; text-align: center;">
                            ✅ Sufficient aquifer storage for standard irrigation cycles.
                        </div>
                    </div>
                </div>

                <!-- Live Contingency Planning Output -->
                <div id="droughtContingencyOutput" style="display: none; padding: 1.25rem; background-color: #fee2e2; border-radius: var(--radius-md); border: 1px solid #fca5a5; margin-bottom: 2rem; transition: all 0.3s ease;">
                    <h4 style="color: #991b1b; font-weight: 700; font-size: 0.95rem; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        CRITICAL DROUGHT CONTINGENCY ADVISORY
                    </h4>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.25rem;">
                        <div>
                            <strong style="color: #991b1b; font-size: 0.8rem; text-transform: uppercase; display: block; margin-bottom: 0.25rem;">Contingency Seeds (Alternative Crop Shifting)</strong>
                            <p style="font-size: 0.85rem; color: #7f1d1d; line-height: 1.5;" id="simContingencySeeds">
                                Transition immediately to short-duration Sorghum or Pearl Millet. These crops require up to 65% less water than baseline selections and mature within 85 days.
                            </p>
                        </div>
                        <div>
                            <strong style="color: #991b1b; font-size: 0.8rem; text-transform: uppercase; display: block; margin-bottom: 0.25rem;">Mandatory Water Rationing Directive</strong>
                            <p style="font-size: 0.85rem; color: #7f1d1d; line-height: 1.5;" id="simContingencyRationing">
                                Ban flood-irrigation processes. Mandate a maximum 3-hour alternate day micro-sprinkling schedule for survival crops. Impose limits on deep tube well running.
                            </p>
                        </div>
                    </div>
                </div>

                <h3 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 1rem; border-top: 1px solid var(--border-color); padding-top: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                    Strategic Planning Recommendations
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.25rem;">
                    <div class="card" style="padding: 1.25rem; margin: 0; border-top: 4px solid #10b981; box-shadow: none;">
                        <h4 style="font-weight: 700; font-size: 0.95rem; margin-bottom: 0.5rem; color: #047857;">Water Policy & Subsidies</h4>
                        <p style="font-size: 0.85rem; color: var(--text-main); line-height: 1.5;" id="policySubsidyText">
                            States with critical groundwater levels should prioritize subsidies for Drip and Sprinkler installations. Restrict broadacre cultivation of flood-heavy crops like Paddy in low rainfall seasons.
                        </p>
                    </div>
                    <div class="card" style="padding: 1.25rem; margin: 0; border-top: 4px solid #3b82f6; box-shadow: none;">
                        <h4 style="font-weight: 700; font-size: 0.95rem; margin-bottom: 0.5rem; color: #1d4ed8;">Infrastructure Allocation</h4>
                        <p style="font-size: 0.85rem; color: var(--text-main); line-height: 1.5;" id="policyInfrastructureText">
                            Allocate canal infrastructure expansions to state districts relying entirely on deep wells. Provide community farm pond construction support for rainwater harvesting in rainfed areas.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<!-- Edit Farmer Modal -->
<div class="modal-overlay" id="editModalOverlay">
    <div class="modal-container">
        <div class="modal-header">
            <h3 class="modal-title">Edit Farmer Details</h3>
            <button class="modal-close" onclick="closeEditModal()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <div class="modal-body">
            <form id="editFarmerForm" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid-2">
                    <div class="form-group">
                        <label for="modal_farmer_name" class="form-label">Farmer Name</label>
                        <input type="text" id="modal_farmer_name" name="farmer_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="modal_region" class="form-label">State/Region</label>
                        <input type="text" id="modal_region" name="region" class="form-control" required>
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label for="modal_latitude" class="form-label">Latitude</label>
                        <input type="number" step="any" id="modal_latitude" name="latitude" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="modal_longitude" class="form-label">Longitude</label>
                        <input type="number" step="any" id="modal_longitude" name="longitude" class="form-control" required>
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label for="modal_land_holding_size" class="form-label">Land Size (Hectares)</label>
                        <input type="number" step="any" id="modal_land_holding_size" name="land_holding_size" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="modal_crop_grown" class="form-label">Crop Grown</label>
                        <input type="text" id="modal_crop_grown" name="crop_grown" class="form-control" required>
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label for="modal_irrigation_source" class="form-label">Irrigation Source</label>
                        <select id="modal_irrigation_source" name="irrigation_source" class="form-control" onchange="toggleModalWellDepth()">
                            <option value="Canal">Canal</option>
                            <option value="Tube Well">Tube Well</option>
                            <option value="Tank">Tank</option>
                            <option value="Rainfed">Rainfed</option>
                            <option value="River">River</option>
                        </select>
                    </div>
                    <div class="form-group" id="modalWellDepthContainer">
                        <label for="modal_well_depth" class="form-label">Well Depth (Meters)</label>
                        <input type="number" step="any" id="modal_well_depth" name="well_depth" class="form-control">
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 1rem;">
                    <button type="button" class="btn" style="background-color: white; border: 1px solid var(--border-color); color: var(--text-main);" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Print Only Report -->
<div class="print-only-report">
    <div style="border-bottom: 2px solid var(--primary); padding-bottom: 1rem; margin-bottom: 2rem;">
        <h1 style="color: var(--primary); font-size: 2rem; font-weight: 700;">AgroGeo National Agricultural Policy Dossier</h1>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-top: 0.25rem;">Granular Land Holding, Aquifer Depletion & Crop Stress Telemetry Brief | Generated on {{ date('Y-m-d') }}</p>
    </div>
    
    <div class="card" style="box-shadow: none !important; border: 1px solid var(--border-color) !important; margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; margin-bottom: 1rem; color: var(--text-main); font-weight: 700; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">I. Executive Telemetry Overview</h2>
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem;">
            <div style="border: 1px solid var(--border-color); padding: 1rem; border-radius: 6px;">
                <strong style="display: block; font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase;">Total Holdings Surveyed</strong>
                <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary);">{{ $assessments->count() }}</span>
            </div>
            <div style="border: 1px solid var(--border-color); padding: 1rem; border-radius: 6px;">
                <strong style="display: block; font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase;">Total Cultivated Area</strong>
                <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary);">{{ number_format($assessments->sum('land_holding_size'), 1) }} ha</span>
            </div>
            <div style="border: 1px solid var(--border-color); padding: 1rem; border-radius: 6px;">
                <strong style="display: block; font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase;">Mean Hydro-Borewell Depth</strong>
                <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary);">{{ number_format($assessments->avg('well_depth'), 1) }} m</span>
            </div>
            <div style="border: 1px solid var(--border-color); padding: 1rem; border-radius: 6px;">
                <strong style="display: block; font-size: 0.8rem; color: var(--text-muted); text-transform: uppercase;">Rainfed Operations</strong>
                <span style="font-size: 1.5rem; font-weight: 700; color: var(--primary);">{{ $assessments->where('irrigation_source', 'Rainfed')->count() }}</span>
            </div>
        </div>
    </div>

    <div class="card" style="box-shadow: none !important; border: 1px solid var(--border-color) !important; margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; margin-bottom: 1rem; color: var(--text-main); font-weight: 700; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">II. National Cropping Footprint & Yield Density</h2>
        <table class="custom-table" style="width: 100%;">
            <thead>
                <tr>
                    <th>Crop Profile</th>
                    <th>Survey Count</th>
                    <th>Gross Land Cover</th>
                    <th>Average Plot Size</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assessments->groupBy('crop_grown') as $crop => $group)
                <tr>
                    <td><strong>{{ $crop }}</strong></td>
                    <td>{{ $group->count() }} holdings</td>
                    <td>{{ number_format($group->sum('land_holding_size'), 1) }} ha</td>
                    <td>{{ number_format($group->avg('land_holding_size'), 1) }} ha</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card" style="box-shadow: none !important; border: 1px solid var(--border-color) !important; margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; margin-bottom: 1rem; color: var(--text-main); font-weight: 700; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">III. Regional Aquifer & Fragmentation Metrics</h2>
        <table class="custom-table" style="width: 100%;">
            <thead>
                <tr>
                    <th>State/Region Name</th>
                    <th>Avg Land Size (ha)</th>
                    <th>Avg Well Depth (m)</th>
                    <th>Deep Wells Count (>50m)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assessments->groupBy('region') as $region => $group)
                <tr>
                    <td><strong>{{ $region }}</strong></td>
                    <td>{{ number_format($group->avg('land_holding_size'), 1) }} ha</td>
                    <td>{{ $group->avg('well_depth') ? number_format($group->avg('well_depth'), 1) . ' m' : 'N/A' }}</td>
                    <td>{{ $group->where('well_depth', '>', 50)->count() }} plots</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card" style="box-shadow: none !important; border: 1px solid var(--border-color) !important;">
        <h2 style="font-size: 1.25rem; margin-bottom: 1rem; color: var(--text-main); font-weight: 700; border-bottom: 1px solid var(--border-color); padding-bottom: 0.5rem;">IV. Policy Directives & Resource Action Mandates</h2>
        <p style="font-size: 0.95rem; line-height: 1.6; color: var(--text-main);">
            Based on active micro-survey metrics compiled above, the following regional policy mandates are active:
            <br><br>
            1. <strong>Aquifer Extraction Zones:</strong> In states with mean tube well depths exceeding 40 meters, agricultural electricity subsidies should be capped and linked directly to micro-drip implementation.
            <br><br>
            2. <strong>Land Fragmentation Incentives:</strong> Cooperatives and shared mechanization lines should be established in states with small average land holdings (&lt; 2.5 hectares) to offset harvesting costs.
            <br><br>
            3. <strong>Monsoon Drought Plan:</strong> When meteorological reports predict rainfall deficits exceeding 20%, state agencies are authorized to distribute contingent legume/millet seeds and mandate the early termination of flood-heavy paddy nurseries.
        </p>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Tab switching logic
    const tabButtons = document.querySelectorAll('.sidebar-item-btn');
    const tabPanels = document.querySelectorAll('.dashboard-tab-panel');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.getAttribute('data-tab');

            // Deactivate all buttons
            tabButtons.forEach(btn => btn.classList.remove('active'));
            // Activate current
            button.classList.add('active');

            // Hide all tab panels
            tabPanels.forEach(panel => panel.classList.remove('active'));
            // Show current
            const activePanel = document.getElementById('tab-' + targetTab);
            if (activePanel) {
                activePanel.classList.add('active');
            }

            // Trigger Map resize/re-render if map tab is selected
            if (targetTab === 'geographic-visualization') {
                setTimeout(() => {
                    if (map) {
                        google.maps.event.trigger(map, 'resize');
                    }
                }, 100);
            }
        });
    });

    // Registered Farmers Search
    const searchInput = document.getElementById('farmersSearch');
    const farmersTableRows = document.querySelectorAll('#farmersTable tbody tr');

    if (searchInput) {
        searchInput.addEventListener('input', () => {
            const query = searchInput.value.toLowerCase().trim();
            farmersTableRows.forEach(row => {
                const name = row.getAttribute('data-name');
                const region = row.getAttribute('data-region');
                if (name.includes(query) || region.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }

    // Modal Control
    const editModal = document.getElementById('editModalOverlay');
    const editForm = document.getElementById('editFarmerForm');
    const wellDepthContainer = document.getElementById('modalWellDepthContainer');

    function openEditModal(assessment) {
        document.getElementById('modal_farmer_name').value = assessment.farmer_name;
        document.getElementById('modal_region').value = assessment.region;
        document.getElementById('modal_latitude').value = assessment.latitude;
        document.getElementById('modal_longitude').value = assessment.longitude;
        document.getElementById('modal_land_holding_size').value = assessment.land_holding_size;
        document.getElementById('modal_crop_grown').value = assessment.crop_grown;
        document.getElementById('modal_irrigation_source').value = assessment.irrigation_source;
        document.getElementById('modal_well_depth').value = assessment.well_depth || '';

        editForm.setAttribute('action', '/assessments/' + assessment.id);
        toggleModalWellDepth();
        editModal.classList.add('active');
    }

    function closeEditModal() {
        editModal.classList.remove('active');
    }

    function toggleModalWellDepth() {
        const irrSource = document.getElementById('modal_irrigation_source').value;
        if (irrSource === 'Rainfed') {
            wellDepthContainer.style.display = 'none';
        } else {
            wellDepthContainer.style.display = '';
        }
    }

    // Map Integration
    let map;
    let markers = [];
    let aquiferOverlays = [];
    let plotPolygons = [];
    let stressGlows = [];
    const assessments = @json($assessments);

    function initMap() {
        const center = { lat: 22.5937, lng: 78.9629 }; // Centroid of India
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5,
            center: center,
            streetViewControl: false,
            styles: [
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#e9e9e9" }, { "lightness": 17 }]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#f5f5f5" }, { "lightness": 20 }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{ "color": "#ffffff" }, { "lightness": 17 }]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{ "color": "#f5f5f5" }, { "lightness": 21 }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{ "color": "#ffffff" }, { "width": 1.2 }]
                }
            ]
        });

        const infoWindow = new google.maps.InfoWindow();

        // 1. Calculate average well depth by region to build Aquifer Overlays dynamically
        const regionStats = {};
        assessments.forEach(a => {
            if (!regionStats[a.region]) {
                regionStats[a.region] = { sum: 0, count: 0, latSum: 0, lngSum: 0, validCoords: 0 };
            }
            if (a.well_depth) {
                regionStats[a.region].sum += parseFloat(a.well_depth);
                regionStats[a.region].count += 1;
            }
            const lat = parseFloat(a.latitude);
            const lng = parseFloat(a.longitude);
            if (!isNaN(lat) && !isNaN(lng)) {
                regionStats[a.region].latSum += lat;
                regionStats[a.region].lngSum += lng;
                regionStats[a.region].validCoords += 1;
            }
        });

        const regionCoords = {
            'Punjab': { lat: 31.1471, lng: 75.3412 },
            'Haryana': { lat: 29.0588, lng: 76.0856 },
            'Rajasthan': { lat: 27.0238, lng: 74.2179 },
            'Gujarat': { lat: 22.2587, lng: 71.1924 },
            'Uttar Pradesh': { lat: 26.8467, lng: 80.9462 },
            'Tamil Nadu': { lat: 11.1271, lng: 78.6569 },
            'Telangana': { lat: 18.1124, lng: 79.0193 },
            'Andhra Pradesh': { lat: 15.9129, lng: 79.7400 },
            'Karnataka': { lat: 15.3173, lng: 75.7139 },
            'Maharashtra': { lat: 19.7515, lng: 75.7139 },
            'Madhya Pradesh': { lat: 22.9734, lng: 78.6569 }
        };

        // Draw Aquifer Vulnerability Zones (Circles)
        Object.keys(regionStats).forEach(region => {
            const stats = regionStats[region];
            const avgDepth = stats.count > 0 ? (stats.sum / stats.count) : 0;
            
            let center = regionCoords[region];
            if (!center && stats.validCoords > 0) {
                center = {
                    lat: stats.latSum / stats.validCoords,
                    lng: stats.lngSum / stats.validCoords
                };
            }

            if (center && avgDepth > 0) {
                let strokeColor = '#f59e0b'; // orange
                let fillColor = '#fef3c7';
                let alertText = "Moderate Aquifer Drawdown";
                let radius = 100000; // 100km

                if (avgDepth > 45) {
                    strokeColor = '#ef4444'; // red
                    fillColor = '#fee2e2';
                    alertText = "Critical Ground Water Extraction Zone";
                    radius = 130000; // 130km
                } else if (avgDepth <= 25) {
                    strokeColor = '#10b981'; // green
                    fillColor = '#d1fae5';
                    alertText = "Safe Water Resource Status";
                    radius = 80000; // 80km
                }

                const aquiferCircle = new google.maps.Circle({
                    strokeColor: strokeColor,
                    strokeOpacity: 0.6,
                    strokeWeight: 1.5,
                    fillColor: fillColor,
                    fillOpacity: 0.15,
                    map: map,
                    center: center,
                    radius: radius
                });

                aquiferCircle.addListener('click', (event) => {
                    infoWindow.setContent(`
                        <div style="font-family: 'Plus Jakarta Sans', sans-serif; padding: 0.5rem; max-width: 220px;">
                            <h4 style="font-weight: 700; color: ${strokeColor}; margin-bottom: 0.25rem;">${region} Aquifer System</h4>
                            <p style="margin: 0; font-size: 0.85rem;"><strong>GIS Status:</strong> ${alertText}</p>
                            <p style="margin: 0; font-size: 0.85rem;"><strong>Average Well Depth:</strong> ${avgDepth.toFixed(1)}m</p>
                        </div>
                    `);
                    infoWindow.setPosition(event.latLng);
                    infoWindow.open(map);
                });

                aquiferOverlays.push(aquiferCircle);
            }
        });

        // Draw surveys, cadastral parcel lines, and crop stress glows
        assessments.forEach(a => {
            const lat = parseFloat(a.latitude);
            const lng = parseFloat(a.longitude);
            if (isNaN(lat) || isNaN(lng)) return;

            // 1. Farms Layer (Green Marker)
            const farmMarker = new google.maps.Marker({
                position: { lat, lng },
                map: map,
                title: a.farmer_name,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 7,
                    fillColor: "#10b981", // Emerald Green
                    fillOpacity: 1,
                    strokeWeight: 1,
                    strokeColor: "#047857"
                },
                customCategory: 'farm',
                data: a
            });

            // 2. Irrigation Layer (Blue Marker)
            const irrMarker = new google.maps.Marker({
                position: { lat: lat + 0.012, lng: lng + 0.012 }, // slight offset
                map: map,
                title: a.irrigation_source + " Source",
                icon: {
                    path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                    scale: 5,
                    fillColor: "#3b82f6", // Blue
                    fillOpacity: 0.9,
                    strokeWeight: 1,
                    strokeColor: "#1d4ed8"
                },
                customCategory: 'irrigation',
                data: a
            });

            markers.push(farmMarker);
            markers.push(irrMarker);

            // 3. Well Layer (Orange Marker) - only if well depth exists
            if (a.well_depth) {
                const wellMarker = new google.maps.Marker({
                    position: { lat: lat - 0.012, lng: lng - 0.012 }, // slight offset
                    map: map,
                    title: "Tube Well (" + a.well_depth + "m)",
                    icon: {
                        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                        scale: 5,
                        fillColor: "#f59e0b", // Orange
                        fillOpacity: 0.9,
                        strokeWeight: 1,
                        strokeColor: "#b45309"
                    },
                    customCategory: 'well',
                    data: a
                });
                markers.push(wellMarker);

                wellMarker.addListener('click', () => {
                    infoWindow.setContent(`
                        <div style="font-family: 'Plus Jakarta Sans', sans-serif; padding: 0.5rem;">
                            <h4 style="font-weight: 700; color: #b45309; margin-bottom: 0.25rem;">Tube Well Parameter</h4>
                            <p style="margin: 0; font-size: 0.85rem;"><strong>Owner:</strong> ${a.farmer_name}</p>
                            <p style="margin: 0; font-size: 0.85rem;"><strong>Well Depth:</strong> ${a.well_depth} Meters</p>
                            <p style="margin: 0; font-size: 0.85rem;"><strong>Region:</strong> ${a.region}</p>
                        </div>
                    `);
                    infoWindow.open(map, wellMarker);
                });
            }

            // 4. Cadastral Plot Boundary (Green polygon outline scaled by land size)
            const baseOffset = 0.002 * Math.sqrt(parseFloat(a.land_holding_size || 2.0));
            const path = [
                { lat: lat - baseOffset, lng: lng - baseOffset },
                { lat: lat + baseOffset * 0.75, lng: lng - baseOffset * 1.2 },
                { lat: lat + baseOffset * 1.15, lng: lng + baseOffset * 0.85 },
                { lat: lat - baseOffset * 0.85, lng: lng + baseOffset * 1.15 },
                { lat: lat - baseOffset, lng: lng - baseOffset }
            ];

            const plotPolygon = new google.maps.Polygon({
                paths: path,
                strokeColor: '#10b981',
                strokeOpacity: 0.7,
                strokeWeight: 1.5,
                fillColor: '#10b981',
                fillOpacity: 0.08,
                map: map
            });

            plotPolygon.addListener('click', () => {
                infoWindow.setContent(`
                    <div style="font-family: 'Plus Jakarta Sans', sans-serif; padding: 0.5rem; width: 220px;">
                        <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: var(--text-muted); display: block; margin-bottom: 0.25rem;">Cadastral Holding</span>
                        <h4 style="font-weight:700; font-size: 1rem; color:#047857; margin-bottom: 0.25rem;">Plot ID: #${a.id}</h4>
                        <p style="margin:0; font-size:0.85rem;"><strong>Owner:</strong> ${a.farmer_name}</p>
                        <p style="margin:0; font-size:0.85rem;"><strong>Holding Size:</strong> ${a.land_holding_size} Hectares</p>
                        <p style="margin:0; font-size:0.85rem;"><strong>State/Region:</strong> ${a.region}</p>
                    </div>
                `);
                infoWindow.setPosition({ lat: lat, lng: lng });
                infoWindow.open(map);
            });

            plotPolygons.push(plotPolygon);

            // 5. Crop Water-Stress Heatmap Glow (glowing radial circles on stressed crops)
            const isWaterStress = a.crop_grown === 'Paddy (Rice)' || a.crop_grown === 'Sugarcane' || (a.well_depth && a.well_depth > 40);
            if (isWaterStress) {
                let glowColor = '#f97316'; // orange glow
                let stressLevel = 'Moderate Moisture Draw';
                
                if (a.well_depth && a.well_depth > 50) {
                    glowColor = '#ef4444'; // red glow (critical)
                    stressLevel = 'Severe Hydrological Stress';
                }

                const stressGlow = new google.maps.Circle({
                    strokeWeight: 0,
                    fillColor: glowColor,
                    fillOpacity: 0.22,
                    map: map,
                    center: { lat, lng },
                    radius: 12000 // 12km stress radius
                });

                stressGlow.addListener('click', () => {
                    infoWindow.setContent(`
                        <div style="font-family: 'Plus Jakarta Sans', sans-serif; padding: 0.5rem; width: 210px;">
                            <h4 style="font-weight:700; color:${glowColor}; margin-bottom: 0.25rem;">Crop Water Stress</h4>
                            <p style="margin:0; font-size:0.85rem;"><strong>State/Region:</strong> ${a.region}</p>
                            <p style="margin:0; font-size:0.85rem;"><strong>Crop:</strong> ${a.crop_grown}</p>
                            <p style="margin:0; font-size:0.85rem;"><strong>Stress Index:</strong> ${stressLevel}</p>
                        </div>
                    `);
                    infoWindow.setPosition({ lat: lat, lng: lng });
                    infoWindow.open(map);
                });

                stressGlows.push(stressGlow);
            }

            // Click listener for details bubble
            farmMarker.addListener('click', () => {
                infoWindow.setContent(`
                    <div style="font-family: 'Plus Jakarta Sans', sans-serif; padding: 0.5rem; width: 220px;">
                        <h4 style="font-weight:700; font-size: 1rem; color:#10b981; margin-bottom: 0.5rem;">${a.farmer_name}</h4>
                        <p style="margin:0 0 0.25rem 0; font-size:0.85rem;"><strong>Crop:</strong> ${a.crop_grown}</p>
                        <p style="margin:0 0 0.25rem 0; font-size:0.85rem;"><strong>Land Area:</strong> ${a.land_holding_size} Hectares</p>
                        <p style="margin:0 0 0.25rem 0; font-size:0.85rem;"><strong>Irrigation:</strong> ${a.irrigation_source}</p>
                        <a href="/assessments/${a.id}" class="btn btn-primary" style="padding: 0.35rem 0.5rem; font-size:0.75rem; color:#fff; display:block; text-align:center; text-decoration:none; border-radius:4px;">View Recommendations</a>
                    </div>
                `);
                infoWindow.open(map, farmMarker);
            });

            irrMarker.addListener('click', () => {
                infoWindow.setContent(`
                    <div style="font-family: 'Plus Jakarta Sans', sans-serif; padding: 0.5rem;">
                        <h4 style="font-weight: 700; color: #1d4ed8; margin-bottom: 0.25rem;">Irrigation Details</h4>
                        <p style="margin: 0; font-size: 0.85rem;"><strong>Farmer:</strong> ${a.farmer_name}</p>
                        <p style="margin: 0; font-size: 0.85rem;"><strong>Source Type:</strong> ${a.irrigation_source}</p>
                    </div>
                `);
                infoWindow.open(map, irrMarker);
            });
        });
    }

    function toggleLayers() {
        const showFarms = document.getElementById('layerFarms').checked;
        const showIrr = document.getElementById('layerIrrigation').checked;
        const showWells = document.getElementById('layerWells').checked;
        const showAquifers = document.getElementById('layerAquifers').checked;
        const showPlots = document.getElementById('layerPlots').checked;
        const showStress = document.getElementById('layerStress').checked;

        markers.forEach(marker => {
            if (marker.customCategory === 'farm') {
                marker.setVisible(showFarms);
            } else if (marker.customCategory === 'irrigation') {
                marker.setVisible(showIrr);
            } else if (marker.customCategory === 'well') {
                marker.setVisible(showWells);
            }
        });

        aquiferOverlays.forEach(circle => {
            circle.setMap(showAquifers ? map : null);
        });

        plotPolygons.forEach(polygon => {
            polygon.setMap(showPlots ? map : null);
        });

        stressGlows.forEach(circle => {
            circle.setMap(showStress ? map : null);
        });
    }

    // Chart.js Implementations
    const cropAcreage = {};
    assessments.forEach(a => {
        cropAcreage[a.crop_grown] = (cropAcreage[a.crop_grown] || 0) + parseFloat(a.land_holding_size);
    });

    const irrigationCounts = {};
    assessments.forEach(a => {
        irrigationCounts[a.irrigation_source] = (irrigationCounts[a.irrigation_source] || 0) + 1;
    });

    const regionWells = {};
    assessments.forEach(a => {
        if (a.well_depth) {
            if (!regionWells[a.region]) {
                regionWells[a.region] = { sum: 0, count: 0 };
            }
            regionWells[a.region].sum += parseFloat(a.well_depth);
            regionWells[a.region].count += 1;
        }
    });
    const avgRegionWellLabels = Object.keys(regionWells);
    const avgRegionWellValues = avgRegionWellLabels.map(r => (regionWells[r].sum / regionWells[r].count).toFixed(1));

    // Render Section 2: Crop Hectares Bar Chart
    new Chart(document.getElementById('cropHectaresChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(cropAcreage),
            datasets: [{
                label: 'Cultivated Area (Hectares)',
                data: Object.values(cropAcreage),
                backgroundColor: '#10b981',
                borderColor: '#047857',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Hectares (ha)' }
                },
                x: { title: { display: true, text: 'Crop Grown' } }
            }
        }
    });

    // Render Section 3: Irrigation Doughnut Chart
    new Chart(document.getElementById('irrigationPracticeChart'), {
        type: 'doughnut',
        data: {
            labels: Object.keys(irrigationCounts),
            datasets: [{
                data: Object.values(irrigationCounts),
                backgroundColor: ['#3b82f6', '#f59e0b', '#a21caf', '#64748b', '#10b981'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    // Render Section 3: Well Depth by Region Chart
    new Chart(document.getElementById('wellDepthRegionChart'), {
        type: 'bar',
        data: {
            labels: avgRegionWellLabels,
            datasets: [{
                label: 'Average Depth (meters)',
                data: avgRegionWellValues,
                backgroundColor: '#f59e0b',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Meters (m)' }
                }
            }
        }
    });

    // Section 4: Cropping Pattern State Analyzer
    const stateSearchInput = document.getElementById('stateAnalyzerSearch');
    const emptyState = document.getElementById('analyzerEmptyState');
    const resultsPanel = document.getElementById('analyzerResults');
    const stateNameEl = document.getElementById('analyzerStateName');
    const totalFarmersEl = document.getElementById('analyzerTotalFarmers');
    const totalAcreageEl = document.getElementById('analyzerTotalAcreage');
    const avgWellEl = document.getElementById('analyzerAvgWell');
    const tableBodyEl = document.getElementById('analyzerTableBody');

    let analyzerChart = null;

    if (stateSearchInput) {
        stateSearchInput.addEventListener('input', () => {
            const val = stateSearchInput.value.toLowerCase().trim();
            const matchingAssessments = assessments.filter(a => a.region.toLowerCase() === val);

            if (matchingAssessments.length > 0) {
                emptyState.style.display = 'none';
                resultsPanel.style.display = 'block';

                stateNameEl.innerText = matchingAssessments[0].region;
                totalFarmersEl.innerText = matchingAssessments.length;

                const totalAcreage = matchingAssessments.reduce((sum, current) => sum + parseFloat(current.land_holding_size), 0);
                totalAcreageEl.innerText = totalAcreage.toFixed(1) + ' ha';

                const wells = matchingAssessments.filter(a => a.well_depth);
                if (wells.length > 0) {
                    const avgWell = wells.reduce((sum, current) => sum + parseFloat(current.well_depth), 0) / wells.length;
                    avgWellEl.innerText = avgWell.toFixed(1) + ' m';
                } else {
                    avgWellEl.innerText = 'N/A (Rainfed)';
                }

                // Render State Table
                tableBodyEl.innerHTML = '';
                matchingAssessments.forEach(a => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td><strong><a href="/assessments/${a.id}">${a.farmer_name}</a></strong></td>
                        <td>${parseFloat(a.land_holding_size).toFixed(1)} ha</td>
                        <td>${a.crop_grown}</td>
                        <td><span class="badge badge-${a.irrigation_source.toLowerCase().replace(' ', '')}">${a.irrigation_source}</span></td>
                        <td>${a.well_depth ? parseFloat(a.well_depth).toFixed(1) + ' m' : 'N/A'}</td>
                    `;
                    tableBodyEl.appendChild(tr);
                });

                // Calculate crop counts
                const cropCounts = {};
                matchingAssessments.forEach(a => {
                    cropCounts[a.crop_grown] = (cropCounts[a.crop_grown] || 0) + 1;
                });

                // Update analyzer chart
                if (analyzerChart) {
                    analyzerChart.destroy();
                }

                analyzerChart = new Chart(document.getElementById('analyzerChart'), {
                    type: 'pie',
                    data: {
                        labels: Object.keys(cropCounts),
                        datasets: [{
                            data: Object.values(cropCounts),
                            backgroundColor: ['#10b981', '#3b82f6', '#f59e0b', '#a21caf', '#64748b'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { position: 'right' } }
                    }
                });
            } else {
                emptyState.style.display = 'block';
                resultsPanel.style.display = 'none';
            }
        });
    }

    // Section 6: Macro Reports Graphs
    const stateAcreages = {};
    const stateWellDepths = {};

    assessments.forEach(a => {
        if (!stateAcreages[a.region]) {
            stateAcreages[a.region] = { sum: 0, count: 0 };
        }
        stateAcreages[a.region].sum += parseFloat(a.land_holding_size);
        stateAcreages[a.region].count += 1;

        if (a.well_depth) {
            if (!stateWellDepths[a.region]) {
                stateWellDepths[a.region] = { sum: 0, count: 0 };
            }
            stateWellDepths[a.region].sum += parseFloat(a.well_depth);
            stateWellDepths[a.region].count += 1;
        }
    });

    const avgLandStateLabels = Object.keys(stateAcreages);
    const avgLandStateValues = avgLandStateLabels.map(s => (stateAcreages[s].sum / stateAcreages[s].count).toFixed(1));

    const avgWellStateLabels = Object.keys(stateWellDepths);
    const avgWellStateValues = avgWellStateLabels.map(s => (stateWellDepths[s].sum / stateWellDepths[s].count).toFixed(1));

    // Render avgLandStateChart
    new Chart(document.getElementById('avgLandStateChart'), {
        type: 'bar',
        data: {
            labels: avgLandStateLabels,
            datasets: [{
                label: 'Average Size (ha)',
                data: avgLandStateValues,
                backgroundColor: '#10b981',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });

    // Render avgWellStateChart
    new Chart(document.getElementById('avgWellStateChart'), {
        type: 'bar',
        data: {
            labels: avgWellStateLabels,
            datasets: [{
                label: 'Average Well Depth (m)',
                data: avgWellStateValues,
                backgroundColor: '#ef4444',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });

    // CSV Exporter
    function exportCSV() {
        let csvContent = "data:text/csv;charset=utf-8,";
        csvContent += "ID,Farmer Name,State/Region,Latitude,Longitude,Land Size (ha),Irrigation Source,Cropping Pattern,Crop Grown,Well Depth (m)\n";

        assessments.forEach(a => {
            csvContent += `"${a.id}","${a.farmer_name}","${a.region}","${a.latitude}","${a.longitude}","${a.land_holding_size}","${a.irrigation_source}","${a.cropping_pattern}","${a.crop_grown}","${a.well_depth || ''}"\n`;
        });

        const encodedUri = encodeURI(csvContent);
        const link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "agrogeo_farmers_directory.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Print Preview
    function printReport() {
        window.print();
    }

    // Section 7: Planning Calculator
    function runPlanningCalculator() {
        const state = document.getElementById('calcState').value;
        const crop = document.getElementById('calcCrop').value;
        const sizeVal = document.getElementById('calcSize').value;
        const size = sizeVal ? parseFloat(sizeVal) : 2.0;

        // Crop water needs coefficients (liter water per hectare)
        const cropFactors = {
            'Paddy (Rice)': { litersPerHa: 12500000, frequency: "Continuous Flooding (8-10 periods)" },
            'Sugarcane': { litersPerHa: 15000000, frequency: "Furrow irrigation (10-12 times)" },
            'Wheat': { litersPerHa: 4500000, frequency: "Crown root initiation & 4 Sowing rounds" },
            'Cotton': { litersPerHa: 7000000, frequency: "Alternate furrow method (5-6 cycles)" },
            'Soybean': { litersPerHa: 4000000, frequency: "Sprinkler irrigation (3 crucial stages)" },
            'Mustard': { litersPerHa: 3000000, frequency: "2 Sowing irrigations (Pre-flower/Pod)" },
            'Maize': { litersPerHa: 5000000, frequency: "Furrow basin (4 crucial intervals)" }
        };

        const config = cropFactors[crop] || { litersPerHa: 5000000, frequency: "Standard 4-cycle irrigation" };
        const totalLiters = Math.round(config.litersPerHa * size);

        // Format number with commas
        const formattedLiters = totalLiters.toLocaleString() + ' Liters';

        document.getElementById('calcWaterVal').innerText = formattedLiters;
        document.getElementById('calcFreqVal').innerText = "Recommended: " + config.frequency;

        // Check if regional warning is needed (if average well depth > 50 in selected state)
        const stateWells = assessments.filter(a => a.region === state && a.well_depth);
        let showWarning = false;
        let avgDepth = 0;

        if (stateWells.length > 0) {
            const sum = stateWells.reduce((s, curr) => s + parseFloat(curr.well_depth), 0);
            avgDepth = sum / stateWells.length;
            if (avgDepth > 50) {
                showWarning = true;
            }
        }

        const warningEl = document.getElementById('calcWarningVal');
        if (showWarning) {
            warningEl.innerHTML = `⚠️ <strong>Regional Alert (${state}):</strong> Critical groundwater table detected (avg well depth: ${avgDepth.toFixed(1)}m). Use drip systems to allocate water efficiently.`;
            warningEl.style.display = 'block';
        } else {
            warningEl.style.display = 'none';
        }

        // Set policy texts dynamically based on state
        const isRainfedState = assessments.filter(a => a.region === state && a.irrigation_source === 'Rainfed').length > 0;
        
        if (showWarning) {
            document.getElementById('policySubsidyText').innerText = `Critical groundwater depletion in ${state} (avg well depth: ${avgDepth.toFixed(1)}m). We recommend restricting flood irrigation and allocating 85% subsidies for micro-irrigation systems.`;
            document.getElementById('policyInfrastructureText').innerText = `Restrict licenses for boring new deep wells in ${state}. Mandate rain water harvesting on all farms exceeding 2 hectares.`;
        } else if (isRainfedState) {
            document.getElementById('policySubsidyText').innerText = `High density of rainfed operations found in ${state}. Prioritize government-funded farm pond subsidies and check-dam structures to secure monsoon runoff.`;
            document.getElementById('policyInfrastructureText').innerText = `Provide rainfed seeds (millets, pulses) as crop-switching incentives to mitigate rainfall dependency risks.`;
        } else {
            document.getElementById('policySubsidyText').innerText = `Maintain standard irrigation patterns in ${state}. Subsidize high-quality fertilizers and crop health kits for smallholders.`;
            document.getElementById('policyInfrastructureText').innerText = `Focus infrastructure budgets on rural concrete canal linings to prevent leakage and salinization in low lying sectors.`;
        }
    }

    // Monsoon Deficit & Drought Contingency Simulator Engine
    function runDroughtSimulator() {
        const deficit = parseInt(document.getElementById('simDeficitRange').value);
        const state = document.getElementById('simState').value;
        const crop = document.getElementById('simBaselineCrop').value;

        // Update range label
        const deficitValEl = document.getElementById('simDeficitVal');
        let severity = "Normal Monsoon";
        let labelColor = "#10b981"; // green
        let labelBg = "#d1fae5";

        if (deficit > 0 && deficit <= 15) {
            severity = "Mild Moisture Stress";
            labelColor = "#d97706"; // orange
            labelBg = "#fef3c7";
        } else if (deficit > 15 && deficit <= 30) {
            severity = "Moderate Drought Deficit";
            labelColor = "#ea580c"; // deep orange
            labelBg = "#ffedd5";
        } else if (deficit > 30) {
            severity = "Severe Drought Alert";
            labelColor = "#dc2626"; // red
            labelBg = "#fee2e2";
        }

        deficitValEl.innerText = `${deficit}% (${severity})`;
        deficitValEl.style.color = labelColor;
        deficitValEl.style.backgroundColor = labelBg;

        // Find state parameters
        const stateWells = assessments.filter(a => a.region === state && a.well_depth);
        let avgWellDepth = 15.0; // baseline
        if (stateWells.length > 0) {
            const sum = stateWells.reduce((s, curr) => s + parseFloat(curr.well_depth), 0);
            avgWellDepth = sum / stateWells.length;
        }

        // Calculate Aquifer Stress Index (0-100%)
        const baseStress = Math.min(80, (avgWellDepth / 120) * 100);
        const simulatedStress = Math.round(baseStress + (deficit * 1.5));
        const finalStress = Math.min(100, Math.max(10, simulatedStress));

        const stressValEl = document.getElementById('simStressVal');
        const progressEl = document.getElementById('simStressProgress');
        const alertEl = document.getElementById('simAlertBadge');
        const contingencyBox = document.getElementById('droughtContingencyOutput');

        // Update stress elements
        let stressClass = "Stable";
        let progressBg = "#10b981"; // green
        let alertText = "✅ Sufficient aquifer storage for standard irrigation cycles.";
        let alertBg = "#d1fae5";
        let alertColor = "#065f46";

        if (finalStress > 35 && finalStress <= 65) {
            stressClass = "Moderate Stress";
            progressBg = "#f59e0b"; // yellow/orange
            alertText = "⚠️ Aquifer under moderate pressure. Monitor well telemetry closely.";
            alertBg = "#fef3c7";
            alertColor = "#92400e";
        } else if (finalStress > 65) {
            stressClass = "Critical Drawdown Risk";
            progressBg = "#ef4444"; // red
            alertText = "🚨 Aquifer depletion hazard. Immediate water rationing mandated!";
            alertBg = "#fee2e2";
            alertColor = "#991b1b";
        }

        stressValEl.innerText = `${stressClass} (${finalStress}%)`;
        stressValEl.style.color = progressBg;
        progressEl.style.width = `${finalStress}%`;
        progressEl.style.backgroundColor = progressBg;
        alertEl.innerText = alertText;
        alertEl.style.backgroundColor = alertBg;
        alertEl.style.color = alertColor;

        // Show contingency panel if deficit > 10
        if (deficit > 10) {
            contingencyBox.style.display = 'block';

            // Determine alternate crop suggestions
            let cropAlternative = "";
            let rationingText = "";

            if (crop === 'Paddy (Rice)' || crop === 'Sugarcane') {
                cropAlternative = `Transition immediately from water-intensive **${crop}** to **Pearl Millet (Bajra)** or **Sorghum (Jowar)**. This shifts local water requirement from ${crop === 'Paddy (Rice)' ? '12.5M' : '15M'} liters/ha to less than **3.5M liters/ha** (saving over 70% of groundwater reserves).`;
                rationingText = `Cease all flood-basin irrigation on **${state}** fields. Mandate localized drip-lines restricted to early mornings. Limit tube well operations to a maximum of **2 hours daily** per cadastral holding.`;
            } else if (crop === 'Wheat' || crop === 'Cotton') {
                cropAlternative = `Switch from **${crop}** to low-water **Chickpeas (Gram)** or **Mustard**. These crops require only **2-3 crucial sowings** instead of deep cycles, preserving critical soil moisture levels.`;
                rationingText = `Apply organic mulching on fields to prevent direct soil evaporation. Limit borewell running in **${state}** to alternate days. Direct community canal releases to survival watering only.`;
            } else {
                cropAlternative = `Substitute standard **${crop}** with ultra-short duration **Moong Pulses** or **Cluster Beans**. These nitrogen-fixing legumes survive extreme dry spells and mature within 65 days.`;
                rationingText = `Utilize community farm ponds and harvested rainwater runoffs for emergency irrigation. Strictly prohibit digging of new deep wells in all sectors of **${state}**.`;
            }

            document.getElementById('simContingencySeeds').innerHTML = cropAlternative;
            document.getElementById('simContingencyRationing').innerHTML = rationingText;
        } else {
            contingencyBox.style.display = 'none';
        }
    }

    // Run calculator on initial load
    document.addEventListener('DOMContentLoaded', () => {
        runPlanningCalculator();
        runDroughtSimulator();
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
@endpush
