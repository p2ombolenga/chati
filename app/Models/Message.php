<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    use HasFactory;

    public function countMessages(User $user){
        return Message::where('user_id', $user)->count();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
