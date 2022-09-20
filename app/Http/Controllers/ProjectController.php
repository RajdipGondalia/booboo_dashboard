<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientMaster;
use App\Models\ClientCategoryMaster;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectVsComment;
use App\Models\ProjectVsEvents;
use App\Models\Task;

class ProjectController extends Controller
{

    public function create_project(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        $projects = Project::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();
        $users = User::where('isDelete', '=', 0)->get();
        $clients = ClientMaster::where('isDelete', '=', 0)->get();
        return view('pages.Project.CreateProject')->with(['mode'=>"add",'current_user'=>$current_user,'projects'=>$projects,'clients'=>$clients,'users'=>$users]);
    }
    public function edit_project($id){

        $project = Project::find($id);
        $current_user = Auth::user()->name;

        $users = User::where('isDelete', '=', 0)->get();
        $clients = ClientMaster::where('isDelete', '=', 0)->get();


        return view('pages.Project.CreateProject')->with(['mode'=>"edit",'project'=>$project,'current_user'=>$current_user,'clients'=>$clients,'users'=>$users]);
    }
    

    public function store_project_data(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'title' => 'required',
            'assign_to' => 'required',
        ]);
        if($request->mode === 'add')
        {
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

            //Remaining attributes
            $project->save();

            if($project){
                return redirect()->route('view_all_projects');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else if($request->mode === 'edit')
    	{
            $project_id = $request->project_id;
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

            $project->save();

            if($project){
                return redirect()->route('view_all_projects');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
    }
    public function delete_project($id){
        $project = Project::find($id);

        $project->isDelete = 1;

        $project->save();
        if($project){
            // return response()->json('success',200);
            return redirect()->route('view_all_projects');
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
                return redirect()->route('view_all_projects');
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
                return redirect()->route('view_all_projects');
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
                return redirect()->route('view_all_projects');
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
                return redirect()->route('view_all_projects');
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
        $current_user = Auth::user()->name;
        // $project = Project::find($id);
        // return response()->json(['project'=>$project],200);

        // $tasks = Task::where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();
        $tasks = Task::where('isDelete', '=', 0)->where('project_id', '=', $id)->orderBy('id',"DESC")->get();
        $users = User::where('isDelete', '=', 0)->get();
        $clients = ClientMaster::where('isDelete', '=', 0)->get();
        $project_comments = ProjectVsComment::where('isDelete', '=', 0)->where('project_id', '=', $id)->orderBy('id',"ASC")->get();
        $project_comments_attachments = ProjectVsComment::where('isDelete', '=', 0)->where('project_id', '=', $id)->where('attachment_path', '!=', "")->where('attachment_path', '!=', "null")->orderBy('id',"DESC")->get();
        $project_events = ProjectVsEvents::where('isDelete', '=', 0)->where('project_id', '=', $id)->orderBy('id',"DESC")->get();

        return view('pages.Project.ProjectDetails')->with(['current_user'=>$current_user,'tasks'=>$tasks,'clients'=>$clients,'users'=>$users,'project_id'=>$id,'project_comments'=>$project_comments,'project_comments_attachments'=>$project_comments_attachments,'project_events'=>$project_events]);
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
    public function store_project_comment_data(Request $request){

        $project_comment = new ProjectVsComment;
        $project_comment->comment = $request->comment;
        $project_comment->project_id = $request->project_id;

        $project_comment->user_id = auth()->user()->id;
        $user_name = auth()->user()->name;

        if($request->attachment_path!="" && $request->attachment_path!="null")
        {
            $attachmentRealName = $request->attachment_path->getClientOriginalName();
            $attachmentName = $user_name.'_'.time().'.'.$request->attachment_path->extension();
            // move Public Folder
            $request->attachment_path->move(public_path('images/project_attachment'), $attachmentName);
            $project_comment->attachment_path = $attachmentName;
            $project_comment->attachment_realname = $attachmentRealName;
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
    public function get_assignto_names_from_ids($request){
        // dd([$request]);
        $assign_to_data = User::where('isDelete', '=', 0)->whereIn('id', [$request])->get();
        // dd($assign_to_data);

        return $assign_to_data;
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
    public function delete_single_project_event($id){
        $project_event = ProjectVsEvents::find($id);

        $project_event->isDelete = 1;

        $project_event->save();
        if($project_event){
            // return response()->json('success',200);
            return redirect()->route('project_details', $project_event->project_id);
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }

}
