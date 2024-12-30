<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void {

        //10 users
        User::factory(10)->create();

        //admin user
        User::factory()->admin()->create([
            'name' => 'Admin',
            'password' => 'Admin123',
        ]);
    }
}
