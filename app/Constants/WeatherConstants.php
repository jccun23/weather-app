<?php

namespace App\Constants;

class WeatherConstants
{
    /**
     * Latitude parameter of openweather api
     */
    public const LATITUDE = 'lat';

    /**
     * Longitude parameter of openweather api
     */
    public const LONGITUDE = 'lon';

    /**
     * Unit parameter of openweather api
     */
    public const UNITS = 'units';

    /**
     * Metric unit
     */
    public const METRIC_UNITS = 'metric';

    /**
     * App id parameter for openweather api
     */
    public const APP_ID = 'appid';

    /**
     * Open weather api response code parameter
     */
    public const COD = 'cod';

    /**
     * Validation rules for the weather parameter api
     */
    public const VALIDATION_RULES = [
        'latitude'  => ['required'],
        'longitude' => ['required']
    ];

}
