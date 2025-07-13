<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class SaveJob extends Model
{
    public function job(){
        return $this->belongsTo(Job::class,'job_id');
    }
}
