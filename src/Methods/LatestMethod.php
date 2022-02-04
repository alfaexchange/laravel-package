<?php

namespace AlfaExchange\Api\Methods;

use AlfaExchange\Api\Helpers\TypeCaster;
use AlfaExchange\Api\Interfaces\AlfaExchangeMethods;
use AlfaExchange\Api\Objects\ExchangeObject;

/**
 * Class LatestMethod
 * @package AlfaExchange\Api\Methods
 */
class LatestMethod extends AlfaExchangeMethods
{
    /**
     * @return array
     */
    protected function request()
    {
        return [
            'type'   => 'GET',
            'url'    => $this->url(),
            'send'   => $this->send(),
            'expect' => ExchangeObject::class,
        ];
    }

    /**
     * @return string
     */
    private function url(): string
    {
        $parameters = [
            'from' => 'string',
            'to'   => 'string',
        ];

        $object     = TypeCaster::castValues($this->arguments[0] ?? [], $parameters);
        $parameters = TypeCaster::stripArrays($object);

        if (is_null($parameters['to'])) {
            return "{$this->api}/latest/{$parameters['from']}";
        }

        return "{$this->api}/latest/{$parameters['from']}/{$parameters['to']}";
    }

    /**
     * @return array
     */
    private function send()
    {
        return [
            'headers' => $this->headers,
        ];
    }
}
