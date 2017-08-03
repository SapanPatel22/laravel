<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Employees extends Authenticatable
{
	use Notifiable;

	protected $guarded = array();
	protected $table = 'employee'; // table name
	public $timestamps = 'false' ; // to disable default timestamp fields
 
	// model function to store form data to database
	public static function saveFormData($data)
	{
		try {
			$employee = new Employees;
			$employee->prefix =Input::get('prefix');
			$employee->first_name =Input::get('fname');
			$employee->middle_name =Input::get('mname');
			$employee->last_name =Input::get('lname');
			$employee->email =Input::get('email');
			$password = Input::get('pass'); 
			$employee->password = Hash::make($password);
			$employee->save();

			return true;
		}
		catch (\Illuminate\Database\QueryException $exception) {
			$errorInfo = $exception->errorInfo;
			return false;
		}
	}

	public static function validateUser($data) {

		$validate_user = DB::table('employee')
							->select('password')
							->where('email', $data['email'])
							->first();
		if($validate_user != null) {
			if(Hash::check($data['pass'],  $validate_user->password)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
		
	}

	public static function getUser($id) {
		$user = DB::table('employee')->where('id', $id)->first();
		
		return $user;
	}

	public static function getAllUser() {
		$allUser = DB::table('employee')->get(); 
		return $allUser;
	}

	public static function deleteUser($id) {
		$userDeleted = DB::table('employee')->where('id', $id)->delete();
		if($userDeleted) {
			return true;
		} else {
			return false;
		}
	}

	public static function saveUpdateData($data) {
		try {
			$response = DB::table('employee')
            ->where('email', $data[0]['email'])
            ->update(['prefix' => $data[0]['prefix'],'first_name' => $data[0]['fname'],'middle_name' => $data[0]['mname'] ,'last_name' => $data[0]['lname']]);
            if($response) {
            	return true;
            } else {
            	return false;
            }
		}
		catch (\Illuminate\Database\QueryException $exception) {
			$errorInfo = $exception->errorInfo;
			return false;
		}
	}
}
