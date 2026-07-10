<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>vote-secure</title>
     <link rel="stylesheet" href="{{ asset("css/admincss/style.css") }}">
    <link rel="stylesheet" href="{{ asset("fontawesome/css/all.min.css") }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset("images/images.jpeg") }}">
</head>

<body>


    <div>
        <div class="flex">
            <div class=" fixed bg-blue-900 h-[100vh] w-[20%]">

                <div class="p-6 w-full border-b h-[80px] border-blue-800">
                    <div class="text-3xl font-bold flex items-center flex justify-center ">
                        <img class="h-[25px] w-[25px] rounded-[100%]" src="{{ asset("images/images.jpeg") }}" alt="">
                        <h3>voteSays</h3>

                    </div>
                </div>

                <nav class="mt-6">

                    <a href="{{ route('dashboard') }}"
                        class=" {{ Request::routeIs('dmaContentEdit')? 'text-[red]': ' ' }} flex items-center px-6 py-3 text-white hover:bg-(--secondary-color) hover:text-blue-900">
                        <i class="fas fa-gauge mr-3"></i>
                        Dashboard
                    </a>

                    <a href="{{ route("voterslist") }}"
                        class="{{ Request::routeIs('voterslist') ? 'text-red-500': ' ' }} flex items-center px-6 py-3 text-white hover:bg-(--secondary-color) hover:text-blue-900">
                        <i class="fas fa-users mr-3"></i>
                        Voters
                    </a>

                    <a href="{{ route("candidateManage") }}"
                        class="flex items-center px-6 py-3 text-white hover:bg-(--secondary-color) hover:text-blue-900">
                        <i class="fas fa-user-tie mr-3"></i>
                        Candidates
                    </a>

                    <a href="#"
                        class="flex items-center px-6 py-3 text-white hover:bg-(--secondary-color) hover:text-blue-900">
                        <i class="fas fa-calendar-check mr-3"></i>
                        Elections
                    </a>

                    <a href="#"
                        class="flex items-center px-6 py-3 text-white hover:bg-(--secondary-color) hover:text-blue-900">
                        <i class="fas fa-chart-pie mr-3"></i>
                        Results
                    </a>

                    <a href="#"
                        class="flex items-center px-6 py-3 text-white hover:bg-(--secondary-color) hover:text-blue-900">
                        <i class="fas fa-file-pdf mr-3"></i>
                        Reports
                    </a>

                    <a href="#"
                        class="flex items-center px-6 py-3 hover:bg-(--secondary-color) text-white hover:text-blue-900">
                        <i class="fas fa-cog mr-3"></i>
                        Settings
                    </a>

                    <a href="{{ route('adminLogin') }}"
                        class="flex font-bold text-white items-center px-6 py-3 hover:bg-red-600 hover:text-black hover:font-bold">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Logout
                    </a>

                </nav>

            </div>

            <div class="w-[100%]">
                <div class="bg-white shadow px-6 h-[80px] py-4 flex justify-between items-center fixed top-0 w-[80%] ml-[20%]">

                    <h2 class="text-3xl font-semibold text-gray-700">
                        Nepal Election Commission
                    </h2>

                    <div class="relative">
                        <input type="text" placeholder="Search Tools..." class="border rounded px-4 py-2 pl-10">

                        <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
                    </div>

                </div>

            </div>
        </div>


    </div>

</body>

</html>
