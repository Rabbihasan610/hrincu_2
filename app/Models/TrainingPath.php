<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingPath extends Model
{
    use HasFactory, Searchable, LangDb;

    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'title', 'title_ar', 'status');
    }

    public function creator(){
        return $this->belongsTo(User::class, 'created_by');
    }

}
