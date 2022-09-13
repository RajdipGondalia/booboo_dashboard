<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobRoleMaster;
use App\Models\WorkingLocationMaster;

class Profile extends Model
{
    protected $table = 'profile';
    use HasFactory;

    public function job_role_name()
    {
        return $this->belongsTo(JobRoleMaster::class,'job_role');
    }
    public function working_location_name()
    {
        return $this->belongsTo(WorkingLocationMaster::class,'working_location');
    }

}
