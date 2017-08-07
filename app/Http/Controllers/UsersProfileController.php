<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\EmpAddress;

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

        if ($request->form_button_name == 'Cancel') {
            return redirect()->route('users_profile');
        }

        $messages = [
            'prefix.required' => '* Prefix is required',
            'fname.required' => '* First name is required',
            'lname.required' => '* Last name is required ', 
            'email.required' => '* Email is required',
            'marital-status.required' => '* Marital status required',
            'dob.required' => '* DOB is required',
            'image.required' => '* Image is required',
            'image.image' => '* File must be an image',
            'image.mimes' => '* Image should be jpeg,png,jpg,gif type',
            'company_name.required' => '* Comapny is required',
            'designation_name.required' => '* Designation is required',
            'company_country' => '* Country is required'


        ];

        $rules = [
            'prefix' => 'required',
            'fname' => 'required|alpha|min:2|max:40',
            'lname' => 'required|alpha|min:2|max:40',
            'mname' => 'alpha|min:2|max:40',
            'email' => 'required|email',
            'marital-status' => 'required', 
            'dob' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_name' => 'required',
            'designation_name' => 'required',
            'company_country' => 'required'
        ];

        $usersProfile = new UsersProfileController();
        $usersProfile->validate($request, $rules, $messages);

        $employeeInsertStatus = Employees::saveUpdateData($request->all());
        $employeeAddressStatus = EmpAddress::saveUpdateAddress($request);
        if ($employeeInsertStatus == true && $employeeAddressStatus == true ) {
            $request->session()->flash('alert-success', 'User was successful Updated!');
            return redirect()->route("users_profile");
        } else {
            $request->session()->flash('alert-danger', 'something goes wrong');
            return redirect()->route("edit_user");
        }

    }
}
