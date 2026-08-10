@extends('layouts.app')

@section('title', 'Admin Registration - University Voting System')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center justify-center p-6 gradient-bg relative overflow-hidden">

    <!-- Decorative background elements -->
    <div class="absolute top-1/4 left-10 w-72 h-72 bg-indigo-600/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-10 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-xl z-10">
        <div class="bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 sm:p-10 shadow-2xl shadow-indigo-950/50">
            
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-indigo-600/20 border border-indigo-500/30 text-indigo-400 mb-4 shadow-inner">
                    <i class="fa-solid fa-user-shield text-3xl"></i>
                </div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">Admin Registration</h1>
                <p class="text-slate-400 mt-2 text-sm">Create an administrator account to manage university elections, candidates, and voters.</p>
            </div>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('admin.register.submit') }}" class="space-y-5">
                @csrf

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                        Full Name <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-id-badge"></i>
                        </div>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                            class="w-full pl-10 pr-4 py-3 bg-slate-800/80 border @error('name') border-rose-500 @else border-slate-700 @enderror rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition text-sm"
                            placeholder="e.g. Dr. Bikesh Shrestha">
                    </div>
                    @error('name')
                        <p class="text-rose-400 text-xs mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                        Email Address <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="w-full pl-10 pr-4 py-3 bg-slate-800/80 border @error('email') border-rose-500 @else border-slate-700 @enderror rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition text-sm"
                            placeholder="admin@university.edu">
                    </div>
                    @error('email')
                        <p class="text-rose-400 text-xs mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone_no" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                        Phone Number <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <input type="text" name="phone_no" id="phone_no" value="{{ old('phone_no') }}" required
                            class="w-full pl-10 pr-4 py-3 bg-slate-800/80 border @error('phone_no') border-rose-500 @else border-slate-700 @enderror rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition text-sm"
                            placeholder="+977 9800000000">
                    </div>
                    @error('phone_no')
                        <p class="text-rose-400 text-xs mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password and Confirm Password Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                            Password <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input type="password" name="password" id="password" required
                                class="w-full pl-10 pr-4 py-3 bg-slate-800/80 border @error('password') border-rose-500 @else border-slate-700 @enderror rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition text-sm"
                                placeholder="Min. 8 characters">
                        </div>
                        @error('password')
                            <p class="text-rose-400 text-xs mt-1.5 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">
                            Confirm Password <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-key"></i>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                class="w-full pl-10 pr-4 py-3 bg-slate-800/80 border border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition text-sm"
                                placeholder="Repeat password">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3.5 px-4 bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-500 hover:to-violet-500 text-white font-bold rounded-xl shadow-lg shadow-indigo-600/30 transition duration-200 transform hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center space-x-2 text-sm mt-6">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Register Administrator</span>
                </button>
            </form>

            <!-- Footer link -->
            <div class="mt-8 pt-6 border-t border-slate-800 text-center">
                <p class="text-xs text-slate-400">
                    Already have an Administrator account?
                    <a href="{{ route('admin.login') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold ml-1 underline transition">
                        Login Here
                    </a>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
