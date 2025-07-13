<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'designation',
        'organization',
        'email',
        'relation',
        'mobile',
        'address',
        'status',
    ];
}
