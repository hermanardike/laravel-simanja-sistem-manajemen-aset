<?php

namespace Database\Factories;

use App\Models\Os;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Os>
 */
class OsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            Os::create([

                'os_name' =>fake()->name,
            ])
        ];
    }
}
