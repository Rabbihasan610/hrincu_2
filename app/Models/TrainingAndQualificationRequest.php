<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingAndQualificationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'city_id',
        'industry_sector',
        'full_name_applicant',
        'email_number',
        'mobile_number',
        'requested_services',
        'target_group',
        'expected_participants',
        'training_format',
        'suggested_duration',
        'preferred_training_language',
        'expected_start_date',
        'additional_notes',
    ];
    
    protected $casts = [
        'requested_services' => 'array', 
        'expected_start_date' => 'date',
        'suggested_duration' => 'boolean',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
