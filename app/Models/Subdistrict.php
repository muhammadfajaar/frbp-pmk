<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function disaster()
    {
        return $this->hasMany(Subdistrict::class);
    }
}
