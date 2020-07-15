<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('RoleTableSeeder');
        factory(App\Models\Account::class, 10)->create();


        $roles = App\Models\Role::all();

        App\Models\Account::all()->each(function ($account) use ($roles) {
            $account->roles()->attach(
                $roles->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
