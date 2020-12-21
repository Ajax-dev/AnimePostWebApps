<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Generate 7 users
        factory(App\User::class, 7)->create()->each(function ($role) {
            $role->save();
            $role->roles()->attach(rand(1,4));
        });
    }
}
