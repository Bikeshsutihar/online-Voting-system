<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class candidateInfo extends Model
{
    //
    // app/Models/CandidateInfo.php — add this relation
public function voteCount()
{
    return $this->hasOne(VoteCount::class, 'candidate_info_id');
}
}
