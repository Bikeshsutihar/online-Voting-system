<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Election;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    public function index()
    {
        $elections = Election::withCount('candidates', 'votes')->latest()->paginate(10);
        return view('admin.elections.index', compact('elections'));
    }

    public function create()
    {
        return view('admin.elections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:upcoming,active,completed',
        ]);

        if ($validated['status'] === 'active') {
            // Set all other elections to completed or upcoming if only 1 active election allowed
            Election::where('status', 'active')->update(['status' => 'completed']);
        }

        Election::create($validated);

        return redirect()->route('admin.elections.index')->with('success', 'Election created successfully!');
    }

    public function show(Election $election)
    {
        $election->load(['candidates' => function ($query) {
            $query->withCount('votes');
        }, 'votes.voter', 'votes.candidate']);

        return view('admin.elections.show', compact('election'));
    }

    public function edit(Election $election)
    {
        return view('admin.elections.edit', compact('election'));
    }

    public function update(Request $request, Election $election)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:upcoming,active,completed',
        ]);

        if ($validated['status'] === 'active') {
            Election::where('id', '!=', $election->id)->where('status', 'active')->update(['status' => 'completed']);
        }

        $election->update($validated);

        return redirect()->route('admin.elections.index')->with('success', 'Election updated successfully!');
    }

    public function destroy(Election $election)
    {
        $election->delete();
        return redirect()->route('admin.elections.index')->with('success', 'Election deleted successfully!');
    }
}
