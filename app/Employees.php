<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Log;

class Employees extends Authenticatable
{
	use Notifiable;

	protected $guarded = array();
	protected $table = 'employee'; 
	public $timestamps = 'false' ; 
	
	public function address() {
		return $this->hasMany('App\EmpAddress', 'fk_employee_id');
	}

	public function hasRoles() {
		return $this->hasOne('App\Role', 'fk_roles_id', 'id')->withDefault([
					'fk_roles_id' => '1',
			]);
	}

	public function isAdmin() {
		if ($this->fk_roles_id == 2) {
			return true;
		}

		return false;
	}

	public function isItAdmin() {
		if($this->fk_roles_id == 3) {
			return true;
		}

		else false;
	}

	public function isSuperAdmin() {
		if($this->fk_roles_id == 4) {
			return true;
		}

		return false;
	}

	public static function saveFormData($data) {
		try {
			$employee = new Employees;
			$employee->prefix = $data['prefix'];
			$employee->first_name = $data['fname'];
			$employee->middle_name = $data['mname'];
			$employee->last_name = $data['lname'];
			$employee->email = $data['email'];
			$employee->password = Hash::make($data['pass']);

			if(isset($data['roles'])) {
				$employee->fk_roles_id = $data['roles'];
			}

			$employee->save();

			return true;
		}
		catch (\Exception $exception) {
			Log::error($exception->getMessage());

			return false;
		}
	}

	public static function validateUser($data) {

		$validate_user =Employees::select('password')
							->where('email', $data['email'])
							->first();
							
		if ($validate_user != null) {
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
		$user = Employees::where('id', $id)->first();
		
		return $user;
	}

	public static function getAllUser() {
		$allUser = Employees::get(); 
		
		return $allUser;
	}

	public static function deleteUser($id) {
		$userDeleted =Employees::where('id', $id)->delete();

		if ($userDeleted) {
			return true;
		} else {
			return false;
		}
	}

	public static function saveUpdateData($data) {

		$image = $data['image'];
		$imageName = time() . $image->getClientOriginalName();
		$destinationPath = public_path('/images/');
		$movedImage = $image->move($destinationPath, $imageName);

		try {
			$response = Employees::where('email', $data['email'])
						->update([
							'prefix' => $data['prefix'],
							'first_name' => $data['fname'],
							'middle_name' => $data['mname'],
							'last_name' => $data['lname'],
							'marital_status' => $data['marital-status'],
							'dob' => $data['dob'],
							'photo_path' => $imageName,
							'fk_company_id' => $data['company_name'],
							'fk_role_id' => $data['designation_name']
						]);

			if ($response) {
				return true;
			} else {
				return false;
			}
		} catch (\Exception $exception) {
			Log::error('Error in saveUpdateData() -> ' . $exception->getMessage());

			return false;
		}
	}

	public function hasAnyAdminstrativeRole($roles) {

		if (is_array($roles)) {
			foreach ($roles as $role) {
				if ($this->hasRole($role)) {
					return true;
				}
			}
		} else {
			if ($this->hasRole($role)) {
				return true;
			}
		}

		return false;
	}

	public function hasRole($role) {
		
		if ($this->administrativeRole()->where('name', $role)) {
			return true;
		}

		return false;
	}

	public static function saveUpdateRole($data) {
		try {
			$response = Employees::where('email', $data['email'])
						->update([
							'prefix' => $data['prefix'],
							'first_name' => $data['fname'],
							'middle_name' => $data['mname'],
							'last_name' => $data['lname'],
							'fk_roles_id' => $data['roles']
						]);

			if ($response) {
				return true;
			} else {
				return false;
			}
		} catch (\Exception $exception) {
			Log::error('Error in saveUpdateData() -> ' . $exception->getMessage());

			return false;
		}
	}
}
