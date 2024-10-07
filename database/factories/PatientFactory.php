<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Patient::class;

    public function definition(): array
    {
        
        $bothFalse = $this->faker->boolean(30); 

        if ($bothFalse) {
            $death = false;
            $recovered = false;
        } else {            
            $death = $this->faker->boolean(20); 
            $recovered = !$death; 
        }

        return [
            'country_id' => null, 
            'full_name' => $this->faker->name,
            'id_number' => $this->faker->unique()->randomNumber(8),
            'death' => $death,
            'recovered' => $recovered,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
