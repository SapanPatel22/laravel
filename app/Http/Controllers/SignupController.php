<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;

class SignupController extends Controller {
	
	public function index(Request $request) {
		
		return view('signup.signup')->with('route', route('login_form'))->with('route_name', 'Login');;
	}

	public function validateRequest(Request $request) {

		$messages = [
			'prefix.required' => '* Prefix is required',
			'fname.required' => '* First name is required',
			'fname.alpha' => '* Conatins only Alphabet',
			'mname.alpha' => '* Conatins only Alphabet',
			'lname.required' => '* Last name is required ',
			'lname.alpha' => '* Conatins only Alphabet',
			'email.required' => '* Email is required',
			'pass.required' => '* Password required',
			'pass.min' => '* Password must be between 8 to 12',
			'pass.max' => '* Password must be between 8 to 12'
		];

		$rules = [
			'prefix' => 'required',
			'fname' => 'required|alpha|min:2|max:40',
			'lname' => 'required|alpha|min:2|max:40',
			'mname' => 'nullable|alpha|min:2|max:40',
			'pass' => 'required|min:6|max:15',
			'email' => 'required|email'
		];

		$this->validate($request, $rules, $messages);
		$employeeInsertStatus = Employees::saveFormData($request->input());

		if ($employeeInsertStatus) {
			return view('signup.signup', compact('employeeInsertStatus'))->with('route', route('login_form'))->with('route_name', 'login');
		} else {
			return view('signup.signup')->with('route', route('login_form'))->with('route_name', 'login');
		}
	}
}
