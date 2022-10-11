@extends('layouts.master')
@section('content')
<!-- Welcome Section-->

<section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="lg:w-full border-b-2">
            <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
            <div class="flex flex-row">
            </div>
            <span class="text-4xl self-center font-bold pb-10">Leave List</span>
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
              <th class="text-neutral-400 p-4 font-semibold text-sm text-center w-1/12">Sr.No.</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left w-2/12" >Leave Date - Cover Date</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left w-2/12">Person</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left w-2/12">Leave Reason</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left w-2/12">Created By</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left w-2/12">Status</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-center w-1/12"></th>
            </tr>
          </thead>
          <tbody>
              @php
                $count = 0;
				$DayArray = array("1"=>"Half Day","2"=>"Full Day");
				$StatusArray = array("0"=>"Pending ","1"=>"Approved","2"=>"Rejected","3"=>"Cancelled");
				
              @endphp
              @foreach($leaves as $leave)
			  
                <tr class="bg-white align-top">
                  	
                    <td class="text-sm font-semibold p-2 text-center ">{{++$count}}</td>
                    <td class="text-sm font-semibold p-2 text-left">
						@if($leave->leave_date_1!="" && $leave->leave_date_1!="NULL" && $leave->leave_date_1!="0000-00-00"  && $leave->leave_date_1!="1970-01-01")
							@php
								$leave_date_1 = date("d-m-Y",strtotime($leave->leave_date_1));
								if($leave->cover_date_1!="" && $leave->cover_date_1!="NULL" && $leave->cover_date_1!="0000-00-00"  && $leave->cover_date_1!="1970-01-01")
								{
									$cover_date_1 = date("d-m-Y",strtotime($leave->cover_date_1));
								}
								else
								{
									$cover_date_1 = "-";
								}
							@endphp
							{{ $leave_date_1 }} &nbsp;<b>{{ $DayArray[$leave->leave_day_1] }}</b> &nbsp  {{$cover_date_1}}<br>
						@endif
						@if($leave->leave_date_2!="" && $leave->leave_date_2!="NULL" && $leave->leave_date_2!="0000-00-00"  && $leave->leave_date_2!="1970-01-01")
							@php
								$leave_date_2 = date("d-m-Y",strtotime($leave->leave_date_2));
								if($leave->cover_date_2!="" && $leave->cover_date_2!="NULL" && $leave->cover_date_2!="0000-00-00"  && $leave->cover_date_2!="1970-01-01")
								{
									$cover_date_2 = date("d-m-Y",strtotime($leave->cover_date_2));
								}
								else
								{
									$cover_date_2 = "-";
								}
							@endphp
							{{ $leave_date_2 }} &nbsp;<b>{{ $DayArray[$leave->leave_day_2] }}</b> &nbsp  {{$cover_date_2}}<br>
						@endif
						@if($leave->leave_date_3!="" && $leave->leave_date_3!="NULL" && $leave->leave_date_3!="0000-00-00"  && $leave->leave_date_3!="1970-01-01")
							@php
								$leave_date_3 = date("d-m-Y",strtotime($leave->leave_date_3));
								if($leave->cover_date_3!="" && $leave->cover_date_3!="NULL" && $leave->cover_date_3!="0000-00-00"  && $leave->cover_date_3!="1970-01-01")
								{
									$cover_date_3 = date("d-m-Y",strtotime($leave->cover_date_3));
								}
								else
								{
									$cover_date_3 = "-";
								}
							@endphp
							{{ $leave_date_3 }} &nbsp;<b>{{ $DayArray[$leave->leave_day_3] }}</b> &nbsp  {{$cover_date_3}}<br>
						@endif
						@if($leave->leave_date_4!="" && $leave->leave_date_4!="NULL" && $leave->leave_date_4!="0000-00-00"  && $leave->leave_date_4!="1970-01-01")
							@php
								$leave_date_4 = date("d-m-Y",strtotime($leave->leave_date_4));
								if($leave->cover_date_4!="" && $leave->cover_date_4!="NULL" && $leave->cover_date_4!="0000-00-00"  && $leave->cover_date_4!="1970-01-01")
								{
									$cover_date_4 = date("d-m-Y",strtotime($leave->cover_date_4));
								}
								else
								{
									$cover_date_4 = "-";
								}
							@endphp
							{{ $leave_date_4 }} &nbsp;<b>{{ $DayArray[$leave->leave_day_4] }}</b> &nbsp  {{$cover_date_4}}<br>
						@endif
						@if($leave->leave_date_5!="" && $leave->leave_date_5!="NULL" && $leave->leave_date_5!="0000-00-00"  && $leave->leave_date_5!="1970-01-01")
							@php
								$leave_date_5 = date("d-m-Y",strtotime($leave->leave_date_5));
								if($leave->cover_date_5!="" && $leave->cover_date_5!="NULL" && $leave->cover_date_5!="0000-00-00"  && $leave->cover_date_5!="1970-01-01")
								{
									$cover_date_5 = date("d-m-Y",strtotime($leave->cover_date_5));
								}
								else
								{
									$cover_date_5 = "-";
								}
							@endphp
							{{ $leave_date_5 }} &nbsp;<b>{{ $DayArray[$leave->leave_day_5] }}</b> &nbsp  {{$cover_date_5}}<br>
						@endif
						@if($leave->leave_date_6!="" && $leave->leave_date_6!="NULL" && $leave->leave_date_6!="0000-00-00"  && $leave->leave_date_6!="1970-01-01")
							@php
								$leave_date_6 = date("d-m-Y",strtotime($leave->leave_date_6));
								if($leave->cover_date_6!="" && $leave->cover_date_6!="NULL" && $leave->cover_date_6!="0000-00-00"  && $leave->cover_date_6!="1970-01-01")
								{
									$cover_date_6 = date("d-m-Y",strtotime($leave->cover_date_6));
								}
								else
								{
									$cover_date_6 = "-";
								}
							@endphp
							{{ $leave_date_6 }} &nbsp;<b>{{ $DayArray[$leave->leave_day_6] }}</b> &nbsp  {{$cover_date_6}}<br>
						@endif
						@if($leave->leave_date_7!="" && $leave->leave_date_7!="NULL" && $leave->leave_date_7!="0000-00-00"  && $leave->leave_date_7!="1970-01-01")
							@php
								$leave_date_7 = date("d-m-Y",strtotime($leave->leave_date_7));
								if($leave->cover_date_7!="" && $leave->cover_date_7!="NULL" && $leave->cover_date_7!="0000-00-00"  && $leave->cover_date_7!="1970-01-01")
								{
									$cover_date_7 = date("d-m-Y",strtotime($leave->cover_date_7));
								}
								else
								{
									$cover_date_7 = "-";
								}
							@endphp
							{{ $leave_date_7 }} &nbsp;<b>{{ $DayArray[$leave->leave_day_7] }}</b> &nbsp  {{$cover_date_7}}<br>
						@endif
					</td>
					@php
                        $createdby_image_path = $leave->user_name->image_path;
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
                        <span class="text-sm font-semibold p-2 self-center ml-2">{{$leave->user_name->name}}</span>
                    </td>
                    <td class="text-sm font-semibold p-2 text-left">{{ $leave->leave_reason }}</td>
					
                    
                    @php
                        $person_image_path = $leave->person_name->image_path;
                        if($person_image_path!="" && $person_image_path!="null" )
                        {
                            $PersonUserImage = asset('images/user')."/".$person_image_path;
                        }
                        else
                        {
                            $PersonUserImage = asset('images')."/default.png";
                        }
						$Created_At = date("d-m-Y h:i A",strtotime($leave->created_at));
						$Updated_At = date("d-m-Y h:i A",strtotime($leave->updated_at));
                    @endphp
                    <td class="flex flex-row text-sm font-bold text-left">
                        <img src="{{$PersonUserImage}}"  class="rounded-full task-user-image mt-2"></img>
                        <span class="text-sm font-semibold p-2 self-center ml-2">
							{{$leave->person_name->name}}
							<br>
							<span class="text-neutral-400">
								{{$Created_At}}
							</span>
						</span>
                    </td>
                    <td class="text-sm font-semibold p-2 text-left">
						{{ $StatusArray[$leave->status] }}
						<br>
						<span class="text-neutral-400">
							{{$Updated_At}}
						</span>
					</td>

                    <td class="text-sm font-semibold p-2 text-left">
                        <div class="dropdown_container" tabindex="-1">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        <div class="dropdown">
							@if($leave->status == 0 )
								@if((Auth::user()->type==1 || Auth::user()->type==2 ))
									<a data-id="{{$leave->id}}" title="Leave Approve" class="grid_dropdown_item start_button"  onClick="leave_approve({{$leave->id}})">
										<div><i class="fa fa-circle"></i> Approve</div>
									</a>
									<a data-id="{{$leave->id}}" title="Leave Reject" class="grid_dropdown_item stop_button"  onClick="leave_reject({{$leave->id}})">
										<div><i class="fa fa-circle"></i> Reject</div>
									</a>
								@endif
								<a data-id="{{$leave->id}}" title="Leave Cancel" class="grid_dropdown_item cancel_button"  onClick="leave_cancel({{$leave->id}})">
									<div><i class="fa fa-circle"></i> Cancel</div>
								</a>
								<a href="{{ route('edit_leave', $leave->id) }}" class="grid_dropdown_item edit_button" >
									<div><i class="fa fa-edit"></i> Edit</div>
								</a>
							@endif
							@if((Auth::user()->type==1 || Auth::user()->type==2 ))
								<a onclick="return confirm('Are you sure Delete This Leave..?')"  href="{{ route('delete_leave', $leave->id) }}" class="grid_dropdown_item delete_button"  title="Delete"  >
									<div><i class="fa fa-trash-o"> Delete</i></div>
								</a>
							@endif
                      </div>
                    </td>  
                </tr>
              @endforeach
			  	<div class="pt-5 pl-5 pr-5">
                  	{{$leaves->links()}}
            	</div>
          </tbody>
        </table>
      </div>
    </div>
      <div class="mb-10 mt-5 mr-10 self-center lg:self-center float-right">
        <a href="{{ route('create_leave') }}" class="text-white rounded-3xl bg-red-600 text-md font-normal px-4 py-2 rounded-lg">Add Leave Request <i class="fa fa-plus"></i></a>
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
	// form_data.append("mode","");

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
	// form_data.append("mode","");


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
	// form_data.append("mode","");

	axios.post(url,form_data).then(response => {
	
	//console.log(response);
	location.reload();
	}).catch(error=>{
	// console.log(error);
	});
}
</script>

@endsection
