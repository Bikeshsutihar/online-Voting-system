<?php

namespace App\Http\Controllers;

use App\Models\candidateInfo;
use App\Models\Vote;
use App\Models\VoteCount;
use Illuminate\Http\Request;

class vote_count extends Controller
{
    public function store(Request $request, candidateInfo $candidateInfo)
    {
        // if ($candidateInfo->status !== 'Approved') {
        //     return response()->json(['success' => false, 'message' => 'Not open for voting.'], 403);
        // }

        $ip = $request->ip();

        $alreadyVoted = Vote::where('candidate_info_id', $candidateInfo->id)
            ->where('ip_address', $ip)
            ->exists();

        if ($alreadyVoted) {
            return response()->json(['success' => false, 'message' => 'You have already voted.'], 409);
        }

        Vote::create([
            'candidate_info_id' => $candidateInfo->id,
            'ip_address' => $ip,
        ]);

        $voteCount = VoteCount::firstOrCreate(
            ['candidate_info_id' => $candidateInfo->id],
            ['count' => 0]
        );
        $voteCount->increment('count');

        return response()->json([
            'success' => true,
            'votes_count' => $voteCount->fresh()->count,
        ]);
    }
}
