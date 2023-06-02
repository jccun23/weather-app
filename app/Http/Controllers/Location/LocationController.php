<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Services\Location\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * __construct
     *
     * @param Request $oRequest
     * @param LocationService $oService
     */
    public function __construct(Request $oRequest, LocationService $oService)
    {
        $this->oRequest = $oRequest;
        $this->oService = $oService;
    }

    public function retrieveLocation()
    {

    }
}
