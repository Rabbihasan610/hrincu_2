<?php

namespace App\Models;

use App\Traits\LangDb;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorRequest extends Model
{
    use HasFactory, LangDb, Searchable;

    protected $table = 'sector_requests';

    public function sector()
    {
        return $this->belongsTo(Sectors::class, 'sector_id');
    }
}
