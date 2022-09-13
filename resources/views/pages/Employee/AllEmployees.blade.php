@extends('layouts.master')
@section('content')
<!-- Welcome Section-->

<section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="lg:w-full border-b-2">
            <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
            <div class="flex flex-row">
                <span class="text-md font-semibold text-sm self-center mx-2 md:mx-0">Total Employee</span>
                <span class="text-md self-center text-left text-neutral-400 pl-2">{{$total_employee}}</span>
            </div>
            <span class="text-4xl self-center font-bold pb-10">Employee List</span>
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
              <th class="text-neutral-400 p-4 font-semibold text-sm text-center"></th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-center">Sr.No.</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Given Name</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Job Role</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Primary Contact Number</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Working Location</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Email</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-center"></th>
            </tr>
          </thead>
          <tbody>
              @php
                $count = 0
              @endphp
              @foreach($employees as $employee)
              @php
                if($employee->image_path!="" && $employee->image_path!="null" )
                {
                  $image = asset('images/profile')."/".$employee->image_path;
                }
                else
                {
                  $image = asset('images')."/default.png";
                }
              @endphp
              <tr class="bg-white">
                  <td class="text-sm font-semibold p-2 text-center">
                    <a id="employeeDetailsShowButton" data-attr="{{ route('api_single_employee', $employee->id) }}" data-id="{{ $employee->id }}" title="View" style="cursor:pointer;color: blue;"  >
                    <!-- onClick='openEmployeeDetails("{{ $employee->id }}")' -->
                      <i class="fa fa-eye"></i>
                    </a>
                  </td>
                  <td class="text-sm font-semibold p-2 text-center">{{++$count}}</td>
                  <td class="flex flex-row text-sm font-bold text-left">
                    <img src="{{$image}}"  class="rounded-full grid-image mt-2 mb-2"></img>
                    <span class="text-sm font-semibold p-2  self-center ml-2">{{$employee->given_name}}</span>
                  </td>
                  <td class="text-sm font-semibold p-2 text-left">
                    @if($employee->job_role!=0)
                      {{$employee->job_role_name->name}}
                    @endif
                  </td>
                  <td class="text-sm font-semibold p-2 text-left">{{ $employee->contact_number }}</td>
                  <td class="text-sm font-semibold p-2 text-left">
                    @if($employee->working_location!=0)
                      {{$employee->working_location_name->name}}
                    @endif
                  </td>
                  <td class="text-sm font-semibold p-2 text-left">{{ $employee->email }}</td>
                  <td class="text-sm font-semibold p-2 text-left">
                  <div class="dropdown_container" tabindex="-1">
                      <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      <div class="dropdown">
                          <a class="grid_dropdown_item view_button" id="employeeDetailsShowButton" data-attr="{{ route('api_single_employee', $employee->id) }}" data-id="{{ $employee->id }}" title="View" ><div><i class="fa fa-eye"></i> View</div></a>
                          @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                            <a href="{{ route('edit_employee_profile', $employee->id) }}" class="grid_dropdown_item edit_button" ><div><i class="fa fa-edit"></i> Edit</div></a>
                            <a onclick="return confirm('Are you sure Delete This Employee..?')"  href="{{ route('delete_employee_profile', $employee->id) }}" class="grid_dropdown_item delete_button"   title="Delete"  >
                            <div><i class="fa fa-trash-o"> Delete</i></div>
                          @endif
                          </a>
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
        <a href="{{ route('create_employee_profile') }}" class="text-white rounded-3xl bg-red-600 text-md font-normal px-4 py-2 rounded-lg">Add Employee <i class="fa fa-plus"></i></a>
      </div>
    @endif

  <!-- Change Password modal Start -->
  <div class="modal" id="employeeDetailsShowModal" tabindex="-1" role="dialog" style="display:none" aria-labelledby="employeeDetailsShowModal"
      aria-hidden="true"> 
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content w-full p-0 lg:w-2/6 lg:p-4 xl:w-2/6 xl:p-4 sm:w-1/6 sm:p-2">
        <div class="modal-header border-b-red-200 self-center border-b-2">
          <button type="button" class="close flex float-right" data-dismiss="modal" aria-label="Close" onclick="closeEmployeeDetails()" style="color: red;font-size: 30px;" >
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="text-center py-2 text-4xl text-black font-bold" id="exampleModalLongTitle">Employee Details</h5>

        </div>
        <div class="employeeDetailsShowContant" ></div>
      </div>
    </div>
  </div>
  <!-- Change Password modal End-->
</section>




