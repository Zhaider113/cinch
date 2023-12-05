<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function ride_post()
    {
        return $this->belongsTo('App\Models\RidePost', 'ride_post_id', 'id');
    }

    protected $hidden = ['created_at', 'updated_at'];
}
