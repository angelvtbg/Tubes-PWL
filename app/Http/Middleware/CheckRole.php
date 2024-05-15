<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // User is not logged in
            return redirect('/login');
        }

        $user = Auth::user();

        // Check if user has one of the allowed roles
        if (!in_array($user->role, $roles)) {
            // User does not have the required role
            return redirect('/home')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
