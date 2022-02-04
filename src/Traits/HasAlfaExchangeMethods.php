<?php

namespace AlfaExchange\Api\Traits;

use AlfaExchange\Api\Methods\LatestMethod;

/**
 * Trait HasAlfaExchangeMethods
 * @package AlfaExchange\Api\Traits
 */
trait HasAlfaExchangeMethods
{
    /**
     * Alfa Exchange methods
     *
     * @param string $method
     * @return string|null
     */
    protected static function method(string $method)
    {
        $relations = [
            'latest' => LatestMethod::class,
        ];

        return $relations[$method] ?? null;
    }
}
