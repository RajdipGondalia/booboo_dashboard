<header class="lg:pl-60 md:pl-60 sm:pl-60">
    <nav class="relative ">
        <div class="container mx-auto relative md:flex flex-col md:items-left md:justify-between pl-4 py-4 px-10 items-end md:py-4">
            <!-- logo -->
            <div class="flex flex-row float-right">

                @php
                    $user_image_path = auth()->user()->image_path;
                    if($user_image_path!="" && $user_image_path!="null" )
                    {
                        $UserImage = asset('images/user')."/".$user_image_path;
                    }
                    else
                    {
                        $UserImage = asset('images')."/default.png";
                    }
                @endphp
                <!-- <div class="lg:ml-10 self-center">
                    <img src="{{ asset('theme/images/notification.png') }}" class="bg-slate-300 rounded-full " alt="">
                </div> -->
                <div class="flex flex-col lg:ml-4">
                    <img src="{{ $UserImage }}" class="rounded-full mb-3 mt-2 ml-2 header-uesr-image" alt="">
                </div>
                <div class="flex flex-col self-center ml-2">
                    <span class="text-xs">Welcome</span>
                    <span class="text-sm">{{ $current_user }}</span>
                </div>

            </div>

        </div>
    </nav>
</header>
<!-- </div> -->