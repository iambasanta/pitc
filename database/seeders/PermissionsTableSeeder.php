<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $crudAdminUser = Permission::create([
            'name' => 'crud-admin',
            'display_name' => 'CRUD Admin'
        ]);

        $crudCategory = Permission::create([
            'name' => 'crud-category',
            'display_name' => 'CRUD Category'
        ]);

        $crudBlog = Permission::create([
            'name' => 'crud-post',
            'display_name' => 'CRUD Post'
        ]);

        $crudEvent = Permission::create([
            'name' => 'crud-event',
            'display_name' => 'CRUD Event'
        ]);

        $crudMember = Permission::create([
            'name' => 'crud-member',
            'display_name' => 'CRUD Member'
        ]);

        // getting roles
        $superAdmin = Role::where('name', 'super-admin')->first();
        $blogManager = Role::where('name', 'blog-manager')->first();
        $eventManager = Role::where('name', 'event-manager')->first();
        $memberManager = Role::where('name', 'member-manager')->first();

        // assigin permissions to role
        $superAdmin->attachPermissions([$crudAdminUser, $crudCategory, $crudBlog, $crudEvent, $crudMember]);
        $blogManager->attachPermissions([$crudCategory, $crudBlog]);
        $eventManager->attachPermission($crudEvent);
        $memberManager->attachPermission($crudMember);

    }
}
