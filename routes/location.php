<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Location\LocationController::class, 'retrieveLocation']);
