<?php

//Get Controllers
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PatientController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/countries',[CountryController::class, 'list']); //Get a list of countries
Route::get('/run-seeder', [PatientController::class, 'runPatientSeeder']); //triggers seeder to mimic database movement
