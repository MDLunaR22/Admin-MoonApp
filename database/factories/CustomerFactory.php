<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Customer::class;

    public function definition(): array
    {
        return [
            "name"=> $this->faker->name(),
            "surname"=> $this->faker->lastName(),
            "code"=> $this->faker->unique()->bothify('???###'),
            "email"=> $this->faker->email(),
            "password"=> $this->faker->password(),
            "phone"=> $this->faker->phoneNumber(),
        ];
    }
}
