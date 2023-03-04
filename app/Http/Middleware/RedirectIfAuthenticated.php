<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next, ...$guards)
    // {
    //     $guards = empty($guards) ? [null] : $guards;

    //     foreach ($guards as $guard) {
    //         if ($guard == "admin" && Auth::guard($guard)->check()) {
    //             return redirect('/admin/dashboard');
    //         }
    //         if ($guard == "proktor" && Auth::guard($guard)->check()) {
    //             return redirect('/proktor/dashboard');
    //         }
    //         if (Auth::guard($guard)->check()) {
    //             return redirect('/home');
    //         }
    //     }

    //     return $next($request);
    // }
    public function handle($request, Closure $next, $guard = null)
        {
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect('/admin/dashboad');
            }
            if ($guard == "proktor" && Auth::guard($guard)->check()) {
                return redirect('/proktor/dashboard');
            }
            if (Auth::guard($guard)->check()) {
                return redirect('/home');
            }

            return $next($request);
        }
}
