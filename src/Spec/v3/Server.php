<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * An object representing a Server.
 *
 * @see https://swagger.io/specification/#serverObject
 */
class Server extends AbstractObject implements ExtensibleInterface
{
    /**
     * REQUIRED. A URL to the target host.
     * This URL supports Server Variables and MAY be relative,
     * to indicate that the host location is relative to the location where the OpenAPI document is being served.
     * Variable substitutions will be made when a variable is named in {brackets}.
     *
     * @var string
     */
    public $url;

    /**
     * An optional string describing the host designated by the URL.
     * CommonMark syntax MAY be used for rich text representation.
     *
     * @var string
     */
    public $description;

    /**
     * A map between a variable name and its value. The value is used for substitution in the server's URL template.
     *
     * @var ServerVariable[] array<string, ServerVariable>
     */
    public $variables;

    /**
     * @param string      $url
     * @param string|null $description
     * @param array|null  $variables
     * @param array       $additionalProperties
     */
    public function __construct(
        string $url,
        string $description = null,
        array $variables = null,
        array $additionalProperties = []
    ) {
        parent::__construct($additionalProperties);
        $this->url         = $url;
        $this->description = $description;
        $this->variables   = $variables;
    }
}
