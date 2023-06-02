<?php

namespace App\Libraries;

use App\Constants\LocationConstants;
use App\Constants\ResponseConstants;
use Illuminate\Support\Facades\Http;

class FourSquareApiLibrary
{
    use ResponseTrait;

    /**
     * Retrieve location using foursquare api
     * @param $aParameters
     * @return array
     */
    public function getLocationDetails($aParameters): array
    {
        $aLocationParameters = http_build_query($aParameters);
        $oResponse = Http::withHeaders($this->authHeaders())->get(env('FOURSQUEARE_API_URL') .'?' . $aLocationParameters);
        $aResponse = $oResponse->json();
        if (array_key_exists(ResponseConstants::MESSAGE, $aResponse) === true) {
            return $this->failedResponse(ResponseConstants::BAD_REQUEST_CODE, 'Location Invalid');
        }

        return $this->successResponse($aResponse[LocationConstants::CONTEXT][LocationConstants::GEO_BOUNDS][LocationConstants::CIRCLE][LocationConstants::CENTER]);
    }

    /**
     * Auth headers for the foursquare api request
     * @return array
     */
    private function authHeaders(): array
    {
        return [
            'Accept'        => 'application/json',
            'Authorization' => env('FOURSQUARE_API_KEY')
        ];
    }
}
