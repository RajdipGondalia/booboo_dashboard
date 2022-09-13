<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="ROBOTS" content="index, follow">
    <meta name="ROBOTS" content="all">
    <meta name="google-website-verification" content="key">
    <title>Employee Management Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js" integrity="sha512-xIPqqrfvUAc/Cspuj7Bq0UtHNo/5qkdyngx6Vwt+tmbvTLDszzXM0G6c91LXmGrRx8KEPulT+AfOOez+TeVylg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- tailwindcss config -->
    <script>
        tailwind.config = {
        theme: {
            screen: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
            },
            extend: {
            colors: {
                clifford: '#da373d',
            },
            },
        },
        }
    </script>
    <!-- styles tailwindcss -->
    <style type="text/tailwindcss"> @layer utilities { .content-auto { content-visibility: auto; } } </style>
    <!-- plugin tailwindcss -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- AOS Animation css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- AOS Animation js -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // AOS.init();
        function showMenu() {
            var element = document.getElementById("show-menu");
            element.classList.toggle("hidden");
            document.getElementById("show-menu").style.display = "block";
        }
        function closeMenu() {
            document.getElementById("show-menu").style.display = "none";

        }


        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</head>

<body  style="background: #f4f5f5;">
    <!-- signup start -->
	<div id="content-wrap">
		<section class="signup-background relative sm:py-8 md:py-8 py-8 lg:py-8 xl:py-8" style="min-height:400px">
        
			<div class=" self-start px-20"><img src="{{ asset('theme/images/booboo-icon.png') }}" height="100" width="100" class="mr-2"
					alt=""> </div>

			<div class="container mx-auto py-20 align">
				<div class="w-full flex flex-col">
					<div class="buy-card lg:w-2/5 sm:w-2/5 md:w-2/5 p-6 self-start md:p-8 text-left mx-auto sm:mx-0 md:mx-0 lg:mx-0 ">
						<div class="flex flex-col">
							<h3 class="text-5xl font-bold self-center mb-5">Welcome</h3>
							<span class="self-center  text-xs font-semibold">Hey, Enter your details to get sign
								in</span>
							<span class="self-center text-xs font-semibold">to your account</span>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <label class="block mb-5 mt-9 self-center">
                                    <input required  type="email" name="email"  
                                        class="mt-1 px-3 p-1 py-4 bg-red-100 shadow-sm border-gray-500 border-0 placeholder-red-300 font-semibold focus:outline-none focus:border-sky-500 focus:ring-sky-500 block signup-input-width rounded-lg sm:text-sm focus:ring"
                                        placeholder="Enter your Email"> 
                                </label>
                                <label class="block mb-5 self-center">
                                    <input required type="password" name="password"
                                        class="mt-1 px-3 p-1 py-4 bg-red-100 shadow-sm border-gray-500 border-0 placeholder-red-300 font-semibold focus:outline-none focus:border-sky-500 focus:ring-sky-500 block signup-input-width rounded-lg sm:text-sm focus:ring" placeholder="Password">
                                </label>
                                <div class="mb-10 mt-10 self-center lg:self-center"> 
                                    <button type="submit" class="text-white rounded-lg bg-red-500 text-xl font-bold signup-input-width py-2">Sign in </button> 
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- signup end -->
    
</body>

</html>


