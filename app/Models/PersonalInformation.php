<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalInformation extends Model
{
    use HasFactory;

    protected  $fillable  = [
        'user_id',
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'date_of_birth',
        'gender',
        'marital_status',
        'nationality',
        'religion',
        'national_Id',
        'mobile',
        'email',
        'blood_group',
        'height',
        'weight',
        'present_address_country',
        'present_address_district',
        'present_address_area',
        'same_as_address',
        'permanent_address_country',
        'permanent_address_district',
        'permanent_address_area',
        'status',
    ];

    public function countrypre()
    {
        return $this->belongsTo(Country::class,'present_address_country');
    }

    public function districtpre()
    {
        return $this->belongsTo(District::class,'present_address_district');
    }
    public function countrypar()
    {
        return $this->belongsTo(Country::class,'permanent_address_country');
    }

    public function districtpar()
    {
        return $this->belongsTo(District::class,'permanent_address_district');
    }
}
