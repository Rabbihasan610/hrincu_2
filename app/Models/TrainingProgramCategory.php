<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Constants\Status;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingProgramCategory extends Model
{
    use HasFactory, LangDb, Searchable;

    protected $fillable = [
        'title', 'title_ar','status'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', Status::ACTIVE);
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'title', 'title_ar', 'status');
    }
}
