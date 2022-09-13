<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profile;
use App\Models\TimeTracker;
use App\Models\Task;
use App\Models\Todolist;
use App\Models\ClientMaster;
use App\Models\ClientCategoryMaster;
use App\Models\Project;
use App\Models\JobRoleMaster;
use App\Models\WorkingLocationMaster;
use App\Models\ProjectVsComment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\ProjectVsEvents;






class DashboardController extends Controller
{
    public function index(){
        $users = User::where('isDelete', '=', 0)->get();
        return view('main_page')->with('users',$users);
    }
    public function testing(){
        $current_user = Auth::user()->name;
        return view('pages.dashboard')->with('current_user',$current_user);
    }
    public function store_profile_data(Request $request){

        
        //dd($request->all());
        // dd($request->img[0]);
        $validated = $request->validate([
            'given_name' => 'required',
            'family_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            // 'image_path' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        
        $profile = new Profile;
        $profile->given_name = $request->given_name;
        $profile->family_name = $request->family_name;
        $profile->dob = $request->dob;
        $profile->job_role = $request->job_role;
        $profile->edu_qualification = $request->education_qualification;
        $profile->skills = $request->skills;
        $profile->present_address = $request->present_address;
        $profile->permanent_address = $request->permanent_address;
        $profile->contact_number = $request->contact_number;
        $profile->contact_number_2 = $request->contact_number_2;
        $profile->working_location = $request->working_location;
        $profile->email = $request->email;
        $profile->user_id = auth()->user()->id;
        // $profile->profile_photo = $request->file('img');

        if($request->image_path!=null && $request->image_path!="null")
        {
            $imageName = $request->given_name.'_'.time().'.'.$request->image_path->extension();
            // move Public Folder
            $request->image_path->move(public_path('images/profile'), $imageName);
            $profile->image_path = $imageName;
        }
        //Remaining attributes
        $profile->save();

        if($profile){
            return redirect()->route('all_employees');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function update_profile_data(Request $request){
        // dd($request->all());
        // dd($request->image_path);
        $validated = $request->validate([
            'given_name' => 'required',
            'family_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            // 'image_path' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if($validated){

            $profile_id = $request->profile_id;
            $profile = Profile::find($profile_id);

            $profile->given_name = $request->given_name;
            $profile->family_name = $request->family_name;
            $profile->dob = $request->dob;
            $profile->job_role = $request->job_role;
            $profile->edu_qualification = $request->education_qualification;
            $profile->skills = $request->skills;
            $profile->present_address = $request->present_address;
            $profile->permanent_address = $request->permanent_address;
            $profile->contact_number = $request->contact_number;
            $profile->contact_number_2 = $request->contact_number_2;
            $profile->working_location = $request->working_location;
            $profile->email = $request->email;
            // $profile->user_id = auth()->user()->id;
            if($request->image_path!=null && $request->image_path!="null")
            {
                $imageName = $request->given_name.'_'.time().'.'.$request->image_path->extension();
                // move Public Folder
                $request->image_path->move(public_path('images/profile'), $imageName);
                $profile->image_path = $imageName;
            }
    
            //Remaining attributes
            $profile->save();
            if($profile){
                // return response()->json('success',200);
                return redirect()->route('all_employees');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }   
        }
        else{
            $errors = $validated->errors();
            Session('message',$errors);

        }   
    }

    public function get_all_employees(){
        // $employees = Profile::all();   
        $job_roles = JobRoleMaster::where('isDelete', '=', 0)->get();  
        $working_locations = WorkingLocationMaster::where('isDelete', '=', 0)->get();
        $employees = Profile::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();   
        return view('employee')->with(['employees'=>$employees,'job_roles'=>$job_roles,'working_locations'=>$working_locations]);
    }
    public function get_single_profile($id){

        $users = User::where('isDelete', '=', 0)->get();
        $profile = Profile::find($id);
        $job_roles = JobRoleMaster::where('isDelete', '=', 0)->get();
        $working_locations = WorkingLocationMaster::where('isDelete', '=', 0)->get(); 
        return view('profile_edit')->with(['profile'=>$profile,'users'=>$users,'job_roles'=>$job_roles,'working_locations'=>$working_locations]);
    }
    public function delete_single_profile($id){
        $profile = Profile::find($id);

        $profile->isDelete = 1;

        $profile->save();
        if($profile){
            // return response()->json('success',200);
            return redirect()->route('all_employees');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    public function profile(){     
        $job_roles = JobRoleMaster::where('isDelete', '=', 0)->get();
        $working_locations = WorkingLocationMaster::where('isDelete', '=', 0)->get();
        return view('profile')->with(['job_roles'=>$job_roles,'working_locations'=>$working_locations]);
    }
    // public function task(){     
    //     return view('task');
    // }
    public function todolist(){     
        return view('todolist');
    }
    // public function time_tracker(){     
    //     return view('time_tracker');
    // }
    public function get_time_tracker(){
        // $time_trackers = TimeTracker::all(); 
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;
        if($login_user_type==1 || $login_user_type==2 )
        {
            $time_trackers = TimeTracker::where('isDelete', '=', 0)->orderBy('id',"DESC")->get(); 
        }
        else
        {
            $time_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get(); 
        }
        $today = date("Y-m-d");
            
        $single_time_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->whereDate('current_time', '=', $today)->get();
        $TotalSecondsDiff =0;
        $SecondsDiff=0;
        foreach($single_time_trackers as $day_time)
        {
            $flag = $day_time->flag;
            $id = $day_time->id;
            // if($flag=="start")
            // {
            //     $start_time=$day_time->current_time;
            //     $total_start_time = $start_time++;
            // }
            if($flag=="stop")
            {
                $single_start_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();
                // dd($single_start_trackers);
                // dd($id);
                $start_time=$single_start_trackers->current_time;
                // dd($start_time);
                $stop_time=$day_time->current_time;
                // dd($stop_time);
                $start = strtotime($start_time);
                // dd($start);
                $stop = strtotime($stop_time);
                $SecondsDiff = abs($stop-$start);

                $TotalSecondsDiff += $SecondsDiff;
            }
        }
        $TotalMinutesDiff = $TotalSecondsDiff/60; 

        $user_last_details = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->whereDate('current_time', '=', $today)->first();
        // dd($user_last_details);
        if($user_last_details)
        {
            $user_last_flag = $user_last_details->flag;
        }
        else
        {
            $user_last_flag = "";
        }
        return view('time_tracker')->with(['time_trackers'=>$time_trackers,'total_minutes'=>$TotalMinutesDiff,'total_seconds'=>$TotalSecondsDiff,'user_last_flag'=>$user_last_flag]);
    }
    public function get_single_time_tracker(){
        return view('single_time_tracker')->with('single_time_trackers',$single_time_trackers);
    }
    public function delete_single_time_tracker($id){
        $time_tracker = TimeTracker::find($id);

        $time_tracker->isDelete = 1;

        $time_tracker->save();
        if($time_tracker){
            // return response()->json('success',200);
            return redirect()->route('time_tracker');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }

    public function get_single_employee(Request $request, $id){
        $employee = Profile::find($id);
        // $dob = date("Y-m-d",strtotime($employee->dob));
        if($employee->job_role!=0)
        {
            $job_role = $employee->job_role_name->name;
        }
        else
        {
            $job_role = "";
        }
        if($employee->working_location!=0)
        {
            $working_location = $employee->working_location_name->name;
        }
        else
        {
            $working_location = "";
        }
        if($employee->image_path!="" && $employee->image_path!="null" )
        {
            $image = asset('images/profile')."/".$employee->image_path;
            
        }
        else
        {
            $image = asset('images')."/default.png";
        }
        $data['id'] = ($employee->id!=null) ? $employee->id : "";
        $data['given_name'] = ($employee->given_name!=null) ? $employee->given_name : "";
        $data['family_name'] = ($employee->family_name!=null) ? $employee->family_name : "";
        $data['dob'] = ($employee->dob!=null) ? $employee->dob : "";
        $data['job_role'] = ($job_role!=null) ? $job_role : "";
        $data['job_role_id'] = ($employee->job_role!=null) ? $employee->job_role : "";
        $data['edu_qualification'] = ($employee->edu_qualification!=null) ? $employee->edu_qualification : "";
        $data['skills'] = ($employee->skills!=null) ? $employee->skills : "";
        $data['present_address'] = ($employee->present_address!=null) ? $employee->present_address : "";
        $data['permanent_address'] = ($employee->permanent_address!=null) ? $employee->permanent_address : "";
        $data['contact_number'] = ($employee->contact_number!=null) ? $employee->contact_number : "";
        $data['contact_number_2'] = ($employee->contact_number_2!=null) ? $employee->contact_number_2 : "";
        $data['working_location'] = ($working_location!=null) ? $working_location : "";
        $data['working_location_id'] = ($employee->working_location!=null) ? $employee->working_location : "";
        $data['email'] = ($employee->email!=null) ? $employee->email : "";
        $data['image_path'] = ($image!=null) ? $image : "";


        return response()->json(['employee'=>$data],200);
        // return response()->json(['employee'=>$employee],200);
    }
    public function get_single_task(Request $request, $id){
        $task = Task::find($id);
        return response()->json(['task'=>$task],200);
    }

    public function task_start(Request $request){
        $task_id = $request->id;
        $task_start = Task::find($task_id);
        if($task_start){
            $task_start->start_by = $request->user_id;
            // $task_start->user_id = $request->user_id;
            $task_start->start_time = $request->start_time;
            $task_start->status = '1';           
    
            $task_start->save();
            if($task_start){
                return redirect()->route('all_tasks');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }  
    }
    public function task_stop(Request $request){
        $task_id = $request->id;
        $task_stop = Task::find($task_id);
        if($task_stop)
        {
            $task_stop->stop_by = $request->user_id;
            $task_stop->stop_time = $request->stop_time;
            $task_stop->status = '2';
            

            $task_stop->save();

            if($task_stop){
                return redirect()->route('all_tasks');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }
    }
    public function task_complete(Request $request){
        $task_id = $request->id;
        $task_complete = Task::find($task_id);
        if($task_complete)
        {
            // $task_complete->user_id = $request->user_id;
            // $task_complete->complete_by = $request->user_id;
            // $task_complete->complete_time = $request->complete_time;
            $task_complete->status = '3';
            

            $task_complete->save();

            if($task_complete){
                return redirect()->route('all_tasks');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }
    }
    public function task_cancel(Request $request){
        $task_id = $request->id;
        $task_complete = Task::find($task_id);
        if($task_complete)
        {
            // $task_cancel->user_id = $request->user_id;
            // $task_cancel->cancel_by = $request->user_id;
            // $task_cancel->cancel_time = $request->cancel_time;
            $task_cancel->status = '4';
            

            $task_cancel->save();

            if($task_cancel){
                return redirect()->route('all_tasks');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }
    }

    public function time_start(Request $request){

        //$date="date(Y-m-d h:i:s)";
        //dd($request->all());
        // dd($request->img[0]);
        $time_start = new TimeTracker;
        $time_start->flag = 'start';
        $time_start->user_id = $request->user_id;
        $time_start->current_time = $request->start_time;
        
        

        $time_start->save();

        if($time_start){
            return redirect()->route('time_tracker');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }  
    }
    public function time_stop(Request $request){

        //$date="date(Y-m-d h:i:s)";
        //dd($request->all());
        // dd($request->img[0]);
        $time_start = new TimeTracker;
        $time_start->flag = 'stop';
        $time_start->user_id = $request->user_id;
        $time_start->current_time = $request->start_time;
        

        $time_start->save();

        if($time_start){
            return redirect()->route('time_tracker');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }

        
    }
    public function get_tasks(){
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        if($login_user_type==1 || $login_user_type==2 )
        {
            $tasks = Task::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();
        }
        else
        {
            $tasks = Task::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();
        }

        // $single_start_trackers = TimeTracker::where('user_id', '=', $user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();

        $users = User::where('isDelete', '=', 0)->get();
        $projects = Project::where('isDelete', '=', 0)->get();

        // foreach($tasks as $task){
        //     $array = explode(',',$task->assign_to);
            
        //     foreach($array as $assigned){
        //         $data['assign_to'] = ;
                
        //         dd($data-);
        //     }
           
        // }
        
        return view('task')->with(['tasks'=>$tasks,'users'=>$users,'projects'=>$projects]);
    }
    public function delete_single_task($id){
        $task = Task::find($id);

        $task->isDelete = 1;

        $task->save();
        if($task){
            // return response()->json('success',200);
            return redirect()->route('all_tasks');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    
    public function store_task_data(Request $request){

        //dd($request->all());
        // dd($request->img[0]);
        $task = new Task;
        $task->project_id = $request->project_id;
        $task->task_title = $request->task_title;
        $task->task_desc = $request->task_desc;

        $due_date = $request->due_date;
        $DueDate = date("Y-m-d",strtotime($due_date));
        $task->due_date = $DueDate;

        $assign_to = $request->assign_to;
        if($assign_to!="")
        {
            $AssignTo = implode(',', $assign_to);
            $task->assign_to = $AssignTo;
        }
        else
        {
            $task->assign_to = "";
        }
        $task->priority = $request->priority;
        $task->status = '0';
        $task->user_id = auth()->user()->id;

        // $users = User::all();
        // var user_id = `{{Auth::user()->id}}`;

        // $task->task_photo = $request->file('img');

        $validated = $request->validate([
            'project_id' => 'required',
            'task_title' => 'required',
            'assign_to' => 'required',
            'priority' => 'required',
        ]);
        //Remaining attributes
        $task->save();

        if($task){
            return redirect()->route('all_tasks');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function get_todolist(){
        $todolists = Todolist::all();        
        return view('todolist')->with('todolists',$todolists);
    }
    public function store_todolist_data(Request $request)
    {
        //dd($request->all());
        // dd($request->img[0]);
        $todolist = new Todolist;
        $todolist->todo_title = $request->todo_title;
        $todolist->todo_desc = $request->todo_desc;
        $todolist->user_id = auth()->user()->id;
        // $todolist->todolist_photo = $request->file('img');

        $validated = $request->validate([
            'todo_title' => 'required'
        ]);
        //Remaining attributes
        $todolist->save();

        if($todolist){
            return redirect()->route('todolist');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }  
    }
    public function get_assignto_names_from_ids($request){
        // dd([$request]);
        $assign_to_data = User::where('isDelete', '=', 0)->whereIn('id', [$request])->get();
        // dd($assign_to_data);

        return $assign_to_data;
    }
    public function get_clients(){
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        // if($login_user_type==1 || $login_user_type==2 )
        // {
            $clients = ClientMaster::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();
        // }
        // else
        // {
        //     $clients = ClientMaster::where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();
        // }

        // $single_start_trackers = TimeTracker::where('user_id', '=', $user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();

        $users = User::where('isDelete', '=', 0)->get();
        $client_categories = ClientCategoryMaster::where('isDelete', '=', 0)->get();
        
        
        return view('client_master')->with(['clients'=>$clients,'client_categories'=>$client_categories,'users'=>$users]);
    }
    public function get_single_client($id){

        $users = User::where('isDelete', '=', 0)->get();
        $client_categories = ClientCategoryMaster::where('isDelete', '=', 0)->get();
        $client = ClientMaster::find($id);
        return view('client_edit')->with(['client'=>$client,'users'=>$users,'client_categories'=>$client_categories]);
    }

    public function store_client_master_data(Request $request){

        dd($request->all());
        // dd($request->img[0]);
        $client_master = new ClientMaster;
        $client_master->company_name = $request->company_name;
        $client_master->first_name = $request->first_name;
        $client_master->last_name = $request->last_name;
        $client_master->email = $request->email;
        $client_master->address = $request->address;
        $client_master->client_category_id = $request->client_category_id;
        $client_master->user_id = auth()->user()->id;


        $validated = $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'client_category_id' => 'required',
        ]);
        //Remaining attributes
        $client_master->save();

        if($client_master){
            return redirect()->route('all_client');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function update_client_data(Request $request){
        // dd($request->all());
        // dd($request->image_path);
        $validated = $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'client_category_id' => 'required',
        ]);

        if($validated){

            $client_id = $request->client_id;
            $client_master = ClientMaster::find($client_id);

            $client_master->company_name = $request->company_name;
            $client_master->first_name = $request->first_name;
            $client_master->last_name = $request->last_name;
            $client_master->email = $request->email;
            $client_master->address = $request->address;
            $client_master->client_category_id = $request->client_category_id;
            // $profile->user_id = auth()->user()->id;
            //Remaining attributes
            $client_master->save();
            if($client_master){
                // return response()->json('success',200);
                return redirect()->route('all_client');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }   
        }
        else{
            $errors = $validated->errors();
            Session('message',$errors);

        }   
    }
    public function delete_single_client_master($id){
        $client_master = ClientMaster::find($id);

        $client_master->isDelete = 1;

        $client_master->save();
        if($client_master){
            // return response()->json('success',200);
            return redirect()->route('all_client');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    public function get_projects(){
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        // if($login_user_type==1 || $login_user_type==2 )
        // {
            $projects = Project::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();
        // }
        // else
        // {
        //     $projects = Project::where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();
        // }

        // $single_start_trackers = TimeTracker::where('user_id', '=', $user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();

        $users = User::where('isDelete', '=', 0)->get();
        $clients = ClientMaster::where('isDelete', '=', 0)->get();

        // foreach($tasks as $task){
        //     $array = explode(',',$task->assign_to);
            
        //     foreach($array as $assigned){
        //         $data['assign_to'] = ;
                
        //         dd($data-);
        //     }
           
        // }
        
        return view('project')->with(['projects'=>$projects,'clients'=>$clients,'users'=>$users]);
    }
    public function get_single_project($id){

        $users = User::where('isDelete', '=', 0)->get();
        $clients = ClientMaster::where('isDelete', '=', 0)->get();

        $project = Project::find($id);
        $job_roles = JobRoleMaster::where('isDelete', '=', 0)->get();
        $working_locations = WorkingLocationMaster::where('isDelete', '=', 0)->get(); 
        return view('project_edit')->with(['project'=>$project,'users'=>$users,'clients'=>$clients]);
    }
    public function store_project_data(Request $request){

        
        //dd($request->all());
        // dd($request->img[0]);
        $project = new Project;
        $project->title = $request->title;
        $project->client_id = $request->client_id;

        $start_date = $request->start_date;
        $StartDate = date("Y-m-d",strtotime($start_date));
        $project->start_date = $StartDate;

        $due_date = $request->due_date;
        $DueDate = date("Y-m-d",strtotime($due_date));
        $project->due_date = $DueDate;

        $assign_to = $request->assign_to;
        if($assign_to!="")
        {
            $AssignTo = implode(',', $assign_to);
            $project->assign_to = $AssignTo;
        }
        else
        {
            $project->assign_to = "";
        }
        $project->project_manager = $request->project_manager;

        $project->status = '0';
        $project->user_id = auth()->user()->id;


        $validated = $request->validate([
            'title' => 'required',
            'assign_to' => 'required',
        ]);
        //Remaining attributes
        $project->save();

        if($project){
            return redirect()->route('all_projects');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function update_project_data(Request $request){
        // dd($request->all());
        // dd($request->image_path);
        $project_id = $request->project_id;
        $validated = $request->validate([
            'title' => 'required',
            'assign_to' => 'required',
        ]);
        if($validated){
            
            $project = Project::find($project_id);

            $project->title = $request->title;
            $project->client_id = $request->client_id;

            $start_date = $request->start_date;
            $StartDate = date("Y-m-d",strtotime($start_date));
            $project->start_date = $StartDate;

            $due_date = $request->due_date;
            $DueDate = date("Y-m-d",strtotime($due_date));
            $project->due_date = $DueDate;

            $assign_to = $request->assign_to;
            if($assign_to!="")
            {
                $AssignTo = implode(',', $assign_to);
                $project->assign_to = $AssignTo;
            }
            else
            {
                $project->assign_to = "";
            }
            $project->project_manager = $request->project_manager;

            $project->status = '0';
            //Remaining attributes
            $project->save();
            if($project){
                return redirect()->route('all_projects');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }   
        }
        else{
            $errors = $validated->errors();
            Session('message',$errors);
        }   
    }
    public function delete_single_project($id){
        $project = Project::find($id);

        $project->isDelete = 1;

        $project->save();
        if($project){
            // return response()->json('success',200);
            return redirect()->route('all_projects');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    public function project_start(Request $request){
        $project_id = $request->id;
        $project_start = Project::find($project_id);
        if($project_start){
            $project_start->start_by = $request->user_id;
            $project_start->start_time = $request->start_time;
            $project_start->status = '1';           
    
            $project_start->save(); 
            if($project_start){
                return redirect()->route('all_projects');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else
        {
            $message = 'Data not Saved';
            Session('message',$message); 
        }  
    }
    public function project_hold(Request $request){
        $project_id = $request->id;
        $project_hold = Project::find($project_id);
        if($project_hold){
            // $project_hold->start_by = $request->user_id;
            // $project_hold->start_time = $request->start_time;
            $project_hold->status = '2';  
            $project_hold->save(); 
            if($project_hold){
                return redirect()->route('all_projects');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }  
    }
    public function project_complete(Request $request){
        $project_id = $request->id;
        $project_complete = Project::find($project_id);
        if($project_complete){
            $project_complete->complete_by = $request->user_id;
            $project_complete->complete_time = $request->complete_time;
            $project_complete->status = '3';  
            $project_complete->save(); 
            if($project_complete){
                return redirect()->route('all_projects');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }  
    }
    public function project_cancel(Request $request){
        $project_id = $request->id;
        $project_cancel = Project::find($project_id);
        if($project_cancel){
            // $project_cancel->start_by = $request->user_id;
            // $project_cancel->start_time = $request->start_time;
            $project_cancel->status = '4';  
            $project_cancel->save(); 
            if($project_cancel){
                return redirect()->route('all_projects');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }  
    }
    public function get_project_details(Request $request, $id){
        // $project = Project::find($id);
        // return response()->json(['project'=>$project],200);

        // $tasks = Task::where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();
        $tasks = Task::where('isDelete', '=', 0)->where('project_id', '=', $id)->orderBy('id',"DESC")->get();
        $users = User::where('isDelete', '=', 0)->get();
        $clients = ClientMaster::where('isDelete', '=', 0)->get();
        $project_comments = ProjectVsComment::where('isDelete', '=', 0)->where('project_id', '=', $id)->orderBy('id',"ASC")->get();
        $project_comments_attachments = ProjectVsComment::where('isDelete', '=', 0)->where('project_id', '=', $id)->where('attachment_path', '!=', "")->where('attachment_path', '!=', "null")->orderBy('id',"DESC")->get();

        return view('project_details')->with(['tasks'=>$tasks,'clients'=>$clients,'users'=>$users,'project_id'=>$id,'project_comments'=>$project_comments,'project_comments_attachments'=>$project_comments_attachments]);
    }

    public function store_project_comment_data(Request $request){

        $project_comment = new ProjectVsComment;
        $project_comment->comment = $request->comment;
        $project_comment->project_id = $request->project_id;

        $project_comment->user_id = auth()->user()->id;
        $user_name = auth()->user()->name;

        if($request->attachment_path!="" && $request->attachment_path!="null")
        {
            $attachmentName = $user_name.'_'.time().'.'.$request->attachment_path->extension();
            // move Public Folder
            $request->attachment_path->move(public_path('images/project_attachment'), $attachmentName);
            $project_comment->attachment_path = $attachmentName;
        }

        $validated = $request->validate([
            // 'comment' => 'required',
        ]);

        //Remaining attributes
        if($request->comment!="" && $request->comment!="null")
        {
            $project_comment->save();
        }
        else if($request->attachment_path!="" && $request->attachment_path!="null")
        {
            $project_comment->save();
        }
        else
        {
            $message = 'Please Enter Message Or Select Files';
            Session('message',$message);
        }
        if($project_comment){
            return redirect()->route('project_details', $project_comment->project_id);
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function delete_single_project_comment($id){
        $project_comment = ProjectVsComment::find($id);

        $project_comment->isDelete = 1;

        $project_comment->save();
        if($project_comment){
            // return response()->json('success',200);
            return redirect()->route('project_details', $project_comment->project_id);
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    public function get_users(){
        $users = User::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();
        
        return view('user')->with('users',$users);
    }
    public function get_single_user($id){
        $user = User::find($id);
        return view('user_edit')->with(['user'=>$user]);
    }
    public function store_user_data(Request $request){
        //dd($request->all());
        // dd($request->img[0]);
        // dd($request);

        $validated = $request->validate([
            'type' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //'image_path' => ['required','image','mimes:png,jpg,jpeg','max:2048'],
        ]);

        $user = new User;
        $user->type = $request->type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->image_path!=null && $request->image_path!="null")
        {
            $imageName = $request->name.'_'.time().'.'.$request->image_path->extension();
            // move Public Folder
            $request->image_path->move(public_path('images/user'), $imageName);
            $user->image_path = $imageName;
        }

        $user->save();

        if($user){
            return redirect()->route('all_users');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }  
    }
    public function update_user_data(Request $request){
        // dd($request->all());
        // dd($request->image_path);
        $user_id = $request->user_id;
        $validated = $request->validate([
            'type' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //'image_path' => ['required','image','mimes:png,jpg,jpeg','max:2048'],
        ]);


        if($validated){
            
            $user = User::find($user_id);
            
            $user->password = Hash::make($request->password);
            $user->type = $request->type;
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->image_path!=null && $request->image_path!="null")
            {
                $imageName = $request->name.'_'.time().'.'.$request->image_path->extension();
                // move Public Folder
                $request->image_path->move(public_path('images/user'), $imageName);
                $user->image_path = $imageName;
            }
    
            //Remaining attributes
            $user->save();
            if($user){
                return redirect()->route('all_users');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }   
        }
        else{
            $errors = $validated->errors();
            Session('message',$errors);
        }   
    }

    public function change_password_user_data(Request $request){
        // dd($request->all());
        // dd($request->image_path);
        $user_id = $request->user_id;

        $validated = $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);


        if($validated){
            $user = User::find($user_id);

            $user->password = Hash::make($request->password);
    
            //Remaining attributes
            $user->save();
            if($user){
                return redirect()->route('all_users');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }   
        }
        else{
            $errors = $validated->errors();
            Session('message',$errors);
        }   
    }
    
    public function delete_single_user($id){
        $user = User::find($id);

        $user->isDelete = 1;

        $user->save();
        if($user){
            // return response()->json('success',200);
            return redirect()->route('all_users');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }

    public function get_calender(Request $request , $project_id)
    {
        // dd($request);

        $project_event = new ProjectVsEvents;
        // $login_user_id = auth()->user()->id;
    	// if($request)
    	// {
    		$data = ProjectVsEvents::where('isDelete', '=', 0)
                        ->whereDate('start', '>=', $request->start)
                        ->whereDate('end',   '<=', $request->end)
                        ->where('project_id',   '=', $project_id)
                        ->get();
            return response()->json($data);
    	// }
        // return redirect()->route('project_details', $login_user_id);
    }
    public function action_calender(Request $request)
    {
        // dd($request);
        $login_user_id = auth()->user()->id;
    	// if($request->)
    	// {
    		if($request->type === 'add')
    		{
                // dd($login_user_id);
    			// $event = ProjectVsEvents::create([
    			// 	'title'		=>	$request->title,
    			// 	'start'		=>	$request->start,
    			// 	'end'		=>	$request->end,
                //     'project_id'=>  $request->project_id,
                //     'user_id'   =>  $login_user_id
    			// ]);

                $event = new ProjectVsEvents;
                $event->title = $request->title;
                $event->start = $request->start;
                $event->end = $request->end;
                $event->project_id = $request->project_id;
                $event->user_id = $login_user_id;

                $event->save();

    			//return response()->json($event);
                if($event){
                    return response()->json($event);
                }else{
                    $message = 'Data not Saved';
                    Session('message',$message);
                }
    		}

    		else if($request->type === 'update')
    		{
                $event = ProjectVsEvents::find($request->id);
                $event->title = $request->title;
                $event->start = $request->start;
                $event->end = $request->end;

    			// $event = ProjectVsEvents::find($request->id)->update([
    			// 	'title'		=>	$request->title,
    			// 	'start'		=>	$request->start,
    			// 	'end'		=>	$request->end
    			// ]);
                $event->save();

                if($event){
                    return response()->json($event);
                }else{
                    $message = 'Data not Saved';
                    Session('message',$message);
                }
    			
    		}

    		else if($request->type === 'delete')
    		{
                $event = ProjectVsEvents::find($request->id);
                $event->isDelete = 1;
                
                // $event = ProjectVsEvents::find($request->id)->update([
    			// 	'isDelete'		=>	1
    			// ]);
                $event->save();
                if($event){
                    return response()->json($event);
                }else{
                    $message = 'Data not Saved';
                    Session('message',$message);
                }
    			//return response()->json($event);
    		}
    	// }
    }
    

}
