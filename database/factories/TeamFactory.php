<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
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
            'acronym' => $this->faker->lexify('???'),
            'overall' => $this->faker->numberBetween(1, 100),
        ];
    }
}
