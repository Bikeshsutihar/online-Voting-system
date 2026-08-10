<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function approvedCandidates()
    {
        return $this->hasMany(Candidate::class, 'approved_by');
    }
}
