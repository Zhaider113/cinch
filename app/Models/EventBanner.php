<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBanner extends Model
{
    use HasFactory;
    
    protected $table = "event_banners";

    public function getEventBannerAttribute($value)
    {
        return url('/').'/'.$value;
    }
}
