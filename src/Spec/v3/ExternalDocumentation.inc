<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Allows referencing an external resource for extended documentation.
 *
 * @see https://swagger.io/specification/#externalDocumentationObject
 */
class ExternalDocumentation extends AbstractObject
{

  /**
   * A short description of the target documentation. CommonMark syntax MAY be used for rich text representation.
   *
   * @var string
   */
  public $description;

  /**
   * REQUIRED. The URL for the target documentation. Value MUST be in the format of a URL.
   *
   * @var string
   */
  public $url;
}
