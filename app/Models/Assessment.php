<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'farmer_name',
        'region',
        'latitude',
        'longitude',
        'land_holding_size',
        'irrigation_source',
        'cropping_pattern',
        'crop_grown',
        'well_depth'
    ];
}
