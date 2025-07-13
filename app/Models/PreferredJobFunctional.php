<?php

namespace App\Models;

use App\Models\PreferredJobInformation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreferredJobFunctional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];


}
