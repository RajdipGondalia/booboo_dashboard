
@extends('layouts.master')
@section('content')
<section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="lg:w-full border-b-2">
            <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
                <span class="text-4xl self-center font-bold pb-10">Admin Page</span>
                    <div class="flex flex-col">
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- Welcome Section end-->
<section class="lg:ml-60 md:ml-60 sm:ml-60 mt-2 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="flex flex-col bg-red-100 xl:mx-10 md:mx-10 sm:mx-2 mx-0 rounded-lg">

            <div  class="flex  sm:flex-col flex-col xl:px-12 md:px-12 sm:px-12 px-0 w-full">
                <!-- <h1 class="text-xl mb-3">Admin Page</h1> -->
                <div class="flex flex-row">
                    <div class="bg-indigo-500 text-white p-4 m-3 rounded-lg shadow-lg text-center">
                        <span class="font-extrabold text-4xl">{{ $data['employees_count'] }}</span>
                        <p>Employees Working</p>
                    </div>
                    <div class="bg-green-500 text-white p-4 m-3 rounded-lg shadow-lg text-center">
                        <span class="font-extrabold text-4xl"> {{ $data['job_roles_count'] }} </span>
                        <p>Job Roles</p>
                    </div>
                    <div class="bg-yellow-700 text-white p-4 m-3 rounded-lg shadow-lg text-center">
                        <span class="font-extrabold text-4xl"> {{ $data['work_locations_count'] }} </span>
                        <p>Work Locations</p>
                    </div>
                </div>

                <div class="flex flex-row">
                    <div class="bg-white p-4 rounded-md my-5 mx-3">
                        <h1 class="text-lg">Job Roles</h1>
                        <table class="table-auto border">
                            <thead>
                                <th class="border p-2">ID</th>
                                <th class="border p-2">Job Role</th>
                                <!-- <th class="border p-2">Active</th> -->
                            </thead>
                            <tbody>
                                @foreach($data['job_roles'] as $job_role)
                                <tr>
                                    <td class="border p-2">{{ $job_role->id }}</td>
                                    <td class="border p-2">{{ $job_role->name }}</td>
                                    <!-- <td class="border p-2">{{ $job_role->isDelete ? 'Yes' : 'No' }}</td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="bg-white p-4 rounded-md my-5 mx-3">
                        <h1 class="text-lg">Work Locations</h1>
                        <table class="table-auto border">
                            <thead>
                                <th class="border p-2">ID</th>
                                <th class="border p-2">Working Locations</th>
                                <!-- <th class="border p-2">Active</th> -->
                            </thead>
                            <tbody>
                                @foreach($data['all_working_locations'] as $working_location)
                                <tr>
                                    <td class="border p-2">{{ $working_location->id }}</td>
                                    <td class="border p-2">{{ $working_location->name }}</td>
                                    <!-- <td class="border p-2">{{ $working_location->isDelete ? 'Yes' : 'No' }}</td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="flex flex-row">
                    <a href="{{ route('add_job_role') }}" class="p-2 rounded-md bg-red-600 text-white mx-2">Add Job Role</a>
                    <a href="{{ route('add_work_location') }}" class="p-2 rounded-md bg-red-600 text-white mx-2">Add Work
                        Location</a>
                </div>
            </div>
        </div>
    
    </div>
</section>
@endsection