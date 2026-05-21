<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Assessment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssessmentShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_assessment_details_page_renders_with_tabs(): void
    {
        // 1. Create a user
        $user = User::factory()->create();

        // 2. Create an assessment record
        $assessment = Assessment::create([
            'farmer_name' => 'Ram Singh',
            'region' => 'Punjab',
            'latitude' => 30.9010,
            'longitude' => 75.8573,
            'land_holding_size' => 4.5,
            'irrigation_source' => 'Tube Well',
            'cropping_pattern' => 'Rabi',
            'crop_grown' => 'Wheat',
            'well_depth' => 85,
        ]);

        // 3. Act as the user and request the show route
        $response = $this->actingAs($user)->get(route('assessments.show', $assessment));

        // 4. Assert response status is successful
        $response->assertStatus(200);

        // 5. Assert the tab buttons and specific redesigned elements are present
        $response->assertSee('Submission Info');
        $response->assertSee('AI Smart Improvements');
        $response->assertSee('Crop Prediction');
        $response->assertSee('Weather Forecast');
        $response->assertSee('Punjab');
        $response->assertSee('Ram Singh');
        $response->assertSee('85 Meters');
        $response->assertSee('Tube Well');
    }
}
