@extends('layouts.admin')

@section('title', 'Admin Dashboard - UniVote System')
@section('page_heading', 'Executive Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Stat Counter Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1: Total Voters -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Registered Voters</span>
                <span class="block text-3xl font-extrabold font-heading text-slate-900 mt-1">{{ $totalVoters }}</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>

        <!-- Card 2: Candidates -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Candidates</span>
                <span class="block text-3xl font-extrabold font-heading text-slate-900 mt-1">{{ $totalCandidates }}</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-user-tie"></i>
            </div>
        </div>

        <!-- Card 3: Pending Approvals -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Pending Candidate Apps</span>
                <span class="block text-3xl font-extrabold font-heading text-amber-600 mt-1">{{ $pendingCandidates }}</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-hourglass-half"></i>
            </div>
        </div>

        <!-- Card 4: Total Votes Cast -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Votes Logged</span>
                <span class="block text-3xl font-extrabold font-heading text-emerald-600 mt-1">{{ $totalVotes }}</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-vote-yea"></i>
            </div>
        </div>
    </div>

    <!-- Active Election Live Voting Progress -->
    <div class="">
        <div class="lg:col-span-2 bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold font-heading text-slate-900">Live Election Results</h3>
                    <p class="text-xs text-slate-500">
                        @if($activeElection)
                            Active Election: <strong class="text-blue-600">{{ $activeElection->title }}</strong>
                        @else
                            No active election currently running.
                        @endif
                    </p>
                </div>
                @if($activeElection)
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700">
                        <i class="fa-solid fa-signal mr-1 animate-pulse"></i> Live Count
                    </span>
                @endif
            </div>

            @if(count($electionStats) > 0)
                <div class="space-y-6">
                    @foreach($electionStats as $stat)
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ asset($stat['logo']) }}" alt="{{ $stat['name'] }}" class="w-8 h-8 rounded-lg object-contain bg-slate-50 border border-slate-200" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($stat['name']) }}'">
                                    <div>
                                        <span class="font-bold text-sm text-slate-800">{{ $stat['name'] }}</span>
                                        <span class="text-xs text-slate-500 block">Party: {{ $stat['party_name'] }}</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="font-extrabold text-sm text-slate-900">{{ $stat['votes'] }} votes</span>
                                    <span class="text-xs font-semibold text-blue-600 block">{{ $stat['percentage'] }}%</span>
                                </div>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 h-3 rounded-full transition-all duration-500" style="width: {{ $stat['percentage'] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="py-12 text-center text-slate-400 text-sm">
                    <i class="fa-solid fa-chart-simple text-3xl mb-2 text-slate-300"></i>
                    <p>No votes cast yet for the active election.</p>
                </div>
            @endif
        </div>

        <!-- Quick Actions & Pending Approvals Widget -->
        {{-- <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex flex-col justify-between">
            <div>
                <h3 class="text-lg font-bold font-heading text-slate-900 mb-4">Quick Management</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.candidates.create') }}" class="w-full flex items-center justify-between p-3.5 rounded-xl bg-slate-50 hover:bg-blue-50 text-slate-700 hover:text-blue-700 transition-colors font-medium text-sm border border-slate-200/70">
                        <span><i class="fa-solid fa-user-plus mr-2 text-blue-500"></i> Add New Candidate</span>
                        <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
                    </a>
                    <a href="{{ route('admin.voters.create') }}" class="w-full flex items-center justify-between p-3.5 rounded-xl bg-slate-50 hover:bg-blue-50 text-slate-700 hover:text-blue-700 transition-colors font-medium text-sm border border-slate-200/70">
                        <span><i class="fa-solid fa-user-check mr-2 text-emerald-500"></i> Register New Voter</span>
                        <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
                    </a>
                    <a href="{{ route('admin.elections.create') }}" class="w-full flex items-center justify-between p-3.5 rounded-xl bg-slate-50 hover:bg-blue-50 text-slate-700 hover:text-blue-700 transition-colors font-medium text-sm border border-slate-200/70">
                        <span><i class="fa-solid fa-box-archive mr-2 text-indigo-500"></i> Create New Election</span>
                        <i class="fa-solid fa-chevron-right text-xs text-slate-400"></i>
                    </a>
                </div>
            </div>

            @if($pendingCandidates > 0)
                <div class="mt-6 p-4 rounded-xl bg-amber-50 border border-amber-200">
                    <div class="flex items-center space-x-2 text-amber-800 text-sm font-bold">
                        <i class="fa-solid fa-bell"></i>
                        <span>Action Required</span>
                    </div>
                    <p class="text-xs text-amber-700 mt-1 mb-3">You have <strong>{{ $pendingCandidates }}</strong> candidate applications waiting for review.</p>
                    <a href="{{ route('admin.candidates.index', ['status' => 'pending']) }}" class="inline-block bg-amber-600 hover:bg-amber-700 text-white font-semibold px-4 py-2 rounded-lg text-xs transition-colors">
                        Review Pending Candidates
                    </a>
                </div>
            @endif
        </div> --}}
    </div>

    <!-- Recent Audit Vote Trail -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold font-heading text-slate-900">Audit Vote Log</h3>
                <p class="text-xs text-slate-500">Real-time audit log of cast ballots</p>
            </div>
            <span class="text-xs font-mono bg-slate-100 text-slate-600 px-3 py-1 rounded-md">Live Stream</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-semibold text-xs uppercase border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3.5">Voter Name</th>
                        <th class="px-6 py-3.5">Candidate Voted For</th>
                        <th class="px-6 py-3.5">Election</th>
                        <th class="px-6 py-3.5">IP Address</th>
                        <th class="px-6 py-3.5">Timestamp</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($recentVotes as $vote)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-800">{{ $vote->voter->name ?? 'Student' }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-blue-50 text-blue-700 text-xs font-medium">
                                    <i class="fa-solid fa-user-check mr-1.5"></i> {{ $vote->candidate->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs">{{ $vote->election->title ?? 'N/A' }}</td>
                            <td class="px-6 py-4 font-mono text-xs text-slate-500">{{ $vote->ip_address ?? '127.0.0.1' }}</td>
                            <td class="px-6 py-4 text-xs text-slate-500">{{ $vote->voted_at ? $vote->voted_at->format('M d, Y g:i A') : 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-400 text-xs">No votes logged yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
