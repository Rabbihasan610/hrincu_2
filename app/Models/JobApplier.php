<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplier extends Model
{
    use HasFactory;

    protected $table = 'job_appliers';

    protected $guarded = ['id'];

    public function job(){
        return $this->belongsTo(Job::class,'job_id');

    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }


    public function resume(){
        return $this->belongsTo('App\Models\Resume');
    }
}
