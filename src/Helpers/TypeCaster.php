<?php

namespace AlfaExchange\Api\Helpers;

use Exception;
use AlfaExchange\Api\Exception\AlfaExchangeException;
use AlfaExchange\Api\Interfaces\AlfaExchangeObject;

/**
 * Class TypeCaster
 * @package AlfaExchange\Api\Helpers
 */
class TypeCaster
{
    /**
     * Casts each `$object` key to a given type in `$relations` array with a same key.
     *
     * @param array|object $object
     *
     * @return array
     */
    public static function castValues($object, array $relations)
    {
        if (!is_array($object) && !is_object($object)) {
            throw AlfaExchangeException::uncastableType('array', gettype($object));
        }

        $result = [];

        foreach ($object as $prop => $value) {
            if (isset($relations[$prop])) {
                $result[$prop] = static::cast($value, $relations[$prop]);
            }
        }

        return $result;
    }

    /**
     * Casts a `$value` to a given `$type`.
     *
     * @param mixed        $value
     * @param array|string $type
     *
     * @return mixed
     */
    public static function cast($value, $type)
    {
        if (is_array($type)) {
            return static::castArrayOfTypes($value, $type);
        }

        $types = explode('|', $type);

        if (count($types) > 1) {
            foreach ($types as $_type) {
                try {
                    return static::cast($value, $_type);
                }
                catch (Exception $e) {
                    // Just skip exception.
                }
            }

            AlfaExchangeException::uncastableType($type, gettype($value));
        }

        if (static::isCasted($value, $type)) {
            return $value;
        }

        return static::castDirect($value, $type);
    }

    /**
     * Cast all sub objects to arrays.
     *
     * @param array|object $object
     *
     * @return array
     */
    public static function stripArrays($object): array
    {
        $array = [];

        foreach ($object as $key => $value) {
            if ((is_object($value) && is_subclass_of($value, AlfaExchangeObject::class)) || is_array($value)) {
                $value = static::stripArrays($value);
            }
            $array[$key] = $value;
        }

        return $array;
    }

    /**
     *
     * @param $object
     * @return array
     */
    public static function stripValueOnlyArrays($object): array
    {
        $array = [];

        foreach ($object as $key => $value) {
            if ((is_object($value) && is_subclass_of($value, AlfaExchangeObject::class)) || is_array($value)) {
                continue;
            }
            array_push($array, $value);
        }

        return $array;
    }

    /**
     * Create a flat array for multipart Guzzle request from array of parameters.
     *
     * @param array $object
     *
     * @return array
     */
    public static function flatten($object)
    {
        $flat = [];
        $files = [];
        static::extractFiles($object, $files);

        foreach ($object as $key => $value) {
            $flat[] = [
                'name' => $key,
                'contents' => is_array($value) ? json_encode($value) : $value,
            ];
        }

        return array_merge($flat, $files);
    }

    private static function castArrayOfTypes($object, array $type)
    {
        if (!is_array($object)) {
            throw AlfaExchangeException::uncastableType(gettype($type), gettype($object));
        }

        foreach ($object as $subKey => $subValue) {
            $object[$subKey] = static::cast($subValue, $type[0]);
        }

        return $object;
    }

    private static function isCasted($object, string $type)
    {
        $value_type = gettype($object);

        return  $value_type == $type ||
            'object' == $value_type && class_exists($type) &&
            ($object instanceof $type || is_subclass_of($object, $type));
    }

    private static function castDirect($object, string $type)
    {
        $simple = ['int', 'integer', 'bool', 'boolean', 'float', 'double', 'string'];
        $value_type = gettype($object);

        if (in_array($value_type, $simple) && in_array($type, $simple)) {
            settype($object, $type);

            return $object;
        }

        if (class_exists($type)) {
            return $type::create($object);
        }

        throw AlfaExchangeException::uncastableType($type, $value_type);
    }
}
