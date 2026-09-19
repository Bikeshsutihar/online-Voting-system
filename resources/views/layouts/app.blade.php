<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'UniVote - University Election Portal')</title>
    <!-- Tailwind CSS -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset("icon/Screenshot_2026-08-10_191635-removebg-preview.png") }}">

    <!-- FontAwesome 6 -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}
    <link rel="stylesheet" href="{{ asset("fontawesome/css/all.min.css") }}">
    <!-- Google Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com"> --}}
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet"> --}}
    <!-- SweetAlert2 -->

    {{-- @include('sweetalert2::index') --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f7ff',
                            100: '#e0effe',
                            500: '#2563eb',
                            600: '#1d4ed8',
                            700: '#1e40af',
                            800: '#1e3a8a',
                            900: '#0f172a',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Navigation Header -->
    <nav class="bg-slate-900 text-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo & Brand -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center shadow-lg shadow-blue-500/30 group-hover:scale-105 transition-transform">
                            <i class="fa-solid fa-vote-yea text-white text-xl"></i>
                        </div>
                        <div>
                            <span class="font-heading font-extrabold text-2xl tracking-tight text-white">Uni<span class="text-blue-400">Ballot</span></span>
                            <span class="block text-xs font-medium text-slate-400 tracking-wider uppercase">Student Union Portal</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Nav Navigation -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="text-sm font-semibold hover:text-blue-400 transition-colors {{ request()->routeIs('home') ? 'text-blue-400' : 'text-slate-300' }}">
                        <i class="fa-solid fa-house mr-1.5 text-xs"></i> Home
                    </a>
                    <a href="{{ route('candidate.apply') }}" class="text-sm font-semibold hover:text-blue-400 transition-colors {{ request()->routeIs('candidate.apply') ? 'text-blue-400' : 'text-slate-300' }}">
                        <i class="fa-solid fa-user-plus mr-1.5 text-xs"></i> Apply as Candidate
                    </a>

                    @if(Auth::guard('voter')->check())
                        <a href="{{ route('voter.dashboard') }}" class="text-sm font-semibold text-blue-400 hover:text-blue-300 flex items-center">
                            <i class="fa-solid fa-check-to-slot mr-1.5"></i> Voting Booth
                        </a>
                        <div class="flex items-center space-x-3 pl-4 border-l border-slate-700">
                            <span class="text-xs text-slate-300 font-medium"><i class="fa-solid fa-circle-user text-blue-400 mr-1"></i> {{ Auth::guard('voter')->user()->name }}</span>
                            <form action="{{ route('voter.logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-500/20 text-red-400 hover:bg-red-500/30 px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors">
                                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                                </button>
                            </form>
                        </div>
                    @elseif(Auth::guard('admin')->check())
                        <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 hover:bg-blue-500 text-white text-sm font-semibold px-4 py-2 rounded-xl transition-all shadow-md shadow-blue-600/30">
                            <i class="fa-solid fa-gauge-high mr-1.5"></i> Admin Dashboard
                        </a>
                    @else
                        <a href="{{ route('voter.login') }}" class="text-sm font-semibold text-slate-300 hover:text-blue-500 transition-colors">
                            <i class="fa-solid fa-user-lock mr-1.5"></i> Voter Login
                        </a>
                        <a href="{{ route('admin.login') }}" class="text-sm font-semibold text-blue-400 hover:text-blue-500 transition-colors">
                            <i class="fa-solid fa-lock mr-1.5"></i> Admin Portal
                        </a>
                        {{-- <a href="{{ route('admin.register') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold px-4 py-2 rounded-xl transition-all shadow-md shadow-indigo-600/30">
                            <i class="fa-solid fa-user-shield mr-1.5"></i> Admin Register
                        </a> --}}
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex md:hidden items-center">
                    <button id="mobile-menu-btn" type="button" class="text-slate-300 hover:text-white focus:outline-none text-2xl">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-slate-900 border-t border-slate-800 px-4 pt-3 pb-6 space-y-3">
            <a href="{{ route('home') }}" class="block text-slate-300 hover:text-white font-medium py-2">
                <i class="fa-solid fa-house w-6 text-blue-400"></i> Home
            </a>
            <a href="{{ route('candidate.apply') }}" class="block text-slate-300 hover:text-white font-medium py-2">
                <i class="fa-solid fa-user-plus w-6 text-blue-400"></i> Apply as Candidate
            </a>

            @if(Auth::guard('voter')->check())
                <a href="{{ route('voter.dashboard') }}" class="block text-blue-400 font-semibold py-2">
                    <i class="fa-solid fa-check-to-slot w-6"></i> Voting Booth
                </a>
                <div class="pt-2 border-t border-slate-800 flex items-center justify-between">
                    <span class="text-xs text-slate-400"><i class="fa-solid fa-user text-blue-400"></i> {{ Auth::guard('voter')->user()->name }}</span>
                    <form action="{{ route('voter.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-400 text-xs font-semibold">Logout</button>
                    </form>
                </div>
            @elseif(Auth::guard('admin')->check())
                <a href="{{ route('admin.dashboard') }}" class="block bg-blue-600 text-white font-semibold text-center py-2.5 rounded-lg">
                    Admin Dashboard
                </a>
            @else
                <a href="{{ route('voter.login') }}" class="block text-slate-300 hover:text-blue-500 font-medium py-2">
                    <i class="fa-solid fa-user-lock w-6 text-blue-400"></i> Voter Login
                </a>
                {{-- <a href="{{ route('voter.register') }}" class="block bg-blue-600 text-black text-center font-semibold py-2.5 rounded-lg">
                    Register Voter
                </a> --}}
            @endif
        </div>
    </nav>

    <!-- Main Content Body -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-950 text-slate-400 py-10 border-t border-slate-900 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-2 mb-3">
                        <i class="fa-solid fa-vote-yea text-blue-500 text-xl"></i>
                        <span class="font-heading font-bold text-lg text-white">UniBallot System</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        A modern, secure, and transparent e-voting platform designed for university student union elections.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-3">Quick Navigation</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition-colors">Election Home</a></li>
                        <li><a href="{{ route('candidate.apply') }}" class="hover:text-blue-400 transition-colors">Candidate Nomination Portal</a></li>
                        {{-- <li><a href="{{ route('voter.register') }}" class="hover:text-blue-400 transition-colors">Voter Registration</a></li> --}}
                        <li><a href="{{ route('admin.login') }}" class="hover:text-blue-400 transition-colors">Administrator Portal</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-3">Security & Integrity</h4>
                    <p class="text-xs text-slate-400 leading-relaxed mb-3">
                        Enforces 1-voter 1-vote constraint, student ID_Card_No verification, and IP address logging for audit trails.
                    </p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                        <i class="fa-solid fa-lock mr-1.5"></i> Encrypted Audit Trail
                    </span>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-900 text-center text-xs text-slate-500">
                &copy; {{ date('Y') }} UniBallot System. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
