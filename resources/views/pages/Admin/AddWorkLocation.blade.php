@extends('layouts.master')
@section('content')
<div class="m-5">
    <h1 class="text-xl mb-3">Add Work Location</h1>
    <div class="p-4 bg-white rounded-md">
        <form action="{{ route('store_work_location') }}" method="POST">
            @csrf
            @method('POST')
            <div class="flex flex-col">
                <div class="p-2">
                    <label>Location</label>
                    <input type="text" class="block" name="name">
                </div>
                <!-- <div class="p-2">
                    <label>Active</label>
                    <select name="isDelete" class="block">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div> -->
            </div>
            <button class="p-2 bg-green-500 text-white rounded-md block">Add Working Location</button>
        </form>
    </div>
</div>
@endsection