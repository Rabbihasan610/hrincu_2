<?php

namespace App\Models;

use App\Models\Degree;
use App\Models\Result;
use App\Models\EducationLavel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicSummery extends Model
{
    use HasFactory;

    protected  $fillable =[
        'education_lavels_id',
        'degrees_id',
        'group',
        'user_id',
        'foreign_institute',
        'institute_name',
        'result_id',
        'gpa',
        'year_of_passing',
        'duration_start',
        'duration_end',
        'status',
        'out_of',
    ];

    public function educationLavels()
    {
        return $this->belongsTo(EducationLavel::class,'education_lavels_id');
    }
    public function degree()
    {
        return $this->belongsTo(Degree::class,'degrees_id');
    }
    /**
     * Belongs To relationship with Result model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function result()
    {
        return $this->belongsTo(Result::class,'result_id');
    }
}
