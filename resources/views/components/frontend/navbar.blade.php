<div>

         <nav class="bg-(--bg-color) shadow-lg fixed top-0 w-[100%] z-100">
        <div class="max-w-7xl mx-auto px-5">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <i class="fas fa-vote-yea text-3xl text-[#dda15e]"></i>
                    <h1 class="text-2xl font-bold text-black">
                        VoteSecure
                    </h1>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-8">

                    <a href="{{ route("homePage") }}"
                        class="{{ Request::routeIs('homePage') ? 'text-red-500': ' ' }} text-black hover:text-[#dda15e] transition duration-300 flex items-center gap-2">
                        <i class="fas fa-house"></i>
                        Home
                    </a>

                    <a href="{{ route('candidate') }}"
                        class="{{ Request::routeIs('candidate') ? 'text-red-500': ' ' }} text-black hover:text-[#dda15e] transition duration-300 flex items-center gap-2">
                        <i class="fas fa-user-check"></i>
                        Candidates
                    </a>

                    <a href="{{ route('vote') }}"
                        class="{{ Request::routeIs('vote') ? 'text-red-500': ' ' }} text-black hover:text-[#dda15e] transition duration-300 flex items-center gap-2">
                        <i class="fas fa-check-to-slot"></i>
                        Vote
                    </a>

                    <a href="{{ route('result') }}"
                        class="{{ Request::routeIs('result') ? 'text-red-500': ' ' }} text-black hover:text-[#dda15e] transition duration-300 flex items-center gap-2">
                        <i class="fas fa-chart-column"></i>
                        Results
                    </a>

                    <a href="{{ route('about') }}"
                        class="{{ Request::routeIs('about') ? 'text-red-500': ' ' }} text-black hover:text-[#dda15e] transition duration-300 flex items-center gap-2">
                        <i class="fas fa-circle-info"></i>
                        About
                    </a>

                </div>

                <!-- Login Buttons -->
                <div class="hidden md:flex gap-3">

                    <a href="{{ route('flogin') }}"
                        class="px-5 py-2 border border-[#dda15e] text-[#dda15e] rounded-lg hover:bg-[#dda15e] hover:text-white transition duration-300">
                        <i class="fas fa-right-to-bracket mr-2"></i>
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                        class="px-5 py-2 bg-[#dda15e] text-white rounded-lg hover:bg-[#bc6c25] transition duration-300">
                        <i class="fas fa-user-plus mr-2"></i>
                        Register
                    </a>

                </div>

                <!-- Mobile Menu Button -->
                <button id="menu-btn"
                    class="md:hidden text-white text-2xl">
                    <i class="fas fa-bars"></i>
                </button>

            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden py-4">

                <a href="#"
                    class="block py-3 text-white hover:text-[#dda15e]">
                    <i class="fas fa-house mr-2"></i>
                    Home
                </a>

                <a href="#"
                    class="block py-3 text-white hover:text-[#dda15e]">
                    <i class="fas fa-user-check mr-2"></i>
                    Candidates
                </a>

                <a href="#"
                    class="block py-3 text-white hover:text-[#dda15e]">
                    <i class="fas fa-check-to-slot mr-2"></i>
                    Vote
                </a>

                <a href="#"
                    class="block py-3 text-white hover:text-[#dda15e]">
                    <i class="fas fa-chart-column mr-2"></i>
                    Results
                </a>

                <a href="#"
                    class="block py-3 text-white hover:text-[#dda15e]">
                    <i class="fas fa-circle-info mr-2"></i>
                    About
                </a>

                <div class="mt-4 flex flex-col gap-3">

                    <a href="#"
                        class="text-center py-2 border border-[#dda15e] text-[#dda15e] rounded-lg">
                        <i class="fas fa-right-to-bracket mr-2"></i>
                        Login
                    </a>

                    <a href="#"
                        class="text-center py-2 bg-[#dda15e] text-white rounded-lg">
                        <i class="fas fa-user-plus mr-2"></i>
                        Register
                    </a>

                </div>

            </div>

        </div>
    </nav>

</div>
