<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel - UniVote')</title>
    <!-- Tailwind CSS -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset("icon/Screenshot 2026-08-10 191635.png") }}">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="{{ asset("fontawesome/css/all.min.css") }}">

    {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet"> --}}
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
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen flex flex-col md:flex-row">

    <!-- Mobile Sidebar Backdrop & Toggle -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/50 z-40 hidden md:hidden"></div>

    <!-- Admin Navigation Sidebar -->
    <aside id="sidebar" class="fixed md:static inset-y-0 left-0 w-64 bg-slate-900 text-slate-300 z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out flex flex-col justify-between shadow-2xl">
        <div>
            <!-- Admin Brand -->
            <div class="h-20 flex items-center px-6 border-b border-slate-800 bg-slate-950">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                        <i class="fa-solid fa-user-shield text-lg"></i>
                    </div>
                    <div>
                        <span class="font-heading font-extrabold text-xl text-white tracking-tight">Admin<span class="text-blue-400">Control</span></span>
                        <span class="block text-[10px] uppercase font-bold tracking-wider text-slate-500">University Election</span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5">
                <div class="px-3 text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">Main Menu</div>

                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30 font-semibold' : 'hover:bg-slate-800 hover:text-white text-slate-400' }}">
                    <i class="fa-solid fa-chart-pie w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.elections.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.elections.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30 font-semibold' : 'hover:bg-slate-800 hover:text-white text-slate-400' }}">
                    <i class="fa-solid fa-box-archive w-5 text-center"></i>
                    <span>Elections</span>
                </a>

                <a href="{{ route('admin.candidates.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.candidates.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30 font-semibold' : 'hover:bg-slate-800 hover:text-white text-slate-400' }}">
                    <i class="fa-solid fa-user-tie w-5 text-center"></i>
                    <span>Candidates</span>
                </a>

                <a href="{{ route('admin.voters.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl font-medium text-sm transition-all {{ request()->routeIs('admin.voters.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30 font-semibold' : 'hover:bg-slate-800 hover:text-white text-slate-400' }}">
                    <i class="fa-solid fa-users w-5 text-center"></i>
                    <span>Voters</span>
                </a>

                <div class="pt-4 px-3 text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">Shortcuts</div>

                <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 px-4 py-2.5 rounded-xl font-medium text-xs hover:bg-slate-800 text-slate-400 hover:text-blue-400 transition-all">
                    <i class="fa-solid fa-globe w-5 text-center"></i>
                    <span>View Public Website</span>
                </a>
            </nav>
        </div>

        <!-- Admin Profile Info & Logout -->
        <div class="p-4 border-t border-slate-800 bg-slate-950">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-blue-400 font-bold text-sm">
                        {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="overflow-hidden">
                        <span class="block text-xs font-bold text-white truncate">{{ Auth::guard('admin')->user()->name ?? 'Administrator' }}</span>
                        <span class="block text-[10px] text-slate-400 truncate">{{ Auth::guard('admin')->user()->role ?? 'Super Admin' }}</span>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Logout" class="w-8 h-8 rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 flex items-center justify-center transition-colors">
                        <i class="fa-solid fa-power-off text-xs"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-grow flex flex-col min-w-0">
        <!-- Topbar Header -->
        <header class="bg-white border-b border-slate-200 h-20 px-4 sm:px-8 flex items-center justify-between sticky top-0 z-30 shadow-sm">
            <div class="flex items-center space-x-4">
                <button id="toggle-sidebar" type="button" class="md:hidden text-slate-600 hover:text-slate-900 text-xl focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h1 class="text-xl sm:text-2xl font-bold font-heading text-slate-800">
                    @yield('page_heading', 'Dashboard')
                </h1>
            </div>

            <div class="flex items-center space-x-4">
                <span class="hidden sm:inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                    <i class="fa-solid fa-shield-halved mr-1.5"></i> Admin Session Active
                </span>
                <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-600 hover:text-blue-600 transition-colors">
                    <i class="fa-solid fa-arrow-up-right-from-square mr-1"></i> Front Site
                </a>
            </div>
        </header>

        <!-- Dynamic Content Body -->
        <main class="p-4 sm:p-8 flex-grow">
            @yield('content')
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');
        const toggleBtn = document.getElementById('toggle-sidebar');

        toggleBtn?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        });

        backdrop?.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
        });

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Operation Successful',
                text: "{{ session('success') }}",
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                confirmButtonColor: '#2563eb'
            });
        @endif
    </script>
    @yield('scripts')
</body>
</html>
