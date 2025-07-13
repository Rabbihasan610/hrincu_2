<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalCertification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certification',
        'institute',
        'Location',
        'duration_start',
        'duration_end',
        'status',
    ];
}
