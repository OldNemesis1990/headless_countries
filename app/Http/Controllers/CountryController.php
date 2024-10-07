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
            $totalPatients = $country->patients()->count();

            $deathCount = $country->patients->where('death', true)->count();
            
            $recoveredCount = $country->patients->where('recovered', true)->count();
            
            $infectedPatients = $country->patients
            ->where('death', false)
            ->where('recovered', false)
            ->count();

            // Return the country with patient status count
            return [
                'country_id' => $country->id,
                'country' => $country->name,
                'country_code' => $country->code,
                'patients' => [
                    'total_reports' => $totalPatients,
                    'infected' => $infectedPatients,
                    'death' => $deathCount,
                    'recovered' => $recoveredCount
                ]
            ];
        });
        
        return response()->json($countryData);
    }
}
