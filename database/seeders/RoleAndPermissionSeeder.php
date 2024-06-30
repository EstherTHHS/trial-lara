<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin       = Role::create(['name' => 'admin']);
        $user        = Role::create(['name' => 'user']);

        $user_list   = Permission::create(['name' => 'userList']);
        $user_show   = Permission::create(['name' => 'userShow']);
        $user_create = Permission::create(['name' => 'userCreate']);
        $user_update = Permission::create(['name' => 'userUpdate']);
        $user_delete = Permission::create(['name' => 'userDelete']);


        $categoryList   = Permission::create(['name' => 'categoryList']);
        $categoryCreate = Permission::create(['name' => 'categoryCreate']);
        $categoryShow   = Permission::create(['name' => 'categoryShow']);
        $categoryUpdate = Permission::create(['name' => 'categoryUpdate']);
        $categoryDelete = Permission::create(['name' => 'categoryDelete']);

        $dashboardList = Permission::create(['name' => 'dashboardList']);
        $getCategoryCsv = Permission::create(['name' => 'getCategoryCsv']);

        $admin->givePermissionTo([
            $user_list,
            $user_show,
            $user_create,
            $user_update,
            $user_delete,
            $categoryList,
            $categoryCreate,
            $categoryShow,
            $categoryUpdate,
            $categoryDelete,
            $dashboardList,
            $getCategoryCsv


        ]);
        $user->givePermissionTo([
            $user_list,
            $categoryList,
            $categoryCreate,
            $categoryShow,
            $categoryUpdate,
            $categoryDelete,
            $dashboardList,
        ]);
    }
}
