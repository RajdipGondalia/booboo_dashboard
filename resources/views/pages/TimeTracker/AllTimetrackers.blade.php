@extends('layouts.master')
@section('content')
  <!-- Welcome Section-->
  

  <section class="lg:ml-60 md:ml-60 sm:ml-60 relative">

    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">

      <div class="buy-card lg:w-full p-10">

        <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
          <div class="flex flex-col">
            <!-- <img src="images/Ellipse 8.png" alt="" class="text-right self-center" height="80" width="80">
            <span class="text-md font-bold text-2xl self-center mx-2 md:mx-0">
              Star<span class="text-red-600">Admin</span>
            </span>
            <span class="text-xs self-center font-normal">staradmin.booboogames@gmail.com</span> -->
          </div>
          <span class="text-4xl self-center font-bold">Time Tracker</span>

          <div class="flex flex-col">
            <span class="text-md font-bold self-center">{{date("d-m-Y")}}</span>
            <span class="text-md self-center font-bold">Today's Total Time</span>
            @php
              $days = floor($total_seconds/86400);
              $hours = floor(($total_seconds - $days*86400) / 3600);
              $minutes = floor(($total_seconds / 60) % 60);
              $seconds = floor($total_seconds % 60);
            @endphp
            <span class="text-4xl text-emerald-600 font-bold">{{$hours}}:{{$minutes}}:{{$seconds}}</span>

            @if($user_last_flag=="stop")
              <button type="button" class="text-white  text-center w-20 self-end text-xs font-normal px-2 py-2 rounded-lg" style="background-color:green;" id="TimeStart">Start</button>
            @elseif($user_last_flag=="start")
              <button type="button" class="text-white bg-black text-center w-20 self-end text-xs font-normal px-2 py-2 rounded-lg"  id="TimeStop">Stop</button>  
            @else
              <button type="button" class="text-white  text-center w-20 self-end text-xs font-normal px-2 py-2 rounded-lg" style="background-color:green;" id="TimeStart">Start</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Welcome Section end-->

  <!-- Table Section-->

  <section class="lg:ml-60 md:ml-60 sm:ml-60 mt-10 relative">

    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">

      <div class="buy-card fix-width text-left ">

        <table class="table table-striped">
          <thead>
            <tr class="border-b-2 border-b-red-200">
              @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                <th class="text-neutral-400 p-1 font-semibold text-sm text-center">Action</th>
              @endif
              <th class="text-neutral-400 p-1 font-semibold text-sm text-center">Sr. No.</th>
              <th class="text-neutral-400 p-1 font-semibold text-sm text-center">Start/Stop</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-center">Date & Time</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Person</th>
            </tr>
          </thead>
          <tbody>
            @php
              $count = 0
            @endphp
            @foreach($time_trackers as $time_tracker)
              @php
                $current_time = date("d-m-Y h:i:s A",strtotime($time_tracker->current_time));
              @endphp
              <tr class="border-t-orange-300 border-b-2 border-b-zinc-200">
                @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                  <td class="text-sm font-bold text-center">
                    <a onclick="return confirm('Are you sure Delete This Time Tracker..?')"  href="{{ route('single_time_tracker_delete', $time_tracker->id) }}" title="Delete" style="margin-left: 10px;color: red;text-decoration: none" >
                      <i class="fa fa-trash-o"></i>
                    </a>
                  </td>
                @endif
                <td class="text-sm font-bold text-center">{{++$count}}</td>
                <td class="text-sm font-bold text-center">{{$time_tracker->flag}}</td>
                <td class="text-sm font-bold text-center">{{$current_time}}</td>
                @php
                  $user_image_path = $time_tracker->user_name->image_path;
                  if($user_image_path!="" && $user_image_path!="null" )
                  {
                    $UserImage = asset('images/user')."/".$user_image_path;
                  }
                  else
                  {
                    $UserImage = asset('images')."/default.png";
                  }
                @endphp
                <td class="flex flex-row text-sm font-bold text-left">
                  <img src="{{$UserImage}}"  class="rounded-full task-user-image mt-2"></img>
                  <span class="text-sm font-bold py-2 self-center ml-2">{{$time_tracker->user_name->name}}</span>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </section>

  <!-- Table Section end-->
  <script>
    $(document).ready(function (){
      $('#TimeStart').on('click', function(){
        var user_id = `{{Auth::user()->id}}`;
        time_start(user_id);
      })
      $('#TimeStop').on('click', function(){
        var user_id = `{{Auth::user()->id}}`;
        time_stop(user_id);
      })
      function time_start(user_id){

        var tdate = new Date();
        var dd = tdate.getDate(); //yields day
        var MM = tdate.getMonth(); //yields month
        var yyyy = tdate.getFullYear(); //yields year
        var hh = tdate.getHours();
        var ii = tdate.getMinutes();
        var ss = tdate.getSeconds();

        var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

        var url = `{{ route('time_tracker_start') }}`;
        // console.log("Function called",date);
        // console.log("User Id",user_id);
        const form_data = new FormData();
        form_data.append("user_id",user_id);
        form_data.append("start_time",date);
        axios.post(url,form_data).then(response => {
          location.reload();
        }).catch(error=>{
          // console.log(error);
        });
      }
      function time_stop(user_id){

        var tdate = new Date();
        var dd = tdate.getDate(); //yields day
        var MM = tdate.getMonth(); //yields month
        var yyyy = tdate.getFullYear(); //yields year
        var hh = tdate.getHours();
        var ii = tdate.getMinutes();
        var ss = tdate.getSeconds();

        var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

        var url = `{{ route('time_tracker_stop') }}`;
        // console.log("Function called",date);
        // console.log("User Id",user_id);
        const form_data = new FormData();
        form_data.append("user_id",user_id);
        form_data.append("start_time",date);
        axios.post(url,form_data).then(response => {
          location.reload();
        }).catch(error=>{
          // console.log(error);
        });
        }
    });
    // display a modal (small modal)
    
      


        // $date="date(Y-m-d h:i:s)";
        // //dd($request->all());
        // // dd($request->img[0]);
        // $time_start = new TimeTracker;
        // $time_start->flag = 'start';
        // $time_start->user_id = '1';
        // $time_start->current_time = $date;


        // $time_start->save();

        // if($time_start){
        //     return redirect()->route('all_employees');
        // }else{
        //     $message = 'Data not Saved';
        //     Session('message',$message);
        // }
      // }
  </script>
@endsection