<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Agenda extends Model
{
    use HasFactory, sluggable;

    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
       return 'slug';
    }
 
    public function sluggable(): array
    {
       return [
          'slug' => [
             'source' => 'activity'
          ]
       ];
    }
}