<script>
  $(document).on('click', '#employeeDetailsShowButton', function(event) {
	document.getElementById("employeeDetailsShowModal").style.display = "block";
	event.preventDefault();
	let href = $(this).attr('data-attr');
	let id = $(this).attr('data-id');
	// alert(href);
	// let id = $id;
	// var href = `{{ route('api_single_employee', '1') }}`;
	console.log(href);
	$.ajax({
		url: href,
		beforeSend: function() {
			$('#loader').show();
		},
		// return the result
		success: function(result) {
			// console.log(result.employee);
			var object = result.employee;
			var date    = new Date(object.dob);
			// yr      = date.getFullYear(),
			// month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth(),
			// day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
			// dob = day + '-' + month + '-' + yr;
      if(object.dob!="" && object.dob!='NULL')
      {
        var dob_date = new Date(object.dob);
        var dd = String(dob_date.getDate()).padStart(2, '0');
        var mm = String(dob_date.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = dob_date.getFullYear();
        dob = dd + '-' + mm + '-' + yyyy;
      }
      else
      {
        dob = "";
      }
      if(object.doj!="" && object.doj!='NULL')
      {
        var doj_date = new Date(object.doj);
        var dd1 = String(doj_date.getDate()).padStart(2, '0');
        var mm1 = String(doj_date.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy1 = doj_date.getFullYear();
        doj = dd1 + '-' + mm1 + '-' + yyyy1;
      }
      else
      {
        doj = "";
      }
      if(object.dol!="" && object.dol!='NULL')
      {
        var dol_date = new Date(object.dol);
        var dd2 = String(dol_date.getDate()).padStart(2, '0');
        var mm2 = String(dol_date.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy2 = dol_date.getFullYear();
        dol = dd2 + '-' + mm2 + '-' + yyyy2;
      }
      else
      {
        dol = "";
      }
      

			$(".employeeDetailsShowContant").html(
				`<div class="modal-body">
					<div class="bg-white fix-width text-right ">
						<img class="rounded-full popup-image mt-2 mb-2 text-center" src="${object.image_path}"></img>
					</div>
					<table class="table table-striped">
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p">Given Name : </td><td class="text-sm font-semibold p-2 text-left" >${object.given_name}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Family Name : </td><td class="text-sm font-semibold p-2 text-left" >${object.family_name}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Date Of Birth : </td><td class="text-sm font-semibold p-2 text-left" >${dob}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Job Role : </td><td class="text-sm font-semibold p-2 text-left" >${object.job_role}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Education Qualification : </td><td class="text-sm font-semibold p-2 text-left" >${object.edu_qualification}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Skills : </td><td class="text-sm font-semibold p-2 text-left" >${object.skills}</td>
					</tr>
          <tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Date Of Joining : </td><td class="text-sm font-semibold p-2 text-left" >${doj}</td>
					</tr>
          <tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Date Of Leaving : </td><td class="text-sm font-semibold p-2 text-left" >${dol}</td>
					</tr>
          <tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Salary (INR) : </td><td class="text-sm font-semibold p-2 text-left" >${object.salary}</td>
					</tr>
          <tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Loyalty (INR) : </td><td class="text-sm font-semibold p-2 text-left" >${object.loyalty}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Present Address : </td><td class="text-sm font-semibold p-2 text-left" >${object.present_address}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Permanent Address : </td><td class="text-sm font-semibold p-2 text-left" >${object.permanent_address}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Primary Contact Number : </td><td class="text-sm font-semibold p-2 text-left" >${object.contact_number}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Secondary Contact Number : </td><td class="text-sm font-semibold p-2 text-left" >${object.contact_number_2}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Working Location : </td><td class="text-sm font-semibold p-2 text-left" >${object.working_location}</td>
					</tr>
					<tr class="bg-white" >
						<td class="text-sm font-semibold p-2 text-left width-40p" >Email : </td><td class="text-sm font-semibold p-2 text-left" >${object.email}</td>
					</tr>
					</table>
				</div>
				<div class="self-right lg:self-right justify-right align-right content-right text-right pt-2">
					<button type="button" onclick="closeEmployeeDetails()" class="rounded-3xl bg-gray-200 text-md font-semibold text-black px-10 py-2">Close</button>
				</div>`
			);
			
			//$('#smallBody').html(result).show();
			//$("#given_name").prev().val(result.employee[given_name]);
			//$("#file").val(fileName);
		},
		complete: function() {
			$('#loader').hide();
		},
		error: function(jqXHR, testStatus, error) {
			console.log(error);                                                                                                                                  
			alert("Page " + href + " cannot open. Error:" + error);
			$('#loader').hide();
		},
		timeout: 8000
	})
  });
  function closeEmployeeDetails() {
    document.getElementById("employeeDetailsShowModal").style.display = "none";
  }
</script>

@endsection
