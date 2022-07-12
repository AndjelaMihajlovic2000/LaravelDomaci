<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
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
            'author' => $this->faker->name,
            'publish_date' => $this->faker->date(),
            'description' => $this->faker->realText
        ];
    }
}
