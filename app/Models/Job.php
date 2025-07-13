<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory, Searchable, LangDb;

    protected $table = 'jobs';

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function category(){
        return $this->belongsTo('App\Models\JobCategory', 'job_category_id');
    }

    public function appliedJobs(){
        return $this->hasMany('App\Models\JobApplier');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    /**
     * The saved job that belongs to the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function savedJob(){
        return $this->hasOne('App\Models\SavedJob');
    }

}
