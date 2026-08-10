<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;

class CandidateApplicationController extends Controller
{
    public function create()
    {
        $activeElection = Election::where('status', 'active')
            ->orWhere('status', 'upcoming')
            ->first();

        return view('candidate.apply', compact('activeElection'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'election_id' => 'required|exists:elections,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email',
            'dob' => 'required|date',
            'class' => 'required|string|max:100',
            'student_id' => 'required|string|unique:candidates,student_id',
            'party_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_card_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (!file_exists(public_path('uploads/candidate_logos'))) {
            mkdir(public_path('uploads/candidate_logos'), 0777, true);
        }
        if (!file_exists(public_path('uploads/candidate_ids'))) {
            mkdir(public_path('uploads/candidate_ids'), 0777, true);
        }

        // Upload logo
        $logoName = time() . '_logo_' . uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->move(public_path('uploads/candidate_logos'), $logoName);
        $validated['logo'] = 'uploads/candidate_logos/' . $logoName;

        // Upload ID Card
        $idCardName = time() . '_id_' . uniqid() . '.' . $request->file('id_card_photo')->getClientOriginalExtension();
        $request->file('id_card_photo')->move(public_path('uploads/candidate_ids'), $idCardName);
        $validated['id_card_photo'] = 'uploads/candidate_ids/' . $idCardName;

        $validated['status'] = 'pending';
        $validated['applied_at'] = now();

        Candidate::create($validated);

        return redirect()->route('home')->with('success', 'Your candidate application has been submitted successfully! It is now pending Admin approval.');
    }
}
