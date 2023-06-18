<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disaster extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function disasterCategory()
    {
        return $this->belongsTo(DisasterCategory::class);
    }

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }
    
}
