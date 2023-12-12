<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";

    protected $hidden = ['created_at', 'updated_at'];

    public function categoryTips()
    {
        return $this->hasMany(CategoryTip::class);
    }
    public function foodCategory()
    {
        return $this->hasMany(FoodCategory::class);
    }
    public function userCategory()
    {
        return $this->hasMany(UserCategories::class);
    }

}
