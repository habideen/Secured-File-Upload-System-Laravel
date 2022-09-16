<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AlreadyLoggedIn
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
        if (Session::has('loginID'))
        {
            if (Session::get('account_type') == 'coupon')
                return redirect('/user/index');

            elseif (Session::get('account_type') == 'admin')
                return redirect('/admin/index');
        }
        
        return $next($request);
    }
}
