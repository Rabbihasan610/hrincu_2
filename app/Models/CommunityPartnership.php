<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommunityPartnership extends Model
{
    use HasFactory, Searchable, LangDb;

    protected $guarded = ['id'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
