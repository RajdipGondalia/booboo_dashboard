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
          <span class="text-4xl self-center font-bold">Time Tracker Report</span>

          <div class="flex flex-col">
          </div>
        </div>
        <form action="{{ route('time_tracker_report_filter') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="flex flex-row mt-10">
            <!-- <span class="text-sm font-semibold self-center text-left mr-10 ">Select by : </span> -->
            <label class="block mb-5 self-center mb-3 xl:w-60 w-full sm:w-full">
              <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
              Select User
              </span>
              <select name="filter_user_id" id="filter_user_id" class="border-0 bg-transparent w-30" required>
                <option value="" >Select User</option>
                @foreach($users as $user)
                  <option {{($filter_user_id == $user->id)?"selected":""}} value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
            </label>
            <div class="datepicker relative form-floating mb-5 xl:w-60 sm:w-full w-full mr-10">
              <label class="block mb-5 self-center mb-3 xl:w-60 w-full sm:w-full">
                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                  Select Start Date
                </span>
                <input type="date" name="filter_start_date" id="filter_start_date" value="{{$filter_start_date}}" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Select a date" required />
              </label>
            </div>
            <div class="datepicker relative form-floating mb-5 xl:w-60 sm:w-full w-full">
              <label class="block mb-5 self-center mb-3 xl:w-60 w-full sm:w-full">
                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                  Select End Date
                </span>
                <input type="date" name="filter_end_date" id="filter_end_date" value="{{$filter_end_date}}" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Select a date" required />
              </label>
            </div>
            <div class="self-center lg:self-center ml-20 pb-10 ">
                <button class="text-white rounded-3xl bg-red-500 text-md font-semibold profile-button px-5 py-1" type="submit">Search</button>
                <a href="{{ route('view_all_time_trackers_report') }}" class="rounded-3xl bg-gray-200 text-md font-semibold profile-button px-5 py-1">Clear</a>
            </div>
          </div>
        </form>
        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Total Present Days : <b> {{$total_present_day}}</b></span> 
        @php

          $TimeDiff1 = gmdate("H:i:s", $total_seconds);


          $hours = floor($total_seconds / 3600);
          $minutes = floor(($total_seconds / 60) % 60);
          $seconds = $total_seconds % 60;

          $real_present_day = ($total_seconds/32400);
          $real_present_days = round($real_present_day, 2);
        @endphp
        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Total Time : <b> {{$hours}}:{{$minutes}}:{{$seconds}}</b></span> 
        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Total Present Days calculate with Time (1 Day = 9 Hours) : <b> {{$real_present_days}}</b></span> 
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
              @if((Auth::user()->type==1 || Auth::user()->type==2 ) && $view_mode=="all_users")
                <th class="text-neutral-400 p-1 font-semibold text-sm text-center"></th>
              @endif
              <th class="text-neutral-400 p-1 font-semibold text-sm text-center">Sr. No.</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-center">Date & Time</th>
              <th class="text-neutral-400 p-1 font-semibold text-sm text-center">Start/Stop</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Person</th>
              <th class="text-neutral-400 p-1 font-semibold text-sm text-center"></th>

            </tr>
          </thead>
          <tbody>
            @php
              $count = 0
              
              
            @endphp
            @if($view_mode=="all_users")
              @foreach($time_trackers as $time_tracker)
                @php
                  $current_time = date("d-m-Y h:i:s A",strtotime($time_tracker->current_time));
                @endphp
                <tr class="border-t-orange-300 border-b-2 border-b-zinc-200 align-top">
                  @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                    <td class="text-sm font-bold text-center">
                      <a onclick="return confirm('Are you sure Delete This Time Tracker..?')"  href="{{ route('single_time_tracker_delete', $time_tracker->id) }}" title="Delete" style="margin-left: 10px;color: red;text-decoration: none" >
                        <i class="fa fa-trash-o"></i>
                      </a>
                    </td>
                  @endif
                  <td class="text-sm font-bold text-center">{{++$count}}</td>
                  <td class="text-sm font-bold text-center">{{$current_time}}</td>
                  <td class="text-sm font-bold text-center">{{$time_tracker->flag}}</td>

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
                    <img src="{{$UserImage}}" class="rounded-full task-user-image mt-2"></img>
                    <span class="text-sm font-bold py-2 self-center ml-2">{{$time_tracker->user_name->name}}</span>
                  </td>
                </tr>
              @endforeach
            @elseif($view_mode=="filter_user")
              @foreach($datewise_time_trackers as $datewise_time_tracker)
                @php
                  $login_user_id = Auth::user()->id;
                  $user_id = $datewise_time_tracker->user_id;
                  $Created_at_date = $datewise_time_tracker->Created_at_date;
                  $Created_at_date_plus = date('Y-m-d', strtotime($Created_at_date . ' +1 day'));

                  $datewise_time_tracker_details = DB::select( DB::raw("Select * FROM time_tracker WHERE `user_id` = '".$user_id."'  AND isDelete=0 AND `current_time` > '".$Created_at_date."' AND `current_time` < '".$Created_at_date_plus."' ORDER BY id ASC") );
                  $user_details = DB::select( DB::raw("Select * FROM users WHERE id = '".$user_id."'  AND isDelete=0 ") );
                  
                  
                  $Created_at_date = date("d-m-Y",strtotime($datewise_time_tracker->Created_at_date));

                @endphp
                <tr class="border-t-orange-300 border-b-2 border-b-zinc-200">
                  <td class="text-sm font-bold text-center">{{++$count}}</td>
                  <td class="text-sm font-bold text-center">{{$Created_at_date}}</td>

                  
                  <td class="text-sm font-bold text-center">
                  @php
                    $TotalSecondsDiff =0;
                  @endphp
                  @foreach($datewise_time_tracker_details as $datewise_time_tracker_detail)
                    @if($datewise_time_tracker_detail->flag == "start")
                      @php
                      $start_curr_time = date("h:i:s A",strtotime($datewise_time_tracker_detail->current_time));
                      @endphp
                      <span style="color: green;" >Start : {{$start_curr_time}}</span>&nbsp;&nbsp;
                    @elseif($datewise_time_tracker_detail->flag == "stop")
                      @php
                        $SecondsDiff=0;
                        $stop_curr_time = date("h:i:s A",strtotime($datewise_time_tracker_detail->current_time));

                        $id =$datewise_time_tracker_detail->id;
                        $time_tracker_start = DB::select( DB::raw("Select * FROM time_tracker WHERE `id` < '".$id."' AND `flag` = 'start'  AND isDelete=0 AND `user_id` = '".$user_id."'  ORDER BY id DESC LIMIT 1") );
                        
                        $start_time = $time_tracker_start[0]->current_time;
                        $stop_time = $datewise_time_tracker_detail->current_time;

                        $start = strtotime($start_time);
                        $stop = strtotime($stop_time);
                        $SecondsDiff = abs($stop-$start);

                        $TotalSecondsDiff += $SecondsDiff;

                        $d_TimeDiff = gmdate("H:i:s", $SecondsDiff);
                        $d_days = floor($SecondsDiff/86400);
                        $d_hours = floor(($SecondsDiff - $d_days*86400) / 3600);
                        $d_minutes = floor(($SecondsDiff / 60) % 60);
                        $d_seconds = floor($SecondsDiff % 60);
                      @endphp
                        <span style="color: red;" >Stop : {{$stop_curr_time}}</span>&nbsp;&nbsp;
                        <span  class="text-neutral-400 p-1 font-semibold text-sm ">{{$d_TimeDiff}}</span>
                        <br>
                      @else
                        <span></span>
                    @endif
                  @endforeach
                  </td>

                  <td class="flex flex-row text-sm font-bold text-left">
                  @foreach($user_details as $user_detail)
                    @php
                    $user_image_path = $user_detail->image_path;
                    if($user_image_path!="" && $user_image_path!="null" )
                    {
                        $UserImage = asset('images/user')."/".$user_image_path;
                    }
                    else
                    {
                        $UserImage = asset('images')."/default.png";
                    }
                    @endphp
                    <img src="{{$UserImage}}"  class="rounded-full task-user-image mt-2"></img>
                    <span class="text-sm font-bold py-2 self-center ml-2">{{$user_detail->name}}</span>
                  @endforeach
                  </td>
                  @php
                    $t_TimeDiff = gmdate("H:i:s", $TotalSecondsDiff);
                    $t_days = floor($TotalSecondsDiff/86400);
                    $t_hours = floor(($TotalSecondsDiff - $t_days*86400) / 3600);
                    $t_minutes = floor(($TotalSecondsDiff / 60) % 60);
                    $t_seconds = floor($TotalSecondsDiff % 60);
                  @endphp
                  <td class="text-neutral-400 p-1 font-semibold text-sm text-center">
                    {{$t_TimeDiff}}
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>

      </div>
    </div>
  </section>

@endsection