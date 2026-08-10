<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'election_id',
        'name',
        'email',
        'dob',
        'class',
        'student_id',
        'party_name',
        'logo',
        'phone_no',
        'id_card_photo',
        'status',
        'applied_at',
        'approved_by',
    ];

    protected $casts = [
        'dob' => 'date',
        'applied_at' => 'datetime',
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function approver()
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function getLogoUrlAttribute()
    {
        return asset($this->logo);
    }

    public function getIdCardUrlAttribute()
    {
        return asset($this->id_card_photo);
    }
}
