<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Redirect;
use App\Employees;
use DB;

class LoginController extends Controller {

	 public function index() {
		return view('login.login')->with('route', route('login_form'))->with('route_name', 'Login');
	}
	
	public function validateUserEmail(Request $request) {
		$messages = [
			'email.required' => '* Email is required',
			'pass.required' => '* Password required',
		];
		$rules = [
			'pass' => 'required',
			'email' => 'required|email',
		];

		$this->validate($request, $rules, $messages);

		if ($this->login($request)) {
			return redirect()->route('dashboard');
		}
		else {
			$request->session()->flash('alert-danger', 'Invalid credential!');
			return redirect()->route('login_form');
		}
	}

	public function login(Request $request) {
		$employeeInsertStatus = Employees::validateUser($request);
		if($employeeInsertStatus) {
			if (Auth::attempt(['email' => $request['email'], 'password' => $request['pass']])) {
				return true;
				
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
