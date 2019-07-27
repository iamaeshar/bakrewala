<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Category;
use App\Profile;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name' => 'user',
        	'description' => ' Customer Role'
        ]);

        Role::create([
        	'name' => 'admin',
        	'description' => 'Admin Role'
        ]);

        $user = User::create([
        	'role_id' => '2',
        	'email' => 'admin@bakrewala.in',
        	'password' => Hash::make('secret')
        ]);

        Profile::create([
            'user_id' => $user->id
        ]);
    }
}
