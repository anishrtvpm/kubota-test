<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $employeeId=auth()->user()->employee_id;
        $employee=Employee::where('guid', $employeeId)->first();
        if($employee->is_admin == 1){
            return $next($request);
        }
        return redirect('dashboard')->with('error',"You don't have admin access.");
    }

}
