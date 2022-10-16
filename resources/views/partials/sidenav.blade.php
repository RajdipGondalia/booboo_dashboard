<script>
    function Menu(e) {
        let list = document.querySelector('ul');
        e.name === 'menu' ? (e.name = "close", list.classList.add('top-[55px]'), list.classList.add(
            'opacity-100')) : (e.name = "menu", list.classList.remove('top-[55px]'), list.classList.remove(
            'opacity-100'))
    }
</script>
<section class="bg-primary">
    <div class="flex flex-col relative md:fixed sm:fixed lg:fixed justify-between lg:flex lg:w-60 md:w-60 sm:w-60 h-20 lg:h-full md:h-full sm:h-full shadow-md bg-white px-1">
        <div class="lg:w-60 md:w-60 sm:w-60 h-20 lg:h-full md:h-full sm:h-full shadow-md bg-white px-1 lg:absolute md:absolute sm:absolute"
            id="sidenavExample">
            <div class="pt-4 pb-16 lg:pl-10 md:pl-5 w-full my-4">
                <span class="text-md font-bold text-2xl float-left mx-2 md:mx-0">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('theme/images/booboo-icon.png') }}"  height="100" width="100" class="mr-2" alt="">
                    </a>
                </span>
                <div class="block text-3xl relative cursor-pointer md:hidden">
                    <button type="button" class="menu-icon flex flex-col float-right right-8 top-6 mx-2 md:mx-0">
                        <ion-icon name="menu" onclick="showMenu()"></ion-icon>
                    </button>
                </div>
            </div>
            <div id="show-menu"
                class=" mobile-menu sm:mobile-menu md:desktop-menu lg:desktop-menu text-white lg:text-black hidden sm:block md:block lg:block xl:block md:text-black sm:text-black">
                <a href="javascript:void(0)" class="closebtn md:hidden lg:hidden " onclick="closeMenu()">&times;</a>
                <ul class="relative">

                    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                        <div class="mb-10 mt-5 mr-10 self-center lg:self-center float-center">
                            <a href="{{ route('create_employee_profile') }}" class="text-white rounded-3xl bg-red-600 text-md font-normal px-4 py-2 rounded-lg">Add Employee <i class="fa fa-plus"></i></a>
                        </div>
                    @endif

                    <li class="relative">
                        <a onclick="menuChange('dashboard-change')" id="Button1"
                            class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                            href="{{ route('dashboard') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <img src="{{ asset('theme/images/dashboard.png') }}" height="18" width="18" class="mr-2" alt="">
                            <span class="active:text-orange-600">Dashboard</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a onclick="menuChange('chat-change')"
                            class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                            href="{{ route('view_all_time_trackers') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <img src="{{ asset('theme/images/time-tracker.png') }}" height="18" width="18" class="mr-2"
                                alt="">
                            <span class="active:text-orange-600">Time Tracker</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a onclick="menuChange('avatar-change')"
                            class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                            href="{{ route('view_all_tasks') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <img src="{{ asset('theme/images/employee-task.png') }}" height="18" width="18" class="mr-2"
                                alt="">
                            <span class="active:text-orange-600">Task</span>
                        </a>
                    </li>
                    <!-- <li class="relative">
                        <a onclick="menuChange('dashboard-change')" id="Button1"
                            class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                            href="{{ route('admin_page') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <img src="{{ asset('theme/images/dashboard.png') }}" height="18" width="18" class="mr-2"
                                alt="">
                            <span class="active:text-orange-600">Admin Page</span>
                        </a>
                    </li> -->
                    <li class="relative">
                        <a onclick="menuChange('wallet-change')" id="Button2"
                            class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                            href="{{ route('view_all_projects') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <img src="{{ asset('theme/images/Projects-list.png') }}" height="18" width="18" class="mr-2"
                                alt="">
                            <span class="active:text-orange-600">Projects</span>
                        </a>
                    </li>
                    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                    <li class="relative">
                        <a onclick="menuChange('wallet-change')" id="Button2"
                            class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                            href="{{ route('view_all_clients') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <img src="{{ asset('theme/images/employee.png') }}" height="18" width="18" class="mr-2"
                                alt="">
                            <span class="active:text-orange-600">Clients</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a onclick="menuChange('wallet-change')" id="Button2"
                            class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                            href="{{ route('view_all_employees') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <img src="{{ asset('theme/images/All-Employee.png') }}" height="18" width="18" class="mr-2"
                                alt="">
                            <span class="active:text-orange-600">All Employee</span>
                        </a>
                    </li>
                    
                    <li class="relative">
                        <a onclick="menuChange('notification-change')"
                            class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                            href="{{ route('view_all_users') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <img src="{{ asset('theme/images/profile.png') }}" height="18" width="18" class="mr-2"
                                alt="">
                            <span class="active:text-orange-600">User</span>
                        </a>
                    </li>
                    @endif
                    <li class="relative">
                        <a onclick="menuChange('notification-change')"
                            class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                            href="{{ route('view_user_profile') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <img src="{{ asset('theme/images/Profile-Rersonal.png') }}" height="18" width="18" class="mr-2"
                                alt="">
                            <span class="active:text-orange-600">Profile</span>
                        </a>
                    </li>
                    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                        <li class="relative">
                            <a onclick="menuChange('chat-change')"
                                class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                                href="{{ route('view_all_time_trackers_report') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                                <img src="{{ asset('theme/images/Time-Tracker-Report.png') }}" height="18" width="18" class="mr-2"
                                    alt="">
                                <span class="active:text-orange-600">Time Tracker Report</span>
                            </a>
                        </li>
                    @endif
                    <li class="relative">
                        <a onclick="menuChange('notification-change')"
                            class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                            href="{{ route('view_all_leaves') }}" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                            <img src="{{ asset('theme/images/Leave-Request.png') }}" height="18" width="18" class="mr-2"
                                alt="">
                            <span class="active:text-orange-600">Leave Request</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="bottom-0 absolute">
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                        class="flex items-center text-md py-4 px-6 h-10 overflow-hidden text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out"
                        href="#!" data-mdb-ripple="true" data-mdb-ripple-color="dark">
                        <img src="{{ asset('theme/images/logout-icon.png') }}" height="18" width="18" class="mr-2" alt="" />
                        <span class="text-red-600 font-semibold">Logout</span>
                    </button>
                </form>
                </ul>
            </div>
        </div>
    </div>
</section>