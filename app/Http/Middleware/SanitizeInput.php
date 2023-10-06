<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SanitizeInput
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Sanitize the input data here
        $inputData = $request->post();
        if (!empty($inputData)) {
            foreach ($inputData as $key => $value) {
                if (!is_numeric($value)) {
                    $inputData[$key] = strip_tags($value);
                }
            }
            $request->merge($inputData);
        }

        return $next($request);

    }
}