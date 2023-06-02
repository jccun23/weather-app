<?php

namespace App\Http\Controllers\Location;

use App\Constants\LocationConstants;
use App\Constants\ResponseConstants;
use App\Http\Controllers\Controller;
use App\Services\Location\LocationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    /**
     * @param Request $oRequest
     * @param LocationService $oService
     */
    public function __construct(Request $oRequest, LocationService $oService)
    {
        $this->oRequest = $oRequest;
        $this->oService = $oService;
    }

    /**
     * Handles the retrieving of location requests
     * @return JsonResponse
     */
    public function retrieveLocation(): JsonResponse
    {
        $aRequest = $this->oRequest->all();
        $oValidationResponse = Validator::make($aRequest, LocationConstants::VALIDATION_RULES);
        if ($oValidationResponse->errors()->isNotEmpty()) {
            return response()->json([
                ResponseConstants::RESULTS => ResponseConstants::FAILED_RESULT,
                ResponseConstants::CODE    => ResponseConstants::BAD_REQUEST_CODE,
                ResponseConstants::MESSAGE => $oValidationResponse->errors()
            ], ResponseConstants::BAD_REQUEST_CODE);
        }

        $aLocationResponse = $this->oService->getLocation($aRequest);
        return response()->json($aLocationResponse, $aLocationResponse[ResponseConstants::CODE]);
    }
}
