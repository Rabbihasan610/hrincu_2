<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateCategory extends Model
{
    use HasFactory, Searchable, LangDb;

    protected $table = 'candidate_categories';

    protected $guarded = ['id'];
}
