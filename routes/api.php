<?php

//Get Controllers
use App\Http\Controllers\CountryController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/countries',[CountryController::class, 'list']); //Get a list of countries

