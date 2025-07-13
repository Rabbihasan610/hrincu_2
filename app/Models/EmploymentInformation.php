<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_name',
        'company_business',
        'designation',
        'department',
        'employment_period_start',
        'employment_period_end',
        'responsibilities',
        'company_location',
        'currently_working',
        'status',
    ];
}

