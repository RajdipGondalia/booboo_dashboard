
@extends('layouts.master')
@section('content')
    
    @include('partials.welcome_section',['current_user',$current_user])
    <!-- Counts Section end-->
    @if($active_important_notes!="[]")
        <section class="lg:ml-60 md:ml-60 sm:ml-60 market-background relative pt-6">
            <div class="flex flex-row  px-10 mx-4 sm:mx-20 xl:mx-20 ">
                <div class=" text-right flex flex-col">
                    <!-- w-1/6 -->
                    <button class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full blink-button">
                        <!-- <span id='text' class='console-underscore'></span> -->
                        IMPORTANT 
                    </button>
                </div>
                <div class="text-center w-full w-full pt-1">
                    <div class="mx-0">
                        <marquee style="color:crimson" class="font-semibold text-lg"> 
                        
                        @foreach($active_important_notes as $active_important_note)
                            <span> &#10027; {{$active_important_note->note}} </span>
                        @endforeach
                        </marquee>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
    <section class="lg:ml-60 md:ml-60 sm:ml-60 market-background relative pt-6">
        
        <div class="flex flex-col xl:flex xl:flex-col xl:justify-between grid grid-cols-1 gap-5 px-10sm:grid sm:grid-cols-2 sm:gap-5 md:grid md:grid-cols-2 md:gap-5 xl:grid xl:grid-cols-5 xl:gap-10 mx-4 sm:mx-20 xl:mx-20">
        
            <div class="buy-card p-4 md:p-4 text-center flex flex-col bg-slate-500 text-white p-4 m-3 rounded-lg shadow-lg " style="background-color:#764adf;">
                <span class="text-start text-xl">Total User</span>
                <span class="text-end text-2xl font-bold">{{ $count['total_users_count'] }}</span>
            </div>
            <div class="buy-card p-4 md:p-4 text-center flex flex-col bg-indigo-500 text-white p-4 m-3 rounded-lg shadow-lg ">
                <span class="text-start text-xl">Total Employee</span>
                <span class="text-end text-2xl font-bold">{{ $count['total_employees_count'] }}</span>
            </div>
            <div class="buy-card p-4 md:p-4 text-center flex flex-col bg-green-500 text-white p-4 m-3 rounded-lg shadow-lg">
                <span class="text-start text-xl">Total Tasks</span>
                <span class="text-end text-2xl font-bold">{{ $count['total_tasks_count'] }}</span>
            </div>
            <div class="buy-card p-4 md:p-4 text-center flex flex-col bg-green-500 text-white p-4 m-3 rounded-lg shadow-lg">
                <span class="text-start text-xl">Pending Tasks</span>
                <span class="text-end text-2xl font-bold">{{ $count['pending_tasks_count'] }}</span>
            </div>
            <div class="buy-card p-4 md:p-4 text-center flex flex-col bg-yellow-700  text-white p-4 m-3 rounded-lg shadow-lg">
                <span class="text-start text-xl">Total Projects</span>
                <span class="text-end text-2xl font-bold">{{ $count['total_projects_count'] }}</span>
            </div>
        </div>
    </section>
    @endif
    <section class="lg:ml-60 md:ml-60 sm:ml-60 market-background relative pt-6">
        <div class="flex flex-col xl:flex xl:flex-col xl:justify-between grid grid-cols-1 xl:pl-10 md:pl-10 sm:pl-10 pl-0 xl:px-10 md:px-10 sm:px-10 px-0 sm:grid sm:grid-cols-1 sm:gap-5 md:grid md:grid-cols-2 md:gap-10 xl:grid xl:grid-cols-2 xl:gap-10 sm:mx-0 xl:mx-0 -mb-32">
            <div class="p-4 md:p-4 text-center flex flex-col bg-white h-3/4 rounded-2xl ">
                <span class="text-2xl text-center text-md font-bold text-neutral-700">Leave</span>
                <div class="container px-0 mx-auto flex flex-col xl:flex align overflow-y-auto h-full">
                    <div class="fix-width text-left overflow-y-auto h-full">
                        <table class="table  project-list-table table-responsive" style="float: left;height: 500px;overflow-x: hidden;overflow-y: auto; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-1/12">Sr.No.</th>
                                    <th class="text-neutral-400 p-4 font-semibold text-xs text-left w-2/12">Person</th>
                                    <th class="text-neutral-400 p-4 font-semibold text-xs text-left w-2/12">Leave Date - Cover Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 0;
                                $DayArray = array("1"=>"Half Day","2"=>"Full Day");
                                $StatusArray = array("0"=>"Pending ","1"=>"Approved","2"=>"Rejected","3"=>"Cancelled");
                            
                            @endphp
                            @foreach($approve_leaves as $approve_leave)
                                <tr class="bg-white align-top">
                        
                                    <td class="text-sm font-semibold p-2 text-center ">{{++$count}}</td>
                                    @php
                                        $createdby_image_path = $approve_leave->user_name->image_path;
                                        if($createdby_image_path!="" && $createdby_image_path!="null" )
                                        {
                                            $CreatedByUserImage = asset('images/user')."/".$createdby_image_path;
                                        }
                                        else
                                        {
                                            $CreatedByUserImage = asset('images')."/default.png";
                                        }
                                    @endphp
                                    <td class="flex flex-row text-sm font-bold text-left">
                                        <img src="{{$CreatedByUserImage}}"  class="rounded-full task-user-image mt-2"></img>
                                        <span class="text-sm font-semibold p-2 self-center ml-2">{{$approve_leave->user_name->name}}</span>
                                    </td>
                                    <td class="text-sm font-semibold p-2 text-left">
                                        @if($approve_leave->leave_date_1!="" && $approve_leave->leave_date_1!="NULL" && $approve_leave->leave_date_1!="0000-00-00"  && $approve_leave->leave_date_1!="1970-01-01")
                                            @php
                                                $leave_date_1 = date("d-m-Y",strtotime($approve_leave->leave_date_1));
                                                if($approve_leave->cover_date_1!="" && $approve_leave->cover_date_1!="NULL" && $approve_leave->cover_date_1!="0000-00-00"  && $approve_leave->cover_date_1!="1970-01-01")
                                                {
                                                    $cover_date_1 = date("d-m-Y",strtotime($approve_leave->cover_date_1));
                                                }
                                                else
                                                {
                                                    $cover_date_1 = "-";
                                                }
                                            @endphp
                                            {{ $leave_date_1 }} &nbsp;<b>{{ $DayArray[$approve_leave->leave_day_1] }}</b> &nbsp  {{$cover_date_1}}<br>
                                        @endif
                                        @if($approve_leave->leave_date_2!="" && $approve_leave->leave_date_2!="NULL" && $approve_leave->leave_date_2!="0000-00-00"  && $approve_leave->leave_date_2!="1970-01-01")
                                            @php
                                                $leave_date_2 = date("d-m-Y",strtotime($approve_leave->leave_date_2));
                                                if($approve_leave->cover_date_2!="" && $approve_leave->cover_date_2!="NULL" && $approve_leave->cover_date_2!="0000-00-00"  && $approve_leave->cover_date_2!="1970-01-01")
                                                {
                                                    $cover_date_2 = date("d-m-Y",strtotime($approve_leave->cover_date_2));
                                                }
                                                else
                                                {
                                                    $cover_date_2 = "-";
                                                }
                                            @endphp
                                            {{ $leave_date_2 }} &nbsp;<b>{{ $DayArray[$approve_leave->leave_day_2] }}</b> &nbsp  {{$cover_date_2}}<br>
                                        @endif
                                        @if($approve_leave->leave_date_3!="" && $approve_leave->leave_date_3!="NULL" && $approve_leave->leave_date_3!="0000-00-00"  && $approve_leave->leave_date_3!="1970-01-01")
                                            @php
                                                $leave_date_3 = date("d-m-Y",strtotime($approve_leave->leave_date_3));
                                                if($approve_leave->cover_date_3!="" && $approve_leave->cover_date_3!="NULL" && $approve_leave->cover_date_3!="0000-00-00"  && $approve_leave->cover_date_3!="1970-01-01")
                                                {
                                                    $cover_date_3 = date("d-m-Y",strtotime($approve_leave->cover_date_3));
                                                }
                                                else
                                                {
                                                    $cover_date_3 = "-";
                                                }
                                            @endphp
                                            {{ $leave_date_3 }} &nbsp;<b>{{ $DayArray[$approve_leave->leave_day_3] }}</b> &nbsp  {{$cover_date_3}}<br>
                                        @endif
                                        @if($approve_leave->leave_date_4!="" && $approve_leave->leave_date_4!="NULL" && $approve_leave->leave_date_4!="0000-00-00"  && $approve_leave->leave_date_4!="1970-01-01")
                                            @php
                                                $leave_date_4 = date("d-m-Y",strtotime($approve_leave->leave_date_4));
                                                if($approve_leave->cover_date_4!="" && $approve_leave->cover_date_4!="NULL" && $approve_leave->cover_date_4!="0000-00-00"  && $approve_leave->cover_date_4!="1970-01-01")
                                                {
                                                    $cover_date_4 = date("d-m-Y",strtotime($approve_leave->cover_date_4));
                                                }
                                                else
                                                {
                                                    $cover_date_4 = "-";
                                                }
                                            @endphp
                                            {{ $leave_date_4 }} &nbsp;<b>{{ $DayArray[$approve_leave->leave_day_4] }}</b> &nbsp  {{$cover_date_4}}<br>
                                        @endif
                                        @if($approve_leave->leave_date_5!="" && $approve_leave->leave_date_5!="NULL" && $approve_leave->leave_date_5!="0000-00-00"  && $approve_leave->leave_date_5!="1970-01-01")
                                            @php
                                                $leave_date_5 = date("d-m-Y",strtotime($approve_leave->leave_date_5));
                                                if($approve_leave->cover_date_5!="" && $approve_leave->cover_date_5!="NULL" && $approve_leave->cover_date_5!="0000-00-00"  && $approve_leave->cover_date_5!="1970-01-01")
                                                {
                                                    $cover_date_5 = date("d-m-Y",strtotime($approve_leave->cover_date_5));
                                                }
                                                else
                                                {
                                                    $cover_date_5 = "-";
                                                }
                                            @endphp
                                            {{ $leave_date_5 }} &nbsp;<b>{{ $DayArray[$approve_leave->leave_day_5] }}</b> &nbsp  {{$cover_date_5}}<br>
                                        @endif
                                        @if($approve_leave->leave_date_6!="" && $approve_leave->leave_date_6!="NULL" && $approve_leave->leave_date_6!="0000-00-00"  && $approve_leave->leave_date_6!="1970-01-01")
                                            @php
                                                $leave_date_6 = date("d-m-Y",strtotime($approve_leave->leave_date_6));
                                                if($approve_leave->cover_date_6!="" && $approve_leave->cover_date_6!="NULL" && $approve_leave->cover_date_6!="0000-00-00"  && $approve_leave->cover_date_6!="1970-01-01")
                                                {
                                                    $cover_date_6 = date("d-m-Y",strtotime($approve_leave->cover_date_6));
                                                }
                                                else
                                                {
                                                    $cover_date_6 = "-";
                                                }
                                            @endphp
                                            {{ $leave_date_6 }} &nbsp;<b>{{ $DayArray[$approve_leave->leave_day_6] }}</b> &nbsp  {{$cover_date_6}}<br>
                                        @endif
                                        @if($approve_leave->leave_date_7!="" && $approve_leave->leave_date_7!="NULL" && $approve_leave->leave_date_7!="0000-00-00"  && $approve_leave->leave_date_7!="1970-01-01")
                                            @php
                                                $leave_date_7 = date("d-m-Y",strtotime($approve_leave->leave_date_7));
                                                if($approve_leave->cover_date_7!="" && $approve_leave->cover_date_7!="NULL" && $approve_leave->cover_date_7!="0000-00-00"  && $approve_leave->cover_date_7!="1970-01-01")
                                                {
                                                    $cover_date_7 = date("d-m-Y",strtotime($approve_leave->cover_date_7));
                                                }
                                                else
                                                {
                                                    $cover_date_7 = "-";
                                                }
                                            @endphp
                                            {{ $leave_date_7 }} &nbsp;<b>{{ $DayArray[$approve_leave->leave_day_7] }}</b> &nbsp  {{$cover_date_7}}<br>
                                        @endif
                                    </td>
                                    
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="p-4 md:p-4 text-center flex flex-col bg-white h-3/4 rounded-2xl ">
                <span class="text-2xl text-center text-md font-bold text-neutral-700">Holidays</span>
                @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                    <span class="text-right mb-5" >
                        <a href="{{ route('create_holiday') }}" class="text-white rounded-3xl bg-red-600 text-md font-normal px-4 py-2 rounded-lg">Add Holiday <i class="fa fa-plus"></i></a>
                    </span>
                @endif
                <div class="container px-0 mx-auto flex flex-col xl:flex align overflow-y-auto h-full">
                    <div class="fix-width text-left overflow-y-auto h-full">
                        <table class="table  project-list-table table-responsive" style="float: left;height: 500px;overflow-x: hidden;overflow-y: auto; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-1/12">Sr.No.</th>
                                    <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-4/12">Title</th>
                                    <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-2/12">Start Date</th>
                                    <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-2/12">End Date</th>
                                    <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-2/12">Days</th>
                                    <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-1/12"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach($holidays as $holiday)
                                    @php
                                        if($holiday->start_date!="" && $holiday->start_date!="NULL" && $holiday->start_date!="0000-00-00"  && $holiday->start_date!="1970-01-01")
                                        {
                                            $StartDate = date("d-m-Y",strtotime($holiday->start_date));
                                        }
                                        else
                                        {
                                            $StartDate = "-";
                                        }
                                        if($holiday->end_date!="" && $holiday->end_date!="NULL" && $holiday->end_date!="0000-00-00"  && $holiday->end_date!="1970-01-01")
                                        {
                                            $EndDate = date("d-m-Y",strtotime($holiday->end_date));
                                        }
                                        else
                                        {
                                            $EndDate = "-";
                                        }
                                        if($holiday->day == 1)
                                        {
                                            $Day = $holiday->day." Day";
                                        }
                                        else
                                        {
                                            $Day = $holiday->day." Days";
                                        }
                                    @endphp
                                    
                                    <tr class="bg-white align-top">
                                        <td class="text-sm font-semibold p-2 text-center ">{{++$count}}</td>
                                        <td class="text-sm font-semibold p-2 text-center">
                                            <span>{{$holiday->name}}</span><br />
                                            <span class="text-xs font-normal text-400">{{$holiday->description}}</span>
                                        </td>
                                        <td class="text-sm font-semibold p-2 text-center">
                                            
                                            {{ $StartDate }} 
                                        </td>
                                        <td class="text-sm font-semibold p-2 text-center">
                                            {{ $EndDate }} 
                                        </td>
                                        <td class="text-sm font-semibold p-2 text-center">
                                            {{ $Day }} 
                                        </td>
                                        @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                        <td class="text-sm font-semibold p-2 text-left">
                                            <div class="dropdown_container" tabindex="-1">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                <div class="dropdown">
                                                    <a href="{{ route('edit_holiday', $holiday->id) }}" class="grid_dropdown_item edit_button" >
                                                        <div><i class="fa fa-edit"></i> Edit</div>
                                                    </a>
                                                    <a onclick="return confirm('Are you sure Delete This Holiday..?')"  href="{{ route('delete_holiday', $holiday->id) }}" class="grid_dropdown_item delete_button"  title="Delete">
                                                        <div><i class="fa fa-trash-o"> Delete</i></div>
                                                    </a> 
                                            </div>
                                        </td>  
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="flex flex-col xl:flex xl:flex-col xl:justify-between grid grid-cols-1 xl:pl-10 md:pl-10 sm:pl-10 pl-0 xl:px-10 md:px-10 sm:px-10 px-0 sm:grid sm:grid-cols-1 sm:gap-5 md:grid md:grid-cols-2 md:gap-10    sm:mx-0 xl:mx-0 -mb-40 mt-10 "> -->
        <div class="flex flex-col xl:flex xl:flex-col xl:justify-between grid grid-cols-1 xl:pl-10 md:pl-10 sm:pl-10 pl-0 xl:px-10 md:px-10 sm:px-10 px-0 sm:grid sm:grid-cols-1 sm:gap-5 md:grid md:grid-cols-2 md:gap-10 xl:grid xl:grid-cols-2 xl:gap-10 sm:mx-0 xl:mx-0 -mb-32">
            @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                <div class="p-4 md:p-4 text-center flex flex-col bg-white h-3/4 rounded-2xl ">
                    <span class="text-2xl text-center text-md font-bold text-neutral-700 ">Pending Leave Request</span>
                    <div class="container px-0 mx-auto flex flex-col xl:flex align overflow-y-auto h-full">
                        <div class="fix-width text-left overflow-y-auto h-full">
                            <table class="table  project-list-table table-responsive" style="float: left;height: 500px;overflow-x: hidden;overflow-y: auto; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-1/12">Sr.No.</th>
                                        <th class="text-neutral-400 p-4 font-semibold text-xs text-left w-1/12">Person</th>
                                        <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-3/12">Leave Date - Cover Date</th>
                                        <th class="text-neutral-400 p-4 font-semibold text-xs text-left w-2/12">Leave Reason</th>
                                        <th class="text-neutral-400 p-4 font-semibold text-xs text-left w-1/12"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $count = 0;
                                    $DayArray = array("1"=>"Half Day","2"=>"Full Day");
                                    $StatusArray = array("0"=>"Pending ","1"=>"Approved","2"=>"Rejected","3"=>"Cancelled");
                                @endphp
                                @foreach($pending_leaves as $pending_leave)
                                    <tr class="bg-white align-top">
                                        <td class="text-sm font-semibold p-2 text-center ">{{++$count}}</td>
                                        @php
                                            $createdby_image_path = $pending_leave->user_name->image_path;
                                            if($createdby_image_path!="" && $createdby_image_path!="null" )
                                            {
                                                $CreatedByUserImage = asset('images/user')."/".$createdby_image_path;
                                            }
                                            else
                                            {
                                                $CreatedByUserImage = asset('images')."/default.png";
                                            }
                                        @endphp
                                        <td class="flex flex-row text-sm font-bold text-left">
                                            <img src="{{$CreatedByUserImage}}"  class="rounded-full task-user-image mt-2"></img>
                                            <span class="text-sm font-semibold p-2 self-center ml-2">{{$pending_leave->user_name->name}}</span>
                                        </td>
                                        <td class="text-sm font-semibold p-2 text-left">
                                            @if($pending_leave->leave_date_1!="" && $pending_leave->leave_date_1!="NULL" && $pending_leave->leave_date_1!="0000-00-00"  && $pending_leave->leave_date_1!="1970-01-01")
                                                @php
                                                    $leave_date_1 = date("d-m-Y",strtotime($pending_leave->leave_date_1));
                                                    if($pending_leave->cover_date_1!="" && $pending_leave->cover_date_1!="NULL" && $pending_leave->cover_date_1!="0000-00-00"  && $pending_leave->cover_date_1!="1970-01-01")
                                                    {
                                                        $cover_date_1 = date("d-m-Y",strtotime($pending_leave->cover_date_1));
                                                    }
                                                    else
                                                    {
                                                        $cover_date_1 = "-";
                                                    }
                                                @endphp
                                                {{ $leave_date_1 }} &nbsp;<b>{{ $DayArray[$pending_leave->leave_day_1] }}</b> &nbsp  {{$cover_date_1}}<br>
                                            @endif
                                            @if($pending_leave->leave_date_2!="" && $pending_leave->leave_date_2!="NULL" && $pending_leave->leave_date_2!="0000-00-00"  && $pending_leave->leave_date_2!="1970-01-01")
                                                @php
                                                    $leave_date_2 = date("d-m-Y",strtotime($pending_leave->leave_date_2));
                                                    if($pending_leave->cover_date_2!="" && $pending_leave->cover_date_2!="NULL" && $pending_leave->cover_date_2!="0000-00-00"  && $pending_leave->cover_date_2!="1970-01-01")
                                                    {
                                                        $cover_date_2 = date("d-m-Y",strtotime($pending_leave->cover_date_2));
                                                    }
                                                    else
                                                    {
                                                        $cover_date_2 = "-";
                                                    }
                                                @endphp
                                                {{ $leave_date_2 }} &nbsp;<b>{{ $DayArray[$pending_leave->leave_day_2] }}</b> &nbsp  {{$cover_date_2}}<br>
                                            @endif
                                            @if($pending_leave->leave_date_3!="" && $pending_leave->leave_date_3!="NULL" && $pending_leave->leave_date_3!="0000-00-00"  && $pending_leave->leave_date_3!="1970-01-01")
                                                @php
                                                    $leave_date_3 = date("d-m-Y",strtotime($pending_leave->leave_date_3));
                                                    if($pending_leave->cover_date_3!="" && $pending_leave->cover_date_3!="NULL" && $pending_leave->cover_date_3!="0000-00-00"  && $pending_leave->cover_date_3!="1970-01-01")
                                                    {
                                                        $cover_date_3 = date("d-m-Y",strtotime($pending_leave->cover_date_3));
                                                    }
                                                    else
                                                    {
                                                        $cover_date_3 = "-";
                                                    }
                                                @endphp
                                                {{ $leave_date_3 }} &nbsp;<b>{{ $DayArray[$pending_leave->leave_day_3] }}</b> &nbsp  {{$cover_date_3}}<br>
                                            @endif
                                            @if($pending_leave->leave_date_4!="" && $pending_leave->leave_date_4!="NULL" && $pending_leave->leave_date_4!="0000-00-00"  && $pending_leave->leave_date_4!="1970-01-01")
                                                @php
                                                    $leave_date_4 = date("d-m-Y",strtotime($pending_leave->leave_date_4));
                                                    if($pending_leave->cover_date_4!="" && $pending_leave->cover_date_4!="NULL" && $pending_leave->cover_date_4!="0000-00-00"  && $pending_leave->cover_date_4!="1970-01-01")
                                                    {
                                                        $cover_date_4 = date("d-m-Y",strtotime($pending_leave->cover_date_4));
                                                    }
                                                    else
                                                    {
                                                        $cover_date_4 = "-";
                                                    }
                                                @endphp
                                                {{ $leave_date_4 }} &nbsp;<b>{{ $DayArray[$pending_leave->leave_day_4] }}</b> &nbsp  {{$cover_date_4}}<br>
                                            @endif
                                            @if($pending_leave->leave_date_5!="" && $pending_leave->leave_date_5!="NULL" && $pending_leave->leave_date_5!="0000-00-00"  && $pending_leave->leave_date_5!="1970-01-01")
                                                @php
                                                    $leave_date_5 = date("d-m-Y",strtotime($pending_leave->leave_date_5));
                                                    if($pending_leave->cover_date_5!="" && $pending_leave->cover_date_5!="NULL" && $pending_leave->cover_date_5!="0000-00-00"  && $pending_leave->cover_date_5!="1970-01-01")
                                                    {
                                                        $cover_date_5 = date("d-m-Y",strtotime($pending_leave->cover_date_5));
                                                    }
                                                    else
                                                    {
                                                        $cover_date_5 = "-";
                                                    }
                                                @endphp
                                                {{ $leave_date_5 }} &nbsp;<b>{{ $DayArray[$pending_leave->leave_day_5] }}</b> &nbsp  {{$cover_date_5}}<br>
                                            @endif
                                            @if($pending_leave->leave_date_6!="" && $pending_leave->leave_date_6!="NULL" && $pending_leave->leave_date_6!="0000-00-00"  && $pending_leave->leave_date_6!="1970-01-01")
                                                @php
                                                    $leave_date_6 = date("d-m-Y",strtotime($pending_leave->leave_date_6));
                                                    if($pending_leave->cover_date_6!="" && $pending_leave->cover_date_6!="NULL" && $pending_leave->cover_date_6!="0000-00-00"  && $pending_leave->cover_date_6!="1970-01-01")
                                                    {
                                                        $cover_date_6 = date("d-m-Y",strtotime($pending_leave->cover_date_6));
                                                    }
                                                    else
                                                    {
                                                        $cover_date_6 = "-";
                                                    }
                                                @endphp
                                                {{ $leave_date_6 }} &nbsp;<b>{{ $DayArray[$pending_leave->leave_day_6] }}</b> &nbsp  {{$cover_date_6}}<br>
                                            @endif
                                            @if($pending_leave->leave_date_7!="" && $pending_leave->leave_date_7!="NULL" && $pending_leave->leave_date_7!="0000-00-00"  && $pending_leave->leave_date_7!="1970-01-01")
                                                @php
                                                    $leave_date_7 = date("d-m-Y",strtotime($pending_leave->leave_date_7));
                                                    if($pending_leave->cover_date_7!="" && $pending_leave->cover_date_7!="NULL" && $pending_leave->cover_date_7!="0000-00-00"  && $pending_leave->cover_date_7!="1970-01-01")
                                                    {
                                                        $cover_date_7 = date("d-m-Y",strtotime($pending_leave->cover_date_7));
                                                    }
                                                    else
                                                    {
                                                        $cover_date_7 = "-";
                                                    }
                                                @endphp
                                                {{ $leave_date_7 }} &nbsp;<b>{{ $DayArray[$pending_leave->leave_day_7] }}</b> &nbsp  {{$cover_date_7}}<br>
                                            @endif
                                        </td>
                                        <td class="text-sm font-semibold p-2 text-left">{{ $pending_leave->leave_reason }}</td>

                                        <td class="text-sm font-semibold p-2 text-left">
                                            <div class="dropdown_container" tabindex="-1">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            <div class="dropdown">
                                                @if($pending_leave->status == 0 )
                                                    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                                        <a data-id="{{$pending_leave->id}}" title="Leave Approve" class="grid_dropdown_item start_button"  onClick="leave_approve({{$pending_leave->id}})">
                                                            <div><i class="fa fa-circle"></i> Approve</div>
                                                        </a>
                                                        <a data-id="{{$pending_leave->id}}" title="Leave Reject" class="grid_dropdown_item stop_button"  onClick="leave_reject({{$pending_leave->id}})">
                                                            <div><i class="fa fa-circle"></i> Reject</div>
                                                        </a>
                                                    @endif
                                                    <a data-id="{{$pending_leave->id}}" title="Leave Cancel" class="grid_dropdown_item cancel_button"  onClick="leave_cancel({{$pending_leave->id}})">
                                                        <div><i class="fa fa-circle"></i> Cancel</div>
                                                    </a>
                                                    <a href="{{ route('edit_leave', $pending_leave->id) }}" class="grid_dropdown_item edit_button" >
                                                        <div><i class="fa fa-edit"></i> Edit</div>
                                                    </a>
                                                @endif
                                                @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                                    <!-- <a onclick="return confirm('Are you sure Delete This Leave..?')"  href="{{ route('delete_leave', $pending_leave->id) }}" class="grid_dropdown_item delete_button"  title="Delete"  >
                                                        <div><i class="fa fa-trash-o"> Delete</i></div>
                                                    </a> -->
                                                @endif
                                        </div>
                                        </td>  
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                <div class="p-4 md:p-4 text-center flex flex-col bg-white h-3/4 rounded-2xl ">
                    <span class="text-2xl text-center text-md font-bold text-neutral-700">Important Notes</span>
                    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                        <span class="text-right mb-5" >
                            <a href="{{ route('create_important_note') }}" class="text-white rounded-3xl bg-red-600 text-md font-normal px-4 py-2 rounded-lg">Add Note <i class="fa fa-plus"></i></a>
                        </span>
                    @endif
                    <div class="container px-0 mx-auto flex flex-col xl:flex align overflow-y-auto h-full">
                        <div class="fix-width text-left overflow-y-auto h-full">
                            <table class="table  project-list-table table-responsive" style="float: left;height: 500px;overflow-x: hidden;overflow-y: auto; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-1/12">Sr.No.</th>
                                        <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-4/12">Note</th>
                                        <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-4/12">Created By</th>
                                        <th class="text-neutral-400 p-4 font-semibold text-xs text-center w-1/12"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach($important_notes as $important_note)
                                        @php
                                            if($important_note->isActive==1)
                                            {
                                                $color="#aaebaa";
                                            }
                                            else
                                            {
                                                $color="#f37e7e";
                                            }
                                        @endphp
                                        <tr class="bg-white align-top" style="background-color:{{$color}}">
                                            <td class="text-sm font-semibold p-2 text-center ">{{++$count}}</td>
                                            <td class="text-sm font-semibold p-2 text-center">
                                                {{$important_note->note}}
                                            </td>
                                            @php
                                                $person_image_path = $important_note->user_name->image_path;
                                                if($person_image_path!="" && $person_image_path!="null" )
                                                {
                                                    $PersonUserImage = asset('images/user')."/".$person_image_path;
                                                }
                                                else
                                                {
                                                    $PersonUserImage = asset('images')."/default.png";
                                                }
                                                $Created_At = date("d-m-Y h:i A",strtotime($important_note->created_at));
                                            @endphp
                                            <td class="flex flex-row text-sm font-bold text-center">
                                                <img src="{{$PersonUserImage}}"  class="rounded-full task-user-image mt-2"></img>
                                                <span class="text-sm font-semibold p-2 self-center ml-2">
                                                    {{$important_note->user_name->name}}
                                                    <br>
                                                    <span class="font-normal">
                                                        {{$Created_At}}
                                                    </span>
                                                </span>
                                            </td>
                                            @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                            <td class="text-sm font-semibold p-2 text-center">
                                                <div class="dropdown_container" tabindex="-1">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    <div class="dropdown">
                                                        @if($important_note->isActive==1)
                                                            <a  href="{{ route('deactive_important_note', $important_note->id) }}" class="grid_dropdown_item stop_button" title="Deactivate">
                                                                <div><i class="fa fa-circle"></i> Deactivate</div>
                                                            </a> 
                                                        @else
                                                            <a  href="{{ route('active_important_note', $important_note->id) }}" class="grid_dropdown_item start_button" title="Activate">
                                                                <div><i class="fa fa-circle"></i> Activate</div>
                                                            </a> 
                                                        @endif
                                                        <a href="{{ route('edit_important_note', $important_note->id) }}" class="grid_dropdown_item edit_button" >
                                                            <div><i class="fa fa-edit"></i> Edit</div>
                                                        </a>
                                                        <a onclick="return confirm('Are you sure Delete This Note..?')" href="{{ route('delete_important_note', $important_note->id) }}" class="grid_dropdown_item delete_button" title="Delete">
                                                            <div><i class="fa fa-trash-o"> Delete</i></div>
                                                        </a> 
                                                    </div>
                                                </div>
                                            </td>  
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <script>
        function leave_approve(id)
        {
            var user_id = `{{Auth::user()->id}}`;

            var url = `{{ route('leave_approve') }}`;

            const form_data = new FormData();
            form_data.append("id",id);
            form_data.append("user_id",user_id);
            // form_data.append("mode","dashboard_activity");


            axios.post(url,form_data).then(response => {
            
            //console.log(response);
            location.reload();
            }).catch(error=>{
            // console.log(error);
            });
        }
        function leave_reject(id)
        {
            var user_id = `{{Auth::user()->id}}`;

            var url = `{{ route('leave_reject') }}`;

            const form_data = new FormData();
            form_data.append("id",id);
            form_data.append("user_id",user_id);
            // form_data.append("mode","dashboard_activity");

            axios.post(url,form_data).then(response => {
            
            //console.log(response);
            location.reload();
            }).catch(error=>{
            // console.log(error);
            });
        }
        function leave_cancel(id)
        {
            var user_id = `{{Auth::user()->id}}`;

            var url = `{{ route('leave_cancel') }}`;

            const form_data = new FormData();
            form_data.append("id",id);
            form_data.append("user_id",user_id);
            // form_data.append("mode","dashboard_activity");

            axios.post(url,form_data).then(response => {
            
            //console.log(response);
            location.reload();
            }).catch(error=>{
            // console.log(error);
            });
        }
    </script>
    
    <!-- Counts Section end-->
@endsection