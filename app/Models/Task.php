<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;

class Task extends Model
{
    protected $table = 'task';
    use HasFactory;

    public function user_name(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function task_start_name(){
        return $this->belongsTo(User::class,'start_by');
    }
    public function task_stop_name(){
        return $this->belongsTo(User::class,'stop_by');
    }
    public function assign_to_name(){
        return $this->belongsTo(User::class,'assign_to');
    }
    public function project_name(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
