<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use App\Models\Voter;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVoters = Voter::count();
        $totalCandidates = Candidate::count();
        $pendingCandidates = Candidate::where('status', 'pending')->count();
        $totalVotes = Vote::count();

        $activeElection = Election::where('status', 'active')->first() ?? Election::latest()->first();

        $electionStats = [];
        if ($activeElection) {
            $candidates = Candidate::where('election_id', $activeElection->id)
                ->where('status', 'approved')
                ->withCount(['votes' => function ($query) use ($activeElection) {
                    $query->where('election_id', $activeElection->id);
                }])
                ->get();

            $electionTotalVotes = Vote::where('election_id', $activeElection->id)->count();

            foreach ($candidates as $cand) {
                $electionStats[] = [
                    'id' => $cand->id,
                    'name' => $cand->name,
                    'party_name' => $cand->party_name,
                    'logo' => $cand->logo,
                    'votes' => $cand->votes_count,
                    'percentage' => $electionTotalVotes > 0 ? round(($cand->votes_count / $electionTotalVotes) * 100, 1) : 0,
                ];
            }
        }

        $recentVotes = Vote::with(['voter', 'candidate', 'election'])
            ->latest('voted_at')
            ->take(8)
            ->get();

        return view('admin.dashboard', compact(
            'totalVoters',
            'totalCandidates',
            'pendingCandidates',
            'totalVotes',
            'activeElection',
            'electionStats',
            'recentVotes'
        ));
    }
}
