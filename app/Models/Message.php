<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $hidden = ['created_at', 'updated_at'];
    
    public function getMediaAttribute($value)
    {
        if($value != "" || !empty($value))
        {
            $value = url('/').'/'.$value;
            return $value;
        }        
    }

}
