<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holiday';
    use HasFactory;

    public function user_name(){
        return $this->belongsTo(User::class,'user_id');
    }
}
