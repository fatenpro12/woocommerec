<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate(['name' => 'admin','guard_name'=>'web']);
        $role = Role::firstOrCreate(['name' => 'vendor','guard_name'=>'web']);
        $role = Role::firstOrCreate(['name' => 'client','guard_name'=>'web']);
        $role = Role::firstOrCreate(['name' => 'company','guard_name'=>'web']);
    }
}
