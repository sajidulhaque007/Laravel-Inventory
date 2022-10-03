<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {     
            return [
                'user_id' => User::all()->random()->id,
                'date_of_birth' => fake()->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'image' => fake()->text(),
                'status' => fake()->randomElement(['active' ,'inactive',]),
            ];
      
    }
}
