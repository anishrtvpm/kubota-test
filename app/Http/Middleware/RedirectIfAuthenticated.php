<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? ['kubota','independent'] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(getCurrentGuard() == 'kubota' && Auth::guard(getCurrentGuard())->user()->is_admin)
                {
                    return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
                }
                return redirect(RouteServiceProvider::USER_DASHBOARD);
            }
        }

        return $next($request);
    }
}
