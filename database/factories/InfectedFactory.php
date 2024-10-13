<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InfectedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Patient::class;

    public function definition(): array
    {
        return [
                'country_id' => null, 
                'full_name' => $this->faker->name,
                'id_number' => $this->faker->unique()->randomNumber(8),
                'death' => false,
                'recovered' => false,
                'created_at' => now(),
                'updated_at' => now(),
        ];
    }
}
