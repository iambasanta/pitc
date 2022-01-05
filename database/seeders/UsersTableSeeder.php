<?php

namespace Database\Seeders;

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
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@pitc.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Blog Admin',
                'email' => 'blogadmin@pitc.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Event Admin',
                'email' => 'eventadmin@pitc.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Member Admin',
                'email' => 'memberadmin@pitc.com',
                'password' => bcrypt('password'),
            ],
        ]);
    }
}
