<?php

namespace App\Services\Weather;

use App\Constants\ResponseConstants;
use App\Constants\WeatherConstants;
use App\Libraries\OpenWeatherApiLibrary;

class WeatherService
{
    private $oApiLibrary;
    /**
     *
     */
    public function __construct(OpenWeatherApiLibrary $oApiLibrary)
    {
        $this->oApiLibrary = $oApiLibrary;
    }

    /**
     * retrieveWeather
     *
     * @param array $aParameters
     * @return array|null
     */
    public function retrieveWeather(array $aParameters)
    {
        $aWeatherParameter = [
            WeatherConstants::LATITUDE  => $aParameters['latitude'],
            WeatherConstants::LONGITUDE => $aParameters['longitude'],
            WeatherConstants::UNITS     => WeatherConstants::METRIC_UNITS,
            WeatherConstants::APP_ID    => env('OPENWEATHER_API_KEY')
        ];

        $aWeatherForecastResponse = $this->oApiLibrary->get5DayWeatherForecast($aWeatherParameter);
        if ($aWeatherForecastResponse[ResponseConstants::RESULTS] === ResponseConstants::FAILED_RESULT) {
            return $aWeatherForecastResponse;
        }

        $aWeatherCurrentResponse = $this->oApiLibrary->getCurrentWeather($aWeatherParameter);
        if ($aWeatherCurrentResponse[ResponseConstants::RESULTS] === ResponseConstants::FAILED_RESULT) {
            return $aWeatherCurrentResponse;
        }

        $aWeatherData = [
            'current' => $aWeatherCurrentResponse[ResponseConstants::DATA],
            'forecast' => $aWeatherForecastResponse[ResponseConstants::DATA]
        ];

        return [
            ResponseConstants::RESULTS => ResponseConstants::SUCCESS_RESULT,
            ResponseConstants::CODE    => 200,
            ResponseConstants::DATA    => $aWeatherData
        ];
    }
}
