<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'duration' => $this->faker->numberBetween(2, 50),
            'recipe_id' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->realText
        ];
    }
}
