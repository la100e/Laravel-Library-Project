<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'isbn' => $this->faker->isbn10(),
            // 'titre' => $this->faker->sentence(3),
            // 'prix' => $this->faker->randomNumber(3),
            // 'quantite' => $this->faker->randomNumber(),
            // 'description' => $this->faker->text(10),
        ];
    }
}
