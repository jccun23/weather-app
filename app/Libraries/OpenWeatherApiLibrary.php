<?php

namespace App\Libraries;

use App\Constants\ResponseConstants;
use App\Constants\WeatherConstants;
use Illuminate\Support\Facades\Http;

class OpenWeatherApiLibrary
{
    use ResponseTrait;

    /**
     * Retrieves the weather forecast for the selected location
     * @param $aWeatherParameters
     * @return array
     */
    public function get5DayWeatherForecast($aWeatherParameters): array
    {
        $aQueryParameter = http_build_query($aWeatherParameters);
        $oResponse = Http::withHeaders($this->authHeaders())->get(env('OPENWEATHER_FORECAST_API_URL') . '?' . $aQueryParameter);
        $aResponseData = $oResponse->json();
        if($aResponseData[WeatherConstants::COD] !== '200') {
            return $this->failedResponse((int)$aResponseData[WeatherConstants::COD], $aResponseData[ResponseConstants::MESSAGE]);
        }

        return $this->successResponse($aResponseData['list']);
    }

    /**
     * Retrieve current weather data of selected location
     * @param $aWeatherParameters
     * @return array
     */
    public function getCurrentWeather($aWeatherParameters): array
    {
        $aQueryParameter = http_build_query($aWeatherParameters);
        $oResponse = Http::withHeaders($this->authHeaders())->get(env('OPENWEATHER_CURRENT_API_URL') . '?' . $aQueryParameter);
        $aResponseData = $oResponse->json();
        if(array_key_exists(WeatherConstants::COD, $aWeatherParameters) === true) {
            return $this->failedResponse((int)$aResponseData[WeatherConstants::COD], $aResponseData[ResponseConstants::MESSAGE]);
        }

        return $this->successResponse($aResponseData);
    }

    /**
     * Http heather for the openweather api request
     * @return string[]
     */
    private function authHeaders()
    {
        return [
            'accept' => 'application/json'
        ];
    }
}
