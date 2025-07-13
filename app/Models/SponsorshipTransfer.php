<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorshipTransfer extends Model
{
    use HasFactory, LangDb, Searchable;

    protected $guarded = [];
}
