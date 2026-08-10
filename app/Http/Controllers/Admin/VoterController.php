<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VoterController extends Controller
{
    public function index(Request $request)
    {
        $query = Voter::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('student_id', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $voters = $query->latest()->paginate(10);
        return view('admin.voters.index', compact('voters'));
    }

    public function create()
    {
        return view('admin.voters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:voters,email',
            'phone_no' => 'required|string|max:20',
            'class' => 'required|string|max:100',
            'student_id' => 'required|string|unique:voters,student_id',
            'dob' => 'required|date',
            'password' => 'required|string|min:6',
            'id_card_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_verified' => 'nullable|boolean',
        ]);

        if (!file_exists(public_path('uploads/voter_ids'))) {
            mkdir(public_path('uploads/voter_ids'), 0777, true);
        }

        $photoName = time() . '_voter_' . uniqid() . '.' . $request->file('id_card_photo')->getClientOriginalExtension();
        $request->file('id_card_photo')->move(public_path('uploads/voter_ids'), $photoName);
        $validated['id_card_photo'] = 'uploads/voter_ids/' . $photoName;

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_verified'] = $request->has('is_verified');

        Voter::create($validated);

        return redirect()->route('admin.voters.index')->with('success', 'Voter created successfully!');
    }

    public function show(Voter $voter)
    {
        $voter->load('votes.candidate', 'votes.election');
        return view('admin.voters.show', compact('voter'));
    }

    public function edit(Voter $voter)
    {
        return view('admin.voters.edit', compact('voter'));
    }

    public function update(Request $request, Voter $voter)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:voters,email,' . $voter->id,
            'phone_no' => 'required|string|max:20',
            'class' => 'required|string|max:100',
            'student_id' => 'required|string|unique:voters,student_id,' . $voter->id,
            'dob' => 'required|date',
            'password' => 'nullable|string|min:6',
            'id_card_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_verified' => 'nullable|boolean',
        ]);

        if ($request->hasFile('id_card_photo')) {
            if (!file_exists(public_path('uploads/voter_ids'))) {
                mkdir(public_path('uploads/voter_ids'), 0777, true);
            }
            $photoName = time() . '_voter_' . uniqid() . '.' . $request->file('id_card_photo')->getClientOriginalExtension();
            $request->file('id_card_photo')->move(public_path('uploads/voter_ids'), $photoName);
            $validated['id_card_photo'] = 'uploads/voter_ids/' . $photoName;
        }

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $validated['is_verified'] = $request->has('is_verified');

        $voter->update($validated);

        return redirect()->route('admin.voters.index')->with('success', 'Voter updated successfully!');
    }

    public function destroy(Voter $voter)
    {
        $voter->delete();
        return redirect()->route('admin.voters.index')->with('success', 'Voter deleted successfully!');
    }

    public function toggleVerify(Voter $voter)
    {
        $voter->update([
            'is_verified' => !$voter->is_verified,
        ]);

        $status = $voter->is_verified ? 'verified' : 'unverified';
        return back()->with('success', 'Voter ' . $voter->name . ' is now ' . $status . '.');
    }
}
