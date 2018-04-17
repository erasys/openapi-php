<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Adds metadata to a single tag that is used by the Operation Object. It is not mandatory to have a Tag Object per tag
 * defined in the Operation Object instances.
 *
 * @see https://swagger.io/specification/#tagObject
 */
class Tag extends AbstractObject
{

  /**
   * REQUIRED. The name of the tag.
   *
   *
   * @var string
   */
    public $name;

  /**
   * A short description for the tag. CommonMark syntax MAY be used for rich text representation.
   *
   * @var string
   */
    public $description;

  /**
   * Additional external documentation for this tag.
   *
   * @var ExternalDocumentation
   */
    public $externalDocs;

  /**
   * Tag constructor.
   *
   * @param string $name
   * @param string|null $description
   */
    public function __construct(string $name, string $description = null)
    {
        $this->name = $name;
        $this->description = $description;
    }
}
