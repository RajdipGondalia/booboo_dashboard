@extends('layouts.master')
@section('content')
<!-- Welcome Section-->
@php
if($mode=="edit")
{
    $id = $holiday->id;
    $name = $holiday->name;
    $start_date = $holiday->start_date;
    $end_date = $holiday->end_date;
    $description = $holiday->description;
    $day = $holiday->day;

    $page_title = "Edit Holiday";
}
else
{
    $id = "";
    $name = "";
    $start_date = "";
    $end_date = "";
    $description = "";
    $day = "";

    $page_title = "Add Holiday";
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
                <form action="{{ route('store_holiday_data') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="name" value="{{$name}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <div class="flex flex-row justify-between">
                                <div class="datepicker relative form-floating w-2/5 mb-3">
                                    <label class="block mb-5 self-center w-full">
                                        <span
                                            class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                            Start Date<span class="text-red-700">*</span> </span>
                                        </span>
                                        <input type="date" name="start_date"  value="{{$start_date}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                                    </label>
                                </div>
                                <div class="datepicker relative form-floating w-2/5 mb-3">
                                    <label class="block mb-5 self-center w-full">
                                        <span
                                            class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                            End Date
                                        </span>
                                        <input type="date" name="end_date" value="{{$end_date}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                                    </label>
                                </div>
                            </div>
                            <label class="block mb-5 self-center w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                    Description
                                </span>
                                <textarea type="text" name="description" class=" h-28 bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">{{$description}}</textarea>
                            </label>
                        </div>
                        <div class="mb-10 mt-10 self-center lg:self-center flex flex-row">
                            <input type="hidden" name="mode" value="{{$mode}}" >
                            <input type="hidden" name="holiday_id" value="{{$id}}" >
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
