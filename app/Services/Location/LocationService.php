<?php

namespace App\Services\Location;

use App\Constants\LocationConstants;
use App\Constants\ResponseConstants;
use App\Libraries\FourSquareApiLibrary;

class LocationService
{
    /**
     * @var FourSquareApiLibrary
     */
    private FourSquareApiLibrary $oApiLibrary;

    /**
     * @param FourSquareApiLibrary $oApiLibrary
     */
    public function __construct(FourSquareApiLibrary $oApiLibrary)
    {
        $this->oApiLibrary = $oApiLibrary;
    }

    /**
     * Retrieve location coordinates
     * @param array $aParameters
     * @return array
     */
    public function getLocation(array $aParameters): array
    {
        $aLocationParameters = [
            LocationConstants::NEAR       => $aParameters[LocationConstants::NEAR],
            LocationConstants::CATEGORIES => LocationConstants::CITY_CATEGORY
        ];

        $aLocationResponse = $this->oApiLibrary->getLocationDetails($aLocationParameters);

        if ($aLocationResponse[ResponseConstants::RESULTS] === ResponseConstants::FAILED_RESULT) {
            return $aLocationResponse;
        }

        $aLocationResponse[ResponseConstants::CODE] = 200;
        return $aLocationResponse;
    }
}
