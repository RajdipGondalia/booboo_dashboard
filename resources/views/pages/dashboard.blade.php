
@extends('layouts.master')
@section('content')
    @include('partials.welcome_section',['current_user',$current_user])
    <!-- Counts Section end-->
    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
    <section class="lg:ml-60 md:ml-60 sm:ml-60 market-background relative pt-6">
        <div class="flex flex-col xl:flex xl:flex-col xl:justify-between grid grid-cols-1 gap-5 px-10sm:grid sm:grid-cols-2 sm:gap-5 md:grid md:grid-cols-2 md:gap-5 xl:grid xl:grid-cols-5 xl:gap-10 mx-4 sm:mx-20 xl:mx-20">
            <div class="buy-card p-4 md:p-4 text-center flex flex-col bg-indigo-500 text-white p-4 m-3 rounded-lg shadow-lg ">
                <span class="text-start text-xl">Total Employee</span>
                <span class="text-end text-2xl font-bold">{{ $count['total_employees_count'] }}</span>
            </div>
            <div class="buy-card p-4 md:p-4 text-center flex flex-col bg-green-500 text-white p-4 m-3 rounded-lg shadow-lg">
                <span class="text-start text-xl">Total Tasks</span>
                <span class="text-end text-2xl font-bold">{{ $count['total_tasks_count'] }}</span>
            </div>
            <div class="buy-card p-4 md:p-4 text-center flex flex-col bg-green-500 text-white p-4 m-3 rounded-lg shadow-lg">
                <span class="text-start text-xl">Pending Tasks</span>
                <span class="text-end text-2xl font-bold">{{ $count['pending_tasks_count'] }}</span>
            </div>
            <div class="buy-card p-4 md:p-4 text-center flex flex-col bg-yellow-700  text-white p-4 m-3 rounded-lg shadow-lg">
                <span class="text-start text-xl">Total Projects</span>
                <span class="text-end text-2xl font-bold">{{ $count['total_projects_count'] }}</span>
            </div>
        </div>
    </section>
    @endif
    <!-- Counts Section end-->
@endsection