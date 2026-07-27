<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\fregistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class frontend_login extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = fregistration::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'Invalid email');
    }

    if ($request->password != $user->password) {
        return back()->with('error', 'Invalid password');
    }

    Session::put('user_id', $user->id);

    return redirect()->route('voteNow');
}

    public function logout()
    {
        Session::flush();

        return redirect()->route('flogin');
    }
}
