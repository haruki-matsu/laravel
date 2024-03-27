<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {
        $timeout = 60 * 60; 
    
        if (!Session::has('lastActivityTime')) {
            Session::put('lastActivityTime', time());
        } elseif (time() - Session::get('lastActivityTime') > $timeout) {
            Session::forget('lastActivityTime');
            Auth::logout();

            return redirect('/login')->with('warning', '「長時間操作がなかったため、ログアウトしました。再度ログインしてください。」');
        }
        
        Session::put('lastActivityTime', time());
        return $next($request);
    }
}