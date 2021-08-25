<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $role = \App\Models\Role::where('name', 'admin')->first();
        $user = new User();
        $user->firstname = 'ESEFA';
        $user->lastname = 'ADMIN';
        $user->email = 'admin@pfe.ma';
        $user->phoneNumber = '+212 000 000 00 ';
        $user->password = Hash::make('123456789');
        $user->role_id = $role->id;
        $user->profile_photo_path='/storage/user/user.png';
        $user->save();

        $admin = new Admin();
        $admin->user_id = $user->id;
        $admin->CIN = 'jh234567';
        $admin->birthday = '1981-06-10';
        $admin->Addres = 'somme where';
        $admin->save();
    }
}
