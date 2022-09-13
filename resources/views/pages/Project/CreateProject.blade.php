@extends('layouts.master')
@section('content')
<!-- Welcome Section-->
@php
if($mode=="edit")
{
    $id = $project->id;
    $client_id = $project->client_id;
    $title = $project->title;
    $start_date = $project->start_date;
    $due_date = $project->due_date;
    $assign_to = $project->assign_to;
    $project_manager_id = $project->project_manager;
    $assign_to_ids = explode(',', $project->assign_to);

    $page_title = "Edit Project";
}
else
{
    $id = "";
    $client_id = "";
    $title = "";
    $start_date = "";
    $due_date = "";
    $assign_to = "";
    $project_manager_id = "";
    $assign_to_ids = [];

    $page_title = "Add Project";
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
                <form action="{{ route('store_project_data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="bg-red-100 rounded-md mb-10 p-4 md:p-4 text-center flex flex-col">
                        <!-- <span class="uppercase text-sm self-start pt-4 text-neutral-400">Project Details</span>    -->
                        <div class="xl:w-2/5 md:3/5 sm:w-full w-full flex flex-col">
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Title<span class="text-red-700">*</span>
                                </span>
                                <input type="text" name="title" value="{{$title}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                    Client 
                                </span>
                                <select name="client_id" class="form-select appearance-none block w-full bg-red-100 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out  focus:border-red-300 focus:ring-red-300 m-0 mt-1 focus:bg-red-100 focus:text-gray-700 focus:bg-red-100 focus:border-red-300 focus:outline-none" aria-label="Default select example">
                                    <option value="">Select Client </option>
                                    @foreach($clients as $client)
                                        <option {{($client_id == $client->id)?"selected":""}}  value="{{ $client->id }}">{{ $client->company_name }}</option>
                                    @endforeach
                                </select> 
                            </label>
                            <div class="flex flex-row justify-between">
                                <div class="datepicker relative form-floating w-2/5 mb-3">
                                    <label class="block mb-5 self-center w-full">
                                        <span
                                            class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                            Start Date
                                        </span>
                                        <input type="date" name="start_date"  value="{{$start_date}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                                    </label>
                                </div>
                                <div class="datepicker relative form-floating w-2/5 mb-3">
                                    <label class="block mb-5 self-center w-full">
                                        <span
                                            class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                            Due Date
                                        </span>
                                        <input type="date" name="due_date" value="{{$due_date}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                                    </label>
                                </div>
                            </div>
                            
                            <label class="block mb-5 self-center w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                    Project Manager 
                                </span>
                                <select name="project_manager" class="form-select appearance-none block w-full bg-red-100 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out  focus:border-red-300 focus:ring-red-300 m-0 mt-1 focus:bg-red-100 focus:text-gray-700 focus:bg-red-100 focus:border-red-300 focus:outline-none" aria-label="Default select example">
                                    <option value="">Select Project Manager </option>
                                    @foreach($users as $user)
                                        <option {{($project_manager_id == $user->id)?"selected":""}}  value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select> 
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                    Assign To <span class="text-red-700">*</span> </span>
                                <select class="test form-select appearance-none block lg:w-40 xl:w-60 md:w-40 sm:w-full w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="assign_to[]" id="assign_to" multiple="multiple">
                                    <option value="">Select Assign To</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if(in_array($user->id,$assign_to_ids)) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </label>


                        </div>
                        <div class="mb-10 mt-10 self-center lg:self-center flex flex-row">
                            <input type="hidden" name="mode" value="{{$mode}}" >
                            <input type="hidden" name="project_id" value="{{$id}}" >
                            <button type="submit" class="text-white rounded-3xl bg-red-500 text-md font-semibold profile-button px-10 py-2">Save</button>
                            <!-- <button type="button" class="rounded-3xl bg-gray-200 text-md font-semibold profile-button px-10 py-2">Cancel</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
