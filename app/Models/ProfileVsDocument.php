<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ProfileVsDocument extends Model
{
    use HasFactory;
    protected $table = 'profile_vs_document';
    use HasFactory;

    public function user_details(){
        return $this->belongsTo(User::class,'user_id');
    }
}
