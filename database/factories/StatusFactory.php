<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=status>
 */
class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Status::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(1),
            'description' => $this->faker->paragraph(1),
            'order' => $this->faker->randomDigit(),
        ];
    }
}
