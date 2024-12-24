<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PreviousGame;

class PreviousGameSeeder extends Seeder
{
    
    public function run(): void
    {
        PreviousGame::factory()->count(10)->create();
    }
}
