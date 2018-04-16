<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Example Object
 *
 * @see https://swagger.io/specification/#exampleObject
 */
class Example extends AbstractObject
{

  /**
   * Short description for the example.
   *
   * @var string
   */
  public $summary;

  /**
   * Long description for the example. CommonMark syntax MAY be used for rich text representation.
   *
   * @var string
   */
  public $description;

  /**
   * Embedded literal example. The value field and externalValue field are mutually exclusive.
   * To represent examples of media types that cannot naturally represented in JSON or YAML,
   * use a string value to contain the example, escaping where necessary.
   *
   * @var string|mixed
   */
  public $value;

  /**
   * A URL that points to the literal example.
   * This provides the capability to reference examples that cannot easily be included in JSON or YAML documents.
   * The value field and externalValue field are mutually exclusive.
   *
   * @var string
   */
  public $externalValue;
}
