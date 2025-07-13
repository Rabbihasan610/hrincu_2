<?php

namespace App\Models;

use App\Traits\LangDb;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory, LangDb;

    protected $table = 'job_categories';

    /**
     * The jobs that belong to the JobCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs(){
        return $this->hasMany('App\Models\Job');
    }

}
