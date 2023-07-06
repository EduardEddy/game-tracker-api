<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Guest;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lastname = fake()->lastName();
        return [
            'child_fullname' => fake()->name().' '.$lastname,
            'child_description' => fake()->colorName(),
            'parent_fullname' =>fake()->name().' '.$lastname,
            'cellphone' => fake()->PhoneNumber()
        ];
    }
}
