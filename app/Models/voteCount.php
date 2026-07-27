<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/VoteCount.php
class VoteCount extends Model
{
    protected $fillable = ['candidate_info_id', 'count'];

    public function candidateInfo()
    {
        return $this->belongsTo(CandidateInfo::class, 'candidate_info_id');
    }
}
