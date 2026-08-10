<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VoterMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('voter')->check()) {
            return redirect()->route('voter.login')->with('error', 'Please log in to your Voter portal.');
        }

        return $next($request);
    }
}
