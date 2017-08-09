<?php

use Illuminate\Database\Seeder;
use App\AdminstrativeRole;
class AdministrativeRoleTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
     
     $administrativeRoleUser = new AdminstrativeRole();
     $administrativeRoleUser->name = 'user';
     $administrativeRoleUser->description = 'A normal user';
     $administrativeRoleUser->save();

     $administrativeRoleAdmin = new AdminstrativeRole();
     $administrativeRoleAdmin->name = 'admin';
     $administrativeRoleAdmin->description = 'An Admin';
     $administrativeRoleAdmin->save();
    }
}
