<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = "notifications";
    protected $hidden = ['created_at', 'updated_at'];

    function getNotificationTimeAttribute($value)
    {
        return json_decode($value);        
    }
}