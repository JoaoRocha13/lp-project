<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    protected $model = \App\Models\Game::class;

    public function definition()
    {
        return [
            'team_a' => $this->faker->company(), // Nome fictício para o Time A
            'team_b' => $this->faker->company(), // Nome fictício para o Time B
            'game_date' => $this->faker->dateTimeBetween('now', '+5 months'), // Data de jogo futura
            'local' => $this->faker->city(), // Local do jogo
            'ticket_price' => $this->faker->randomFloat(2, 2, 50), // Preço do ticket (2 casas decimais, entre 5 e 100)
            'tickets_available' => $this->faker->numberBetween(10, 1000), // Quantidade de tickets disponíveis
        ];
    }
}
