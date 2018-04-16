<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Represents a raw value.
 * This allows, for example exporting a null value, which is by default excluded when exporting to array.
 */
class OaRawValue
{

  /**
   * @var mixed
   */
  public $value;

  /**
   * @param mixed $value
   */
  public function __construct($value)
  {
    $this->value = $value;
  }
}
