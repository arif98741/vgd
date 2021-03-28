<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{

    public function handle($request, Closure $next)
    {
        if (Auth::check() && isAdmin()) {
            return $next($request);
        }
        if (!Auth::check())
        {
            //abort(403, 'Unauthorized action.');
            return redirect('login');
        }

        return redirect()->route('denied');
    }
}
