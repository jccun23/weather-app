<?php

namespace App\Constants;

class LocationConstants
{
    /**
     * Near parameter of foursquare api
     */
    public const NEAR = 'near';

    /**
     * Categories parameter of foursquare api
     */
    public const CATEGORIES = 'categories';

    /**
     * City category id of foursquare api
     */
    public const CITY_CATEGORY = '16062';

    /**
     * Context parameter of foursquare api
     */
    public const CONTEXT = 'context';

    /**
     * Geo bounds parameter of foursquare api
     */
    public const GEO_BOUNDS = 'geo_bounds';

    /**
     * Circle parameter of foursquare api
     */
    public const CIRCLE = 'circle';

    /**
     *Center parameter of foursquare api
     */
    public const CENTER = 'center';

    /**
     * Validation rules for the location api
     */
    public const VALIDATION_RULES = [
        'near'  => ['required']
    ];
}
