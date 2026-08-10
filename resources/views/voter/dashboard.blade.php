@extends('layouts.app')

@section('title', 'Voting Booth - UniVote Portal')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

    <!-- Voter Profile Header Card -->
    <div class="bg-slate-900 text-white rounded-3xl p-6 sm:p-8 shadow-xl relative overflow-hidden">
        <div class="absolute right-0 top-0 opacity-10 p-8">
            <i class="fa-solid fa-vote-yea text-9xl"></i>
        </div>
        <div class="relative z-10 flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="flex items-center space-x-5">
                <img src="{{ asset($voter->id_card_photo) }}" alt="{{ $voter->name }}" class="w-20 h-20 rounded-2xl object-cover border-2 border-blue-400 shadow-lg" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($voter->name) }}&background=2563eb&color=fff'">
                <div>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-2xl font-extrabold font-heading">{{ $voter->name }}</h1>
                        @if($voter->is_verified)
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                                <i class="fa-solid fa-shield-check mr-1"></i> Verified Voter
                            </span>
                        @else
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                Pending Verification
                            </span>
                        @endif
                    </div>
                    <p class="text-xs text-slate-400 mt-1">Student ID: <strong class="text-slate-200 font-mono">{{ $voter->student_id }}</strong> | Class: {{ $voter->class }}</p>
                </div>
            </div>

            <div class="bg-slate-800/80 px-6 py-4 rounded-2xl border border-slate-700 text-center sm:text-right">
                <span class="block text-xs text-slate-400 uppercase font-semibold">Active Voting Session</span>
                <span class="block font-bold text-blue-400 text-sm mt-0.5">{{ $activeElection->title ?? 'No Active Election' }}</span>
            </div>
        </div>
    </div>

    <!-- Main Ballot / Voting Area -->
    @if($activeElection)
        @if($hasVoted)
            <!-- Vote Confirmation Receipt -->
            <div class="bg-emerald-50 border border-emerald-200 rounded-3xl p-8 text-center max-w-2xl mx-auto shadow-sm">
                <div class="w-16 h-16 bg-emerald-500 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-3xl shadow-lg shadow-emerald-500/30">
                    <i class="fa-solid fa-check"></i>
                </div>
                <h2 class="text-2xl font-extrabold font-heading text-emerald-950">Vote Recorded & Audited!</h2>
                <p class="text-xs text-emerald-800 mt-1">Thank you for participating in the university student election.</p>

                @if($votedCandidate)
                    <div class="mt-6 bg-white p-6 rounded-2xl border border-emerald-200 text-left max-w-md mx-auto shadow-sm">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-2">Ballot Confirmation Receipt</span>
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset($votedCandidate->logo) }}" alt="{{ $votedCandidate->party_name }}" class="w-12 h-12 object-contain rounded-xl bg-slate-50 p-1 border border-slate-200" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($votedCandidate->party_name) }}'">
                            <div>
                                <h4 class="font-bold text-slate-900 text-base">{{ $votedCandidate->name }}</h4>
                                <p class="text-xs text-blue-600 font-semibold">{{ $votedCandidate->party_name }}</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                            <span>Election: {{ $activeElection->title }}</span>
                            <span class="font-mono text-emerald-600 font-bold"><i class="fa-solid fa-lock mr-1"></i> Ballot Sealed</span>
                        </div>
                    </div>
                @endif
            </div>
        @else
            <!-- Candidate Ballot Cards -->
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold font-heading text-slate-900">Official Ballot Sheet</h2>
                        <p class="text-xs text-slate-500">Select your preferred candidate below and click "Cast Ballot". You may vote only once.</p>
                    </div>
                    <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full border border-amber-200">
                        <i class="fa-solid fa-hand-pointer mr-1"></i> Single Vote Restricted
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($candidates as $candidate)
                        <div class="bg-white rounded-3xl border border-slate-200 shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                            <div>
                                <div class="relative h-44 bg-gradient-to-tr from-slate-900 to-slate-800 flex items-center justify-center p-4">
                                    <img src="{{ asset($candidate->id_card_photo) }}" alt="{{ $candidate->name }}" class="w-24 h-24 rounded-full border-4 border-white object-cover shadow-lg" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->name) }}'">
                                    
                                    <div class="absolute bottom-3 right-4 bg-white px-3 py-1 rounded-xl shadow-md border border-slate-100 flex items-center space-x-2">
                                        <img src="{{ asset($candidate->logo) }}" alt="{{ $candidate->party_name }}" class="w-6 h-6 object-contain rounded" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($candidate->party_name) }}'">
                                        <span class="text-xs font-bold text-slate-800">{{ $candidate->party_name }}</span>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <h3 class="text-xl font-bold font-heading text-slate-900 mb-1">{{ $candidate->name }}</h3>
                                    <p class="text-xs text-slate-500 mb-3"><i class="fa-solid fa-graduation-cap mr-1 text-blue-500"></i> {{ $candidate->class }} ({{ $candidate->student_id }})</p>
                                    <p class="text-xs text-slate-600 bg-slate-50 p-3 rounded-xl border border-slate-100">
                                        Running for leadership under <strong>{{ $candidate->party_name }}</strong>.
                                    </p>
                                </div>
                            </div>

                            <div class="p-6 pt-0">
                                <button type="button" 
                                        onclick="confirmVote({{ $candidate->id }}, '{{ addslashes($candidate->name) }}', '{{ addslashes($candidate->party_name) }}')"
                                        class="w-full py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-sm rounded-xl shadow-md shadow-blue-600/30 transition-all flex items-center justify-center">
                                    <i class="fa-solid fa-vote-yea mr-2"></i> Cast Vote for {{ strtok($candidate->name, " ") }}
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full bg-white rounded-3xl p-12 text-center border border-slate-200">
                            <i class="fa-solid fa-user-xmark text-4xl text-slate-400 mb-3"></i>
                            <h3 class="text-lg font-bold text-slate-800">No Approved Candidates Available</h3>
                            <p class="text-xs text-slate-500">Candidates will appear here once approved by election administration.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        @endif
    @else
        <div class="bg-white rounded-3xl p-12 text-center border border-slate-200">
            <i class="fa-solid fa-calendar-xmark text-4xl text-slate-400 mb-3"></i>
            <h3 class="text-lg font-bold text-slate-800">Voting Booth Closed</h3>
            <p class="text-xs text-slate-500">There is currently no active election session open for voting.</p>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    function confirmVote(candidateId, candidateName, partyName) {
        Swal.fire({
            title: 'Confirm Your Vote',
            html: `Are you sure you want to vote for <br><strong class="text-blue-600 text-lg">${candidateName}</strong><br><span class="text-xs text-slate-500">Party: ${partyName}</span><br><br><span class="text-xs text-red-500 font-semibold"><i class="fa-solid fa-triangle-exclamation"></i> This action is final and cannot be changed!</span>`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#2563eb',
            cancelButtonColor: '#64748b',
            confirmButtonText: '<i class="fa-solid fa-check mr-1"></i> Yes, Cast Ballot!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit AJAX Vote
                Swal.fire({
                    title: 'Recording Vote...',
                    text: 'Securing ballot in database...',
                    allowOutsideClick: false,
                    didOpen: () => { Swal.showLoading(); }
                });

                fetch("{{ route('voter.vote.cast') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        candidate_id: candidateId,
                        election_id: {{ $activeElection->id ?? 0 }}
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Vote Cast Successfully!',
                            text: data.message,
                            confirmButtonColor: '#2563eb'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Unable to Vote',
                            text: data.message,
                            confirmButtonColor: '#ef4444'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Server Error',
                        text: 'An error occurred while submitting your vote. Please try again.',
                        confirmButtonColor: '#ef4444'
                    });
                });
            }
        });
    }
</script>
@endsection
