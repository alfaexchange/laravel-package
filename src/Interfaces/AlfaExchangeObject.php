<?php

namespace AlfaExchange\Api\Interfaces;

use ArrayIterator;
use AlfaExchange\Api\Exception\AlfaExchangeObjectException;
use AlfaExchange\Api\Helpers\TypeCaster;
use IteratorAggregate;
use Traversable;

/**
 * Class AlfaExchangeObject
 * @package AlfaExchange\Api\Interfaces
 */
abstract class AlfaExchangeObject implements IteratorAggregate
{
    /**
     * Array of object properties.
     *
     * @var array
     */
    protected $properties;

    /**
     * FastforexObject constructor.
     * @param $object
     */
    public function __construct($object)
    {
        $this->properties = TypeCaster::castValues($object, $this->relations());
    }

    /**
     * @return array
     */
    public function getProp()
    {
        return $this->properties;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->properties[$key];
    }

    /**
     * @param $key
     * @param $value
     * @throws AlfaExchangeObjectException
     */
    public function __set($key, $value)
    {
        throw AlfaExchangeObjectException::inaccessibleVariable($key, self::class);
    }

    /**
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->properties[$key]);
    }

    /**
     * @param $key
     * @throws AlfaExchangeObjectException
     */
    public function __unset($key)
    {
        throw AlfaExchangeObjectException::inaccessibleUnsetVariable($key, self::class);
    }

    /**
     * @return false|string
     */
    public function __toString()
    {
        return json_encode($this->toArray());
    }

    /**
     * @return array
     */
    public function __debugInfo()
    {
        return $this->properties;
    }

    /**
     * @param $object
     * @return static
     */
    public static function create($object)
    {
        return new static($object);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return TypeCaster::stripArrays($this->properties);
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return (string) $this;
    }

    /**
     * @param string $property
     * @param bool $exception
     * @return FastforexObject|null
     * @throws AlfaExchangeObjectException
     */
    public function get(string $property, bool $exception = false)
    {
        $validate = '/(?:([^\\s\\.\\[\\]]+)(?:\\[([0-9])\\])?)/';
        $data = $this;

        try {
            if (preg_match_all($validate, $property, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $match) {
                    unset($match[0]);
                    foreach ($match as $key) {
                        $this->seek($data, $key);
                    }
                }
            } else {
                throw AlfaExchangeObjectException::invalidDotNotation($property);
            }
        } catch (AlfaExchangeObjectException $e) {
            if ($exception) {
                throw $e;
            }

            return null;
        }

        return $data;
    }

    /**
     * @return ArrayIterator|Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->properties);
    }

    /**
     * @return mixed
     */
    abstract protected function relations();

    /**
     * @param $data
     * @param string $key
     * @return mixed
     * @throws AlfaExchangeObjectException
     */
    private function seek(&$data, string $key)
    {
        $seek = is_array($data) ? $data[$key] : $data->{$key} ?? null;
        if ($seek) {
            return $data = $seek;
        }

        throw AlfaExchangeObjectException::undefinedOfset($key, is_array($data) ? gettype($data) : get_class($data));
    }
}
