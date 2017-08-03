<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Employees;
use DB;

class DashboardController extends Controller
{
	public function index() {
		$id = Auth::user()->id;
		$user = Employees::getUser($id);

		return view('dashboard.dashboard')->with('route', 'logout')->with('route_name', 'logout')->with('user', $user);
	}

	public function logout() {
		Auth::logout();

		return Redirect::route('login_form');
	}
}
