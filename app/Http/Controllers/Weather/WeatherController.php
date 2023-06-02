<?php

namespace App\Http\Controllers\Weather;

use App\Constants\ResponseConstants;
use App\Constants\WeatherConstants;
use App\Http\Controllers\Controller;
use App\Services\Weather\WeatherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WeatherController extends Controller
{

    /**
     * WeatherController Constructor
     *
     * @param Request $oRequest
     * @param WeatherService $oService
     * @return void
     */
    public function __construct(Request $oRequest, WeatherService $oService)
    {
        $this->oRequest = $oRequest;
        $this->oService = $oService;
    }

    /**
     * Handles the retrieving of the weather
     */
    public function retrieveWeather()
    {
        $aRequest = $this->oRequest->all();
        $oValidationResult = Validator::make($aRequest, WeatherConstants::VALIDATION_RULES);
        if ($oValidationResult->errors()->isNotEmpty()) {
            return response()->json([
                ResponseConstants::RESULTS => ResponseConstants::FAILED_RESULT,
                ResponseConstants::MESSAGE => $oValidationResult->errors()
            ], 400);
        }

        $aResult = $this->oService->retrieveWeather($aRequest);
        return response()->json($aResult, $aResult[ResponseConstants::CODE]);
    }
}
