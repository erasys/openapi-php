<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * The object provides metadata about the API. The metadata MAY be used by the clients if needed,
 * and MAY be presented in editing or documentation generation tools for convenience.
 *
 * @see https://swagger.io/specification/#infoObject
 */
class Info extends AbstractObject implements ExtensibleInterface
{
    /**
     * REQUIRED. The title of the application.
     *
     * @var string
     */
    public $title;

    /**
     * REQUIRED. The version of this OpenAPI document
     * (which is distinct from the OpenAPI Specification version or the API implementation version).
     *
     *
     * @var string
     */
    public $version;

    /**
     * A short description of the application. CommonMark syntax MAY be used for rich text representation.
     *
     * @var string
     */
    public $description;

    /**
     * A URL to the Terms of Service for the API. MUST be in the format of a URL.
     *
     * @var string
     */
    public $termsOfService;

    /**
     * The contact information for the exposed API.
     *
     * @var Contact
     */
    public $contact;

    /**
     * The license information for the exposed API.
     *
     * @var License
     */
    public $license;

    /**
     * @param string      $title
     * @param string      $version
     * @param string|null $description
     * @param array       $additionalProperties
     */
    public function __construct(
        string $title,
        string $version,
        string $description = null,
        array $additionalProperties = []
    ) {
        parent::__construct($additionalProperties);

        $this->title       = $title;
        $this->version     = $version;
        $this->description = $description;
    }
}
