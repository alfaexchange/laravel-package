<?php

namespace AlfaExchange\Api\Exception;

/**
 * Class AlfaExchangeObjectException
 * @package AlfaExchange\Api\Exception
 */
class AlfaExchangeObjectException extends AlfaExchangeException
{
    /**
     * @param string $key
     * @param string $class
     * @return AlfaExchangeObjectException
     */
    public static function inaccessibleVariable(string $key, string $class): AlfaExchangeObjectException
    {
        return new AlfaExchangeObjectException("You are not able to write property \"{$key}\" to the \"{$class}\" object!", 403);
    }

    /**
     * @param string $key
     * @param string $class
     * @return AlfaExchangeObjectException
     */
    public static function inaccessibleUnsetVariable(string $key, string $class): AlfaExchangeObjectException
    {
        return new AlfaExchangeObjectException("You are not able to unset the \"{$key}\" property of \"{$class}\" class", 403);
    }

    /**
     * @param string $key
     * @param string $source
     * @return AlfaExchangeObjectException
     */
    public static function undefinedOfset(string $key, string $source): AlfaExchangeObjectException
    {
        return new AlfaExchangeObjectException("Trying to access an undefined offset \"{$key}\" on \"{$source}\"", 404);
    }

    /**
     * @param string $value
     * @return AlfaExchangeObjectException
     */
    public static function invalidDotNotation(string $value): AlfaExchangeObjectException
    {
        return new AlfaExchangeObjectException("The given string \"{$value}\" is not representing dot notation", 400);
    }
}
