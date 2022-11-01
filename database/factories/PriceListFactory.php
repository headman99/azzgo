<?php

namespace Database\Factories;

use App\Models\Pricelist;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pricelist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'productid' => Product::factory(),
            'price' => $this->faker->numberBetween(2, 25)
        ];
    }
}
