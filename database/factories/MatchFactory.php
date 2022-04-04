<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'left_team_id' => function () { return \App\Models\Team::factory()->create()->id; },
            'left_team_score' => $this->faker->numberBetween(0, 7),
            'right_team_id' => function () { return \App\Models\Team::factory()->create()->id; },
            'right_team_score' => $this->faker->numberBetween(0, 7),
            'is_neutral' => $this->faker->boolean,
            'is_played' => $this->faker->boolean,
        ];
    }
}
