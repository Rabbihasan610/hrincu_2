<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainigApply extends Model
{
    use HasFactory, LangDb, Searchable;

    protected $table = 'trainig_applies';

    public function trainingpath()
    {
        return $this->belongsTo(TrainingPath::class, 'training_path_id');
    }
}
