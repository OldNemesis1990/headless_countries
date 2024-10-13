<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Patient;
use Database\Factories\InfectedFactory;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds with artisan: php artisan db:seed --class=PatientSeeder
     */
    public function run(): void
    {
        $countries = Country::all();

        foreach ($countries as $country) {
            // Add 3 to 6 new patients for each country
            Patient::factory(InfectedFactory::class)
                ->count(rand(6, 15))
                ->create([
                    'country_id' => $country->id,
                ]);

            // Update previous patients with random death or recovered flags
            $eligiblePatients = Patient::where('country_id', $country->id)
                ->where('death', false)
                ->where('recovered', false)
                ->inRandomOrder() // Randomize the order of patients
                ->limit(rand(2, 3)) // Limit the selection to 2-3 patients
                ->get();

            foreach ($eligiblePatients as $patient) {
                // Randomly update either death or recovered but not both
                if (fake()->boolean(50)) {
                    $patient->update(['death' => true]);
                } else {
                    $patient->update(['recovered' => true]);
                }
            }
        }
    }
}
