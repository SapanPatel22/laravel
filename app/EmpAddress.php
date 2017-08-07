<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employees;
use Log;

class EmpAddress extends Model {
    
	protected $table = 'address'; 

    public static function saveUpdateAddress($data) {
    	
    	try {
    		$employee = new Employees();
    		$empId = $employee::table('employee')
							->select('id')
							->where('email', $data['email'])
							->first();

			dd($empId);
    	} catch (\Exception $exception) {
    		Log::error('Error in saveUpdateAddress() -> ' . $exception->getMessage());
			return false;
    	}

    }
}
