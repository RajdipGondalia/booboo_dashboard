<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeTracker;
use App\Models\User;
use DB;


class TimeTrackerController extends Controller
{
    public function delete_single_time_tracker($id){
        $time_tracker = TimeTracker::find($id);

        $time_tracker->isDelete = 1;

        $time_tracker->save();
        if($time_tracker){
            // return response()->json('success',200);
            return redirect()->route('view_all_time_trackers');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    public function time_tracker_start(Request $request){

        //$date="date(Y-m-d h:i:s)";
        //dd($request->all());
        // dd($request->img[0]);
        $time_start = new TimeTracker;
        $time_start->flag = 'start';
        $time_start->user_id = $request->user_id;
        $time_start->current_time = $request->start_time;
        
        $time_start->save();

        if($time_start){
            return redirect()->route('view_all_time_trackers');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }  
    }
    public function time_tracker_stop(Request $request){

        //$date="date(Y-m-d h:i:s)";
        //dd($request->all());
        // dd($request->img[0]);
        $time_start = new TimeTracker;
        $time_start->flag = 'stop';
        $time_start->user_id = $request->user_id;
        $time_start->current_time = $request->start_time;
        

        $time_start->save();

        if($time_start){
            return redirect()->route('view_all_time_trackers');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function time_tracker_report_filter(Request $request){

        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;
        $users = User::where('isDelete', '=', 0)->get();

        $filter_user_id = $request->filter_user_id;
        $filter_start_date = $request->filter_start_date;
        
        $filter_end_date = $request->filter_end_date;
        $filter_end_date_plus = date('Y-m-d', strtotime($filter_end_date . ' +1 day'));

        $TotalSecondsDiff =0;
        $SecondsDiff=0;
        if($filter_user_id!=0 && $filter_user_id!="" && $filter_start_date!="" && $filter_end_date!="" )
        {
            $datewise_time_trackers = DB::select( DB::raw("Select  *,count(*) , DATE_FORMAT(`current_time`,'%Y-%m-%d') as Created_at_date  FROM time_tracker WHERE user_id='".$filter_user_id."' AND isDelete=0 AND `current_time` > '".$filter_start_date."' AND `current_time` < '".$filter_end_date_plus."' GROUP BY Created_at_date ORDER BY id DESC") );


            $time_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $filter_user_id)->whereDate('current_time', '>=', $filter_start_date)->whereDate('current_time', '<=', $filter_end_date)->orderBy('id',"DESC")->get();
            $total_present_dayArray = DB::select( DB::raw("Select count(*), DATE_FORMAT(Created_At,'%Y-%m-%d') as Created_Day1 FROM time_tracker WHERE user_id = '".$filter_user_id."' AND isDelete=0 AND `current_time` > '".$filter_start_date."' AND `current_time` < '".$filter_end_date_plus."'  GROUP BY Created_Day1") );
            // dd($total_present_dayArray);
            $total_present_day = sizeof($total_present_dayArray);

            // cal. sec. logic start
            $single_time_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $filter_user_id)->whereDate('current_time', '>=', $filter_start_date)->whereDate('current_time', '<=', $filter_end_date)->get();
            
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
                    
                    $single_start_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $filter_user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();
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
            // cal. sec. logic end
        }
        else
        {
            $datewise_time_trackers = DB::select( DB::raw("Select  *,count(*) , DATE_FORMAT(`current_time`,'%Y-%m-%d') as Created_at_date  FROM time_tracker WHERE user_id='".$login_user_id."' AND isDelete=0  GROUP BY Created_at_date ORDER BY id DESC") );

            $time_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();

            $total_present_dayArray = DB::select( DB::raw("Select count(*), DATE_FORMAT(Created_At,'%Y-%m-%d') as Created_Day1 FROM time_tracker WHERE user_id = '".$login_user_id."'  AND isDelete=0 GROUP BY Created_Day1") );
            
            $total_present_day = sizeof($total_present_dayArray);

            // cal sec. logic start
            $single_time_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->get();
            
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
            // cal sec. logic end
        }
        // $filter_end_date = date('Y-m-d', strtotime($filter_end_date . ' -1 day'));
        return view('pages.TimeTracker.AllTimetrackersReport')->with(['time_trackers'=>$time_trackers,'current_user'=>$current_user,'users'=>$users,'filter_user_id'=>$filter_user_id,'filter_start_date'=>$filter_start_date,'filter_end_date'=>$filter_end_date,'total_present_day'=>$total_present_day,'total_seconds'=>$TotalSecondsDiff,'view_mode'=>"filter_user",'datewise_time_trackers'=>$datewise_time_trackers]);
    }
}
