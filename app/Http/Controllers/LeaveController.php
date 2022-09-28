<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\leave;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class LeaveController extends Controller
{

    public function create_leave(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;
        $users = User::where('isDelete', '=', 0)->orderBy('name',"ASC")->get();
        return view('pages.Leave.CreateLeave')->with(['mode'=>"add",'current_user'=>$current_user,'users'=>$users]);
    }
    public function edit_leave($id){

        $leave = leave::find($id);
        $current_user = Auth::user()->name;
        $users = User::where('isDelete', '=', 0)->orderBy('name',"ASC")->get();
        return view('pages.Leave.CreateLeave')->with(['mode'=>"edit",'leave'=>$leave,'current_user'=>$current_user,'users'=>$users]);
    }
    public function store_leave_data(Request $request)
    {
        // dd($request);
        
        if($request->mode === 'add')
        {
            $validated = $request->validate([
                'leave_user_id' => ['required'],
                'leave_date_1' => ['required'],
                'leave_day_1' => ['required'],
                'leave_reason' => ['required'],
            ]);

            $leave = new leave;
            $leave->user_id = auth()->user()->id;

            $leave->leave_user_id = $request->leave_user_id;
            $leave->leave_reason = $request->leave_reason;

            $leave->leave_date_1 = $request->leave_date_1;
            $leave->leave_date_2 = $request->leave_date_2;
            $leave->leave_date_3 = $request->leave_date_3;
            $leave->leave_date_4 = $request->leave_date_4;
            $leave->leave_date_5 = $request->leave_date_5;
            $leave->leave_date_6 = $request->leave_date_6;
            $leave->leave_date_7 = $request->leave_date_7;

            $leave->leave_day_1 = $request->leave_day_1;
            $leave->leave_day_2 = $request->leave_day_2;
            $leave->leave_day_3 = $request->leave_day_3;
            $leave->leave_day_4 = $request->leave_day_4;
            $leave->leave_day_5 = $request->leave_day_5;
            $leave->leave_day_6 = $request->leave_day_6;
            $leave->leave_day_7 = $request->leave_day_7;

            $leave->cover_date_1 = $request->cover_date_1;
            $leave->cover_date_2 = $request->cover_date_2;
            $leave->cover_date_3 = $request->cover_date_3;
            $leave->cover_date_4 = $request->cover_date_4;
            $leave->cover_date_5 = $request->cover_date_5;
            $leave->cover_date_6 = $request->cover_date_6;
            $leave->cover_date_7 = $request->cover_date_7;

            $leave->status = 0;

            //Remaining attributes
            $leave->save();

            if($leave){
                return redirect()->route('view_all_leaves');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else if($request->mode === 'edit')
    	{
            $validated = $request->validate([
                'leave_user_id' => ['required'],
                'leave_date_1' => ['required'],
                'leave_day_1' => ['required'],
                'leave_reason' => ['required'],
            ]);
            $leave_id = $request->leave_id;
            $leave = leave::find($leave_id);
            
            $leave->leave_reason = $request->leave_reason;

            $leave->leave_date_1 = $request->leave_date_1;
            $leave->leave_date_2 = $request->leave_date_2;
            $leave->leave_date_3 = $request->leave_date_3;
            $leave->leave_date_4 = $request->leave_date_4;
            $leave->leave_date_5 = $request->leave_date_5;
            $leave->leave_date_6 = $request->leave_date_6;
            $leave->leave_date_7 = $request->leave_date_7;

            $leave->leave_day_1 = $request->leave_day_1;
            $leave->leave_day_2 = $request->leave_day_2;
            $leave->leave_day_3 = $request->leave_day_3;
            $leave->leave_day_4 = $request->leave_day_4;
            $leave->leave_day_5 = $request->leave_day_5;
            $leave->leave_day_6 = $request->leave_day_6;
            $leave->leave_day_7 = $request->leave_day_7;

            $leave->cover_date_1 = $request->cover_date_1;
            $leave->cover_date_2 = $request->cover_date_2;
            $leave->cover_date_3 = $request->cover_date_3;
            $leave->cover_date_4 = $request->cover_date_4;
            $leave->cover_date_5 = $request->cover_date_5;
            $leave->cover_date_6 = $request->cover_date_6;
            $leave->cover_date_7 = $request->cover_date_7;


            $leave->save();
            if($leave){
                return redirect()->route('view_all_leaves');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
    }
    public function delete_leave($id){
        $leave = leave::find($id);

        $leave->isDelete = 1;

        $leave->save();
        if($leave){
            // return response()->json('success',200);
            return redirect()->route('view_all_leaves');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    public function leave_approve(Request $request){
        $leave_id = $request->id;
        $leave_approve = leave::find($leave_id);
        if($leave_approve){
            $leave_approve->status = '1';           
    
            $leave_approve->save();
            if($leave_approve){
                return redirect()->route('view_all_leaves');
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
    public function leave_reject(Request $request){
        $leave_id = $request->id;
        $leave_reject = leave::find($leave_id);
        if($leave_reject){
            $leave_reject->status = '2';           
    
            $leave_reject->save();
            if($leave_reject){
                return redirect()->route('view_all_leaves');
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
    public function leave_cancel(Request $request){
        $leave_id = $request->id;
        $leave_cancel = leave::find($leave_id);
        if($leave_cancel){
            $leave_cancel->status = '3';           
    
            $leave_cancel->save();
            if($leave_cancel){
                return redirect()->route('view_all_leaves');
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
