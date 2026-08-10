<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Voter extends Authenticatable
{
    use Notifiable;

    protected $table = 'voters';

    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'class',
        'student_id',
        'dob',
        'id_card_photo',
        'password',
        'is_verified',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'dob' => 'date',
        'is_verified' => 'boolean',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function hasVotedIn($electionId)
    {
        return $this->votes()->where('election_id', $electionId)->exists();
    }

    public function getIdCardUrlAttribute()
    {
        return asset($this->id_card_photo);
    }
}
