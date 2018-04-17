<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * An object representing a Server Variable for server URL template substitution.
 *
 * @see https://swagger.io/specification/#serverVariableObject
 */
class ServerVariable extends AbstractObject
{

  /**
   * An enumeration of string values to be used if the substitution options are from a limited set.
   *
   * @var string[]
   */
    public $enum;

  /**
   * REQUIRED. The default value to use for substitution, and to send,
   * if an alternate value is not supplied. Unlike the Schema Object's default,
   * this value MUST be provided by the consumer.
   *
   * @var string
   */
    public $default;

  /**
   * An optional description for the server variable. CommonMark syntax MAY be used for rich text representation.
   *
   * @var string
   */
    public $description;
}
