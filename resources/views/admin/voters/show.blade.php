@extends('layouts.admin')

@section('title', 'Voter Profile - UniVote Admin')
@section('page_heading', 'Voter Profile & Voting History')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.voters.index') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to Voter List
        </a>

        <a href="{{ route('admin.voters.edit', $voter->id) }}" class="bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold px-4 py-2 rounded-xl shadow-sm">
            <i class="fa-solid fa-pen-to-square mr-1"></i> Edit Voter
        </a>
    </div>

    <!-- Voter Info Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
        <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 border-b border-slate-100 pb-6">
            <img src="{{ asset($voter->id_card_photo) }}" alt="{{ $voter->name }}" class="w-24 h-24 rounded-2xl object-cover border-4 border-slate-100 shadow-md" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($voter->name) }}'">
            <div class="text-center sm:text-left flex-grow">
                <h2 class="text-2xl font-extrabold font-heading text-slate-900">{{ $voter->name }}</h2>
                <p class="text-xs text-slate-500 mt-0.5"><i class="fa-solid fa-graduation-cap text-blue-500 mr-1"></i> {{ $voter->class }} | Student ID: <strong>{{ $voter->student_id }}</strong></p>

                <div class="mt-3 flex flex-wrap items-center justify-center sm:justify-start gap-2">
                    @if($voter->is_verified)
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700">
                            <i class="fa-solid fa-shield-check mr-1"></i> Verified Account
                        </span>
                    @else
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-700">
                            <i class="fa-solid fa-clock mr-1"></i> Pending Verification
                        </span>
                    @endif
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">
                        Total Cast Ballots: {{ $voter->votes->count() }}
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-6 text-xs text-slate-700">
            <div>
                <span class="text-slate-400 font-semibold block uppercase tracking-wider text-[10px]">Email Address</span>
                <span class="font-bold text-slate-800 text-sm">{{ $voter->email }}</span>
            </div>
            <div>
                <span class="text-slate-400 font-semibold block uppercase tracking-wider text-[10px]">Phone Number</span>
                <span class="font-bold text-slate-800 text-sm">{{ $voter->phone_no }}</span>
            </div>
            <div>
                <span class="text-slate-400 font-semibold block uppercase tracking-wider text-[10px]">Date of Birth</span>
                <span class="font-bold text-slate-800 text-sm">{{ $voter->dob ? $voter->dob->format('M d, Y') : 'N/A' }}</span>
            </div>
            <div>
                <span class="text-slate-400 font-semibold block uppercase tracking-wider text-[10px]">Registration Date</span>
                <span class="font-bold text-slate-800 text-sm">{{ $voter->created_at ? $voter->created_at->format('M d, Y g:i A') : 'N/A' }}</span>
            </div>
        </div>
    </div>

    <!-- Voting Audit History -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
        <h3 class="text-lg font-bold font-heading text-slate-900 mb-4">Voting Audit Records</h3>
        @if($voter->votes->count() > 0)
            <div class="space-y-3">
                @foreach($voter->votes as $vote)
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center justify-between text-xs">
                        <div>
                            <span class="font-bold text-slate-800 text-sm block">Voted For: {{ $vote->candidate->name ?? 'Candidate' }}</span>
                            <span class="text-slate-500">Election: {{ $vote->election->title ?? 'Election' }}</span>
                        </div>
                        <div class="text-right">
                            <span class="font-mono text-slate-500 block">IP: {{ $vote->ip_address }}</span>
                            <span class="text-slate-400 text-[11px]">{{ $vote->voted_at ? $vote->voted_at->format('M d, Y g:i A') : '' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-6 text-slate-400 text-xs">
                No ballots recorded for this voter yet.
            </div>
        @endif
    </div>
</div>
@endsection
