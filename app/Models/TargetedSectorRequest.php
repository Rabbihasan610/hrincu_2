<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetedSectorRequest extends Model
{
    use HasFactory;


    protected $fillable = [
        'organization_name',
        'city_id',
        'business_type_sector',
        'marital_status',
        'mobile_number',
        'city_region',
        'email_address',
        'current_occupation',
        'average_monthly_income',
        'requested_services',
        'description_of_need',
        'expected_timeframe',
        'preferred_communication_method',
        'status',
    ];

    protected $casts = [
        'requested_services' => 'array',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }


    public function cityRegion()
    {
        return $this->belongsTo(City::class, 'city_region', 'id');
    }
}
