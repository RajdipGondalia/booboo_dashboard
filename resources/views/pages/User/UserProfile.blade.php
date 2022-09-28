@extends('layouts.master')
@section('content')
  <!-- Welcome Section-->

  <section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
      <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
          <div class="lg:w-full border-b-2">
              <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
              <div class="flex flex-row">
                  <!-- <span class="text-md font-semibold text-sm self-center mx-2 md:mx-0">Total User</span> -->
                  <!-- <span class="text-md self-center text-left text-neutral-400 pl-2"></span> -->
              </div>
              <span class="text-4xl self-center font-bold pb-10">User Profile</span>
              <div class="flex flex-col">
              </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Welcome Section end-->
  <section class="lg:ml-60 md:ml-60 sm:ml-60 mt-2 relative">
    @if($errors->any())
      <div class="validation-alert-box alert alert-danger  bg-red-100 xl:mx-10 md:mx-10 sm:mx-2 mx-0 mb-5 rounded-lg ">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
        <div class="validation-alert-title alert alert-danger self-end bg-red-100 mb-2" role="alert">
          {{ $error }}
        </div>
        @endforeach
        </ul>
      </div>
    @endif
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
      
		@php
      $user_image_path = Auth::user()->image_path;
			if($user_image_path!="" && $user_image_path!="null" )
			{
			  $image = asset('images/user')."/".$user_image_path;
			}
			else
			{
			  $image = asset('images')."/default.png";
			}
			$name = Auth::user()->name;
			$id = Auth::user()->id;
			$type = Auth::user()->type;
			$email = Auth::user()->email;
		@endphp
		<div class="flex flex-col xl:flex xl:flex-col xl:justify-between grid grid-cols-1 xl:pl-10 md:pl-10 sm:pl-10 pl-0 xl:px-10 md:px-10 sm:px-10 px-0 sm:grid sm:grid-cols-1 sm:gap-5 md:grid md:grid-cols-2 md:gap-10 xl:grid xl:grid-cols-2 xl:gap-10 sm:mx-0 xl:mx-0">
			
			<div class="employee-card rounded-none p-4 md:p-4 text-center flex flex-col">
				<span class="text-start uppercase text-md">User Details</span>
				@php
					$TypeArray = array(0=>"","1"=>"Admin","2"=>"Senior Employee","3"=>"Employee");
				@endphp
				<div class="employee-input-card p-2 md:p-2 h-16 text-center rounded-2xl mt-6 self-start w-full flex flex-row">
					<div class="flex flex-col ml-4">
						<p class="self-start text-xs">User Type</p>
						<p class="self-start font-bold text-md">{{$TypeArray[$type]}}</p>
					</div>
				</div>
				<div
					class="employee-input-card p-2 md:p-2 h-16 text-center rounded-2xl mt-6 self-start w-full flex flex-row">
					<div class="flex flex-col ml-4">
						<p class="self-start text-xs">Name</p>
						<p class="self-start font-bold text-md">{{$name}}</p>
					</div>
				</div>
				<div
					class="employee-input-card p-2 md:p-2 h-16 text-center rounded-2xl mt-6 self-start w-full flex flex-row">
					<div class="flex flex-col ml-4">
						<p class="self-start text-xs">Email</p>
						<p class="self-start font-bold text-md">{{$email}}</p>
					</div>
				</div>
					@if((Auth::user()->type==1 || Auth::user()->type==2 ))
						<div class="mb-10 mt-10 self-left lg:self-left flex flex-row"> 
							<a class="text-white rounded-3xl bg-red-500 text-md font-semibold profile-button px-10 py-2" data-toggle="modal" id="smallButton" data-target="#smallModal" data-id="{{ $id }}" title="Change Password" style="margin-left: 10px;cursor:pointer;" onClick='openChangePassword("{{ $id }}")' >
							<i class="fa fa-key"></i> Change Password
							</a>
						</div> 
					@endif
				</div>
				<div class="p-4 md:p-4 text-left flex flex-col">
					<form action="{{ route('store_user_data') }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('POST')
						<!-- <span class="text-left uppercase  text-md pl-10">Profile Image</span> -->
						<img src="{{$image}}" class="rounded-full " style="width: 350px; height: 350px; margin-left: 0%;" alt="">
						<span class=" self-left text-red-500 text-xs font-bold pt-2">Change Profile image</span>
						<input  class="form-control " type="file" name="image_path" >
            @if(Auth::user()->image_path != "")
              <button class="text-white rounded-3xl bg-neutral-400 text-md font-semibold profile-button px-5 py-2 mt-5" onClick="remove_profile_image({{$id}})"><i class="fa fa-trash"></i> Remove</button>
            @endif
						<div class="mb-10 mt-10 self-left lg:self-left flex flex-row image"> 
							<input type="hidden" name="mode" value="change_user_photo" >
							<input type="hidden" name="name" value={{$name}} >
							<input type="hidden" name="user_id" value="{{$id}}" >
							<button type="submit" class="text-white rounded-3xl bg-red-500 text-md font-semibold profile-button px-10 py-2">Upload Profile Photo </button>
							<!-- <button type="button" class="rounded-3xl bg-gray-200 text-md font-semibold profile-button px-10 py-2">Cancel</button> -->           
						</div> 
					</form>
				</div>  
			</div>
		</div>
    
  </section>
  <!-- Change Password modal Start -->
  <div class="modal" id="changePasswordModal" tabindex="-1" role="dialog" style="display:none" aria-labelledby="changePasswordModal"
      aria-hidden="true"> 
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content w-full p-0 lg:w-3/5 lg:p-4 xl:w-3/5 xl:p-4 sm:w-4/5 sm:p-2">
        <div class="modal-header border-b-red-200 self-center border-b-2">
          <button type="button" class="close flex float-right" data-dismiss="modal" aria-label="Close" onclick="closeClientPopup()" style="color: red;font-size: 30px;" >
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="text-center py-2 text-4xl text-black font-bold" id="exampleModalLongTitle">Change Password</h5>
        </div>
        <div class="changePasswordContant" ></div>
      </div>
    </div>
  </div>
  <!-- Change Password modal End-->

  <script>
    function openChangePassword($id) {
      document.getElementById("changePasswordModal").style.display = "block";
      // let id = $("#smallButton").attr('data-id');
      let id = $id;
      $(".changePasswordContant").html(
        `<form action="{{ route('change_password_from_user_profile') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="modal-body">
            <div class="flex flex-col mx-0 rounded-lg">
              <div class="flex xl:flex sm:flex-col flex-col w-full">
                <div class="row mt-2">
                  <div class="col-md-12">
                    <!-- Password -->
                    <label class="labels">Password<span class="text-red-700">*</span></label>
                    <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password"  autocomplete="new-password" required minlength="8" />
                    <span style="color:red">@error('password'){{$message}}@enderror</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-12">
                    <!-- Confirm Password -->
                    <label class="labels">Confirm Password<span class="text-red-700">*</span></label>
                    <x-input id="password_confirmation" class="block mt-1 w-full form-control " type="password" name="password_confirmation" required minlength="8"  />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="self-center lg:self-center justify-center align-center content-center text-center pt-2">
            <input type="hidden" id="user_id" name="user_id" value="${id}">
            <button class="text-white rounded-3xl bg-red-500 text-md font-semibold px-10 py-2" type="submit" >Change Password</button>
            <button type="button" onclick="closeClientPopup()" class="rounded-3xl bg-gray-200 text-md font-semibold text-black px-10 py-2">Cancel</button>
          </div>
        </form>`
      );
    }
    function closeClientPopup() {
      document.getElementById("changePasswordModal").style.display = "none";
    }

    function remove_profile_image(id)
    {
        var user_id = `{{Auth::user()->id}}`;

        var url = `{{ route('store_user_data') }}`;

        // console.log("Function called",date);
        // console.log("Task Id",id);
        const form_data = new FormData();
        form_data.append("user_id",user_id);
        form_data.append("mode","remove_user_photo");

        axios.post(url,form_data).then(response => {
        
        console.log(response);
        location.reload();
        }).catch(error=>{
        // console.log(error);
        });
    }
  </script>
@endsection