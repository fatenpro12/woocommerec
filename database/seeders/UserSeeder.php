<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        $superuser_id = \DB::table('users')->insertGetId([
            'name' => 'Super',
            'email' => 'admin@admin.io',
            'password' => bcrypt('123456'),
            'mobile'=> '015454545',

            //  'confirmed_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $superuser_role = Role::whereName('admin')->first();

        if ($superuser_role) {
            $superuser_role->users()->attach($superuser_id);
        }
    }
}
