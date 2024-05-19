<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckUserSession
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('nama') || Session::get('nama') == '') {
            return redirect('login');
        }

        if (Session::get('userLevel') == 'admin') {
            return redirect('admin/index');
        }

        return $next($request);
    }
}
