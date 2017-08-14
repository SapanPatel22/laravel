<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

	public function hasPermissions() {

		return $this->fk_resources_id;
	}
    
}
