<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Gallery extends Model
{
   use HasFactory, Sluggable;

   protected $guarded = ['id'];

   protected $with = ['galleryCategory', 'author'];

   public function galleryCategory()
   {
      return $this->belongsTo(GalleryCategory::class);
   }

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
            'source' => 'description'
         ]
      ];
   }
}
