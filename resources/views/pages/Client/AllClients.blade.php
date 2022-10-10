@extends('layouts.master')
@section('content')
<!-- Welcome Section-->

<section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="lg:w-full border-b-2">
            <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
            <div class="flex flex-row">
                <span class="text-md font-semibold text-sm self-center mx-2 md:mx-0">Total Client</span>
                <span class="text-md self-center text-left text-neutral-400 pl-2">{{$total_client}}</span>
            </div>
            <span class="text-4xl self-center font-bold pb-10">Client List</span>
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
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Company Name</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">First Name</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Last Name</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Email</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Address</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Category</th>
                    <th class="text-neutral-400 p-4 font-semibold text-sm text-center"></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 0
                @endphp
                @foreach($clients as $client)
                <tr class="bg-white align-top">
                  <td class="text-sm font-semibold p-2 text-center">{{++$count}}</td>
                  <td class="text-sm font-semibold p-2 text-left">{{ $client->company_name }}</td>
                  <td class="text-sm font-semibold p-2 text-left">{{ $client->first_name }}</td>
                  <td class="text-sm font-semibold p-2 text-left">{{ $client->last_name }}</td>
                  <td class="text-sm font-semibold p-2 text-left">{{ $client->email }}</td>
                  <td class="text-sm font-semibold p-2 text-left">{{ $client->address }}</td>
                  <td class="text-sm font-semibold p-2 text-left">{{ $client->client_category_name->name }}</td>
                  <td class="text-sm font-semibold p-2 text-center">
                      <div class="dropdown_container" tabindex="-1">
                          <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                          <div class="dropdown">
                            @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                              <a href="{{ route('edit_client', $client->id) }}" class="grid_dropdown_item edit_button" >
                                  <div><i class="fa fa-edit"></i> Edit</div>
                              </a>
                              <a onclick="return confirm('Are you sure Delete This Client..?')"  href="{{ route('delete_client', $client->id) }}" class="grid_dropdown_item delete_button" title="Delete">
                                  <div><i class="fa fa-trash-o"> Delete</i></div>
                              </a>
                            @endif
                          </div>
                      </div>
                  </td>  
                </tr>
                @endforeach
                <div class="pt-5 pl-5 pr-5">
                    {{$clients->links()}}
                </div>
            </tbody>
        </table>
      </div>
    </div>
    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
      <div class="mb-10 mt-5 mr-10 self-center lg:self-center float-right">
        <a href="{{ route('create_client') }}" class="text-white rounded-3xl bg-red-600 text-md font-normal px-4 py-2 rounded-lg">Add Client <i class="fa fa-plus"></i></a>
      </div>
    @endif

    
</section>


@endsection
