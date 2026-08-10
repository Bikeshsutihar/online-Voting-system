<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $query = Candidate::with(['election', 'approver']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('student_id', 'like', "%{$search}%")
                  ->orWhere('party_name', 'like', "%{$search}%");
            });
        }

        $candidates = $query->latest()->paginate(10);
        return view('admin.candidates.index', compact('candidates'));
    }

    public function create()
    {
        $elections = Election::all();
        return view('admin.candidates.create', compact('elections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email',
            'dob' => 'required|date',
            'class' => 'required|string|max:100',
            'student_id' => 'required|string|unique:candidates,student_id',
            'party_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'election_id' => 'nullable|exists:elections,id',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_card_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        if (!file_exists(public_path('uploads/candidate_logos'))) {
            mkdir(public_path('uploads/candidate_logos'), 0777, true);
        }
        if (!file_exists(public_path('uploads/candidate_ids'))) {
            mkdir(public_path('uploads/candidate_ids'), 0777, true);
        }

        // Handle logo upload
        $logoName = time() . '_logo_' . uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->move(public_path('uploads/candidate_logos'), $logoName);
        $validated['logo'] = 'uploads/candidate_logos/' . $logoName;

        // Handle ID card photo upload
        $idCardName = time() . '_id_' . uniqid() . '.' . $request->file('id_card_photo')->getClientOriginalExtension();
        $request->file('id_card_photo')->move(public_path('uploads/candidate_ids'), $idCardName);
        $validated['id_card_photo'] = 'uploads/candidate_ids/' . $idCardName;

        $validated['applied_at'] = now();
        if ($validated['status'] === 'approved') {
            $validated['approved_by'] = Auth::guard('admin')->id();
        }

        Candidate::create($validated);

        return redirect()->route('admin.candidates.index')->with('success', 'Candidate created successfully!');
    }

    public function show(Candidate $candidate)
    {
        $candidate->load(['election', 'approver', 'votes']);
        return view('admin.candidates.show', compact('candidate'));
    }

    public function edit(Candidate $candidate)
    {
        $elections = Election::all();
        return view('admin.candidates.edit', compact('candidate', 'elections'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email,' . $candidate->id,
            'dob' => 'required|date',
            'class' => 'required|string|max:100',
            'student_id' => 'required|string|unique:candidates,student_id,' . $candidate->id,
            'party_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'election_id' => 'nullable|exists:elections,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_card_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        if ($request->hasFile('logo')) {
            if (!file_exists(public_path('uploads/candidate_logos'))) {
                mkdir(public_path('uploads/candidate_logos'), 0777, true);
            }
            $logoName = time() . '_logo_' . uniqid() . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('uploads/candidate_logos'), $logoName);
            $validated['logo'] = 'uploads/candidate_logos/' . $logoName;
        }

        if ($request->hasFile('id_card_photo')) {
            if (!file_exists(public_path('uploads/candidate_ids'))) {
                mkdir(public_path('uploads/candidate_ids'), 0777, true);
            }
            $idCardName = time() . '_id_' . uniqid() . '.' . $request->file('id_card_photo')->getClientOriginalExtension();
            $request->file('id_card_photo')->move(public_path('uploads/candidate_ids'), $idCardName);
            $validated['id_card_photo'] = 'uploads/candidate_ids/' . $idCardName;
        }

        if ($validated['status'] === 'approved' && $candidate->status !== 'approved') {
            $validated['approved_by'] = Auth::guard('admin')->id();
        }

        $candidate->update($validated);

        return redirect()->route('admin.candidates.index')->with('success', 'Candidate updated successfully!');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate deleted successfully!');
    }

    public function approve(Candidate $candidate)
    {
        $candidate->update([
            'status' => 'approved',
            'approved_by' => Auth::guard('admin')->id(),
        ]);

        return back()->with('success', 'Candidate ' . $candidate->name . ' has been approved!');
    }

    public function reject(Candidate $candidate)
    {
        $candidate->update([
            'status' => 'rejected',
        ]);

        return back()->with('success', 'Candidate ' . $candidate->name . ' application has been rejected.');
    }
}
