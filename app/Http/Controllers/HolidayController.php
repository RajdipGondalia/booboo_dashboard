<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Holiday;

class HolidayController extends Controller
{

    public function create_holiday(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        return view('pages.Holiday.CreateHoliday')->with(['mode'=>"add",'current_user'=>$current_user]);
    }
    public function edit_holiday($id){

        $holiday = Holiday::find($id);
        $current_user = Auth::user()->name;

        return view('pages.Holiday.CreateHoliday')->with(['mode'=>"edit",'current_user'=>$current_user,'holiday'=>$holiday]);
    }
    public function delete_holiday($id){
        $holiday = Holiday::find($id);

        $holiday->isDelete = 1;

        $holiday->save();
        if($holiday){
            // return response()->json('success',200);
            return redirect()->route('dashboard');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }

    public function store_holiday_data(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'start_date' => 'required',
        ]);
        if($request->mode === 'add')
        {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            if($end_date=="" || $end_date=="NULL" || $end_date=="0000-00-00")
            {
                $end_date = $start_date;
            }
            if($start_date!="" && $start_date!="NULL" && $start_date!="0000-00-00" && $end_date!="" && $end_date!="NULL" && $end_date!="0000-00-00") 
            {
                if($start_date == $end_date)
                {
                    $Day = "1";
                }
                else 
                {
                    $start = strtotime($start_date);
                    $end = strtotime($end_date);
                    $totalSecondsDiff = abs($start-$end);

                    $days = floor($totalSecondsDiff/86400);
                    $days = $days+1;
                    $Day = $days;
                }
            }

            $holiday = new Holiday;
            $holiday->name = $request->name;
            $holiday->start_date = $start_date;
            $holiday->end_date = $end_date;
            $holiday->description = $request->description;
            $holiday->day = $Day;
            $holiday->user_id = auth()->user()->id;

            //Remaining attributes
            $holiday->save();

            if($holiday){
                return redirect()->route('dashboard');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else if($request->mode === 'edit')
    	{
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            if($end_date=="" || $end_date=="NULL" || $end_date=="0000-00-00")
            {
                $end_date = $start_date;
            }
            if($start_date!="" && $start_date!="NULL" && $start_date!="0000-00-00" && $end_date!="" && $end_date!="NULL" && $end_date!="0000-00-00") 
            {
                if($start_date == $end_date)
                {
                    $Day = "1";
                }
                else 
                {
                    $start = strtotime($start_date);
                    $end = strtotime($end_date);
                    $totalSecondsDiff = abs($start-$end);

                    $days = floor($totalSecondsDiff/86400);
                    $days = $days+1;
                    $Day = $days;
                }
            }

            $holiday_id = $request->holiday_id;
            $holiday = Holiday::find($holiday_id);

            $holiday->name = $request->name;
            $holiday->start_date = $start_date;
            $holiday->end_date = $end_date;
            $holiday->description = $request->description;
            $holiday->day = $Day;

            $holiday->save();

            if($holiday){
                return redirect()->route('dashboard');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
    }
    
}
