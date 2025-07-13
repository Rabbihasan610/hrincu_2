<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Country;
use App\Constants\Status;
use App\Models\JobApplier;
use App\Traits\Searchable;
use App\Traits\UserNotify;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\SaveJob;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Searchable,UserNotify;

    protected $table = 'users';

    protected $fillable = [
        "password",
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'address' => 'object',
        'ver_code_send_at' => 'datetime'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function scopeBanned($query)
    {
        return $query->where('status', Status::USER_BAN);
    }

    public function scopeEmailUnverified($query)
    {
        return $query->where('ev', Status::UNVERIFIED);
    }

    public function scopeMobileUnverified($query)
    {
        return $query->where('sv', Status::UNVERIFIED);
    }

    public function scopeEmailVerified($query)
    {
        return $query->where('ev', Status::VERIFIED);
    }

    public function scopeMobileVerified($query)
    {
        return $query->where('sv', Status::VERIFIED);
    }

    public function scopeActive($query)
    {
        return $query->where('status', Status::USER_ACTIVE)->where('ev',Status::VERIFIED)->where('sv',Status::VERIFIED);
    }


    public function scopeisProvider()
    {
        return $this->where('is_provider', 1);
    }

    public function appliedJobs($job_id)
    {
        return JobApplier::where('job_id', $job_id)->where('user_id', $this->id)->first();
    }


    public function savedJob($job_id)
    {
        return SaveJob::where('job_id', $job_id)->where('user_id', $this->id)->first();
    }

}
