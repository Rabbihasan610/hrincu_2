<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraningInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'training_title',
        'country',
        'topics_covered',
        'training_year',
        'institute',
        'duration',
        'Location',
        'status',
    ];
}
