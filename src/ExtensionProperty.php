<?php

namespace erasys\OpenApi;

/**
 * Specification Extension property definition.
 */
class ExtensionProperty
{
    /**
     * Exact name of the property that will be used in the generated schema.
     *
     * @var string
     */
    public $name;

    /**
     * Value of the property
     *
     * @var mixed
     */
    public $value;

    /**
     * @param string     $name
     * @param mixed|null $value
     */
    public function __construct(string $name, $value = null)
    {
        $this->name  = $name;
        $this->value = $value;
    }
}
