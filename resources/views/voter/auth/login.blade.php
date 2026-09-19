@extends('layouts.app')

@section('title', 'Voter Login - UniVote System')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
    <div class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-xl">
        <div class="text-center">
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-blue-100">
                <i class="fa-solid fa-id-card text-2xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold font-heading text-slate-900 tracking-tight">Voter Login</h2>
            <p class="mt-2 text-xs text-slate-500">Sign in to your student voter portal to cast your ballot.</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl text-xs space-y-1">
                @foreach($errors->all() as $error)
                    <p><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('voter.login') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="student_id" class="block text-xs font-semibold text-slate-700 mb-1.5">Student ID Number</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <input id="student_id" name="student_id" type="text" required value="{{ old('student_id') }}" placeholder="e.g. STU-2026-001" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-400 text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-700 mb-1.5">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input id="password" name="password" type="password" required placeholder="••••••••" class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-400 text-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center text-slate-600">
                    <input type="checkbox" name="remember" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500 mr-2">
                    Remember Me
                </label>
                {{-- <a href="{{ route('voter.register') }}" class="font-semibold text-blue-600 hover:underline">New Student? Register Here</a> --}}
            </div>

            <button type="submit" class="w-full py-3.5 px-4 bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-600/30 transition-all flex items-center justify-center">
                <i class="fa-solid fa-right-to-bracket mr-2"></i> Log In to Voting Booth
            </button>
        </form>
    </div>
</div>
@endsection
