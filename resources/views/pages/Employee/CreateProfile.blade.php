@extends('layouts.master')
@section('content')
<!-- Welcome Section-->
@php
if($mode=="edit")
{
    $id = $profile->id;
    $given_name = $profile->given_name;
    $family_name = $profile->family_name;
    $dob = $profile->dob;
    $job_role_id = $profile->job_role;
    $edu_qualification = $profile->edu_qualification;
    $skills = $profile->skills;
    $doj = $profile->doj;
    $dol = $profile->dol;
    $salary = $profile->salary;
    $loyalty = $profile->loyalty;
    $present_address = $profile->present_address;
    $permanent_address = $profile->permanent_address;
    $contact_number = $profile->contact_number;
    $contact_number_2 = $profile->contact_number_2;
    $working_location_id = $profile->working_location;
    $email = $profile->email;
    $image_path = $profile->image_path;
    $page_title = "Edit Employee";
}
else
{
    $id = "";
    $given_name = "";
    $family_name = "";
    $dob = "";
    $job_role_id = 0;
    $edu_qualification = "";
    $skills = "";
    $doj = "";
    $dol = "";
    $salary = "";
    $loyalty = "";
    $present_address = "";
    $permanent_address = "";
    $contact_number = "";
    $contact_number_2 = "";
    $working_location_id = 0;
    $email = "";
    $image_path = "";
    $page_title = "Add Employee";

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
    <div class="flex flex-col xl:flex xl:flex-col pt-2  xl:justify-between xl:pl-10 md:pl-10 sm:pl-10 pl-0 xl:px-10 md:px-10 sm:px-10 px-0 sm:mx-0 xl:mx-0">
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

        <div class="bg-red-100 rounded-md mb-10 p-4 md:p-4 text-center flex flex-col">
            <form action="{{ route('store_profile_data') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class=" flex flex-col xl:flex-row md:flex-row sm:flex-row">
                    <div class=" w-full flex flex-col xl:flex-row md:flex-row sm:flex-row justify-between">
                        <div class="  flex flex-col form-floating xl:w-2/5 md:w-2/5 sm:w-2/5 w-full mb-3">
                            <label class="block mb-5 self-center w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Given Name <span class="text-red-700">*</span>
                                </span>
                                <input type="text" name="given_name" value="{{$given_name}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Family Name <span class="text-red-700">*</span>
                                </span>
                                <input type="text" name="family_name" value="{{$family_name}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Birth Date
                                </span>
                                <input name="dob" type="date" value="{{$dob}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            
                            <label class="block mb-5 self-center w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Job Role <span class="text-red-700">*</span>
                                </span>
                                <select name="job_role" class="form-select appearance-none block sm:w-full w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-red-100 bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-red-300 focus:outline-none"
                                    aria-label="Default select example">
                                    <option value="">Select Job Role</option>
                                    @foreach($job_roles as $job_role)
                                        <option  {{($job_role_id == $job_role->id)?"selected":""}}  value="{{ $job_role->id }}">{{ $job_role->name }}</option>
                                    @endforeach
                                </select><br>
                                @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                    <a  href="{{ route('create_job_role') }}"  class="text-white rounded-3xl bg-green-700 text-xs font-semibold px-2 py-2 rounded-lg mt-10" >Add Job Role +</a> 
                                @endif
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Education Qualification
                                </span>
                                <textarea type="text" name="edu_qualification" class=" h-28 bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring"
                                    placeholder="">{{$edu_qualification}}</textarea>
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Skills
                                </span>
                                <textarea type="text" name="skills" class=" h-28 bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring"
                                    placeholder="">{{$skills}}</textarea>
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Date Of Joining
                                </span>
                                <input name="doj" type="date" value="{{$doj}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Date Of Leaving
                                </span>
                                <input name="dol" type="date" value="{{$dol}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Salary (INR)  <span class="text-red-700">per month</span>
                                </span>
                                <input type="text" name="salary" value="{{$salary}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Loyalty (INR)  <span class="text-red-700">per month</span>
                                </span>
                                <input type="text" name="loyalty" value="{{$loyalty}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                        </div>
                        <div class=" flex flex-col form-floating xl:w-2/5 md:w-2/5 sm:w-2/5 w-full mb-3">
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Present Address
                                </span>
                                <textarea type="text" name="present_address" class=" h-28 bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring"
                                    placeholder="">{{$present_address}}</textarea>
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Permanent Address
                                </span>
                                <textarea type="text" name="permanent_address" class=" h-28 bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring"
                                    placeholder="">{{$permanent_address}}</textarea>
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Primary Contact Number <span class="text-red-700">*</span>
                                </span>
                                <input type="text" name="contact_number" value="{{$contact_number}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Secondary Contact Number
                                </span>
                                <input type="text" name="contact_number_2" value="{{$contact_number_2}}"class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Email <span class="text-red-700">*</span>
                                </span>
                                <input type="email" name="email" value="{{$email}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Working Location <span class="text-red-700">*</span>
                                </span>
                                <select name="working_location" class="form-select appearance-none block sm:w-full w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-red-100 bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-red-300 focus:outline-none" aria-label="Default select example">
                                    <option value="">Select Working Location</option>
                                    @foreach($working_locations as $working_location)
                                        <option {{($working_location_id == $working_location->id)?"selected":""}} value="{{ $working_location->id }}">{{ $working_location->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Profile Image<span class="text-red-700">*</span></span>
                                <input type="file" name="image_path" value="{{$image_path}}" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none employee-input-card p-2 md:p-2 h-10 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder=""> 
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-10 mt-10 self-center lg:self-center ">
                    <input type="hidden" name="mode" value="{{$mode}}" >
                    <input type="hidden" name="profile_id" value="{{$id}}" >
                    <button type="submit" class="text-white rounded-3xl bg-red-500 text-md font-semibold profile-button px-10 py-2">Save</button>
                </div>
            </form>
            @if($mode=="edit")
                <div class="flex flex-col xl:flex xl:flex-col xl:justify-between grid grid-cols-1 xl:pl-10 md:pl-10 sm:pl-10 pl-0 xl:px-10 md:px-10 sm:px-10 px-0 sm:grid sm:grid-cols-1 sm:gap-5 md:grid md:grid-cols-2 md:gap-10 xl:grid xl:grid-cols-2 xl:gap-10 sm:mx-0 xl:mx-0">
                    <div class="p-4 md:p-4 text-center flex flex-col bg-white rounded-2xl">
                        <span class="text-center text-md font-bold">Id & Documents</span>
                        <form action="{{ route('profile_document_add') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            @method('POST')
                            <div class="rounded-none p-4 xl:w-3/5 md:w-3/5 sm:w-full w-full md:p-4 text-center flex flex-col">
                                <div class="w-full">
                                    <div class="flex flex-row justify-between p-4">
                                        <select class="form-select appearance-none block lg:w-full xl:w-full md:w-full sm:w-full w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="document_id" id="document_id" required>
                                            <option value="">Select Document Name</option>
                                            <option value="1">Adhar Card</option>
                                            <option value="2">Pan Card</option>
                                            <option value="3">Resume</option>
                                            <option value="4">Offer Latter</option>
                                            <option value="5">Company I-Card</option>
                                        </select>
                                        <span style="color:red">@error('document_id'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-none p-4 xl:w-5/6 md:w-5/6 sm:w-full w-full md:p-4 text-center flex flex-col">
                                <div class="w-full">
                                    <div class="flex flex-row justify-between p-4">
                                        <input type="file" id="myFile" name="attachment_path" class="text-xs">
                                        <span style="color:red">@error('attachment_path'){{$message}}@enderror</span>
                                        <input type="hidden" value="{{$given_name}}" name="profile_name" required>
                                        <input type="hidden" value="{{$id}}" name="profile_id">
                                        <button class="text-white rounded-3xl float-right bg-green-600 text-xs font-normal px-2 py-2 rounded-lg" type="submit">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="container px-0 mx-auto flex flex-col xl:flex align overflow-y-auto h-full">
                            <div class="fix-width text-left overflow-y-auto h-full">
                                <table class="table project-list-table table-responsive" style="float: left;height: 400px;overflow-x: hidden;overflow-y: auto; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-neutral-400 p-4 font-semibold text-xs text-center">Sr.No.</th>
                                            <th class="text-neutral-400 p-4 font-semibold text-xs text-left">Document Name</th>
                                            <th class="text-neutral-400 p-4 font-semibold text-xs text-left">Add Data & Time</th>
                                            <th class="text-neutral-400 p-4 font-semibold text-xs text-left">Added By</th>
                                            <th class="text-neutral-400 p-4 font-semibold text-xs text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0
                                        @endphp
                                        @foreach($profile_documents as $profile_document)
                                            @php
                                            $CreatedAt=$profile_document->created_at;
                                            if($CreatedAt!="" && $CreatedAt!="NULL" && $CreatedAt!="0000-00-00 00:00:00")
                                            {
                                                $created_at = date("d-m-Y h:i A",strtotime($CreatedAt));
                                            }
                                            else
                                            {
                                                $created_at ="";
                                            }
                                            $user_name = $profile_document->user_details->name;
                                            
                                            $DocumentArray = array("0"=>"","1"=>"Adhar Card","2"=>"Pan Card","3"=>"Resume","4"=>"Offer Latter","5"=>"Company I-Card");
                                            @endphp
                                            <tr class="bg-red-100 rounded-lg">
                                                <td class=" p-4 font-semibold text-xs text-center">{{++$count}}</td>
                                                <td class=" p-4 font-semibold text-xs text-left">{{$DocumentArray[$profile_document->document_id]}}</td>
                                                <td class=" p-4 font-semibold text-xs text-left">{{$created_at}}</td>
                                                <td class=" p-4 font-semibold text-xs text-left">{{$user_name}}</td>
                                                <td class=" p-4 font-semibold text-xs text-center">
                                                    <a href="{{asset('images/profile_document').'/'.$profile_document->attachment_path}}" target="_blank" ><i class="fa fa-eye"></i></a>
                                                    <a style="margin-left: 10px;" href="{{asset('images/profile_document').'/'.$profile_document->attachment_path}}" download><i class="fa fa-download"></i></a>
                                                    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                                                        <a onclick="return confirm('Are you sure Delete This Profile Document..?')" href="{{ route('single_profile_document_delete', $profile_document->id) }}"  title="Delete" style="margin-left: 10px;color: red;text-decoration: none">
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
                </div>
            @endif
        </div> 
    </div>
</section>

@endsection
