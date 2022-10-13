<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportantNote extends Model
{
    protected $table = 'important_note';
    use HasFactory;

    public function user_name(){
        return $this->belongsTo(User::class,'user_id');
    }
}
