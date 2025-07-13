<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecializationInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'skill',
        'self',
        'job',
        'educational',
        'professional_training',
        'ntvqf',
        'status',
    ];
}
