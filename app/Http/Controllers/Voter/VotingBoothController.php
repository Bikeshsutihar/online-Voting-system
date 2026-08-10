<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotingBoothController extends Controller
{
    public function dashboard()
    {
        $voter = Auth::guard('voter')->user();
        $activeElection = Election::where('status', 'active')->first();

        $candidates = collect();
        $hasVoted = false;
        $votedCandidate = null;

        if ($activeElection) {
            $candidates = Candidate::where('election_id', $activeElection->id)
                ->where('status', 'approved')
                ->get();

            $existingVote = Vote::where('voter_id', $voter->id)
                ->where('election_id', $activeElection->id)
                ->with('candidate')
                ->first();

            if ($existingVote) {
                $hasVoted = true;
                $votedCandidate = $existingVote->candidate;
            }
        }

        $pastVotes = Vote::where('voter_id', $voter->id)
            ->with(['election', 'candidate'])
            ->latest('voted_at')
            ->get();

        return view('voter.dashboard', compact('voter', 'activeElection', 'candidates', 'hasVoted', 'votedCandidate', 'pastVotes'));
    }

    public function castVote(Request $request)
    {
        $voter = Auth::guard('voter')->user();

        if (!$voter->is_verified) {
            return response()->json([
                'success' => false,
                'message' => 'Your voter account is not verified yet. Please contact administration.',
            ], 403);
        }

        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
            'election_id' => 'required|exists:elections,id',
        ]);

        $election = Election::findOrFail($request->election_id);
        if ($election->status !== 'active') {
            return response()->json([
                'success' => false,
                'message' => 'This election is not currently active for voting.',
            ], 400);
        }

        $existingVote = Vote::where('voter_id', $voter->id)
            ->where('election_id', $election->id)
            ->first();

        if ($existingVote) {
            return response()->json([
                'success' => false,
                'message' => 'You have already cast your vote in this election!',
            ], 422);
        }

        $candidate = Candidate::where('id', $request->candidate_id)
            ->where('election_id', $election->id)
            ->where('status', 'approved')
            ->firstOrFail();

        Vote::create([
            'voter_id' => $voter->id,
            'candidate_id' => $candidate->id,
            'election_id' => $election->id,
            'voted_at' => now(),
            'ip_address' => $request->ip(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your vote for ' . $candidate->name . ' (' . $candidate->party_name . ') has been securely recorded!',
            'candidate_name' => $candidate->name,
            'party_name' => $candidate->party_name,
        ]);
    }
}
