<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    
    public function categories() {
        return $this->belongsToMany(category::class)->withTimestamps();
    }   

    public function lunch_lowest_price() {
        return $this->belongsTo(Lunch_lowest_price::class)->withTimestamps();
    }
}
