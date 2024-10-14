<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class PatientController extends Controller
{
    public function runPatientSeeder() {
        Artisan::call('db:seed', ['--class' => 'PatientSeeder']);

        return response()->json(['message' => 'Patient seeder has been triggered successfully']);
    }
}
