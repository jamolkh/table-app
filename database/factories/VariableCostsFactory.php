<?php

namespace Database\Factories;

use App\Models\VariableCosts;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariableCostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VariableCosts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle(),
            'amount' => $this->faker->numberBetween($min = 100000, $max = 10000000),
        ];
    }
}
