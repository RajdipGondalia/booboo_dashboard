@extends('layouts.master')
@section('content')
<!-- Welcome Section-->
<?php
use App\Http\Controllers\DashboardController;
?>
<section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
    <div class="text-center mt-5 mb-5 text-4xl font-bold"> Task</div>
    
    <form action="{{ route('create_task') }}" method="POST" enctype="multipart/form-data">
    
    @csrf
    @method('POST')
        @if($errors->any())
            <div class=" validation-alert-box alert alert-danger bg-red-100 xl:mx-10 md:mx-10 sm:mx-2 mx-0 mb-5 rounded-lg  ">
                <p><strong>Opps Something went wrong</strong></p>
                <ul>
                @foreach ($errors->all() as $error)
                <div class=" validation-alert-title alert alert-danger self-end bg-red-100 mb-2" role="alert">
                    {{ $error }}
                </div>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="flex flex-col bg-red-100 xl:mx-10 md:mx-10 sm:mx-2 mx-0 rounded-lg">
            <div class="flex lg:flex-row xl:flex xl:flex-row md:flex-row sm:flex-col flex-col xl:px-10 md:px-10 sm:px-10 px-0 w-full">
                <div class="rounded-none p-4 xl:w-3/5 md:w-3/5 sm:w-full w-full md:p-4 text-center flex flex-col">
                    <div class="w-full">
                        <div class="block mb-5 self-center xl:w-5/6 lg:w-5/6 md:w-full sm:w-full">
                            <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Project
                                <span class="text-red-700">*</span>
                            </span>
                            <select class="form-select appearance-none block lg:w-full xl:w-full md:w-full sm:w-full w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="project_id" id="project_id">
                                <option value="">Select Project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full"> 
                        <label class="block mb-5 self-center xl:w-5/6 lg:w-5/6 md:w-full sm:w-full">
                            <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                Task Title <span class="text-red-700">*</span>
                            </span>
                            <input type="text" name="task_title" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-center rounded-lg self-start w-full flex flex-row  focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm  focus:ring"  placeholder=""> 
                        </label>
                    </div>

                    <div class="w-full"> 
                        <label class="block mb-5 self-center xl:w-5/6 lg:w-5/6 md:w-full sm:w-full">
                            <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                Task Description
                            </span>
                            <textarea type="text" name="task_desc" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-20 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder=""></textarea> 
                        </label>
                    </div>
                    
                    <!-- <div class="mb-10 mt-5 ml-10 self-center lg:self-center">
                    <button type="button" class="text-white rounded-3xl bg-green-700 text-xs font-semibold px-2 py-2 rounded-lg" onclick="addMore()" id="addmorebtn">Add More +</button> </div> -->
                </div>
                <div class="rounded-none p-4 xl:w-4/5 md:w-4/5 sm:w-full w-full md:p-4 text-center flex flex-col">
                    <div class="flex xl:justify-center lg:justify-center justify-left sm:justify-none md:justify-none w-full">
                        <div class="datepicker relative form-floating mb-5 xl:w-96 sm:w-full w-full">
                            <label class="block mb-5 self-center mb-3 xl:w-96 w-full sm:w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                    Due Date
                                </span>
                                <input type="date" name="due_date" id="due_date"
                                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    placeholder="Select a date" />
                            </label>
                        </div>
                    </div> 
                    <div class="flex xl:justify-center lg:justify-center justify-left sm:justify-none md:justify-none w-full">
                        <div class="mb-3 xl:w-96 w-full sm:w-full">
                            <span
                                class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Priority
                                <span class="text-red-700">*</span> </span>
                            <select class="form-select appearance-none block lg:w-full xl:w-full md:w-full sm:w-full w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="priority" id="priority">
                                <option value="">Select Priority</option>
                                <option value="1">Low</option>
                                <option value="2">Medium</option>
                                <option value="3">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex xl:justify-center lg:justify-center justify-left sm:justify-none md:justify-none w-full">
                        <div class="mb-3 xl:w-96 w-full sm:w-full">
                            <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                Assign To <span class="text-red-700">*</span> </span>
                            <select class="test form-select appearance-none block lg:w-40 xl:w-60 md:w-40 sm:w-full w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="assign_to[]" id="assign_to" multiple="multiple">
                                <option value="" disabled>Select Assign To</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-10 mt-10 self-center lg:self-center ">
                <button class="text-white rounded-3xl bg-red-500 text-md font-semibold profile-button px-10 py-2" type="submit">Save</button>
                <!-- <button type="button" class="rounded-3xl bg-gray-200 text-md font-semibold profile-button px-10 py-2">Cancel</button> -->
            </div>
        </div>
    </form>

</section>

<!-- Welcome Section end-->



<!-- Table Section-->

<section class="lg:ml-60 md:ml-60 sm:ml-60 mt-10 relative pb-10">
    <div class="text-center mt-5 mb-5 text-4xl font-bold">Task List</div>

    <div class="container xl:px-10 md:px-10 sm:px-5 px-4 mx-auto flex flex-col xl:flex align">

        <div class="buy-card  text-left fix-width">

            <table class="table table-striped">
                <thead>
                    <tr class="border-b-2 border-b-red-200">
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
                        <tr style="background-color:{{$color}}" class="border-t-orange-300 border-b-2 border-b-zinc-200">
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
                            <td class=" flex-row text-sm font-bold text-left">
                                @php
                                    $assign_to_ids = $task->assign_to;
                                    $assign_to_ids_arrays = (explode(",",$assign_to_ids));
                                @endphp
                                @foreach($assign_to_ids_arrays as $assign_to_ids_array)
                                    @php
                                        $result = app('app\Http\Controllers\ViewController')->get_assignto_names_from_ids($assign_to_ids_array);
                                        $json_toArray = json_decode($result,true);
                                        $array_names = array_map(function ($array) {return $array['name'];}, $json_toArray);
                                        $array_image_paths = array_map(function ($array) {return $array['image_path'];}, $json_toArray);
                                        $assign_to_names = (implode(",",$array_names));
                                        $assign_to_image_paths = (implode(",",$array_image_paths));
                                    @endphp

                                    @php
                                        if($assign_to_image_paths!="" && $assign_to_image_paths!="null" )
                                        {
                                            $UserImage = asset('images/user')."/".$assign_to_image_paths;
                                        }
                                        else
                                        {
                                            $UserImage = asset('images')."/default.png";
                                        }
                                    @endphp
                                    <!-- <img src="{{$UserImage}}"  class="rounded-full task-user-image"></img> -->
                                    <span class="text-sm font-semibold p-2  self-center ml-2">{{$assign_to_names}}</span>
                                    <br>
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
                                <img src="{{$CreatedByUserImage}}"  class="rounded-full task-user-image mt-2"></img>
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
</section>

<!-- Table Section end-->
<script>
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
@endsection