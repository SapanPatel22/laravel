<?php

namespace App\Http\Middleware;

use Closure;
use App\Employees;
class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        dd($request);
        return $next($request);
    }
}
