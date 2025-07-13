<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'our_service_id',
        'organization_name',
        'additional_notes',
        'form_data',
        'status',
    ];

    protected $casts = [
        'form_data' => 'array',
    ];

    public function ourService()
    {
        return $this->belongsTo(OurService::class);
    }
}
