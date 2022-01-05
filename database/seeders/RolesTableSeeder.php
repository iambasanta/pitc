<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $superAdminRole = Role::create([
            'name' => 'super-admin',
            'display_name' => 'Super Admin'
        ]);

        $blogManager = Role::create([
            'name' => 'blog-manager',
            'display_name' => 'Blog Manager'
        ]);

        $eventManager = Role::create([
            'name' => 'event-manager',
            'display_name' => 'Event Manager'
        ]);

        $memberManager = Role::create([
            'name' => 'member-manager',
            'display_name' => 'Member Manager'
        ]);

        // attach role to user
        $superAdmin = User::find(1);
        $superAdmin->attachRole($superAdminRole);

        $blogAdmin = User::find(2);
        $blogAdmin->attachRole($blogManager);

        $eventAdmin = User::find(3);
        $eventAdmin->attachRole($eventManager);
        
        $memberAdmin = User::find(4);
        $memberAdmin->attachRole($memberManager);
    }
}
