<?php

namespace AlfaExchange\Api;

use AlfaExchange\Api\Exception\AlfaExchangeObjectException;
use AlfaExchange\Api\Interfaces\AlfaExchangeMethods;
use AlfaExchange\Api\Objects\ExchangeObject;
use AlfaExchange\Api\Traits\HasAlfaExchangeMethods;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Class AlfaExchangeService
 * @package AlfaExchange\Api
 * @method false|PromiseInterface|ExchangeObject    latest(array $parameters = [])      Return real-time exchange rate as single data or all available currency rates
 */
class AlfaExchangeService
{
    use HasAlfaExchangeMethods;

    protected string $apiUrl = 'https://api.alfaexchange.io/v1';
    protected string $token;
    protected array  $config;
    protected Client $client;

    /**
     * AlfaExchangeService constructor.
     * @param null|string|array $token
     */
    public function __construct($token = null)
    {
        if (is_null($token)) {
            $config = [
                'token'   => config('alfaexchange.token'),
                'timeout' => config('alfaexchange.timeout')
            ];
        }
        if (is_string($token)) {
            $config = ['token' => $token];
        }

        $this->token  = $config['token'];
        $this->config = [
            'token'   => $config['token'],
            'timeout' => $config['timeout'] ?? config('alfaexchange.timeout'),
            'api_url' => $config['api_url'] ?? $this->apiUrl,
        ];
        $this->client = new Client([
            'http_errors' => true,
            'timeout'     => $config['timeout'],
        ]);
    }

    /**
     * @param string $method
     * @param array $arguments
     * @return mixed
     * @throws Exception\AlfaExchangeMehtodException
     */
    public function __call(string $method, array $arguments)
    {
        $method = AlfaExchangeMethods::create($method, $this->config['api_url'], $this->config['token'], $arguments);

        return $method->execute($this->client);
    }

    /**
     * @param string $name
     * @return mixed
     * @throws AlfaExchangeObjectException
     */
    public function __get(string $name)
    {
        if (!in_array($name, ['token', 'exceptions', 'async', 'api_url'])) {
            throw AlfaExchangeObjectException::inaccessibleVariable($name, self::class);
        }

        return $this->config[$name];
    }

    /**
     * @param string $name
     * @param $value
     * @return mixed
     * @throws AlfaExchangeObjectException
     */
    public function __set(string $name, $value)
    {
        if (!in_array($name, ['token', 'exceptions', 'async', 'api_url'])) {
            throw AlfaExchangeObjectException::inaccessibleVariable($name, self::class);
        }

        return $this->config[$name] = $value;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function __isset(string $key)
    {
        return isset($this->config[$key]);
    }

    /**
     * @param string $key
     * @throws AlfaExchangeObjectException
     */
    public function __unset(string $key)
    {
        throw AlfaExchangeObjectException::inaccessibleUnsetVariable($key, self::class);
    }

    /**
     * Get Alfa Exchange config
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param bool $exceptions
     * @return $this
     */
    public function exceptions(bool $exceptions = true)
    {
        $this->exceptions = $exceptions;
        return $this;
    }
}
