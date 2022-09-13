@extends('layouts.master')
@section('content')
<!-- Welcome Section-->

<section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="lg:w-full border-b-2">
            <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
            <div class="flex flex-row">
                <span class="text-md font-semibold text-sm self-center mx-2 md:mx-0">Total Project</span>
                <span class="text-md self-center text-left text-neutral-400 pl-2">{{$total_project}}</span>
            </div>
            <span class="text-4xl self-center font-bold pb-10">Project List</span>
            <div class="flex flex-col">
            </div>
            </div>
        </div>
    </div>
</section>
<!-- Welcome Section end-->
<section class="lg:ml-60 md:ml-60 sm:ml-60 mt-2 relative">
    <!-- Filter Start-->
    <!-- <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
      <div class="lg:w-full bg-red-100 rounded-lg p-2">
        <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
          <div class="flex lg:flex-row md:flex-row xl:flex-row sm:flex-row flex-col">
            <div class="self-center lg:py-0 md:py-0 sm:py-0 xl:py-0 py-2"><input type="email" name="email" class=" b-2 px-3 p-2 h-full dark:focus:border-red-300 focus:ring-red-300 focus:border-red-300 border-1 xl:w-96 lg:w-96 md:w-64 sm:w-60 w-60 border-red-300 placeholder-neutral-400 font-semibold focus:outline-none block text-gray-400  rounded-lg sm:text-sm focus:ring" placeholder="Search"></div>
            <select id="countries" class="self-center ml-5 border border-red-300 text-gray-600 text-sm rounded-lg focus:ring-red-300 focus:border-red-300 block xl:w-full lg:w-full md:w-48 sm:w-48 w-52 py-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-300 dark:focus:border-red-300">
              <option selected>Name</option>
              <option value="title">Title</option>
              <option value="assignTo">Assign To</option>
            </select>
          </div>
          <div class="flex flex-row">
            <span class="text-sm font-semibold self-center text-left ">Select by:</span>
            <select class="border-0 bg-transparent w-30">
              <option>Date</option>
              <option>No</option>
              <option>Maybe</option>
            </select>
            <i class="fa fa-bars p-4"></i>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Filter End-->
    
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
      <div class="fix-width text-left ">
        <table class="table table-striped project-list-table">
            <thead>
                <tr class="">
                    <th class="text-neutral-400 p-1 font-semibold text-sm text-center">Sr.No.</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Title</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Client</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Assign To</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Project Manager</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Start Date</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Due Date</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Project Created By</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Status</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-center"></th>
                </tr>
            </thead>
            <tbody>
                @php
                  $count = 0
                @endphp
                @foreach($projects as $project)
                <tr class="bg-white">
                    <td class="text-sm font-semibold p-2 text-center"><a href="{{ route('project_details', $project->id) }}" >{{++$count}}</a></td>
                    <td class="text-sm font-semibold p-2 text-left">{{$project->title}}</td>
                    <td class="text-sm font-semibold p-2 text-left">
                      @if($project->client_id!=0)
                        {{$project->client_name->company_name}}
                      @endif
                    </td>
                    <td class="text-sm font-semibold p-2 text-left">
                      @php
                        $assign_to_ids = $project->assign_to;
                        $assign_to_ids_arrays = (explode(",",$assign_to_ids));
                      @endphp
                      @foreach($assign_to_ids_arrays as $assign_to_ids_array)
                        @php
                          $result = app('app\Http\Controllers\ViewController')->get_assignto_names_from_ids($assign_to_ids_array);
                          $json_toArray = json_decode($result,true);
                          $array_names = array_map(function ($array) {return $array['name'];}, $json_toArray);
                          $assign_to_names = (implode(",",$array_names));
                        @endphp
                        {{$assign_to_names}}<br>
                      @endforeach
                    </td>
                    @php
                      $pm_image_path = $project->project_manager_name->image_path;
                      if($pm_image_path!="" && $pm_image_path!="null" )
                      {
                        $ProjectManagerImage = asset('images/user')."/".$pm_image_path;
                      }
                      else
                      {
                        $ProjectManagerImage = asset('images')."/default.png";
                      }
                    @endphp
                    <td class="flex flex-row text-sm font-bold text-left">
                      @if($project->project_manager!=0)
                        <img src="{{$ProjectManagerImage}}"  class="rounded-full task-user-image mt-2"></img>
                        <span class="text-sm font-semibold p-2 self-center ml-2">{{$project->project_manager_name->name}}</span>
                      @endif
                    </td>
                    <td class="text-sm font-semibold p-2 text-left">
                      @php
                        $startdate=$project->start_date;
                        if($startdate!="" && $startdate!="NULL" && $startdate!="0000-00-00"  && $startdate!="1970-01-01")
                        {
                          echo date("d-m-Y",strtotime($startdate));
                        }
                      @endphp
                    </td>
                    <td class="text-sm font-semibold p-2 text-left">
                      @php
                        $duedate=$project->due_date;
                        if($duedate!="" && $duedate!="NULL" && $duedate!="0000-00-00"  && $duedate!="1970-01-01")
                        {
                          echo date("d-m-Y",strtotime($duedate));
                        }
                      @endphp
                    </td>
                    @php
                      $createdby_image_path = $project->user_name->image_path;
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
                        <span class="text-sm font-semibold p-2 self-center ml-2">{{$project->user_name->name}}</span>
                    </td>
                    <td class="text-sm font-semibold p-2 text-left">
                        @php
                          $StatuaArray = array("0"=>"Not Started","1"=>"In Progress","2"=>"On Hold","3"=>"Completed","4"=>"Cancel");
                        @endphp
                        {{$StatuaArray[$project->status]}}
                    </td>
                    <td class="text-sm font-semibold p-2 text-center">
                        <div class="dropdown_container" tabindex="-1">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            <div class="dropdown">
                                <a href="{{ route('project_details', $project->id) }}" style="cursor: pointer;" title="Project Details"  class="grid_dropdown_item view_button" >
                                  <div> <i class="fa fa-arrows-alt"></i> Details</div>
                                </a>
                                @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                  <a href="{{ route('edit_project', $project->id) }}" class="grid_dropdown_item edit_button" >
                                    <div><i class="fa fa-edit"></i> Edit</div>
                                  </a>
                                  @if($project->status==0 || $project->status==2)
                                    <a id="startButton" data-id="{{$project->id}}" title="Start" class="grid_dropdown_item start_button" onClick="project_start({{$project->id}})" >
                                      <div><i class="fa fa-circle"></i> Start</div>
                                    </a>
                                  @endif
                                  @if(($project->status==1) && (Auth::user()->type==1 || Auth::user()->type==2 ))
                                    <a id="holdButton" data-id="{{$project->id}}" title="Hold" class="grid_dropdown_item stop_button" onClick="project_hold({{$project->id}})" >
                                      <div><i class="fa fa-circle"></i> Hold</div>
                                    </a>
                                  @endif
                                  @if($project->status!=4 && $project->status!=3 && $project->status!=0 && (Auth::user()->type==1 || Auth::user()->type==2 ))
                                    <a id="completeButton" data-id="{{$project->id}}" title="Complete" class="grid_dropdown_item complete_button" onClick="project_complete({{$project->id}})" >
                                      <div><i class="fa fa-circle"></i> Complete</div>
                                    </a>
                                  @endif
                                  @if($project->status!=4 && $project->status!=3 && (Auth::user()->type==1 || Auth::user()->type==2 ))
                                    <a id="cancelButton" data-id="{{$project->id}}" title="Cancel" class="grid_dropdown_item cancel_button" onClick="project_cancel({{$project->id}})" >
                                      <div><i class="fa fa-circle"></i> Cancel</div>
                                    </a>
                                  @endif
                                  <a onclick="return confirm('Are you sure Delete This Project..?')"  href="{{ route('delete_project', $project->id) }}" class="grid_dropdown_item delete_button" title="Delete">
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
    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
      <div class="mb-10 mt-5 mr-10 self-center lg:self-center float-right">
        <a href="{{ route('create_project') }}" class="text-white rounded-3xl bg-red-600 text-md font-normal px-4 py-2 rounded-lg">Add Project <i class="fa fa-plus"></i></a>
      </div>
    @endif
