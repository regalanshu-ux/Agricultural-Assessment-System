<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = \App\Models\Assessment::all();
        return view('assessments.index', compact('assessments'));
    }

    public function create()
    {
        return view('assessments.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'farmer_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        // Auto-generate the rest of the details based on region/coordinates for demonstration
        $isNorth = $validated['latitude'] > 24;
        
        $validated['land_holding_size'] = rand(10, 100) / 10; // 1.0 to 10.0 hectares
        
        $irrigationSources = ['Canal', 'Tube Well', 'Tank', 'Rainfed', 'River'];
        // Bias irrigation based on latitude
        if ($isNorth) {
            $validated['irrigation_source'] = (rand(1, 10) > 3) ? 'Canal' : 'Tube Well';
        } else {
            $validated['irrigation_source'] = $irrigationSources[array_rand($irrigationSources)];
        }

        $patterns = ['Kharif', 'Rabi', 'Zaid', 'Mixed', 'Plantation'];
        $validated['cropping_pattern'] = $patterns[array_rand($patterns)];

        $cropMapping = [
            'Kharif' => ['Paddy (Rice)', 'Soybean', 'Cotton', 'Maize', 'Pearl Millet (Bajra)'],
            'Rabi' => ['Wheat', 'Mustard', 'Gram (Chana)', 'Barley'],
            'Zaid' => ['Watermelon', 'Cucumber', 'Moong Dal'],
            'Mixed' => ['Sugarcane', 'Pulses', 'Oilseeds'],
            'Plantation' => ['Coffee', 'Tea', 'Rubber']
        ];
        $patternCrops = $cropMapping[$validated['cropping_pattern']];
        $validated['crop_grown'] = $patternCrops[array_rand($patternCrops)];
        
        if ($validated['irrigation_source'] === 'Tube Well') {
            $validated['well_depth'] = rand(30, 150); // Deep well
        } elseif ($validated['irrigation_source'] === 'Rainfed') {
            $validated['well_depth'] = null; // No well
        } else {
            $validated['well_depth'] = rand(10, 50); // Shallow or null
        }

        $assessment = \App\Models\Assessment::create($validated);

        return redirect()->route('assessments.show', $assessment)->with('success', 'Assessment record created successfully!');
    }

    public function show(\App\Models\Assessment $assessment)
    {
        $suggestions = $this->generateSuggestions($assessment);
        $cropPrediction = $this->generateCropPrediction($assessment);
        $weatherForecast = $this->generateWeatherForecast($assessment);
        
        return view('assessments.show', compact('assessment', 'suggestions', 'cropPrediction', 'weatherForecast'));
    }

    private function generateCropPrediction($assessment)
    {
        $currentMonth = date('n'); // 1-12
        $predictions = [];

        // Simple mock logic based on current season/month and irrigation
        if ($currentMonth >= 6 && $currentMonth <= 9) {
            // Monsoon/Kharif season
            if ($assessment->irrigation_source === 'Rainfed') {
                $predictions = ['Pearl Millet (Bajra)', 'Sorghum (Jowar)', 'Pigeon Pea (Tur)'];
            } else {
                $predictions = ['Paddy (Rice)', 'Soybean', 'Cotton', 'Maize'];
            }
            $season = "Kharif (Monsoon)";
        } elseif ($currentMonth >= 10 || $currentMonth <= 3) {
            // Winter/Rabi season
            if ($assessment->irrigation_source === 'Canal' || $assessment->irrigation_source === 'Tube Well') {
                $predictions = ['Wheat', 'Mustard', 'Gram (Chana)', 'Barley'];
            } else {
                $predictions = ['Chickpea', 'Lentil', 'Linseed'];
            }
            $season = "Rabi (Winter)";
        } else {
            // Summer/Zaid season
            if ($assessment->irrigation_source !== 'Rainfed') {
                $predictions = ['Watermelon', 'Cucumber', 'Moong Dal', 'Fodder crops'];
            } else {
                $predictions = ['Fallow (Leave land to rest)', 'Green Manure (Dhaincha)'];
            }
            $season = "Zaid (Summer)";
        }

        return [
            'season' => $season,
            'crops' => $predictions,
            'confidence' => rand(80, 95) . '%'
        ];
    }

    private function generateWeatherForecast($assessment)
    {
        // Mock a 30-day weather forecast summary based on region/latitude roughly
        $isNorth = $assessment->latitude > 24;
        $currentMonth = date('n');

        $condition = 'Partly Cloudy';
        $tempRange = '25°C - 35°C';
        $rainfall = 'Moderate';
        $advisory = 'Standard irrigation required.';

        if ($currentMonth >= 6 && $currentMonth <= 9) {
            $condition = 'Heavy Rain / Thunderstorms';
            $tempRange = '24°C - 32°C';
            $rainfall = 'High (150mm - 300mm)';
            $advisory = 'Ensure adequate drainage to prevent waterlogging. Delay fertilizer application until dry spells.';
        } elseif ($currentMonth >= 11 || $currentMonth <= 2) {
            if ($isNorth) {
                $condition = 'Cold & Foggy';
                $tempRange = '5°C - 20°C';
                $advisory = 'Protect sensitive crops from frost. Apply light irrigation during cold waves.';
            } else {
                $condition = 'Clear & Pleasant';
                $tempRange = '18°C - 30°C';
            }
            $rainfall = 'Low (<20mm)';
        } elseif ($currentMonth >= 3 && $currentMonth <= 5) {
            $condition = 'Sunny & Hot';
            $tempRange = '30°C - 45°C';
            $rainfall = 'Very Low';
            $advisory = 'High evaporation rates expected. Increase irrigation frequency. Mulching recommended.';
        }

        return [
            'condition' => $condition,
            'temperature' => $tempRange,
            'rainfall' => $rainfall,
            'advisory' => $advisory
        ];
    }

    private function generateSuggestions($assessment)
    {
        $suggestions = [];

        // Irrigation based suggestions
        if ($assessment->irrigation_source === 'Rainfed') {
            $suggestions[] = 'Implement rainwater harvesting structures like farm ponds to capture monsoon runoff.';
            $suggestions[] = 'Consider cultivating drought-resistant crop varieties to minimize water stress risk.';
        } elseif ($assessment->irrigation_source === 'Tube Well' && $assessment->well_depth > 50) {
            $suggestions[] = 'Groundwater levels appear deep. Transition to micro-irrigation systems (drip/sprinkler) to maximize water use efficiency.';
        } elseif ($assessment->irrigation_source === 'Canal') {
            $suggestions[] = 'Ensure proper field leveling and consider furrow irrigation to prevent waterlogging and soil salinization.';
        }

        // Land holding based suggestions
        if ($assessment->land_holding_size < 2.0) {
            $suggestions[] = 'For marginal/small holdings, consider high-value crops (vegetables, floriculture) or integrated farming (crop + livestock) to boost income per hectare.';
            $suggestions[] = 'Join a Farmer Producer Organization (FPO) for better bargaining power in purchasing inputs and selling produce.';
        } elseif ($assessment->land_holding_size > 10.0) {
            $suggestions[] = 'Leverage economies of scale by adopting precision agriculture technologies and farm mechanization.';
        }

        // Cropping pattern based suggestions
        if ($assessment->cropping_pattern === 'Mixed') {
            $suggestions[] = 'Excellent choice for risk mitigation. Ensure proper crop rotation incorporating leguminous crops to naturally restore soil nitrogen.';
        } elseif ($assessment->cropping_pattern === 'Kharif' || $assessment->cropping_pattern === 'Rabi') {
            $suggestions[] = 'Consider adding a short-duration Zaid (summer) crop or green manure to keep the soil covered and productive year-round.';
        }

        // Default suggestion if none trigger
        if (empty($suggestions)) {
            $suggestions[] = 'Regularly test soil health (macronutrients and pH) to optimize fertilizer application.';
            $suggestions[] = 'Stay updated with local meteorological advisories for timely sowing and harvesting.';
        }

        return $suggestions;
    }

    public function update(Request $request, \App\Models\Assessment $assessment)
    {
        $validated = $request->validate([
            'farmer_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'land_holding_size' => 'required|numeric|min:0.1',
            'crop_grown' => 'required|string|max:255',
            'irrigation_source' => 'required|string|max:255',
            'well_depth' => 'nullable|numeric|min:0',
        ]);

        // Auto-assign appropriate cropping pattern based on crop
        $cropLower = strtolower($validated['crop_grown']);
        if (str_contains($cropLower, 'wheat') || str_contains($cropLower, 'mustard') || str_contains($cropLower, 'gram') || str_contains($cropLower, 'barley')) {
            $validated['cropping_pattern'] = 'Rabi';
        } elseif (str_contains($cropLower, 'paddy') || str_contains($cropLower, 'rice') || str_contains($cropLower, 'soybean') || str_contains($cropLower, 'cotton') || str_contains($cropLower, 'millet') || str_contains($cropLower, 'bajra')) {
            $validated['cropping_pattern'] = 'Kharif';
        } elseif (str_contains($cropLower, 'watermelon') || str_contains($cropLower, 'cucumber') || str_contains($cropLower, 'moong')) {
            $validated['cropping_pattern'] = 'Zaid';
        } elseif (str_contains($cropLower, 'sugarcane') || str_contains($cropLower, 'pulse') || str_contains($cropLower, 'oilseed')) {
            $validated['cropping_pattern'] = 'Mixed';
        } elseif (str_contains($cropLower, 'coffee') || str_contains($cropLower, 'tea') || str_contains($cropLower, 'rubber')) {
            $validated['cropping_pattern'] = 'Plantation';
        } else {
            $validated['cropping_pattern'] = $assessment->cropping_pattern; // keep original if unknown
        }

        // Set well depth to null if rainfed
        if ($validated['irrigation_source'] === 'Rainfed') {
            $validated['well_depth'] = null;
        }

        $assessment->update($validated);

        return redirect()->route('assessments.index')->with('success', 'Farmer details updated successfully!');
    }

    public function destroy(\App\Models\Assessment $assessment)
    {
        $assessment->delete();
        return redirect()->route('assessments.index')->with('success', 'Farmer record deleted successfully!');
    }
}
