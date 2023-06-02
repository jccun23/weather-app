<?php

namespace App\Constants;

class LocationConstants
{
    public const NEAR = 'near';

    public const CATEGORIES = 'categories';

    public const CITY_CATEGORY = '16062';

    public const CONTEXT = 'context';

    public const GEO_BOUNDS = 'geo_bounds';

    public const CIRCLE = 'circle';

    public const CENTER = 'center';

    /**
     * Validation rules for the location api
     */
    public const VALIDATION_RULES = [
        'near'  => ['required']
    ];
}
