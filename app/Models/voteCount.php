<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteCount extends Model
{
    protected $fillable = [
        'candidate_info_id',
        'count',
    ];
}
