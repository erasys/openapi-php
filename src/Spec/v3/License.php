<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * License information for the exposed API.
 *
 * @see https://swagger.io/specification/#licenseObject
 */
class License extends AbstractObject implements ExtensibleInterface
{
    /**
     * REQUIRED. The license name used for the API.
     *
     *
     * @var string
     */
    public $name;

    /**
     * A URL to the license used for the API. MUST be in the format of a URL.
     *
     * @var string
     */
    public $url;

    /**
     * @param string      $name
     * @param string|null $url
     * @param array       $additionalProperties
     */
    public function __construct(string $name, string $url = null, array $additionalProperties = [])
    {
        parent::__construct($additionalProperties);
        $this->name = $name;
        $this->url  = $url;
    }
}
