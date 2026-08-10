@extends('layouts.app')

@section('title', 'UniVote - University Student Union Election')

@section('content')
<!-- Hero Section -->
<div class="relative bg-slate-900 text-white overflow-hidden py-16 sm:py-24">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-bold bg-blue-500/20 text-blue-300 border border-blue-500/30">
                    <i class="fa-solid fa-graduation-cap mr-2"></i> Official University Student Election
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading tracking-tight leading-tight">
                    Shape Your University's <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-300">Future Today</span>
                </h1>
                <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                    Cast your vote securely in the official Student Union Election. High-integrity, verified student voter verification, and instant audited results counting.
                </p>

                <div class="flex flex-wrap gap-4 pt-2">
                    @if(Auth::guard('voter')->check())
                        <a href="{{ route('voter.dashboard') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-7 py-3.5 rounded-2xl transition-all shadow-lg shadow-blue-600/40 flex items-center">
                            <i class="fa-solid fa-check-to-slot mr-2"></i> Enter Voting Booth
                        </a>
                    @else
                        <a href="{{ route('voter.register') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold px-7 py-3.5 rounded-2xl transition-all shadow-lg shadow-blue-600/40 flex items-center">
                            <i class="fa-solid fa-id-card mr-2"></i> Register as Voter
                        </a>
                        <a href="{{ route('voter.login') }}" class="bg-slate-800 hover:bg-slate-700 text-white font-bold px-7 py-3.5 rounded-2xl border border-slate-700 transition-all flex items-center">
                            <i class="fa-solid fa-right-to-bracket mr-2"></i> Voter Login
                        </a>
                    @endif
                    <a href="{{ route('candidate.apply') }}" class="bg-slate-800/80 hover:bg-slate-700 text-blue-300 font-semibold px-6 py-3.5 rounded-2xl border border-blue-500/30 transition-all flex items-center">
                        <i class="fa-solid fa-user-tie mr-2"></i> Run as Candidate
                    </a>
                </div>
            </div>

            <!-- Active Election Highlight Box -->
            <div class="bg-slate-800/90 border border-slate-700 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-xl">
                @if($activeElection)
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                            <i class="fa-solid fa-signal mr-1.5 animate-pulse"></i> {{ strtoupper($activeElection->status) }} ELECTION
                        </span>
                        <span class="text-xs text-slate-400">
                            <i class="fa-solid fa-calendar mr-1"></i> Ends: {{ \Carbon\Carbon::parse($activeElection->end_date)->format('M d, Y') }}
                        </span>
                    </div>

                    <h3 class="text-2xl font-bold font-heading text-white mb-2">{{ $activeElection->title }}</h3>
                    <p class="text-slate-300 text-sm mb-6 leading-relaxed">{{ $activeElection->description ?? 'Official student council leadership election.' }}</p>

                    <!-- Election Stats Grid -->
                    <div class="grid grid-cols-3 gap-3 text-center mb-6">
                        <div class="bg-slate-900/60 p-3 rounded-xl border border-slate-700/50">
                            <span class="block text-2xl font-bold text-blue-400">{{ $candidates->count() }}</span>
                            <span class="text-[11px] font-semibold text-slate-400">Candidates</span>
                        </div>
                        <div class="bg-slate-900/60 p-3 rounded-xl border border-slate-700/50">
                            <span class="block text-2xl font-bold text-emerald-400">{{ $totalVotes }}</span>
                            <span class="text-[11px] font-semibold text-slate-400">Votes Cast</span>
                        </div>
                        <div class="bg-slate-900/60 p-3 rounded-xl border border-slate-700/50">
                            <span class="block text-2xl font-bold text-indigo-400">{{ $totalVoters }}</span>
                            <span class="text-[11px] font-semibold text-slate-400">Voters</span>
                        </div>
                    </div>

                    <a href="{{ route('voter.dashboard') }}" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold py-3.5 rounded-xl shadow-lg transition-all flex items-center justify-center">
                        <i class="fa-solid fa-paper-plane mr-2"></i> Cast Your Vote Now
                    </a>
                @else
                    <div class="text-center py-8">
                        <i class="fa-solid fa-calendar-xmark text-4xl text-slate-500 mb-3"></i>
                        <h3 class="text-lg font-bold text-white mb-1">No Active Election Currently</h3>
                        <p class="text-slate-400 text-xs">Upcoming elections will appear here shortly.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Approved Candidates Showcase -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center max-w-3xl mx-auto mb-12">
        <h2 class="text-3xl font-extrabold font-heading text-slate-900 tracking-tight">Nominated Student Candidates</h2>
        <p class="text-slate-600 text-sm mt-2">Meet the student union candidates contesting for executive leadership.</p>
    </div>

    @if($candidates->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($candidates as $candidate)
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 flex flex-col group">
                    <div class="relative h-48 bg-gradient-to-tr from-slate-900 to-slate-800 flex items-center justify-center p-6">
                        <!-- Candidate Photo -->
                        <img src="{{ asset($candidate->id_card_photo) }}" alt="{{ $candidate->name }}" class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-lg group-hover:scale-105 transition-transform" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->name) }}&background=2563eb&color=fff'">
                        
                        <!-- Party Logo Badge -->
                        <div class="absolute bottom-3 right-4 bg-white p-1.5 rounded-xl shadow-md border border-slate-100 flex items-center space-x-2">
                            <img src="{{ asset($candidate->logo) }}" alt="{{ $candidate->party_name }}" class="w-7 h-7 object-contain rounded" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->party_name) }}'">
                            <span class="text-[11px] font-bold text-slate-800 pr-1">{{ $candidate->party_name }}</span>
                        </div>
                    </div>

                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="px-2.5 py-1 rounded-md bg-blue-50 text-blue-700 text-xs font-semibold">
                                    <i class="fa-solid fa-graduation-cap mr-1"></i> Class: {{ $candidate->class }}
                                </span>
                                <span class="text-xs font-mono text-slate-500">ID: {{ $candidate->student_id }}</span>
                            </div>

                            <h3 class="text-xl font-bold font-heading text-slate-900 mb-1">{{ $candidate->name }}</h3>
                            <p class="text-slate-500 text-xs mb-4">Party: <strong class="text-blue-600">{{ $candidate->party_name }}</strong></p>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                            <span><i class="fa-solid fa-envelope mr-1 text-slate-400"></i> {{ $candidate->email }}</span>
                            @if(Auth::guard('voter')->check())
                                <a href="{{ route('voter.dashboard') }}" class="text-blue-600 font-bold hover:underline">Vote <i class="fa-solid fa-arrow-right ml-0.5"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-2xl p-12 text-center border border-slate-200 max-w-xl mx-auto">
            <i class="fa-solid fa-user-slash text-4xl text-slate-400 mb-3"></i>
            <h3 class="text-lg font-bold text-slate-800">No Approved Candidates Yet</h3>
            <p class="text-slate-500 text-xs mt-1">Candidates undergoing administrative review will be listed here soon.</p>
        </div>
    @endif
</div>
@endsection
