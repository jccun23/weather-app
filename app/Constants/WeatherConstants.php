<?php

namespace App\Constants;

class WeatherConstants
{
    public const LATITUDE = 'lat';

    public const LONGITUDE = 'lon';

    public const UNITS = 'units';

    public const METRIC_UNITS = 'metric';

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
