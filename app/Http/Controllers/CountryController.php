<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    public function list(): JsonResponse {
        $countries = Country::with('patients')->get();

        //map country names, total patients, patients that passed and patients that recovered 
        $countryData = $countries->map(function($country) {
            // Count total patients
            $totalPatients = $country->patients->count();

            // Count patients where 'death' flag is true
            $deathCount = $country->patients->where('death', true)->count();

            // Count patients where 'recovered' flag is true
            $recoveredCount = $country->patients->where('recovered', true)->count();

            // Return the country with the additional patient data
            return [
                'country' => $country->name,
                'country_code' => $country->code,
                'patients' => [
                    'total' => $totalPatients,
                    'death' => $deathCount,
                    'recovered' => $recoveredCount
                ]
            ];
        });
        
        return response()->json($countryData);
    }
}
