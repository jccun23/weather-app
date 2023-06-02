<?php

namespace App\Libraries;

use App\Constants\ResponseConstants;

trait ResponseTrait
{
    /**
     * Failed Response Format
     * @param int $iCode
     * @param string $sMessage
     * @return array
     */
    public function failedResponse(int $iCode, string $sMessage)
    {
        return [
            ResponseConstants::RESULTS => ResponseConstants::FAILED_RESULT,
            ResponseConstants::CODE    => $iCode,
            ResponseConstants::MESSAGE => $sMessage
        ];
    }

    /**
     * Success response format
     * @param array $aData
     * @return array
     */
    public function successResponse(array $aData)
    {
        return [
            ResponseConstants::RESULTS => ResponseConstants::SUCCESS_RESULT,
            ResponseConstants::DATA    => $aData
        ];
    }
}
