<?php

namespace AlfaExchange\Api\Interfaces;

use AlfaExchange\Api\Exception\AlfaExchangeMehtodException;
use AlfaExchange\Api\Exception\AlfaExchangeRequestException;
use AlfaExchange\Api\Helpers\TypeCaster;
use AlfaExchange\Api\Traits\HasAlfaExchangeMethods;
use GuzzleHttp\Client;

/**
 * Class AlfaExchangeMethods
 * @package AlfaExchange\Api\Interfaces
 */
abstract class AlfaExchangeMethods
{
    use HasAlfaExchangeMethods;

    protected array  $arguments;
    protected string $token;
    protected string $api;
    protected array  $headers = [];

    /**
     * AlfaExchangeMethods constructor.
     * @param string $api
     * @param string $token
     * @param array|null $data
     */
    public function __construct(string $api, string $token, array $data = null)
    {
        $this->api                      = $api;
        $this->token                    = $token;
        $this->headers['Authorization'] = sprintf('Bearer %s', $this->token);
        $this->headers['Accept']        = 'application/json';
        $this->arguments                = $data ?? [];
    }

    /**
     * Create new method instance.
     *
     * @param string $method
     * @param string $api
     * @param string $token
     * @param array|null $data
     * @return mixed
     * @throws AlfaExchangeMehtodException
     */
    public static function create(string $method, string $api, string $token, array $data = null)
    {
        if (!$Method = static::method($method)) {
            throw AlfaExchangeMehtodException::methodNotFound($method);
        }

        return new $Method($api, $token, $data);
    }

    /**
     * Execute method.
     *
     * @param Client $client
     * @return mixed
     */
    public function execute(Client &$client)
    {
        $config  = $this->request();
        $promise = $client->requestAsync($config['type'], $config['url'], $config['send'])
            ->then(function ($result) use ($config) {
                if ($result->getStatusCode() === 200) {
                    $result = json_decode($result->getBody());
                    return TypeCaster::cast($result->data, $config['expect']);
                }
                throw AlfaExchangeRequestException::requestError($result);
            });

        return $promise->wait();
    }

    /**
     * This function should return HTTP configuration for given method.
     *
     * @return array
     */
    abstract protected function request();
}
