<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $roles  = ['student', 'admin', 'teacher'];
        foreach ($roles as $index => $role_name) {
            $role = new \App\Models\Role();
            $role->name = $role_name;
            $role->save();
        }
    }
}
