<?php

namespace AlfaExchange\Api\Objects;

use AlfaExchange\Api\Interfaces\AlfaExchangeObject;

/**
 * Class ExchangeObject
 * @package AlfaExchange\Api\Objects
 * @property bool        $success
 * @property integer     $timestamp
 * @property string      $base
 * @property RatesObject $results
 */
class ExchangeObject extends AlfaExchangeObject
{
    protected function relations()
    {
        return [
            'success'   => 'boolean',
            'timestamp' => 'integer',
            'base'      => 'string',
            'rates'     => RatesObject::class,
        ];
    }
}