</section>
<script>
  function project_start(id){

    var user_id = `{{Auth::user()->id}}`;
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    var MM = tdate.getMonth(); //yields month
    var yyyy = tdate.getFullYear(); //yields year
    var hh = tdate.getHours();
    var ii = tdate.getMinutes();
    var ss = tdate.getSeconds();

    var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

    var url = `{{ route('project_start') }}`;

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
  function project_hold(id){

    var user_id = `{{Auth::user()->id}}`;
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    var MM = tdate.getMonth(); //yields month
    var yyyy = tdate.getFullYear(); //yields year
    var hh = tdate.getHours();
    var ii = tdate.getMinutes();
    var ss = tdate.getSeconds();

    var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

    var url = `{{ route('project_hold') }}`;

    const form_data = new FormData();
    form_data.append("id",id);
    form_data.append("user_id",user_id);
    form_data.append("hold_time",date);

    axios.post(url,form_data).then(response => {
      
      console.log(response);
      location.reload();
    }).catch(error=>{
      // console.log(error);
    });
  }
  
  function project_complete(id){

    var user_id = `{{Auth::user()->id}}`;
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    var MM = tdate.getMonth(); //yields month
    var yyyy = tdate.getFullYear(); //yields year
    var hh = tdate.getHours();
    var ii = tdate.getMinutes();
    var ss = tdate.getSeconds();

    var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

    var url = `{{ route('project_complete') }}`;

    const form_data = new FormData();
    form_data.append("id",id);
    form_data.append("user_id",user_id);
    form_data.append("complete_time",date);

    axios.post(url,form_data).then(response => {
      
      console.log(response);
      location.reload();
    }).catch(error=>{
      // console.log(error);
    });
  }
  
  function project_cancel(id){

    var user_id = `{{Auth::user()->id}}`;
    var tdate = new Date();
    var dd = tdate.getDate(); //yields day
    var MM = tdate.getMonth(); //yields month
    var yyyy = tdate.getFullYear(); //yields year
    var hh = tdate.getHours();
    var ii = tdate.getMinutes();
    var ss = tdate.getSeconds();

    var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

    var url = `{{ route('project_cancel') }}`;

    const form_data = new FormData();
    form_data.append("id",id);
    form_data.append("user_id",user_id);
    form_data.append("cancel_time",date);

    axios.post(url,form_data).then(response => {
      
      console.log(response);
      location.reload();
    }).catch(error=>{
      // console.log(error);
    });
  }
</script>
@endsection
