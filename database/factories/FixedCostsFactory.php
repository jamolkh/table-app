<?php

namespace Database\Factories;

use App\Models\FixedCosts;
use Illuminate\Database\Eloquent\Factories\Factory;

class FixedCostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FixedCosts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'amount' => $this->faker->numberBetween(1, 5) * 1000000,
        ];
    }
}
