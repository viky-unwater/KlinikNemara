<?php

namespace App\Http\Middleware;

use Closure;

class DoctorMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('doctor')) {
            return redirect('/login');
        }
        return $next($request);
    }
}
