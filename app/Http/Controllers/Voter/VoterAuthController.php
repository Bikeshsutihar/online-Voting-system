<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VoterAuthController extends Controller
{
    public function showRegisterForm()
    {
        if (Auth::guard('voter')->check()) {
            return redirect()->route('voter.dashboard');
        }
        return view('voter.auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:voters,email',
            'phone_no' => 'required|string|max:20',
            'class' => 'required|string|max:100',
            'student_id' => 'required|string|unique:voters,student_id',
            'dob' => 'required|date',
            'id_card_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!file_exists(public_path('uploads/voter_ids'))) {
            mkdir(public_path('uploads/voter_ids'), 0777, true);
        }

        $photoName = time() . '_voter_' . uniqid() . '.' . $request->file('id_card_photo')->getClientOriginalExtension();
        $request->file('id_card_photo')->move(public_path('uploads/voter_ids'), $photoName);
        $validated['id_card_photo'] = 'uploads/voter_ids/' . $photoName;

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_verified'] = true; // Auto-verified for seamless university demo

        $voter = Voter::create($validated);
        Auth::guard('voter')->login($voter);

        return redirect()->route('voter.dashboard')->with('success', 'Registration successful! Welcome to your Voter Portal.');
    }

    public function showLoginForm()
    {
        if (Auth::guard('voter')->check()) {
            return redirect()->route('voter.dashboard');
        }
        return view('voter.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'student_id' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('voter')->attempt(['student_id' => $credentials['student_id'], 'password' => $credentials['password']], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('voter.dashboard'))->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'student_id' => 'Invalid Student ID or Password.',
        ])->onlyInput('student_id');
    }

    public function logout(Request $request)
    {
        Auth::guard('voter')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('voter.login')->with('success', 'Logged out successfully.');
    }
}
