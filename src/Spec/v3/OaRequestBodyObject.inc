<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Describes a single request body.
 *
 * @see https://swagger.io/specification/#requestBodyObject
 */
class OaRequestBodyObject extends AbstractOaObject
{

  /**
   * A brief description of the request body. This could contain examples of use. CommonMark syntax MAY be used for
   * rich text representation.
   *
   * @var string
   */
  public $description;

  /**
   * REQUIRED. The content of the request body. The key is a media type or media type range and the value describes it.
   * For requests that match multiple keys, only the most specific key is applicable. e.g. text/plain overrides text/*
   *
   * @see https://tools.ietf.org/html/rfc7231#appendix-D
   * @var OaMediaTypeObject[] array<string, OaMediaTypeObject>
   */
  public $content;

  /**
   * Determines if the request body is required in the request. Defaults to false if not specified.
   *
   * @var bool
   */
  public $required;
}
