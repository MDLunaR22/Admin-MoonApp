<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "tracking"=> $this->faker->text(10),
            "weight"=> $this->faker->randomFloat(2, 1, 100),
            "description"=> $this->faker->paragraph(1),
            "status_id"=> $this->faker->numberBetween(1, 50),
            "customer_id"=> $this->faker->numberBetween(1, 10),
        ];
    }
}
