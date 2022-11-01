<?php

namespace Database\Seeders;

use App\Enums\RolePermissionEnum;
use App\Enums\StoreCategoriesEnum;
use App\Models\Store;
use App\Models\User;
use Faker\Factory;
use Faker\Generator;
use Faker\Provider\en_US\Person;
use Faker\Provider\en_US\Address;
use Faker\Provider\en_US\PhoneNumber;
use Faker\Provider\Lorem;
use Faker\Provider\Internet;
use Faker\Provider\it_IT\Payment;
use Faker\Provider\it_IT\Company;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
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
            $user->assignRole(RolePermissionEnum::ROLE_PUBLISHER);
            $user->givePermissionTo(RolePermissionEnum::PERMISSION_PUBLISHER);
            $faker = new Generator();
            $faker->addProvider(new Person($faker));
            $faker->addProvider(new Address($faker));
            $faker->addProvider(new PhoneNumber($faker));
            $faker->addProvider(new Company($faker));
            $faker->addProvider(new Lorem($faker));
            $faker->addProvider(new Internet($faker));
            $faker->addProvider(new Payment($faker));
            Store::create([
                'iduser' => $user->id,
                'businessname' => $faker->company,
                'vatnumber' => $faker->vatId(),
                'nickname' => $faker->name,
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'categorycode' => $faker->randomElement([StoreCategoriesEnum::SHOPPING, StoreCategoriesEnum::SERVICE, StoreCategoriesEnum::FOOD]),
            ]);
        }

    }
}
