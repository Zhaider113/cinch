<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVehicle extends Model
{
    use HasFactory;

    protected $table = 'user_vehicles';

    protected $hidden = ['created_at', 'updated_at'];    
}
