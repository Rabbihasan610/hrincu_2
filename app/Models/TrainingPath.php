<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TrainingProgramCategory;
use App\Models\User;

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

    public function trainingProgramCategory(){
        return $this->belongsTo(TrainingProgramCategory::class, 'training_program_category_id');
    }

    public function enrolments(){
        return $this->hasMany(TrainigApply::class, 'training_path_id');
    }
}
