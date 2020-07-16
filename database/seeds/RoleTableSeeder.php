<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'ROLE_ADMIN';
        $role_employee->save();

        $role_employee = new Role();
        $role_employee->name = 'ROLE_SELLER';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'ROLE_USER';
        $role_manager->save();
    }
}
