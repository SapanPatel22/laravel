<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\EmpAddress;

class UsersProfileController extends Controller {
	
	public static function index() {

		$allUser = Employees::getAllUser();

		return view('dashboard.users_profile')->with('route', 'logout')->with('route_name', 'Logout')->with('allUser', $allUser);
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
		$getUserAddress = $getUserDetails->address;
		
		if ($getUserDetails == true && $getUserAddress == true) {
			return view('edit')->with('route', route('logout'))->with('route_name', 'Logout')->with('getUserDetails',$getUserDetails)->with('getUserAddress' , $getUserAddress);
		}
		else if ($getUserDetails) {
			return view('edit')->with('route', route('logout'))->with('route_name', 'Logout')->with('getUserDetails',$getUserDetails)->with('getUserAddress' , null);
		} else {
			return redirect()->route("users_profile");
		}
	}

	public static function validateEditRequest(Request $request) {

		if ($request->form_button_name == 'Cancel') {
			return redirect()->route('users_profile');
		}

		$messages = [
			'prefix.required' => '* Prefix is required',
			'fname.required' => '* First name is required',
			'fname.alpha' => '* Conatins only Alphabet',
			'mname.alpha' => '* Conatins only Alphabet',
			'lname.required' => '* Last name is required ',
			'lname.alpha' => '* Conatins only Alphabet',
			'email.required' => '* Email is required',
			'marital-status.required' => '* Marital status required',
			'dob.required' => '* DOB is required',
			'image.required' => '* Image is required',
			'image.image' => '* File must be an image',
			'image.mimes' => '* Image should be jpeg,png,jpg,gif type',
			'company_name.required' => '* Comapny is required',
			'designation_name.required' => '* Designation is required',
			'company_country.required' => '* Country is required',
			'company_state.required' => '* State is required',
			'company_city.required' => '* City is required',
			'company_street.required' => '* Street is required',
			'company_zip.required' => '* Zip is required',
			'company_zip.numeric' => '* Contains only numeric',
			'company_zip.digits' => '* Min. 6 digits required',
			'company_fax.required' => '* Fax is required',
			'company_fax.numeric' => '* Contains only numeric',
			'company_fax.digits' => '* Min. 10 digits required',
			'company_phone.required' => '* Phone is required',
			'company_phone.numeric' => '* Contains only numeric',
			'company_phone.digits' => '* Min. 10 digits required',
			'home_country.required' => '* Country is required',
			'home_state.required' => '* State is required',
			'home_city.required' => '* City is required',
			'home_street.required' => '* Street is required',
			'home_zip.required' => '* Zip is required',
			'home_zip.numeric' => '* Contains only numeric',
			'home_zip.digits' => '* Min. 6 digits required',
			'home_fax.required' => '* Fax is required',
			'home_fax.numeric' => '* Contains only numeric',
			'home_fax.digits' => '* Min. 10 digits required',
			'home_phone.required' => '* Phone is required',
			'home_phone.numeric' => '* Contains only numeric',
			'home_phone.digits' => '* Min. 10 digits required',


		];

		$rules = [
			'prefix' => 'required',
			'fname' => 'required|alpha|min:2|max:40',
			'lname' => 'required|alpha|min:2|max:40',
			'mname' => 'nullable|alpha|min:2|max:40',
			'email' => 'required|email',
			'marital-status' => 'required', 
			'dob' => 'required|date',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
			'company_name' => 'required',
			'designation_name' => 'required',
			'company_country' => 'required',
			'company_state' => 'required',
			'company_city' => 'required',
			'company_street' => 'required' ,
			'company_zip'  => 'required|numeric|digits:6' ,
			'company_fax' => 'required|numeric|digits:10' ,
			'company_phone' => 'required|numeric|digits:10',
			'home_country' => 'required',
			'home_state' => 'required',
			'home_city' => 'required',
			'home_street' => 'required' ,
			'home_zip'  => 'required|numeric|digits:6' ,
			'home_fax' => 'required|numeric|digits:10' ,
			'home_phone' => 'required|numeric|digits:10'
		];

		$usersProfile = new UsersProfileController();
		$usersProfile->validate($request, $rules, $messages);

		$employeeInsertStatus = Employees::saveUpdateData($request->all());
		$employeeAddressStatus = EmpAddress::saveUpdateAddress($request->all());

		if ($employeeInsertStatus == true && $employeeAddressStatus == true ) {
			$request->session()->flash('alert-success', 'User was successful Updated!');

			return redirect()->route("users_profile");
		} else {
			$request->session()->flash('alert-danger', 'something went wrong');

			return back();
		}

	}
}
