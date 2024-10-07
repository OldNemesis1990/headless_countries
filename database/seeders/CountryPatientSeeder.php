<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Patient;

class CountryPatientSeeder extends Seeder
{
    /**
     * Run the database seeds. wit artisan: php artisan db:seed --class=CountryPatientSeeder
     */
    public function run(): void
    {
        // Get all countries
        $countries = Country::all();

        foreach ($countries as $country) {
            // Create random patients from PatientFactory
            Patient::factory()
                ->count(rand(5, 25))
                ->create([
                    'country_id' => $country->id,
                ]);
        }
    }
}
