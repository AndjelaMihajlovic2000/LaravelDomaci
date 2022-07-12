<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'recipe_id' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->numberBetween(1, 50) . " ml"
        ];
    }
}
