<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;

class UsersProfileController extends Controller {
	
	public static function index() {
		$allUser = Employees::getAllUser();
		return view('dashboard.users_profile')->with('route', 'logout')->with('route_name', 'logout')->with('allUser',$allUser);
	}

	public static function delete(Request $request) {
		$deleteUser = Employees::deleteUser($request->user_id);

		if($deleteUser) {
			 $request->session()->flash('alert-success', 'User was successful deleted!');
			return redirect()->route("users_profile");
		} else {
			$request->session()->flash('alert-danger', 'something goes wrong');
			return redirect()->route("users_profile");
		}
	}

	public static function edit(Request $request) {
		$getUserDetails = Employees::getUser($request->user_id);

		if ($getUserDetails) {
			return view('edit')->with('route', route('logout'))->with('route_name', 'Logout')->with('getUserDetails',$getUserDetails);
		} else {
			return redirect()->route("users_profile");
		}
	}

	public static function validateEditRequest(Request $request) {

		$messages = [
			'prefix.required' => '* Prefix is required',
			'fname.required' => '* First name is required',
			'lname.required' => '* Last name is required ', 
			'email.required' => '* Email is required',
		];

		$rules = [
			'prefix' => 'required',
			'fname' => 'required|alpha|min:2|max:40',
			'lname' => 'required|alpha|min:2|max:40',
			'mname' => 'alpha|min:2|max:40',
			'email' => 'required|email',
		];
		$ud = new UsersProfileController();
		$ud->validate($request, $rules, $messages);
		$employeeInsertStatus = Employees::saveUpdateData([$request->input()]);
		if ($employeeInsertStatus) {
			$request->session()->flash('alert-success', 'User was successful Updated!');
			return redirect()->route("users_profile");
		} else {
			$request->session()->flash('alert-danger', 'something goes wrong');
			return redirect()->route("edit_user");
		}

	}
}
