<?php

namespace Database\Seeders;

use App\Enums\StoreCategoriesEnum;
use App\Models\StoreCategory;
use Illuminate\Database\Seeder;

class StoreCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoreCategory::create([
            'code' => StoreCategoriesEnum::SERVICE,
            'description' => 'Servizi',
        ]);
        StoreCategory::create([
            'code' => StoreCategoriesEnum::FOOD,
            'description' => 'Food',
        ]);
        StoreCategory::create([
            'code' => StoreCategoriesEnum::SHOPPING,
            'description' => 'Shopping',
        ]);
    }
}
