<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientMaster;
use App\Models\User;

class Project extends Model
{
    protected $table = 'project';
    use HasFactory;

    public function client_name(){
        return $this->belongsTo(ClientMaster::class,'client_id');
    }
    public function user_name(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function project_manager_name(){
        return $this->belongsTo(User::class,'project_manager');
    }
    
}
