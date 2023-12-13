<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//お気に入りされる（今回のケースでは店舗Restaurant）モデルにuse Favoriteableとすることで、お気に入り機能を使える
use Overtrue\LaravelFavorite\Traits\Favoriteable;  

class Restaurant extends Model
{
    use HasFactory, Favoriteable;

    public function categories() {
        return $this->belongsToMany(category::class)->withTimestamps();
    }   

    public function reviews()
     {
         return $this->hasMany(Review::class);
     }

}
