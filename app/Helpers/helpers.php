<?php

use Illuminate\Support\Facades\Auth;

function getCurrentGuard()
{
    $guards = ['kubota', 'independent'];

    foreach ($guards as $guard) {
        if(Auth::guard($guard)->check()) {
            return $guard;
        }
    }
}