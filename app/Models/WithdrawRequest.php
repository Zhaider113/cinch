<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    use HasFactory;

    public function withDrawRequest()
    {
        return $this->belongsTo(User::class, 'user_id'); // Assuming the foreign key is 'event_id'
    }
}
