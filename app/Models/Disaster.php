<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Disaster extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function disasterCategory()
    {
        return $this->belongsTo(DisasterCategory::class);
    }

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'penyebab'
            ]
        ];
    }
}
