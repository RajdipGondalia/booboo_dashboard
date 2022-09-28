@extends('layouts.master')
@section('content')
<!-- Welcome Section-->

@php
    
    if($mode=="edit")
    {
        $id = $leave->id;
        $leave_user_Id = $leave->leave_user_id;
        $leave_reason = $leave->leave_reason;
        $leave_day_1 = $leave->leave_day_1;
        $leave_date_1 = $leave->leave_date_1;
        $cover_date_1 = $leave->cover_date_1;

        $leave_day_2 = $leave->leave_day_2;
        $leave_date_2 = $leave->leave_date_2;
        $cover_date_2 = $leave->cover_date_2;

        $leave_day_3 = $leave->leave_day_3;
        $leave_date_3 = $leave->leave_date_3;
        $cover_date_3 = $leave->cover_date_3;

        $leave_day_4 = $leave->leave_day_4;
        $leave_date_4 = $leave->leave_date_4;
        $cover_date_4 = $leave->cover_date_4;

        $leave_day_5 = $leave->leave_day_5;
        $leave_date_5 = $leave->leave_date_5;
        $cover_date_5 = $leave->cover_date_5;

        $leave_day_6 = $leave->leave_day_6;
        $leave_date_6 = $leave->leave_date_6;
        $cover_date_6 = $leave->cover_date_6;

        $leave_day_7 = $leave->leave_day_7;
        $leave_date_7 = $leave->leave_date_7;
        $cover_date_7 = $leave->cover_date_7;
        
        $page_title = "Edit Leave Request";
        $disabled = "disabled";
    }
    else
    {
        $id = "";
        $leave_user_Id = auth()->user()->id;
        $leave_reason = "";
        $leave_day_1 = 2;
        $leave_date_1 = "";
        $cover_date_1 = "";

        $leave_day_2 = 2;
        $leave_date_2 = "";
        $cover_date_2 = "";

        $leave_day_3 = 2;
        $leave_date_3 = "";
        $cover_date_3 = "";

        $leave_day_4 = 2;
        $leave_date_4 = "";
        $cover_date_4 = "";

        $leave_day_5 = 2;
        $leave_date_5 = "";
        $cover_date_5 = "";

        $leave_day_6 = 2;
        $leave_date_6 = "";
        $cover_date_6 = "";

        $leave_day_7 = 2;
        $leave_date_7 = "";
        $cover_date_7 = "";

        $page_title = "Add Leave Request";
        if((Auth::user()->type==1 || Auth::user()->type==2 ))
        {
            $disabled = "";
        }
        else
        {
            $disabled = "disabled";
        }
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
                <form action="{{ route('store_leave_data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="bg-red-100 rounded-md mb-10 p-4 md:p-4 text-center flex flex-col">
					    <!-- <span class="uppercase text-sm pt-4 self-start text-neutral-4000">Company Details</span>  -->
					    <div class="xl:w-3/5 md:w-4/5 sm:w-full w-full flex flex-col"> 	
                            <label class="block mb-5 self-center w-full"> 
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                Person <span class="text-red-700">*</span> </span>
                                <select name="leave_user_id"  class="form-select appearance-none block w-full bg-red-100 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out  focus:border-red-300 focus:ring-red-300 m-0 mt-1 focus:bg-red-100 focus:text-gray-700 focus:bg-red-100 focus:border-red-300 focus:outline-none" aria-label="Default select example" >
                                    <option value="">Select Person</option>
                                    @foreach($users as $user)
                                        <option {{($leave_user_Id == $user->id)?"selected":""}} {{($leave_user_Id == $user->id)?"":"$disabled"}} value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <div id="leave-main-div-1" class="xl:flex xl:flex-row md:flex md:flex-row sm:flex sm:flex-col flex flex-col">
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Leave Date<span class="text-red-700">*</span> </span>
                                        <input type="date" name="leave_date_1" id="leave_date_1" value="{{$leave_date_1}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />

                                    </div>
                                </div>
                                <div class="flex justify-center ">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Half/Full Day <span class="text-red-700">*</span> </span>
                                        <select name="leave_day_1" class="form-select appearance-none block w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                            <option value="1" {{($leave_day_1 == '1')?"selected":""}} >Half Day</option>
                                            <option value="2" {{($leave_day_1 == '2')?"selected":""}} >Full Day</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Cover Date</span>
                                        <input type="date" name="cover_date_1" id="cover_date_1" value="{{$cover_date_1}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10 pt-5">
                                        <button type="button" class="text-white rounded-3xl bg-green-700 text-xs font-semibold px-2 py-2 rounded-lg" id="leave-addmorebtn-1">Add More +</button> 
                                    </div>
                                </div>
                            </div>
                            <div id="leave-main-div-2" class="xl:flex xl:flex-row md:flex md:flex-row sm:flex sm:flex-col flex flex-col">
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Leave Date</span>
                                        <input type="date" name="leave_date_2" id="leave_date_2" value="{{$leave_date_2}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />

                                    </div>
                                </div>
                                <div class="flex justify-center ">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Half/Full Day</span>
                                        <select name="leave_day_2" class="form-select appearance-none block w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                            <option value="1" {{($leave_day_2 == '1')?"selected":""}} >Half Day</option>
                                            <option value="2" {{($leave_day_2 == '2')?"selected":""}} >Full Day</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Cover Date</span>
                                        <input type="date" name="cover_date_2" id="cover_date_2" value="{{$cover_date_2}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10 pt-5">
                                        <button type="button" class="text-white rounded-3xl bg-green-700 text-xs font-semibold px-2 py-2 rounded-lg" id="leave-addmorebtn-2">Add More +</button> 
                                    </div>
                                </div>
                            </div>
                            <div id="leave-main-div-3" class="xl:flex xl:flex-row md:flex md:flex-row sm:flex sm:flex-col flex flex-col">
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Leave Date</span>
                                        <input type="date" name="leave_date_3" id="leave_date_3" value="{{$leave_date_3}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />

                                    </div>
                                </div>
                                <div class="flex justify-center ">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Half/Full Day</span>
                                        <select name="leave_day_3" class="form-select appearance-none block w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                            <option value="1" {{($leave_day_3 == '1')?"selected":""}} >Half Day</option>
                                            <option value="2" {{($leave_day_3 == '2')?"selected":""}} >Full Day</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Cover Date</span>
                                        <input type="date" name="cover_date_3" id="cover_date_3" value="{{$cover_date_3}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10 pt-5">
                                        <button type="button" class="text-white rounded-3xl bg-green-700 text-xs font-semibold px-2 py-2 rounded-lg" id="leave-addmorebtn-3">Add More +</button> 
                                    </div>
                                </div>
                            </div>
                            <div id="leave-main-div-4" class="xl:flex xl:flex-row md:flex md:flex-row sm:flex sm:flex-col flex flex-col">
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Leave Date</span>
                                        <input type="date" name="leave_date_4" id="leave_date_4" value="{{$leave_date_4}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />

                                    </div>
                                </div>
                                <div class="flex justify-center ">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Half/Full Day</span>
                                        <select name="leave_day_4" class="form-select appearance-none block w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                            <option value="1" {{($leave_day_4 == '1')?"selected":""}} >Half Day</option>
                                            <option value="2" {{($leave_day_4 == '2')?"selected":""}} >Full Day</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Cover Date</span>
                                        <input type="date" name="cover_date_4" id="cover_date_4" value="{{$cover_date_4}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10 pt-5">
                                        <button type="button" class="text-white rounded-3xl bg-green-700 text-xs font-semibold px-2 py-2 rounded-lg" id="leave-addmorebtn-4">Add More +</button> 
                                    </div>
                                </div>
                            </div>
                            <div id="leave-main-div-5" class="xl:flex xl:flex-row md:flex md:flex-row sm:flex sm:flex-col flex flex-col">
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Leave Date</span>
                                        <input type="date" name="leave_date_5" id="leave_date_5" value="{{$leave_date_5}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />

                                    </div>
                                </div>
                                <div class="flex justify-center ">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Half/Full Day</span>
                                        <select name="leave_day_5" class="form-select appearance-none block w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                            <option value="1" {{($leave_day_5 == '1')?"selected":""}} >Half Day</option>
                                            <option value="2" {{($leave_day_5 == '2')?"selected":""}} >Full Day</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Cover Date</span>
                                        <input type="date" name="cover_date_5" id="cover_date_5" value="{{$cover_date_5}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10 pt-5">
                                        <button type="button" class="text-white rounded-3xl bg-green-700 text-xs font-semibold px-2 py-2 rounded-lg" id="leave-addmorebtn-5">Add More +</button> 
                                    </div>
                                </div>
                            </div>
                            <div id="leave-main-div-6" class="xl:flex xl:flex-row md:flex md:flex-row sm:flex sm:flex-col flex flex-col">
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Leave Date</span>
                                        <input type="date" name="leave_date_6" id="leave_date_6" value="{{$leave_date_6}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />

                                    </div>
                                </div>
                                <div class="flex justify-center ">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Half/Full Day</span>
                                        <select name="leave_day_6" class="form-select appearance-none block w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                            <option value="1" {{($leave_day_6 == '1')?"selected":""}} >Half Day</option>
                                            <option value="2" {{($leave_day_6 == '2')?"selected":""}} >Full Day</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Cover Date</span>
                                        <input type="date" name="cover_date_6" id="cover_date_6" value="{{$cover_date_6}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10 pt-5">
                                        <button type="button" class="text-white rounded-3xl bg-green-700 text-xs font-semibold px-2 py-2 rounded-lg" id="leave-addmorebtn-6">Add More +</button> 
                                    </div>
                                </div>
                            </div>
                            <div id="leave-main-div-7" class="xl:flex xl:flex-row md:flex md:flex-row sm:flex sm:flex-col flex flex-col">
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Leave Date</span>
                                        <input type="date" name="leave_date_7" id="leave_date_7" value="{{$leave_date_7}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />

                                    </div>
                                </div>
                                <div class="flex justify-center ">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Half/Full Day</span>
                                        <select name="leave_day_7" class="form-select appearance-none block w-40 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                                            <option value="1" {{($leave_day_7 == '1')?"selected":""}} >Half Day</option>
                                            <option value="2" {{($leave_day_7 == '2')?"selected":""}} >Full Day</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10">
                                        <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Cover Date</span>
                                        <input type="date" name="cover_date_7" id="cover_date_7" value="{{$cover_date_7}}"
                                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border-none rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="Select a date" />
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <div class="mb-3 xl:w-56 pl-10 pt-5">
                                        <button type="button" class="text-white rounded-3xl bg-green-700 text-xs font-semibold px-2 py-2 rounded-lg" id="leave-addmorebtn-7">Add More +</button> 
                                    </div>
                                </div>
                            </div>
                            <label class="block mb-5 self-center w-full"> 
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium">Leave Reason<span class="text-red-700">*</span>
                                </span>
                                <textarea type="text" name="leave_reason" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-20 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">{{$leave_reason}}</textarea> 
                            </label>
					    </div>  
                        <div class="mb-10 mt-10 self-center lg:self-center flex flex-row"> 
                            <input type="hidden" name="mode" value="{{$mode}}" >
                            <input type="hidden" name="leave_id" value="{{$id}}" >
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
    $(document).ready(function() {

        
    
        $('#leave-main-div-2').hide();
        $('#leave-main-div-3').hide();
        $('#leave-main-div-4').hide();
        $('#leave-main-div-5').hide();
        $('#leave-main-div-6').hide();
        $('#leave-main-div-7').hide();
        // $('#id').show();

        var mode ="{{$mode}}";$
        var leave_date_2 ="{{$leave_date_2}}";
        var leave_date_3 ="{{$leave_date_3}}";
        var leave_date_4 ="{{$leave_date_4}}";
        var leave_date_5 ="{{$leave_date_5}}";
        var leave_date_6 ="{{$leave_date_6}}";
        var leave_date_7 ="{{$leave_date_7}}";

        if(mode == "edit")
        {
            if(leave_date_2 != "" && leave_date_2 !=null )
            {
                $('#leave-main-div-2').show();
                $('#leave-addmorebtn-1').hide();
            }
            if(leave_date_3 != "" && leave_date_3 !=null )
            {
                $('#leave-main-div-3').show();
                $('#leave-addmorebtn-2').hide();
            }
            if(leave_date_4 != "" && leave_date_4 !=null )
            {
                $('#leave-main-div-4').show();
                $('#leave-addmorebtn-3').hide();
            }
            if(leave_date_5 != "" && leave_date_5 !=null )
            {
                $('#leave-main-div-5').show();
                $('#leave-addmorebtn-4').hide();
            }
            if(leave_date_6 != "" && leave_date_6 !=null )
            {
                $('#leave-main-div-6').show();
                $('#leave-addmorebtn-5').hide();
            }
            if(leave_date_7 != "" && leave_date_7 !=null )
            {
                $('#leave-main-div-7').show();
                $('#leave-addmorebtn-6').hide();
            }
        }
    });
    document.getElementById("leave-addmorebtn-1").onclick = function () {
        $('#leave-main-div-2').show();
        $('#leave-addmorebtn-1').hide();
    }
    document.getElementById("leave-addmorebtn-2").onclick = function () {
        $('#leave-main-div-3').show();
        $('#leave-addmorebtn-2').hide();
    }
    document.getElementById("leave-addmorebtn-3").onclick = function () {
        $('#leave-main-div-4').show();
        $('#leave-addmorebtn-3').hide();
    }
    document.getElementById("leave-addmorebtn-4").onclick = function () {
        $('#leave-main-div-5').show();
        $('#leave-addmorebtn-4').hide();
    }
    document.getElementById("leave-addmorebtn-5").onclick = function () {
        $('#leave-main-div-6').show();
        $('#leave-addmorebtn-5').hide();
    }
    document.getElementById("leave-addmorebtn-6").onclick = function () {
        $('#leave-main-div-7').show();
        $('#leave-addmorebtn-6').hide();
    }
    document.getElementById("leave-addmorebtn-7").onclick = function () {
        alert("This Request in You apply 7 Day Leave ... Please add new Leave Request For More Leave ..!!");
    }
    
    
</script>

@endsection
