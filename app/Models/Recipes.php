<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;
    
    public function foods()
    {
        return $this->belongsTo('App\Models\FoodCategory', 'food_id', 'id');
    }
}
