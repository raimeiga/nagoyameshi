<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//お気に入りされる（今回のケースでは店舗Restaurant）モデルにuse Favoriteableとすることで、お気に入り機能を使える
use Overtrue\LaravelFavorite\Traits\Favoriteable;  
// ↓ ソート機能を使えるようになる宣言
use Kyslik\ColumnSortable\Sortable;

class Restaurant extends Model
{                 // ↓ Favoriteableを記述することで、お気に入りと店舗が紐づく
    use HasFactory, Favoriteable, Sortable;

    public function categories() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }   

    public function reviews()
     {
         return $this->hasMany(Review::class);
     }

}
