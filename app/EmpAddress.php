<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employees;
use Log;

class EmpAddress extends Model {
  
	protected $table = 'address'; 
	protected $fillable = ['street', 'zip' , 'phone' , 'type' , 'fk_employee_id', 'fk_city_id', 'fax'];

	public static function getUser($id) {
		$user = Employees::where('id', $id)->first();

		return $user;
	}

	public static function saveUpdateAddress($data) {
		  
		try {
			$employee = new Employees();
			$empId = $employee->select('id')
							->where('email', $data['email'])
							->first();

			$empAdrdess = EmpAddress::updateOrCreate(['fk_employee_id' => $empId['id'], 'type' => 'company'], ['street' => $data['company_street'], 'zip' => $data['company_zip'], 'fax' => $data['company_fax'] ,'phone' => $data['company_phone'],'fk_city_id' => $data['company_city']]
			);

			$empAddressHome = EmpAddress::updateOrCreate(['fk_employee_id' => $empId['id'], 'type' => 'home'], ['street' => $data['home_street'], 'zip' => $data['home_zip'], 'fax' => $data['home_fax'] ,'phone' => $data['home_phone'],'fk_city_id' => $data['home_city']]	
			);

			return true;

		}
		 catch (\Exception $exception) {
			dd($exception);
			Log::error('Error in saveUpdateAddress() -> ' . $exception->getMessage());

			return false;
		}
	}
}
