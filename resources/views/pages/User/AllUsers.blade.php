@extends('layouts.master')
@section('content')
  <!-- Welcome Section-->

  <section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
      <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
          <div class="lg:w-full border-b-2">
              <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
              <div class="flex flex-row">
                  <span class="text-md font-semibold text-sm self-center mx-2 md:mx-0">Total User</span>
                  <span class="text-md self-center text-left text-neutral-400 pl-2">{{$total_user}}</span>
              </div>
              <span class="text-4xl self-center font-bold pb-10">User List</span>
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
                      <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Type</th>
                      <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Name</th>
                      <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Email</th>
                      <th class="text-neutral-400 p-4 font-semibold text-sm text-center"></th>
                  </tr>
              </thead>
              <tbody>
                  @php
                      $count = 0
                  @endphp
                  @foreach($users as $user)
                  @php
                      if($user->image_path!="" && $user->image_path!="null" )
                      {
                      $image = asset('images/user')."/".$user->image_path;
                      }
                      else
                      {
                      $image = asset('images')."/default.png";
                      }
                  @endphp
                  <tr class="bg-white" >
                      <td class="text-sm font-semibold p-2 text-center">{{++$count}}</td>
                      <td class="text-sm font-semibold p-2 text-left">
                        @php
                            $TypeArray = array(0=>"","1"=>"Admin","2"=>"Senior Employee","3"=>"Employee");
                        @endphp
                        {{$TypeArray[$user->type]}}
                      </td>
                      <td class="flex flex-row text-sm font-bold text-left">
                        <img src="{{$image}}"  class="rounded-full grid-image mt-2 mb-2"></img>
                        <span class="text-sm font-semibold p-2  self-center ml-2">{{$user->name}}</span>
                      </td>
                      
                      <td class="text-sm font-semibold p-2 text-left">{{$user->email}}</td>
                      <td class="text-sm font-semibold p-2 text-center">
                          <div class="dropdown_container" tabindex="-1">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                              <div class="dropdown">
                                @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                  <a data-toggle="modal" id="smallButton" data-target="#smallModal" data-id="{{ $user->id }}" title="Change Password" style="margin-left: 10px;cursor:pointer;color: blue;" onClick='openChangePassword("{{ $user->id }}")' >
                                    <i class="fa fa-key"></i> Change Password
                                  </a>
                                  <a href="{{ route('edit_user', $user->id) }}" class="grid_dropdown_item edit_button">
                                    <div><i class="fa fa-edit"></i> Edit</div>
                                  </a>
                                  <a onclick="return confirm('Are you sure Delete This User..?')"  href="{{ route('delete_user', $user->id) }}" class="grid_dropdown_item delete_button" title="Delete">
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
            <a href="{{ route('create_user') }}" class="text-white rounded-3xl bg-red-600 text-md font-normal px-4 py-2 rounded-lg">Add User <i class="fa fa-plus"></i></a>
        </div> 
      @endif
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
        `<form action="{{ route('user_change_password') }}" method="POST" enctype="multipart/form-data">
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
  </script>
@endsection