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
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Check if user has one of the allowed roles
        $user = Auth::user();
        if (!in_array($user->role, $roles)) {
            return redirect('/home')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
