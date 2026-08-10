@extends('layouts.admin')

@section('title', 'Election Results - UniVote Admin')
@section('page_heading', 'Election Analytics & Candidates')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.elections.index') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to Elections
        </a>
        <a href="{{ route('admin.elections.edit', $election->id) }}" class="bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold px-4 py-2 rounded-xl shadow-sm">
            <i class="fa-solid fa-pen-to-square mr-1"></i> Edit Election
        </a>
    </div>

    <!-- Overview Banner -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-6">
            <div>
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-50 text-blue-700">
                    Status: {{ strtoupper($election->status) }}
                </span>
                <h2 class="text-2xl font-extrabold font-heading text-slate-900 mt-2">{{ $election->title }}</h2>
                <p class="text-xs text-slate-500 mt-1">{{ $election->description }}</p>
            </div>
            <div class="text-left sm:text-right text-xs text-slate-500 space-y-1">
                <div><i class="fa-solid fa-calendar-check mr-1 text-emerald-500"></i> Start: {{ $election->start_date ? $election->start_date->format('M d, Y g:i A') : '' }}</div>
                <div><i class="fa-solid fa-calendar-xmark mr-1 text-red-400"></i> End: {{ $election->end_date ? $election->end_date->format('M d, Y g:i A') : '' }}</div>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-6 text-center">
            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                <span class="block text-2xl font-extrabold text-slate-800">{{ $election->candidates->count() }}</span>
                <span class="text-xs text-slate-500 font-semibold">Participating Candidates</span>
            </div>
            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                <span class="block text-2xl font-extrabold text-emerald-600">{{ $election->votes->count() }}</span>
                <span class="text-xs text-slate-500 font-semibold">Total Cast Votes</span>
            </div>
            <div class="col-span-2 sm:col-span-1 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                <span class="block text-2xl font-extrabold text-indigo-600">{{ $election->votes->unique('voter_id')->count() }}</span>
                <span class="text-xs text-slate-500 font-semibold">Unique Voters</span>
            </div>
        </div>
    </div>

    <!-- Candidate Leaderboard -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
        <h3 class="text-lg font-bold font-heading text-slate-900 mb-6">Candidate Vote Standings</h3>

        <div class="space-y-6">
            @php $totalVotesCount = $election->votes->count(); @endphp
            @forelse($election->candidates as $candidate)
                @php
                    $candidateVotes = $candidate->votes_count ?? $candidate->votes->count();
                    $percent = $totalVotesCount > 0 ? round(($candidateVotes / $totalVotesCount) * 100, 1) : 0;
                @endphp
                <div class="p-4 rounded-2xl border border-slate-200/80 bg-slate-50/50">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset($candidate->logo) }}" alt="{{ $candidate->party_name }}" class="w-10 h-10 object-contain rounded-lg bg-white p-1 border border-slate-200" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->party_name) }}'">
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">{{ $candidate->name }}</h4>
                                <span class="text-xs text-slate-500">Party: <strong>{{ $candidate->party_name }}</strong> | Class: {{ $candidate->class }}</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-base font-extrabold text-slate-900 block">{{ $candidateVotes }} votes</span>
                            <span class="text-xs font-semibold text-blue-600">{{ $percent }}%</span>
                        </div>
                    </div>
                    <div class="w-full bg-slate-200 rounded-full h-3 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 h-3 rounded-full transition-all duration-500" style="width: {{ $percent }}%"></div>
                    </div>
                </div>
            @empty
                <p class="text-center text-slate-400 text-xs py-6">No candidates contesting in this election session.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
