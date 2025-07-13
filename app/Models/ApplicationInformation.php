<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationInformation extends Model
{
    use HasFactory;

    protected  $fillable  =[
        'user_id',
        'objective',
        'present_salary',
        'expected_salary',
        'job_level',
        'available_for',
        'functional_id',
        'special_skills_id',
        'inside_soudi',
        'outside_saudi',
        'preferred_organization_type',
        'career_summary',
        'special_qualification',
        'keywords',
        'difficulty_to_See',
        'difficulty_to_hear',
        'difficulty_to_remember',
        'difficulty_to_sit_stand',
        'difficulty_to_Communicate',
        'difficulty_of_taking',
        'status',
    ];
}
