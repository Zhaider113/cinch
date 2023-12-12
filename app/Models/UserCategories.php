<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategories extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
}
