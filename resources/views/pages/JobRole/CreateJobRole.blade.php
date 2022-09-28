@extends('layouts.master')
@section('content')
<!-- Welcome Section-->
@php
if($mode=="edit")
{
    $id = "";
    $name = "";
    $page_title = "Edit Job Role";
}
else
{
    $id = "";
    $name = "";
    $page_title = "Add Job Role";
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
            <form action="{{ route('store_jobrole_data') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class=" flex flex-col xl:flex-row md:flex-row sm:flex-row">
                    <div class=" w-full flex flex-col xl:flex-row md:flex-row sm:flex-row justify-between ">
                        <div class="  flex flex-col form-floating xl:w-2/5 md:w-2/5 sm:w-2/5 w-full mb-3">
                            <label class="block mb-5 self-center w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Name <span class="text-red-700">*</span>
                                </span>
                                <input type="text" name="name" value="{{$name}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                            <input type="hidden" name="mode" value="{{$mode}}" >
                                <input type="hidden" name="job_role_id" value="{{$id}}" >
                                <button type="submit" class="text-white rounded-3xl bg-red-500 text-md font-semibold profile-button px-10 py-2 mt-10">Save</button>
                            </label>
                        </div>
                        <div class=" flex flex-col form-floating xl:w-2/5 md:w-2/5 sm:w-2/5 w-full mb-3">
                            
                        </div>
                    </div>
                </div>
                <div class="mb-10 mt-10 self-center lg:self-center ">
                    
                </div>
            </form>
        </div> 
    </div>
</section>

@endsection
