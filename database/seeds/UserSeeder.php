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

        $admin = Role::where('role', 'Admin')->first();
//        //Some fake data as example
//        $Admin = User::create([
//            'name' => '',
//            'email' => 'weebking@gmail.com',
//            'password' => Hash::make('Test1'),
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//        ]);
        $AdminT = new User;

        $AdminT -> name = "Admin Test";
        $AdminT -> email = "weebking@gmail.com";
        $AdminT -> password = Hash::make('admin');
        $AdminT -> email_verified_at = now();
        $AdminT -> remember_token = "Str::random(10)";
        $AdminT -> save();
        $AdminT->roles()->attach($admin);

        //Generate 3 users
        factory(App\User::class, 3)->create()->each(function ($role) {
            $standard = Role::where('role', 'User')->first();
            $role->save();
            $role->roles()->attach($standard);
        });
    }
}
