<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Enums\Role as RoleEnum;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_manager = new Role();
        $role_manager->name = RoleEnum::ROLE_USER;
        $role_manager->save();

        $role_employee = new Role();
        $role_employee->name = RoleEnum::ROLE_SELLER;
        $role_employee->save();

        $role_employee = new Role();
        $role_employee->name = RoleEnum::ROLE_ADMIN;
        $role_employee->save();
    }
}
