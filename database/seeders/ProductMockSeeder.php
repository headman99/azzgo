<?php

namespace Database\Seeders;

use App\Models\Pricelist;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductMockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
php      */
    public function run()
    {
        Product::factory()->has(Pricelist::factory()->count(1))->count(50)->create(['storeid'=>'e4d3ea32-ce44-44a1-ac76-841f74868c6c']);
    }
}
