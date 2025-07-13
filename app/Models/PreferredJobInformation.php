<?php

namespace App\Models;

use App\Models\PreferredJobFunctional;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreferredJobInformation extends Model
{
    use HasFactory;

    protected $casts = [
        'preferred_job_functional' => 'json',
        'preferred_job_special_skill' => 'json',
    ];

    protected $fillable = [
        'user_id',
        'preferred_job_functional',
        'preferred_job_special_skill',
        'job_location',
        'organization_type',
        'status',
    ];



    public function functionl_info()
    {
        return $this->belongsTo(PreferredJobFunctional::class,'preferred_job_functional');
    }


}
