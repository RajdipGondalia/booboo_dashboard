<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobRoleMaster;
use App\Models\WorkingLocationMaster;
use App\Models\Profile;

class AdminController extends Controller
{
    public function index(){
        $current_user = auth()->user()->name;
        //Data
        $all_job_roles = JobRoleMaster::all();
        $all_working_locations = WorkingLocationMaster::all();

        //Metrics
        $employees_count = Profile::count();
        $job_roles_count = JobRoleMaster::count();
        $work_locations_count = WorkingLocationMaster::count();

        $data['job_roles'] = $all_job_roles;
        $data['all_working_locations'] = $all_working_locations;

        $data['employees_count'] = $employees_count;
        $data['job_roles_count'] = $job_roles_count;
        $data['work_locations_count'] = $work_locations_count;
        return view('pages.Admin.Index')->with(['data'=>$data,'current_user'=>$current_user]);

    }

    //Job Role
    public function add_job_role(){
        $current_user = auth()->user()->name;
        return view('pages.Admin.AddJobRole')->with(['current_user'=>$current_user]);
    }

    public function store_job_role(Request $request){

        $validated = $request->validate([
            'name' => 'required',
        ]);

        $job_role = new JobRoleMaster;
        $job_role->name = $request->name;
        
        $job_role->save();
        return $this->index();
    }

    //Work Location
    public function edit_job_role(Request $request){
        return view('pages.Admin.EditJobRole');
    }


    public function add_work_location(){
        
        $current_user = auth()->user()->name;
        return view('pages.Admin.AddWorkLocation')->with(['current_user'=>$current_user]);
    }

    public function store_work_location(Request $request){

        $validated = $request->validate([
            'name' => 'required',
        ]);

        $work_location = new WorkingLocationMaster;
        $work_location->name = $request->name;

        $work_location->save();
        return $this->index();
    }

    public function edit_work_location(Request $request){
        return view('pages.Admin.EditWorkLocation');
    }
}
