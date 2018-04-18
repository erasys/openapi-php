<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * A simple object to allow referencing other components in the specification, internally and externally.
 *
 * The Reference Object is defined by JSON Reference and follows the same structure, behavior and rules.
 *
 * For this specification, reference resolution is accomplished as defined by the JSON Reference specification and
 * not by the JSON Schema specification.
 *
 * This object cannot be extended with additional properties and any properties added SHALL be ignored.
 *
 * @see https://swagger.io/specification/#referenceObject
 */
class Reference extends AbstractObject
{
    /**
     * REQUIRED. The reference string.
     *
     * This property SHOULD be renamed to '$ref' when exported.
     *
     * @var string
     */
    public $ref;

    /**
     * @param string $ref
     */
    public function __construct(string $ref)
    {
        parent::__construct([]);
        $this->ref = $ref;
    }
}
