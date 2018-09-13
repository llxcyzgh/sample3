<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
//            return redirect('/home');
            session()->flash('info','您已登陆,无需重复操作; 如若您要登陆其他账号,请先行退出当前账号~');
            return redirect('/');
        }

        return $next($request);
    }
}
