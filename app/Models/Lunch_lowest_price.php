<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lunch_lowest_price extends Model
{
    use HasFactory;

    public function restaurants() {
        return $this->hasMany(Restaurant::class)->withTimestamps();
    }
}
