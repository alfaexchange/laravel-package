<?php

namespace AlfaExchange\Api\Exception;

use AlfaExchange\Api\Objects\ResponseParameters;

/**
 * Class AlfaExchangeRequestException
 * @package AlfaExchange\Api\Exception
 */
class AlfaExchangeRequestException extends AlfaExchangeException
{
    /**
     * @param $result
     * @return AlfaExchangeRequestException
     * @throws AlfaExchangeObjectException
     */
    public static function requestError($result): AlfaExchangeRequestException
    {
        $text = $result->description;
        if (isset($result->parameters)) {
            $parameters = ResponseParameters::create($result->parameters ?? null);
            $text .= '; Parameters: '.$parameters;
        }

        return new AlfaExchangeRequestException($text, $result->error_code);
    }
}
