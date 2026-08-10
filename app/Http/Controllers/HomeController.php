<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use App\Models\Voter;

class HomeController extends Controller
{
    public function index()
    {
        $activeElection = Election::where('status', 'active')->first() ?? Election::latest()->first();

        $candidates = collect();
        $totalVotes = 0;

        if ($activeElection) {
            $candidates = Candidate::where('election_id', $activeElection->id)
                ->where('status', 'approved')
                ->withCount('votes')
                ->get();

            $totalVotes = Vote::where('election_id', $activeElection->id)->count();
        }

        $totalVoters = Voter::count();
        $totalApprovedCandidates = Candidate::where('status', 'approved')->count();

        return view('landing', compact('activeElection', 'candidates', 'totalVotes', 'totalVoters', 'totalApprovedCandidates'));
    }
}
