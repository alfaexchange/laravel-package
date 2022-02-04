<?php

namespace AlfaExchange\Api\Exception;

/**
 * Class AlfaExchangeMehtodException
 * @package AlfaExchange\Api\Exception
 */
class AlfaExchangeMehtodException extends AlfaExchangeException
{
    /**
     * @param string $method
     * @return AlfaExchangeMehtodException
     */
    public static function methodNotFound(string $method): AlfaExchangeMehtodException
    {
        return new AlfaExchangeMehtodException("Method \"{$method}\" is not exists", 404);
    }

    /**
     * @param string $type
     * @return AlfaExchangeMehtodException
     */
    public static function wrongHandlerType(string $type): AlfaExchangeMehtodException
    {
        return new AlfaExchangeMehtodException("Given update handler type \"{$type}\" is not valid update handler", 404);
    }
}
