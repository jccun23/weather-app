<?php

use App\Http\Controllers\Weather\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/forecast', [WeatherController::class, 'retrieveWeather']);
