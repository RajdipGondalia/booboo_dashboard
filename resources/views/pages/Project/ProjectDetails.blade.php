@extends('layouts.master')
@section('content')
    <!-- calender view css start -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <!-- calender view css end -->
    <!-- Welcome Section-->

    <section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
        <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
            <div class="lg:w-full border-b-2">
                <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
                <span class="text-4xl self-center font-bold pb-10">Project Details</span>
                <div class="flex flex-col">
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Section end-->
    <!-- Table Section-->

    <section class="lg:ml-60 md:ml-60 sm:ml-60 mt-10 relative">
        <div class="flex flex-col xl:flex xl:flex-col xl:justify-between grid grid-cols-1 xl:pl-10 md:pl-10 sm:pl-10 pl-0 xl:px-10 md:px-10 sm:px-10 px-0 sm:grid sm:grid-cols-1 sm:gap-5 md:grid md:grid-cols-2 md:gap-10 xl:grid xl:grid-cols-2 xl:gap-10 sm:mx-0 xl:mx-0 -mb-40" style="min-height: 860px;">
            <div class="p-1 md:p-1 text-center  bg-white  rounded-2xl">
                <span class="text-center text-md font-bold">Calender</span>
                <div id="calendar"></div>
            </div>
            <div class="p-4 md:p-4 text-center flex flex-col bg-white h-4/5  rounded-2xl">
                <span class="text-center text-md font-bold">Calender Events</span>
                <div class="container px-0 mx-auto flex flex-col xl:flex align overflow-y-auto h-full">
                    <div class="fix-width text-left overflow-y-auto h-full ">
                        <table class="table  project-list-table table-responsive" style="float: left;height: 400px;overflow-x: hidden;overflow-y: auto; width: 100%;">
                            <thead>
                                <tr>
                                <th class="text-neutral-400 p-4 font-semibold text-xs text-center">Sr.No.</th>
                                <th class="text-neutral-400 p-4 font-semibold text-xs text-left">Title</th>
                                <th class="text-neutral-400 p-4 font-semibold text-xs text-left">Start Date & tIme</th>
                                <th class="text-neutral-400 p-4 font-semibold text-xs text-left">End Date & Time</th>
                                <th class="text-neutral-400 p-4 font-semibold text-xs text-left">Created By</th>
                                @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                    <th class="text-neutral-400 p-4 font-semibold text-xs text-center">Action</th>
                                @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 0
                                @endphp
                                @foreach($project_events as $project_event)
                                    @php
                                    $Start=$project_event->start;
                                    $End=$project_event->end;
                                    if($Start!="" && $Start!="NULL" && $Start!="0000-00-00 00:00:00")
                                    {
                                        $start_date_time = date("d-m-Y h:i A",strtotime($Start));
                                    }
                                    else
                                    {
                                        $start_date_time ="";
                                    }
                                    if($End!="" && $End!="NULL" && $End!="0000-00-00 00:00:00")
                                    {
                                        $end_date_time = date("d-m-Y h:i A",strtotime($End));
                                    }
                                    else
                                    {
                                        $end_date_time ="";
                                    }
                                    $user_name = $project_event->user_details->name;
                                    @endphp
                                    <tr class="bg-red-100 rounded-lg align-top">
                                        <td class="text-sm font-semibold p-2 text-center">{{++$count}}</td>
                                        <td class="text-sm font-semibold p-2 text-left">{{$project_event->title}}</td>
                                        <td class="text-sm font-semibold p-2 text-left">{{$start_date_time}}</td>
                                        <td class="text-sm font-semibold p-2 text-left">{{$end_date_time}}</td>
                                        <td class="text-sm font-semibold p-2 text-left">{{$user_name}}</td>
                                        @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                            <td class="text-sm font-semibold p-2 text-left">
                                                <a onclick="return confirm('Are you sure Delete This Project Event..?')"  href="{{ route('single_project_event_delete', $project_event->id) }}" title="Delete" style="margin-left: 10px;color: red;text-decoration: none" >
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
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
        <div class="flex flex-col xl:flex xl:flex-col xl:justify-between grid grid-cols-1 xl:pl-10 md:pl-10 sm:pl-10 pl-0 xl:px-10 md:px-10 sm:px-10 px-0 sm:grid sm:grid-cols-1 sm:gap-5 md:grid md:grid-cols-2 md:gap-10 xl:grid xl:grid-cols-2 xl:gap-10 sm:mx-0 xl:mx-0 -mb-40">
            <div class="p-4 md:p-4 text-center flex flex-col bg-white h-3/4 rounded-2xl ">
                <span class="text-center text-md font-bold">Project's Files</span>
                <div class="container px-0 mx-auto flex flex-col xl:flex align overflow-y-auto h-full">
                    <div class="fix-width text-left overflow-y-auto h-full">
                        <table class="table  project-list-table table-responsive" style="float: left;height: 400px;overflow-x: hidden;overflow-y: auto; width: 100%;">
                            <thead>
                                <tr>
                                <th class="text-neutral-400 p-4 font-semibold text-xs text-center">Sr.No.</th>
                                <th class="text-neutral-400 p-4 font-semibold text-xs text-center">File Name</th>
                                <th class="text-neutral-400 p-4 font-semibold text-xs text-left">App Data & Time</th>
                                <th class="text-neutral-400 p-4 font-semibold text-xs text-left">Created By</th>
                                <th class="text-neutral-400 p-4 font-semibold text-xs text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 0
                                @endphp
                                @foreach($project_comments_attachments as $project_comments_attachment)
                                    @php
                                    $CreatedAt=$project_comments_attachment->created_at;
                                    if($CreatedAt!="" && $CreatedAt!="NULL" && $CreatedAt!="0000-00-00 00:00:00")
                                    {
                                        $created_at = date("d-m-Y h:i A",strtotime($CreatedAt));
                                    }
                                    else
                                    {
                                        $created_at ="";
                                    }
                                    $user_name = $project_comments_attachment->user_details->name;
                                    @endphp
                                    <tr class="bg-red-100 rounded-lg align-top">
                                        <td class="text-sm font-semibold p-2 text-center">{{++$count}}</td>
                                        <td class="text-sm font-semibold p-2 text-left">{{$project_comments_attachment->attachment_realname}}</td>
                                        <td class="text-sm font-semibold p-2 text-left">{{$created_at}}</td>
                                        <td class="text-sm font-semibold p-2 text-left">{{$user_name}}</td>
                                        <td class="text-sm font-semibold p-2 text-left">
                                            <a href="{{asset('images/project_attachment').'/'.$project_comments_attachment->attachment_path}}" target="_blank" ><i class="fa fa-eye"></i></a>
                                            <a style="margin-left: 10px;" href="{{asset('images/project_attachment').'/'.$project_comments_attachment->attachment_path}}" download><i class="fa fa-download"></i></a>
                                            @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                                <a onclick="return confirm('Are you sure Delete This Project File..?')"  href="{{ route('single_project_comment_delete', $project_comments_attachment->id) }}" title="Delete" style="margin-left: 10px;color: red;text-decoration: none" >
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="employee-card rounded-2xl text-center flex flex-col bg-red-100 h-3/4">
                <span class="text-start p-2 text-xs"><i class="fa fa-plus-circle mr-4"></i>Broadcast</span>
                <div class="chat_area" id="chatBox">
                    <div class="bg-white pb-10">
                        @foreach($project_comments as $project_comment)   
                            @php
                                $CreatedAt=$project_comment->created_at;
                                if($CreatedAt!="" && $CreatedAt!="NULL" && $CreatedAt!="0000-00-00 00:00:00")
                                {
                                    $created_at_time = date("h:i A",strtotime($CreatedAt));

                                    $created_at_date = date("F j, Y",strtotime($CreatedAt));
                                    $created_at = $created_at_time." | ".$created_at_date;
                                }
                                else
                                {
                                    $created_at ="";
                                }
                                $login_user_id = Auth::user()->id;
                                if($login_user_id == $project_comment->user_id)
                                {
                                    $content_class = "self-end";
                                }
                                else
                                {
                                    $content_class = "self-start";
                                }
                                $user_name = $project_comment->user_details->name;
                                $image_path = $project_comment->user_details->image_path;
                                $user_name = $project_comment->user_details->name;
                                if($image_path!="" && $image_path!="null" )
                                {
                                    $image = asset('images/user')."/".$image_path;
                                }
                                else
                                {
                                    $image = asset('images')."/default.png";
                                }
                            @endphp
                            @if($login_user_id != $project_comment->user_id)
                                <div class="employee-input-card p-2 md:p-2 h-16 text-center rounded-2xl self-start w-full flex flex-row mt-10" >
                                    <div class="flex flex-row">
                                        <img src="{{$image}}" class="grid-image rounded-full mb-3 mt-2 ml-2 " alt="">
                                        @if($project_comment->comment!="" && $project_comment->comment!="null")
                                            <div class="flex flex-col text-left">
                                                <span class="self-start text-xs font-semibold ml-4">{{$user_name}}</span>
                                                <p class="text-xs font-normal bg-gray-100 p-2 m-2 rounded-tl-none rounded-tr-xl rounded-bl-xl rounded-br-xl">
                                                {{$project_comment->comment}}
                                                    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                                        <a onclick="return confirm('Are you sure Delete This Project Comment..?')"  href="{{ route('single_project_comment_delete', $project_comment->id) }}" title="Delete" style="margin-left: 10px;color: red;text-decoration: none" >
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    @endif
                                                </p>
                                                <span class="text-xs text-gray-800">{{$created_at}} </span>
                                            </div>
                                        @elseif($project_comment->attachment_path!="" && $project_comment->attachment_path!="null")
                                            <div class="flex flex-col text-left">
                                                <span class="self-start text-xs font-semibold ml-4">{{$user_name}}</span>
                                                <p class="text-xs font-normal bg-gray-100 p-2 m-2 rounded-tl-none rounded-tr-xl rounded-bl-xl rounded-br-xl">
                                                    <span>File Name : {{$project_comment->attachment_realname}}</span><br>
                                                    <a style="margin-left: 13%;" href="{{asset('images/project_attachment').'/'.$project_comment->attachment_path}}" target="_blank" >
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a style="margin-left: 2%;"  href="{{asset('images/project_attachment').'/'.$project_comment->attachment_path}}" download>
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                                        <a style="margin-left: 2%;color: red;text-decoration: none" onclick="return confirm('Are you sure Delete This Project File..?')"  href="{{ route('single_project_comment_delete', $project_comment->id) }}" title="Delete" >
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    @endif
                                                </p>
                                                <span class="text-xs text-gray-800">{{$created_at}} </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @else       
                                <div class="employee-input-card p-2 md:p-2 h-16 mt-10 text-center rounded-2xl self-start w-full ">
                                    <div className="flex-row flex float-right" style="display:inline-flex;float:right;">
                                        <div class="flex flex-col ">
                                            @if($project_comment->comment!="" && $project_comment->comment!="null")
                                                <span class="self-end text-xs font-bold mr-4">{{$user_name}}</span>
                                                <p class="text-xs font-normal bg-red-500 p-2 m-2 text-white rounded-tl-xl rounded-tr-none rounded-bl-xl rounded-br-xl">
                                                    
                                                    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                                        <a  onclick="return confirm('Are you sure Delete This Project Comment..?')"  href="{{ route('single_project_comment_delete', $project_comment->id) }}" title="Delete" style="margin-left: 10px;color: white;text-decoration: none" >
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    @endif
                                                    {{$project_comment->comment}}
                                                </p>
                                            @elseif($project_comment->attachment_path!="" && $project_comment->attachment_path!="null")
                                                <span class="self-end text-xs font-bold mr-4">{{$user_name}}</span>
                                                <p class="text-xs font-normal bg-red-500 p-2 m-2 text-white rounded-tl-xl rounded-tr-none rounded-bl-xl rounded-br-xl">
                                                <span>File Name : {{$project_comment->attachment_realname}}</span><br>
                                                    
                                                    <a style="margin-left: 13%;" href="{{asset('images/project_attachment').'/'.$project_comment->attachment_path}}" target="_blank" >
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a style="margin-left: 2%;"  href="{{asset('images/project_attachment').'/'.$project_comment->attachment_path}}" download>
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                                        <a style="margin-left: 2%;color: white;text-decoration: none" onclick="return confirm('Are you sure Delete This Project File..?')"  href="{{ route('single_project_comment_delete', $project_comment->id) }}" title="Delete" >
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    @endif
                                                </p>
                                            @endif
                                            <span class="text-xs self-end text-gray-800">{{$created_at}} </span>
                                        </div>
                                        <!-- <div class="flex flex-row"> -->
                                        <span><img src="{{$image}}" class="grid-image rounded-full mb-3 mt-2 mr-2" alt=""></span>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            @endif 
                        @endforeach         
                        <!-- <div class="employee-input-card p-2 md:p-2 h-16 text-center rounded-2xl self-start w-full flex flex-row mt-20" >
                            <div class="flex flex-row">
                                <img src="{{ asset('theme/images/Ellipse 6.png') }}" class="bg-slate-300 rounded-full mb-3 mt-2 ml-2" alt="">
                                <div class="flex flex-col text-left">
                                    <span class="self-start text-xs font-semibold ml-4">Annette Black</span>
                                    <p class="text-xs font-normal bg-gray-100 p-2 m-2 rounded-tl-none rounded-tr-xl rounded-bl-xl rounded-br-xl">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mi nunc turpis pharetra ,maecenas egestas
                                    omare aliquet faucibus.</p>
                                    <span class="text-xs text-gray-800">12:54PM | July 26, 2022 </span>
                                </div>
                            </div>
                        </div>
                        <div class="employee-input-card p-2 md:p-2 h-16 mt-10 text-center rounded-2xl self-start w-full flex flex-row">
                            <div class="flex flex-col text-left">
                                <span class="self-end text-xs font-bold mr-4">Jacob Jones</span>
                                <p class="text-xs font-normal bg-red-500 p-2 m-2 text-white rounded-tl-xl rounded-tr-none rounded-bl-xl rounded-br-xl">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mi nunc turpis pharetra ,maecenas egestas omare
                                    aliquet faucibus.</p>
                                <span class="text-xs self-end text-gray-800">12:54PM | July 26, 2022 </span>
                            </div>
                            <div class="flex flex-row">
                                <img src="{{ asset('theme/images/Ellipse 6.png') }}" class="bg-slate-300 rounded-full mb-3 mt-2 mr-2" alt="">
                            </div>
                        </div> -->
                    </div>
                </div>
                <form action="{{ route('project_comment_add') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('POST')
                    <div class="p-6">
                        <textarea name="comment" class=" h-28 mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-black focus:outline-none employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="Type Your Comment Hear.."></textarea> </label>
                        <input type="hidden" class="form-control" value="{{$project_id}}" name="project_id">
                    </div>
                    <div class="flex flex-row justify-between p-4">
                        
                        <input type="file" id="myFile" name="attachment_path" class="text-xs">
                        <button class="text-white rounded-3xl float-right bg-green-600 text-xs font-normal px-2 py-2 rounded-lg" type="submit" >Send</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
            <span class="text-center text-md font-bold mt-10">Project's Tasks</span>
            <div class="fix-width text-left ">
                <table class="table table-striped project-list-table">
                    <thead>
                        <tr class="">
                            <th class="text-neutral-400 p-1 font-semibold text-sm text-center">Sr. No.</th>
                            <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Project</th>
                            <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Task</th>
                            <th class="text-neutral-400 p-4 font-semibold text-sm text-center">Task Assign To</th>
                            <th class="text-neutral-400 p-4 font-semibold text-sm text-center">Priority</th>
                            <th class="text-neutral-400 p-4 font-semibold text-sm text-center">Due Date</th>
                            <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Task Created By</th>
                            <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Status</th>
                            <th class="text-neutral-400 p-4 font-semibold text-sm text-left">details</th>
                            <th class="text-neutral-400 p-1 font-semibold text-sm text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0
                        
                        @endphp
                        @foreach($tasks as $task)
                            @php
                                $assign_to = $task->assign_to;
                                $assign_to_ids = explode(",",$assign_to); //converted to array
                                if($task->status==0 && $task->priority==1)
                                {
                                    $color="#95eb95";
                                }
                                else if($task->status==0 && $task->priority==2)
                                {
                                    $color="#83c3db";
                                }
                                else if($task->status==0 && $task->priority==3)
                                {
                                    $color="#df9f9f";
                                }
                                else
                                {
                                    $color="";
                                }
                            @endphp
                            <tr style="background-color:{{$color}}" class="border-t-orange-300 border-b-2 border-b-zinc-200 align-top">
                                <td class="text-sm  text-center">{{++$count}}</td>
                                <td class="text-sm text-left">
                                    @if($task->project_id!=0)
                                        {{$task->project_name->title}}
                                    @endif
                                </td>
                                <td class="text-sm font-bold text-left">
                                    <span>{{$task->task_title}}</span><br />
                                    <span class="text-xs font-normal text-400">{{$task->task_desc}}</span>
                                </td>
                                <td class="text-sm  text-center">
                                    @php
                                        $assign_to_ids = $task->assign_to;
                                        $assign_to_ids_arrays = (explode(",",$assign_to_ids));
                                    @endphp
                                    @foreach($assign_to_ids_arrays as $assign_to_ids_array)
                                        @php
                                        $result = app('app\Http\Controllers\ProjectController')->get_assignto_names_from_ids($assign_to_ids_array);
                                        $json_toArray = json_decode($result,true);
                                        $array_names = array_map(function ($array) {return $array['name'];}, $json_toArray);
                                        $assign_to_names = (implode(",",$array_names));
                                        @endphp
                                        {{$assign_to_names}}<br>
                                    @endforeach
                                </td>
                                <td class="text-sm  text-center">
                                    @php
                                        $PriorityArray = array("0"=>"","1"=>"Low","2"=>"Medium","3"=>"High");
                                    @endphp
                                    {{$PriorityArray[$task->priority]}}
                                </td>
                                <td class="text-sm  text-center">
                                    @php
                                    $duedate=$task->due_date;
                                    if($duedate!="" && $duedate!="NULL" && $duedate!="0000-00-00"  && $duedate!="1970-01-01")
                                    {
                                        echo date("d-m-Y",strtotime($duedate));
                                    }
                                    $StatuaArray = array("0"=>"Pending","1"=>"Start","2"=>"Stop","3"=>"Completed","4"=>"Cancel");
                                    @endphp
                                </td>
                                @php
                                $createdby_image_path = $task->user_name->image_path;
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
                                    <img src="{{$CreatedByUserImage}}" class="rounded-full task-user-image mt-2"></img>
                                    <span class="text-sm font-semibold p-2 self-center ml-2">{{$task->user_name->name}}</span>
                                </td>
                                <td class="text-sm  text-left">
                                    {{$StatuaArray[$task->status]}}
                                </td>
                                @php
                                    $StartTime=$task->start_time;
                                    if($StartTime!="" && $StartTime!="NULL" && $StartTime!="0000-00-00 00:00:00")
                                    {
                                        $Start_Time = date("d-m-Y h:i A",strtotime($StartTime));
                                        $start_t = $StartTime;
                                    }
                                    else
                                    {
                                        $Start_Time ="";
                                        $start_t ='0';

                                    }
                                    $StopTime=$task->stop_time;
                                    if($StopTime!="" && $StopTime!="NULL" && $StopTime!="0000-00-00 00:00:00")
                                    {
                                        $Stop_Time = date("d-m-Y h:i A",strtotime($StopTime));
                                        $stop_t = $StopTime;
                                    }
                                    else
                                    {
                                        $Stop_Time ="";
                                        $stop_t ='0';

                                    }
                                    $start = strtotime($start_t);
                                    $end = strtotime($stop_t);
                                    $totalSecondsDiff = abs($start-$end);

                                    $days = floor($totalSecondsDiff/86400);
                                    $hours = floor(($totalSecondsDiff - $days*86400) / 3600);
                                    $minutes = floor(($totalSecondsDiff / 60) % 60);
                                    $seconds = floor($totalSecondsDiff % 60);
                                @endphp
                                <td class="text-sm  text-left">
                                    Start : {{$Start_Time}} &nbsp;&nbsp;
                                    <br><br>
                                    Stop : {{$Stop_Time}} &nbsp;&nbsp;
                                    <br><br>
                                    @if(($StartTime!="" && $StartTime!="NULL" && $StartTime!="0000-00-00 00:00:00") && ($StopTime!="" && $StopTime!="NULL" && $StopTime!="0000-00-00 00:00:00") )
                                    Diff : {{$hours}} Hours {{$minutes}} Minutes {{$seconds}} Seconds &nbsp;&nbsp;
                                    @else
                                    Diff : &nbsp;&nbsp; - &nbsp;&nbsp;
                                    @endif
                                </td>
                                <td class="text-sm font-semibold p-2 text-left">
                                    <div class="dropdown_container" tabindex="-1">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        <div class="dropdown">
                                            @if($task->status==0)
                                            <a id="startButton" data-id="{{$task->id}}" title="Start" class="grid_dropdown_item start_button"  onClick="task_start({{$task->id}})">
                                                <div><i class="fa fa-circle"></i> Start</div>
                                            </a>
                                            @endif
                                            
                                            @if($task->status==1)
                                            <a id="stopButton" data-id="{{$task->id}}" title="Stop" class="grid_dropdown_item stop_button"  onClick="task_stop({{$task->id}})">
                                                <div><i class="fa fa-circle"></i> Stop</div>
                                            </a>
                                            @endif

                                            @if($task->status!=4 && $task->status!=3 && (Auth::user()->type==1 || Auth::user()->type==2 ))
                                            <a id="completeButton" data-id="{{$task->id}}" title="Complete" class="grid_dropdown_item complete_button"  onClick="task_complete({{$task->id}})">
                                                <div><i class="fa fa-circle"></i> Complete</div>
                                            </a>
                                            @endif

                                            @if($task->status!=4 && $task->status!=3 && (Auth::user()->type==1 || Auth::user()->type==2 ))
                                            <a id="cancelButton" data-id="{{$task->id}}" title="Cancel" class="grid_dropdown_item cancel_button"  onClick="task_cancel({{$task->id}})">
                                                <div><i class="fa fa-circle"></i> Cancel</div>
                                            </a>
                                            @endif
                                            @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                                <a onclick="return confirm('Are you sure Delete This Task..?')"  href="{{ route('single_task_delete', $task->id) }}" class="grid_dropdown_item delete_button"   title="Delete">
                                                    <div><i class="fa fa-trash-o"> Delete</i></div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </td>  
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="mb-10 mt-5 mr-10 self-center lg:self-center float-right">
            <button type="button" data-toggle="modal" data-target="#addProject" onClick="openProjectPopup()"
            class="text-white rounded-3xl bg-red-600 text-md font-normal px-4 py-2 rounded-lg">Add Project +</button>
        </div> -->


    </section>

    <!-- Table Section end-->
    <script>
        $(document).ready(function(){
            $('#chatBox').scrollTop($('#chatBox')[0].scrollHeight);
        });
        function task_start(id)
        {
            var user_id = `{{Auth::user()->id}}`;
            var tdate = new Date();
            var dd = tdate.getDate(); //yields day
            var MM = tdate.getMonth(); //yields month
            var yyyy = tdate.getFullYear(); //yields year
            var hh = tdate.getHours();
            var ii = tdate.getMinutes();
            var ss = tdate.getSeconds();

            var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

            var url = `{{ route('task_start') }}`;

            // console.log("Function called",date);
            // console.log("Task Id",id);
            const form_data = new FormData();
            form_data.append("id",id);
            form_data.append("user_id",user_id);
            form_data.append("start_time",date);

            axios.post(url,form_data).then(response => {
            
            console.log(response);
            location.reload();
            }).catch(error=>{
            // console.log(error);
            });
        }
        function task_stop(id)
        {
            var user_id = `{{Auth::user()->id}}`;
            var tdate = new Date();
            var dd = tdate.getDate(); //yields day
            var MM = tdate.getMonth(); //yields month
            var yyyy = tdate.getFullYear(); //yields year
            var hh = tdate.getHours();
            var ii = tdate.getMinutes();
            var ss = tdate.getSeconds();

            var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

            var url = `{{ route('task_stop') }}`;
            // console.log("Function called",date);
            // console.log("User Id",user_id);
            const form_data = new FormData();
            form_data.append("id",id);
            form_data.append("user_id",user_id);
            form_data.append("stop_time",date);
            axios.post(url,form_data).then(response => {
            location.reload();
            }).catch(error=>{
            // console.log(error);
            });
        }

        function task_complete(id)
        {
            var user_id = `{{Auth::user()->id}}`;
            var tdate = new Date();
            var dd = tdate.getDate(); //yields day
            var MM = tdate.getMonth(); //yields month
            var yyyy = tdate.getFullYear(); //yields year
            var hh = tdate.getHours();
            var ii = tdate.getMinutes();
            var ss = tdate.getSeconds();

            var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

            var url = `{{ route('task_complete') }}`;
            // console.log("Function called",date);
            // console.log("User Id",user_id);
            const form_data = new FormData();
            form_data.append("id",id);
            form_data.append("user_id",user_id);
            form_data.append("complete_time",date);
            axios.post(url,form_data).then(response => {
            location.reload();
            }).catch(error=>{
            // console.log(error);
            });
        }
        function task_cancel(id)
        {
            var user_id = `{{Auth::user()->id}}`;
            var tdate = new Date();
            var dd = tdate.getDate(); //yields day
            var MM = tdate.getMonth(); //yields month
            var yyyy = tdate.getFullYear(); //yields year
            var hh = tdate.getHours();
            var ii = tdate.getMinutes();
            var ss = tdate.getSeconds();

            var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

            var url = `{{ route('task_cancel') }}`;
            // console.log("Function called",date);
            // console.log("User Id",user_id);
            const form_data = new FormData();
            form_data.append("id",id);
            form_data.append("user_id",user_id);
            form_data.append("cancel_time",date);
            axios.post(url,form_data).then(response => {
            location.reload();
            }).catch(error=>{
            // console.log(error);
            });
        }
        
    </script>
    <!-- calender view js start -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <!-- calender view js end -->
    <script>
        $(document).ready(function () {
        var project_id = `{{$project_id}}`;
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
        });
        var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events:`{{ route('get_calender', $project_id) }}`,

        selectable:true,
        selectHelper: true,
        select:function(start, end, allDay)
        {
            var title = prompt('Event Title:');
            if(title)
            {
            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
            var project_id = `{{$project_id}}`;

            const url = `{{ route('action_calender') }}`;
            let data = {
                title: title,
                start: start,
                end: end,
                project_id: project_id,
                type: 'add'
            };
            axios.post(url,data).then(response => {
                calendar.fullCalendar('refetchEvents');
                alert("Event Created Successfully");
            }).catch(error=>{
                console.log(error);
            });

            //   url:"`{{ route('action_calender') }}`",

            //   type:"POST",
            //   data:{
            //     title: title,
            //     start: start,
            //     end: end,
            //     project_id: project_id,
            //     type:'add'
            //   },
            //   success:function(data)
            //   {
            //     calendar.fullCalendar('refetchEvents');
            //     alert("Event Created Successfully");
            //   }
            // })
            }
        },
        editable:true,
        eventResize: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;

            const url = `{{ route('action_calender') }}`;
            let data = {
            title: title,
            start: start,
            end: end,
            id: id,
            type: 'update'
            };
            axios.post(url,data).then(response => {
            calendar.fullCalendar('refetchEvents');
            alert("Event Updated Successfully");
            }).catch(error=>{
            console.log(error);
            });

            // $.ajax({
            //   url:"`{{ route('action_calender') }}`",
            //   type:"POST",
            //   data:{
            //     title: title,
            //     start: start,
            //     end: end,
            //     id: id,
            //     type: 'update'
            //   },
            //   success:function(response)
            //   {
            //     calendar.fullCalendar('refetchEvents');
            //     alert("Event Updated Successfully");
            //   }
            // })
        },
        eventDrop: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;

            const url = `{{ route('action_calender') }}`;
            let data = {
            title: title,
            start: start,
            end: end,
            id: id,
            type: 'update'
            };
            axios.post(url,data).then(response => {
            calendar.fullCalendar('refetchEvents');
            alert("Event Updated Successfully");
            }).catch(error=>{
            console.log(error);
            });

            // $.ajax({
            //   url:"`{{ route('action_calender') }}`",
            //   type:"POST",
            //   data:{
            //     title: title,
            //     start: start,
            //     end: end,
            //     id: id,
            //     type: 'update'
            //   },
            //   success:function(response)
            //   {
            //     calendar.fullCalendar('refetchEvents');
            //     alert("Event Updated Successfully");
            //   }
            // })
        },
        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
            var id = event.id;

            const url = `{{ route('action_calender') }}`;
            let data = {
                id: id,
                type: 'delete'
            };
            axios.post(url,data).then(response => {
                calendar.fullCalendar('refetchEvents');
                alert("Event Deleted Successfully");
            }).catch(error=>{
                console.log(error);
            });

            // $.ajax({
            //   url:"`{{ route('action_calender') }}`",
            //   type:"POST",
            //   data:{
            //     id:id,
            //     type:"delete"
            //   },
            //   success:function(response)
            //   {
            //     calendar.fullCalendar('refetchEvents');
            //     alert("Event Deleted Successfully");
            //   }
            // })
            }
        }
        });
    });
    </script>
@endsection

