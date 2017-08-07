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
            'lname.required' => '* Last name is required ', 
            'email.required' => '* Email is required',
            'pass.required' => '* Password required',
            'pass.min' => '* Password must be between 8 to 12',
            'pass.max' => '* Password must be between 8 to 12',
            'gender.required' => '* Gender is required',
            'marital-status.required' => '* Marital status is required',
            'company-name.required' =>'* Company is required',
            'designation-name.required' => '* Designation is required',
            'office-country.required' => '* Country is required',
            'office-state.required' => '* State is required',
            'office-city.required' => '* City is required',
            'office-street.required' => '* Street is required',
            'office-zip.required' => '* zip is required',
            'office-zip.regex' => '* zip must contains 6 digit',
            'office-phone' => '* Phone Number is required',
            'office-phone.regex' => '* Phone number must contains 10 digit',
            'home-country.required' => '* Country is required',
            'home-country.required' => '* State is required',
            'home-country.required' => '* City is required',
            'home-country.required' => '* Street is required',
            'home-zip.required' => '* zip is required',
            'home-zip.regex' => '* zip must contains 6 digit',
            'home-phone' => '* Phone Number is required',
            'home-phone.regex' => '* Phone number must contains 10 digit',
            'fileToUpload.required' => '* Profile Pictute is required'
        ];

        $rules = [
            'prefix' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'pass' => 'required|min:6|max:15',
            'email' => 'required|email',
            // 'gender' => 'required|in:M,F',
            // 'marital-status' => 'required',
            // 'company-name' => 'required',
            // 'designation-name' => 'required',
            // 'office-country' => 'required',
            // 'office-state' => 'required',
            // 'office-city' => 'required',
            // 'office-street' => 'required',
            // 'office-zip' => 'required|regex:/[0-9]{6}/',
            // 'office-phone' => 'required|regex:/[0-9]{10}/',
            // 'home-country' => 'required',
            // 'home-state' => 'required',
            // 'home-city' => 'required',
            // 'home-street' => 'required',
            // 'home-zip' => 'required|regex:/[0-9]{6}/',
            // 'home-phone' => 'required|regex:/[0-9]{10}/',
            // 'fileToUpload' => 'required'
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
