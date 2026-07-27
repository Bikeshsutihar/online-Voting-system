<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Vote.php
class Vote extends Model
{
    protected $fillable = ['candidate_info_id', 'user_id', 'ip_address'];
}
