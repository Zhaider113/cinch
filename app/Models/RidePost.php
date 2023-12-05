<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RidePost extends Model
{
    use HasFactory;

    protected $table = "ride_posts";

    protected $hidden = ['created_at', 'updated_at'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function pickup_points(){
        return $this->hasMany(PickupPoint::class);
    }

    public function event()
    {
        return $this->belongsTo(event::class, 'event_id'); // Assuming the foreign key is 'event_id'
    }
}
