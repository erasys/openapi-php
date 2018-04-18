<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Allows referencing an external resource for extended documentation.
 *
 * @see https://swagger.io/specification/#externalDocumentationObject
 */
class ExternalDocumentation extends AbstractObject implements ExtensibleInterface
{
    /**
     * REQUIRED. The URL for the target documentation. Value MUST be in the format of a URL.
     *
     * @var string
     */
    public $url;

    /**
     * A short description of the target documentation. CommonMark syntax MAY be used for rich text representation.
     *
     * @var string
     */
    public $description;

    /**
     * @param string      $url
     * @param string|null $description
     * @param array       $additionalProperties
     */
    public function __construct(string $url, string $description = null, array $additionalProperties = [])
    {
        parent::__construct($additionalProperties);
        $this->url         = $url;
        $this->description = $description;
    }
}
