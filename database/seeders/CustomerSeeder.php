<?php

namespace Database\Seeders;

use App\Enums\RolePermissionEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::factory()->count(3)->create();
        foreach ($users as $user){
            $user->assignRole(RolePermissionEnum::ROLE_CUSTOMER);
            $user->givePermissionTo(RolePermissionEnum::PERMISSION_CUSTOMER);
        }

    }
}
