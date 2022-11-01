<?php

namespace Database\Seeders;

use App\Enums\RolePermissionEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = Role::findOrCreate(RolePermissionEnum::ROLE_ADMIN);
        $permission = Permission::findOrCreate(RolePermissionEnum::PERMISSION_ADMIN);

        $role = Role::findOrCreate(RolePermissionEnum::ROLE_CUSTOMER);
        $permission = Permission::findOrCreate(RolePermissionEnum::PERMISSION_CUSTOMER);

        $role = Role::findOrCreate(RolePermissionEnum::ROLE_PUBLISHER);
        $permission = Permission::findOrCreate(RolePermissionEnum::PERMISSION_PUBLISHER);

    }
}
