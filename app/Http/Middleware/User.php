<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && isUser()) {
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
