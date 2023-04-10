<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            if (Auth::user()->is_admin == '1') {
                return $next($request);
            } else {
                return redirect('/Dashboard')->with('message', 'Access Denied as you are not Admin');
            }
        } else {
            return redirect('/login')->with('message', 'Login to access website info');
        }
        return $next($request);
    }
}
