<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisasterCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function disasters()
    {
        return $this->hasMany(Disaster::class);
    }
}
