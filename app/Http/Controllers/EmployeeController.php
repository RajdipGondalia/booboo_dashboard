<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\JobRoleMaster;
use App\Models\WorkingLocationMaster;
use App\Models\ProfileVsDocument;


class EmployeeController extends Controller
{
    public function profile_document_add(Request $request){
        // dd($request);
        $validated = $request->validate([
            'document_id' => 'required',
            'attachment_path' => 'required',
        ]);

        $profile_doc = new ProfileVsDocument;
        $profile_doc->document_id = $request->document_id;
        $profile_doc->profile_id = $request->profile_id;

        $profile_doc->user_id = auth()->user()->id;
        $profile_name = $request->profile_name;

        if($request->attachment_path!=null && $request->attachment_path!="null")
        {
            $attachmentName = $profile_name.'_'.time().'.'.$request->attachment_path->extension();
            // move Public Folder
            $request->attachment_path->move(public_path('images/profile_document'), $attachmentName);
            $profile_doc->attachment_path = $attachmentName;
        }
        //Remaining attributes
        $profile_doc->save();
        
        if($profile_doc){
            return redirect()->route('edit_employee_profile', $profile_doc->profile_id);
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function single_profile_document_delete($id){
        $profile_doc = ProfileVsDocument::find($id);

        $profile_doc->isDelete = 1;

        $profile_doc->save();
        if($profile_doc){
            // return response()->json('success',200);
            return redirect()->route('edit_employee_profile', $profile_doc->profile_id);
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

    public function create_employee_profile(){
        $current_user = Auth::user()->name;

        $employees = Profile::where('isDelete', '=', 0)->get();  
        $job_roles = JobRoleMaster::where('isDelete', '=', 0)->get();
        $working_locations = WorkingLocationMaster::where('isDelete', '=', 0)->get();
        return view('pages.Employee.CreateProfile')->with(['mode'=>"add",'current_user'=>$current_user,'employees'=>$employees,'job_roles'=>$job_roles,'working_locations'=>$working_locations]);
    }
    public function edit_employee_profile($id){

        $profile = Profile::find($id);
        $current_user = Auth::user()->name;

        $employees = Profile::where('isDelete', '=', 0)->get();  
        $job_roles = JobRoleMaster::where('isDelete', '=', 0)->get();
        $working_locations = WorkingLocationMaster::where('isDelete', '=', 0)->get();
        $profile_documents = ProfileVsDocument::where('isDelete', '=', 0)->where('profile_id', '=', $id)->where('attachment_path', '!=', "")->where('attachment_path', '!=', "null")->orderBy('id',"DESC")->get();
        return view('pages.Employee.CreateProfile')->with(['mode'=>"edit",'profile'=>$profile,'current_user'=>$current_user,'employees'=>$employees,'job_roles'=>$job_roles,'working_locations'=>$working_locations,'profile_documents'=>$profile_documents]);
    }
    

    public function store_profile_data(Request $request)
    {

        $validated = $request->validate([
            'given_name' => 'required',
            'family_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            // 'image_path' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        if($request->mode === 'add')
        {
            $profile = new Profile;
            $profile->given_name = $request->given_name;
            $profile->family_name = $request->family_name;
            $profile->dob = $request->dob;
            $profile->job_role = $request->job_role;
            $profile->edu_qualification = $request->edu_qualification;
            $profile->skills = $request->skills;
            $profile->doj = $request->doj;
            $profile->dol = $request->dol;
            $profile->salary = $request->salary;
            $profile->loyalty = $request->loyalty;
            $profile->present_address = $request->present_address;
            $profile->permanent_address = $request->permanent_address;
            $profile->contact_number = $request->contact_number;
            $profile->contact_number_2 = $request->contact_number_2;
            $profile->working_location = $request->working_location;
            $profile->email = $request->email;
            $profile->user_id = auth()->user()->id;

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
                return redirect()->route('view_all_employees');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else if($request->mode === 'edit')
    	{
            // dd($request);
            $profile_id = $request->profile_id;
            $profile = Profile::find($profile_id);

            $profile->given_name = $request->given_name;
            $profile->family_name = $request->family_name;
            $profile->dob = $request->dob;
            $profile->job_role = $request->job_role;
            $profile->edu_qualification = $request->edu_qualification;
            $profile->skills = $request->skills;
            $profile->doj = $request->doj;
            $profile->dol = $request->dol;
            $profile->salary = $request->salary;
            $profile->loyalty = $request->loyalty;
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
            $profile->save();

            if($profile){
                return redirect()->route('view_all_employees');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
    }
    
    public function get_single_employee(Request $request, $id)
    {
        // dd($request);
        // dd($id);
        $employee = Profile::find($id);
        // dd($employee);
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
        $data['doj'] = ($employee->doj!=null) ? $employee->doj : "";
        $data['dol'] = ($employee->dol!=null) ? $employee->dol : "";
        $data['salary'] = ($employee->salary!=null) ? $employee->salary : "";
        $data['loyalty'] = ($employee->loyalty!=null) ? $employee->loyalty : "";
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
    public function create_job_role(){
        $current_user = Auth::user()->name;

        return view('pages.JobRole.CreateJobRole')->with(['mode'=>"add",'current_user'=>$current_user]);
    }
    public function store_jobrole_data(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
        ]);
        if($request->mode === 'add')
        {
            $job_role = new JobRoleMaster;
            $job_role->name = $request->name;
        
            $job_role->save();

            if($job_role){
                return redirect()->route('create_employee_profile');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else if($request->mode === 'edit')
    	{
            // dd($request);
            $job_role_id = $request->job_role_id;
            $job_role = JobRoleMaster::find($job_role_id);

            $job_role->name = $request->name;
            $job_role->save();

            if($job_role){
                return redirect()->route('create_employee_profile');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
    }
}
