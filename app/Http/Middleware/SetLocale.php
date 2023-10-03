<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check(getCurrentGuard())) {
            $userData = getUser(Auth::guard(getCurrentGuard())->user()->guid);
            $language = $userData ? $userData['language'] : config('constants.language_japanese');
            App::setLocale($language);
        }
        return $next($request);

    }
}