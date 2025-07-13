<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedResume extends Model
{
    use HasFactory;

    public function job(){
        return $this->belongsTo('App\Models\Job');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }


    public function resume(){
        return $this->belongsTo('App\Models\Resume');
    }

}
