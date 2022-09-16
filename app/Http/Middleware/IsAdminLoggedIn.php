<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\User;

class IsAdminLoggedIn
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
        if (!Session::has('loginID') || Session::get('account_type') != 'Admin')
            return redirect('login')->with('fail', 'Please login');

        return $next($request);
    }
}
