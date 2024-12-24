<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PreviousGame;
use App\Models\Game;


class PreviousGameFactory extends Factory
{
    protected $model = PreviousGame::class;

    public function definition(): array
    {
        return [
            'game_id' => Game::factory(),
            'team_a' => $this->faker->company(),
            'team_b' => $this->faker->company(),
            'score_a' => $this->faker->numberBetween(0,10),
            'score_b' => $this->faker->numberBetween(0,10),
            'game_date' => $this->faker->dateTimeBetween('-5 months', 'now'),
        ];
    }
}
