@php
    $time = date("H");
    
    $timezone = date("e");
    
    if ($time < "12") {
        $welcome_text = "Good morning";
    } else
    
    if ($time >= "12" && $time < "17") {
        $welcome_text =  "Good afternoon";
    } else
    
    if ($time >= "17") {
        $welcome_text =  "Good evening";
    } 
@endphp

<section class="lg:ml-60 md:ml-60 sm:ml-60 market-background relative">
    <div class="container px-10 mx-auto flex flex-col xl:flex align">
        <div class="buy-card lg:w-full text-left ">
            <div class="flex justify-between">
                <div class="flex">
                    <img src="{{ asset('theme/images/Character.png') }}" alt="" class="text-right" height="80" width="80">
                    <p class="text-xs self-center"><b class="text-2xl font-bold">Welcome {{ $current_user }}</b>
                        <br>{{$welcome_text}}</p>
                        
                </div>
                <img src="{{ asset('theme/images/gm.png') }}" alt="" class="text-right" height="20%" width="30%">
            </div>
        </div>
    </div>
</section>