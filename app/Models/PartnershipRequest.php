<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipRequest extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'partnership_requests';

    // Specify the fillable attributes that can be mass assigned
    protected $fillable = [
        'organization_name',
        'organization_type',
        'representative_name',
        'job_title',
        'email_number',
        'mobile_number',
        'objectives', // Make sure this is fillable
        'project_description',
        'partnership_duration',
        'additional_notes',
    ];

    // If you're using a JSON column for 'objectives', you might want to cast it
    protected $casts = [
        'objectives' => 'array', // This will automatically convert JSON to array and vice-versa
    ];
}