<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function create_task(Request $request){

        // dd($request->all());
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
            return redirect()->route('view_all_tasks');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function delete_single_task($id){
        $task = Task::find($id);

        $task->isDelete = 1;

        $task->save();
        if($task){
            // return response()->json('success',200);
            return redirect()->route('view_all_tasks');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
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
                return redirect()->route('view_all_tasks');
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
                return redirect()->route('view_all_tasks');
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
                return redirect()->route('view_all_tasks');
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
        $task_cancel = Task::find($task_id);
        if($task_cancel)
        {
            // $task_cancel->user_id = $request->user_id;
            // $task_cancel->cancel_by = $request->user_id;
            // $task_cancel->cancel_time = $request->cancel_time;
            $task_cancel->status = '4';
            

            $task_cancel->save();

            if($task_cancel){
                return redirect()->route('view_all_tasks');
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
}
