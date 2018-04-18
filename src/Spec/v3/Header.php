<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * The Header Object follows the structure of the Parameter Object with the following changes:
 *
 * - name MUST NOT be specified, it is given in the corresponding headers map.
 * - in MUST NOT be specified, it is implicitly in header.
 * - All traits that are affected by the location MUST be applicable to a location of header (for example, style).
 *
 * @see https://swagger.io/specification/#headerObject
 */
class Header extends AbstractParameter
{
    /**
     * @param string|null $description
     * @param array       $additionalProperties
     */
    public function __construct(string $description = null, array $additionalProperties = [])
    {
        parent::__construct($additionalProperties);
        $this->description = $description;
    }
}
