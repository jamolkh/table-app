<?php

namespace Database\Factories;

use App\Models\Cost;
use Illuminate\Database\Eloquent\Factories\Factory;

class CostFactory extends Factory
{
    public $type = ['variable', 'fixed'];
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cost::class;

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
            'type' => $this->type[rand(0,1)],
        ];
    }
}
