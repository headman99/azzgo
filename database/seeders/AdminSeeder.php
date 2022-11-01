<?php

namespace Database\Seeders;

use App\Enums\RolePermissionEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::factory()->count(1)->create();
        foreach ($users as $user) {
            $user->assignRole(RolePermissionEnum::ROLE_ADMIN);
            $user->givePermissionTo(RolePermissionEnum::PERMISSION_ADMIN);
        }
    }
}
