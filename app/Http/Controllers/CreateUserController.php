<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use Auth;

class CreateUserController extends Controller
{
    public function index() {
    	return view('createUser')->with('route', 'logout')->with('route_name', 'Logout');
    }

    public function validateRequest($request) {

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
			'pass.max' => '* Password must be between 8 to 12',
			'roles.required' => '* Roles is required'
		];

		$rules = [
			'prefix' => 'required',
			'fname' => 'required|alpha|min:2|max:40',
			'mname' => 'nullable|alpha|min:2|max:40',
			'lname' => 'required|alpha|min:2|max:40',
			'pass' => 'required|min:8|max:12',
			'email' => 'required|email',
			'roles' => 'required'
		];

		 return $this->validate($request, $rules ,$messages);

		
	}

	public function create(Request $request) {

		if ($this->validateRequest($request) == null) {
			$isUserCreated = Employees::saveFormData($request->input());

			if ($isUserCreated) {
				$request->session()->flash('alert-success', 'User was successful Updated!');

				return redirect()->route("create_user");
			} else {
				$request->session()->flash('alert-danger', 'Something Went wrong!');

				return route('create_user');
			}
		}
	}

	public function edit(Request $request) {

		$id = Auth::user()->id;
		$user = Employees::getUser($id);

		$getUserDetails = Employees::getUser($request->user_id);
		
		if ($getUserDetails == true) {

			return view('editUserRole')->with('route', route('logout'))->with('route_name', 'Logout')->with('getUserDetails',$getUserDetails)->with('user' ,$user);
		}
	}

	public function view(Request $request) {
		
		$id = Auth::user()->id;
		$user = Employees::getUser($id);

		$allUser = Employees::getAllUser();

		return view('viewUserRoles')->with('route', 'logout')->with('route_name', 'Logout')->with('allUser', $allUser)->with('user' ,$user);
	}

	public function update(Request $request) {

		$messages = [
			'prefix.required' => '* Prefix is required',
			'fname.required' => '* First name is required',
			'fname.alpha' => '* Conatins only Alphabet',
			'mname.alpha' => '* Conatins only Alphabet',
			'lname.required' => '* Last name is required ',
			'lname.alpha' => '* Conatins only Alphabet',
			'email.required' => '* Email is required',
			'roles.required' => '* Roles is required'
		];

		$rules = [
			'prefix' => 'required',
			'fname' => 'required|alpha|min:2|max:40',
			'mname' => 'nullable|alpha|min:2|max:40',
			'lname' => 'required|alpha|min:2|max:40',
			'email' => 'required|email',
			'roles' => 'required'
		];
		$this->validate($request, $rules ,$messages);
		$employeeInsertStatus = Employees::saveUpdateRole($request->all());

		if ($employeeInsertStatus == true) {
			$request->session()->flash('alert-success', 'User was successful Updated!');

			return redirect()->route("view_user_role");
		} else {
			$request->session()->flash('alert-danger', 'something went wrong');

			return back();
		}
	}
}
