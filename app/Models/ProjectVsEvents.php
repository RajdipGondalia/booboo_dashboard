<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;
use App\Models\User;

class ProjectVsEvents extends Model
{
    protected $table = 'project_vs_events';
    use HasFactory;
    protected $fillable = ['title'];
    public function user_details(){
        return $this->belongsTo(User::class,'user_id');
    }
}
