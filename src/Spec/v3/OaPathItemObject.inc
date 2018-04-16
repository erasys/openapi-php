<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Describes the operations available on a single path. A Path Item MAY be empty, due to ACL constraints.
 * The path itself is still exposed to the documentation viewer but they will not know which operations
 * and parameters are available.
 *
 * @see https://swagger.io/specification/#pathItemObject
 */
class OaPathItemObject extends AbstractOaObject
{

  /**
   * Allows for an external definition of this path item.
   * The referenced structure MUST be in the format of a Path Item Object.
   * If there are conflicts between the referenced definition and this Path Item's definition,
   * the behavior is _undefined_.
   *
   * This property SHOULD be renamed to '$ref' when exported.
   *
   * @var string
   */
  public $ref;

  /**
   * An optional, string summary, intended to apply to all operations in this path.
   *
   * @var string
   */
  public $summary;

  /**
   * An optional, string description, intended to apply to all operations in this path.
   * CommonMark syntax MAY be used for rich text representation.
   *
   * @var string
   */
  public $description;

  /**
   * A definition of a GET operation on this path.
   *
   * @var OaOperationObject
   */
  public $get;

  /**
   * A definition of a PUT operation on this path.
   *
   * @var OaOperationObject
   */
  public $put;

  /**
   * A definition of a POST operation on this path.
   *
   * @var OaOperationObject
   */
  public $post;

  /**
   * A definition of a DELETE operation on this path.
   *
   * @var OaOperationObject
   */
  public $delete;

  /**
   * A definition of a OPTIONS operation on this path.
   *
   * @var OaOperationObject
   */
  public $options;

  /**
   * A definition of a HEAD operation on this path.
   *
   * @var OaOperationObject
   */
  public $head;

  /**
   * A definition of a PATCH operation on this path.
   *
   * @var OaOperationObject
   */
  public $patch;

  /**
   * A definition of a TRACE operation on this path.
   *
   * @var OaOperationObject
   */
  public $trace;

  /**
   * An alternative server array to service all operations in this path.
   *
   * @var OaServerObject[]
   */
  public $servers;

  /**
   * A list of parameters that are applicable for all the operations described under this path.
   * These parameters can be overridden at the operation level, but cannot be removed there.
   * The list MUST NOT include duplicated parameters.
   * A unique parameter is defined by a combination of a name and location.
   * The list can use the Reference Object to link to parameters that are defined at the
   * OpenAPI Object's components/parameters.
   *
   * @see https://swagger.io/specification/#parameterName
   * @see https://swagger.io/specification/#parameterIn
   * @see https://swagger.io/specification/#referenceObject
   * @see https://swagger.io/specification/#componentsParameters
   *
   * @var OaParameterObject[]|OaReferenceObject[]
   */
  public $parameters;

}
