<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Leave extends Model
{
    protected $table = 'leave';
    use HasFactory;

    public function user_name(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function person_name(){
        return $this->belongsTo(User::class,'leave_user_id');
    }
}
