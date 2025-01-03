<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */


class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition() {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), 
            'role' => 'cliente',
            'remember_token' => Str::random(10),
        ];
    }

    public function admin() {
        return $this->state([
            'role' => 'admin',
        ]);
    }
}
