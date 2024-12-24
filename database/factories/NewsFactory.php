<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;


class NewsFactory extends Factory
{
    protected $model = News::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(2),
            'date' => $this->faker->date(),
            //'image' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
