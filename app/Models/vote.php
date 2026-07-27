<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  protected $fillable = [
    'candidate_info_id',
    'ip_address',
];
}
