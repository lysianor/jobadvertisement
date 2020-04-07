<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'company' => 'Admin',
            'industry' => 'Advertising',
            'size' => '11-50 employees',
            'name' => 'Admin',
            'verified' => 1,
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'created_at' => '2020-04-05 19:16:02',
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'company' => 'Employer',
            'industry' => 'Advertising',
            'size' => '11-50 employees',
            'name' => 'Employer',
            'verified' => 1,
            'email' => 'employer@employer.com',
            'password' => bcrypt('password'),
            'created_at' => '2020-04-05 19:16:02',
        ]);
    }
}
