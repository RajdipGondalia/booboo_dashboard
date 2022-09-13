@extends('layouts.master')
@section('content')
<!-- Welcome Section-->
@php
if($mode=="edit")
{
    $id = $user->id;
    $name = $user->name;
    $email = $user->email;
    $password = $user->password;
    $image_path = $user->image_path;
    $type = $user->type;

    $page_title = "Edit User";
}
else
{
    $id = "";
    $name = "";
    $email = "";
    $password = "";
    $image_path = "";
    $type = "";

    $page_title = "Add User";
}
@endphp
<section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="lg:w-full border-b-2">
            <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
                <span class="text-4xl self-center font-bold pb-10">{{$page_title}}</span>
                    <div class="flex flex-col">
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- Welcome Section end-->
<section class="lg:ml-60 md:ml-60 sm:ml-60 mt-2 relative">
    
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
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
        <div class="flex flex-col bg-red-100 xl:mx-10 md:mx-10 sm:mx-2 mx-0 rounded-lg">
            <div  class="flex  sm:flex-col flex-col xl:px-12 md:px-12 sm:px-12 px-0 w-full">
            <!-- <div  class="flex lg:flex-row xl:flex xl:flex-row md:flex-row sm:flex-col flex-col xl:px-12 md:px-12 sm:px-12 px-0 w-full"> -->
                <form action="{{ route('store_user_data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="bg-red-100 rounded-md mb-10 p-4 md:p-4 text-center flex flex-col">
					    <!-- <span class="uppercase text-sm pt-4 self-start text-neutral-4000">Company Details</span>  -->
					    <div class="xl:w-3/5 md:w-4/5 sm:w-full w-full flex flex-col"> 	
						    <!-- <div class="flex xl:flex-row md:flex-row sm:flex-row flex-col"> -->
						        <!-- <div class="p-4 md:p-4 w-72 text-center flex flex-col">
						            <span class="text-start text-xs">Company Logo's</span>
					                <img src="images/profile-img.png" class="rounded-lg lg:px-0 xl:px-30 md:px-0 sm:px-0" alt="">
					                <button type="button" class=" self-center text-red-500 text-xs font-bold pt-2">Upload Logo image</button>
						        </div> -->

						        <!-- <div class="flex flex-col w-full xl:pl-10 md:pl-10 sm:pl-10 pl-0"> -->
                                    <label class="block mb-5 self-center w-full"> 
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                        Type <span class="text-red-700">*</span> </span>
                                        <select name="type" class="form-select appearance-none block w-full bg-red-100 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out  focus:border-red-300 focus:ring-red-300 m-0 mt-1 focus:bg-red-100 focus:text-gray-700 focus:bg-red-100 focus:border-red-300 focus:outline-none" aria-label="Default select example">
                                            <option value="">Select Type</option>
                                            <option {{ ($type == 1)?"selected":"" }} value="1" >Admin</option>
                                            <option {{ ($type == 2)?"selected":"" }} value="2" >Senior Employee</option>
                                            <option {{ ($type == 3)?"selected":"" }} value="3" >Employee</option>
                                        </select> 
                                    </label>
						            <label class="block mb-5 self-center w-full"> 
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                             Name<span class="text-red-700">*</span>
                                        </span>
                                        <input type="text" name="name" value="{{$name}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder=""> 
                                    </label>

                                    <label class="block mb-5 self-center w-full"> 
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                        Email<span class="text-red-700">*</span>
                                        </span>
                                        <input type="email" name="email" value="{{$email}}"  class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                        focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder=""> 
                                    </label>
                                    @if($mode=="add")

                                        <label class="block mb-5 self-center w-full"> 
                                            <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                            Password<span class="text-red-700">*</span>
                                            </span>
                                            <input type="password" name="password" value="{{$password}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                            focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder=""> 
                                        </label>

                                        <label class="block mb-5 self-center w-full"> 
                                            <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                            Confirm Password<span class="text-red-700">*</span>
                                            </span>
                                            <input  type="password" name="password_confirmation" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                            focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                                        </label>
                                    @endif
                                    <label class="block mb-5 self-center w-full"> 
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                        User Photo
                                        <input type="file" name="image_path" class="file" >

                                        </span>

                                    </label>
					    </div>  
                        <div class="mb-10 mt-10 self-center lg:self-center flex flex-row"> 
                            <input type="hidden" name="mode" value="{{$mode}}" >
                            <input type="hidden" name="user_id" value="{{$id}}" >
                            <button type="submit" class="text-white rounded-3xl bg-red-500 text-md font-semibold profile-button px-10 py-2">Save</button>
                            <!-- <button type="button" class="rounded-3xl bg-gray-200 text-md font-semibold profile-button px-10 py-2">Cancel</button> -->
                                                
                        </div>       
				    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
</script>

@endsection
