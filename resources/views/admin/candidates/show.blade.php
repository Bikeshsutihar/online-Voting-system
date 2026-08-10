@extends('layouts.admin')

@section('title', 'Candidate Profile - UniVote Admin')
@section('page_heading', 'Candidate Profile Details')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.candidates.index') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">
            <i class="fa-solid fa-arrow-left mr-1"></i> Back to Candidate List
        </a>

        <div class="space-x-2">
            <a href="{{ route('admin.candidates.edit', $candidate->id) }}" class="bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold px-4 py-2 rounded-xl shadow-sm">
                <i class="fa-solid fa-pen-to-square mr-1"></i> Edit Candidate
            </a>
        </div>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Header Banner -->
        <div class="bg-gradient-to-r from-slate-900 to-slate-800 p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="flex items-center space-x-6">
                <img src="{{ asset($candidate->id_card_photo) }}" alt="{{ $candidate->name }}" class="w-24 h-24 rounded-2xl object-cover border-4 border-white shadow-lg" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->name) }}'">
                <div>
                    <h2 class="text-2xl font-extrabold font-heading">{{ $candidate->name }}</h2>
                    <p class="text-slate-300 text-xs mt-0.5"><i class="fa-solid fa-graduation-cap text-blue-400 mr-1"></i> Class: {{ $candidate->class }} | ID: {{ $candidate->student_id }}</p>
                    <div class="mt-3 flex items-center space-x-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/10 text-blue-300 border border-white/20">
                            Party: {{ $candidate->party_name }}
                        </span>
                        @if($candidate->status === 'approved')
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">Approved</span>
                        @elseif($candidate->status === 'rejected')
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-red-500/20 text-red-300 border border-red-500/30">Rejected</span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30">Pending Review</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Party Logo -->
            <div class="bg-white p-3 rounded-2xl shadow-lg border border-slate-100 text-center">
                <img src="{{ asset($candidate->logo) }}" alt="{{ $candidate->party_name }}" class="w-16 h-16 object-contain rounded mx-auto" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->party_name) }}'">
                <span class="block text-[10px] font-bold text-slate-800 mt-1">{{ $candidate->party_name }}</span>
            </div>
        </div>

        <!-- Details Grid -->
        <div class="p-8 grid grid-cols-1 sm:grid-cols-2 gap-6 text-xs text-slate-700">
            <div class="space-y-4">
                <div>
                    <span class="text-slate-400 font-semibold block uppercase tracking-wider text-[10px]">Email Address</span>
                    <span class="font-bold text-slate-800 text-sm">{{ $candidate->email }}</span>
                </div>
                <div>
                    <span class="text-slate-400 font-semibold block uppercase tracking-wider text-[10px]">Phone Number</span>
                    <span class="font-bold text-slate-800 text-sm">{{ $candidate->phone_no }}</span>
                </div>
                <div>
                    <span class="text-slate-400 font-semibold block uppercase tracking-wider text-[10px]">Date of Birth</span>
                    <span class="font-bold text-slate-800 text-sm">{{ $candidate->dob ? $candidate->dob->format('M d, Y') : 'N/A' }}</span>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <span class="text-slate-400 font-semibold block uppercase tracking-wider text-[10px]">Contesting Election</span>
                    <span class="font-bold text-blue-600 text-sm">{{ $candidate->election->title ?? 'Unassigned' }}</span>
                </div>
                <div>
                    <span class="text-slate-400 font-semibold block uppercase tracking-wider text-[10px]">Application Date</span>
                    <span class="font-bold text-slate-800 text-sm">{{ $candidate->applied_at ? $candidate->applied_at->format('M d, Y g:i A') : 'N/A' }}</span>
                </div>
                <div>
                    <span class="text-slate-400 font-semibold block uppercase tracking-wider text-[10px]">Total Votes Received</span>
                    <span class="font-extrabold text-emerald-600 text-base">{{ $candidate->votes ? $candidate->votes->count() : 0 }} Votes</span>
                </div>
            </div>
        </div>

        <!-- Uploaded Assets Preview -->
        <div class="bg-slate-50 p-6 border-t border-slate-100 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <h4 class="font-bold text-xs text-slate-800 mb-2"><i class="fa-solid fa-id-card mr-1 text-blue-500"></i> Student ID Card Image</h4>
                <a href="{{ asset($candidate->id_card_photo) }}" target="_blank" class="block border rounded-2xl overflow-hidden hover:opacity-95 transition-opacity bg-white p-2">
                    <img src="{{ asset($candidate->id_card_photo) }}" alt="Student ID" class="w-full h-44 object-cover rounded-xl" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->name) }}'">
                </a>
            </div>
            <div>
                <h4 class="font-bold text-xs text-slate-800 mb-2"><i class="fa-solid fa-flag mr-1 text-indigo-500"></i> Party Symbol Logo</h4>
                <a href="{{ asset($candidate->logo) }}" target="_blank" class="block border rounded-2xl overflow-hidden hover:opacity-95 transition-opacity bg-white p-2">
                    <img src="{{ asset($candidate->logo) }}" alt="Party Logo" class="w-full h-44 object-contain rounded-xl p-4 bg-slate-50" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->party_name) }}'">
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
