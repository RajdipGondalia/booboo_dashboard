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
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    
    <!-- <link href="resources/css/app.css" rel="stylesheet">
    <script src="resources/js/app.js" ></script> -->
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
        
        @include('partials.sidenav')
        
        @include('partials.header')
        
        @yield('content')
    
</body>

</html>