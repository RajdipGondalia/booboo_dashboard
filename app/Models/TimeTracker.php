<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TimeTracker extends Model
{
    protected $table = 'time_tracker';
    use HasFactory;
    public function user_name(){
        return $this->belongsTo(User::class,'user_id');
        
    }
}
