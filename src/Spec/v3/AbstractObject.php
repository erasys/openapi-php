<?php

namespace erasys\OpenApi\Spec\v3;

use ArrayAccess;
use erasys\OpenApi\ExtensionProperty;
use erasys\OpenApi\RawValue;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;
use LogicException;
use stdClass;
use Symfony\Component\Yaml\Yaml;

/**
 * Base class for all Open API models.
 *
 * Note that defining or accessing properties dynamically is not supported by design
 * to avoid invalid schema generation. If you need to use specification extensions,
 * you can always extend the classes and add there your own properties.
 *
 */
abstract class AbstractObject implements ArrayAccess, Arrayable, Jsonable, JsonSerializable
{
    /**
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
        foreach ($properties as $k => $v) {
            $this->$k = $v;
        }
    }

    /**
     * @param string $name
     */
    final public function __get($name)
    {
        throw new LogicException($this->getUndefinedErrorMessage("\${$name} property"));
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    final public function __set($name, $value)
    {
        throw new LogicException($this->getUndefinedErrorMessage("\${$name} property"));
    }

    /**
     * @param string $name
     * @param array  $arguments
     */
    final public function __call($name, $arguments)
    {
        throw new LogicException($this->getUndefinedErrorMessage("{$name}() method"));
    }

    /**
     * @param string $offset
     *
     * @return bool
     */
    final public function offsetExists($offset)
    {
        return isset($this->$offset);
    }

    /**
     * @param string $offset
     *
     * @return mixed
     */
    final public function offsetGet($offset)
    {
        return $this->$offset;
    }

    /**
     * @param string $offset
     * @param mixed  $value
     */
    final public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    /**
     * @param string $offset
     */
    final public function offsetUnset($offset)
    {
        unset($this->$offset);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $vars = (function ($that) {
            // Only public variables
            return get_object_vars($that);
        })(
            $this
        );

        return $this->exportValue($vars);
    }

    /**
     * @param mixed $value
     *
     * @return array|mixed
     */
    private function exportValue($value)
    {
        if ($value instanceof RawValue) {
            // Unwrap value and return it raw, as it is.
            return $value->value;
        }

        if ($value instanceof AbstractObject) {
            return $value->toArray();
        }

        if ($value instanceof ExtensionProperty) {
            return [
                $value->name => $this->exportValue($value->value),
            ];
        }

        if (is_array($value)) {
            $result = [];
            foreach ($value as $k => $v) {
                // Ignore null properties
                if (is_null($v)) {
                    continue;
                }
                // Take key and value from extension property definition
                if ($v instanceof ExtensionProperty) {
                    $result[$v->name] = $this->exportValue($v->value);
                    continue;
                }
                if (in_array($k, ['xml'])) {
                    $result[$k] = $this->exportValue($v);
                    continue;
                }
                // Transform extension property names using the 'x-dashes-format'
                if (preg_match('/^x[_]/', $k)) {
                    $k          = str_replace('_', '-', $k);
                    $result[$k] = $this->exportValue($v);
                    continue;
                }
                // Transform extension property names using the 'x-camelCaseFormat'
                if (preg_match('/^x[A-Za-z]/', $k)) {
                    $k          = 'x-' . lcfirst(preg_replace('/^(x)/', '', $k));
                    $result[$k] = $this->exportValue($v);
                    continue;
                }
                // Transform reference property names
                if ($k === 'ref') {
                    $k = '$ref';
                }
                $result[$k] = $this->exportValue($v);
            }
            return $result;
        }

        if (!is_scalar($value)) {
            throw new LogicException('Unsupported type: ' . gettype($value));
        }

        return $value;
    }

    /**
     * @param int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this, $options);
    }

    /**
     * Returns a plain object
     *
     * @return object|stdClass
     */
    public function toObject(): stdClass
    {
        return json_decode($this->toJson());
    }

    /**
     * @param int $inline
     * @param int $indentation
     * @param int $flags
     * @return string
     */
    public function toYaml(
        int $inline = 10,
        int $indentation = 2,
        int $flags = 0
    ) {
        return Yaml::dump($this->toArray(), $inline, $indentation, $flags);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @param string $name
     *
     * @return string
     */
    private function getUndefinedErrorMessage(string $name): string
    {
        return static::class . "::{$name} is not defined. Dynamic access is disabled for DTOs.";
    }

    public function __toString()
    {
        return $this->toJson();
    }
}
