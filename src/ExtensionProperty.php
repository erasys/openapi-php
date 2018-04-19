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
    private $name;

    /**
     * Value of the property
     *
     * @var mixed
     */
    private $value;

    /**
     * @param string     $name Extension property name without the 'x-' prefix.
     * @param mixed|null $value
     */
    public function __construct(string $name, $value = null)
    {
        $this->name  = 'x-' . $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
