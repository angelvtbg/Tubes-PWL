<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$level)
{
    if (!in_array($request->user()->role, $level)) {
        // Redirect user jika tidak memiliki role yang dibutuhkan
        return redirect('home')->with('error', 'Access Denied');
    }
    return $next($request);
}

}
