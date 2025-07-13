<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'Language',
        'reading',
        'writing',
        'speaking',
        'status',
    ];
}
