<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Employees;

class CheckLoginUser
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$currentPage = $request->getRequestUri();
		$page = substr($currentPage, 1);

		if (strpos($page, '?') != false) {
			$find = explode("?", $page);
			$page = $find[0];
		}
		// dd($page);
		if (Auth::check()) {
			if (Auth::user()->hasRoles() && $page != 'dashboard') {
			
				if(Auth::user()->isAdmin() && $page != 'delete' && $page != 'dashboard' && $page != 'createUser' && $page != 'cmsPage') {
					return $next($request);
				}
				if(Auth::user()->isItAdmin() && $page != 'createUser') {
					return $next($request);
				}
				if (Auth::user()->isSuperAdmin()) {
				return $next($request);
				}

				$request->session()->flash('status', 'You are Not A valid User!!');
				return redirect('dashboard');
			 } else {
				return $next($request);
			 }
		} else {
			Auth::logout();
			
			return redirect('/');
		}
	}
}
