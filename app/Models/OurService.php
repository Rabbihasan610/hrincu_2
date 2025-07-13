<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\LangDB;
use App\Traits\Searchable;


class OurService extends Model
{
    use HasFactory, LangDB, Searchable;

    protected $fillable = [
       "title",
       "title_ar",
       "icon",
       "slug",
       "status",
       "form_extra_fields",
       "items"
    ];


    protected $casts = [
        'form_extra_fields' => 'array',
        'items' => 'array'
    ];

}
