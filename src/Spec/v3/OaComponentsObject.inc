<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Holds a set of reusable objects for different aspects of the OAS. All objects defined within the components object
 * will have no effect on the API unless they are explicitly referenced from properties outside the components object.
 *
 * @see https://swagger.io/specification/#componentsObject
 */
class OaComponentsObject extends AbstractOaObject
{

  /**
   * A map to hold reusable Schema Objects.
   *
   * @var OaSchemaObject[]|OaReferenceObject[] array<string,OaSchemaObject>|array<string,OaReferenceObject>
   */
  public $schemas;

  /**
   * A map to hold reusable Response Objects.
   *
   * @var OaResponseObject[]|OaReferenceObject[] array<string,OaResponseObject>|array<string,OaReferenceObject>
   */
  public $responses;

  /**
   * A map to hold reusable Parameter Objects.
   *
   * @var OaParameterObject[]|OaReferenceObject[] array<string,OaParameterObject>|array<string,OaReferenceObject>
   */
  public $parameters;

  /**
   * A map to hold reusable Example Objects.
   *
   * @var OaExampleObject[]|OaReferenceObject[] array<string,OaExampleObject>|array<string,OaReferenceObject>
   */
  public $examples;

  /**
   * A map to hold reusable Request Body Objects.
   *
   * @var OaRequestBodyObject[]|OaReferenceObject[] array<string,OaRequestBodyObject>|array<string,OaReferenceObject>
   */
  public $requestBodies;

  /**
   * A map to hold reusable Header Objects.
   *
   * @var OaHeaderObject[]|OaReferenceObject[] array<string,OaHeaderObject>|array<string,OaReferenceObject>
   */
  public $headers;

  /**
   * A map to hold reusable Security Scheme Objects.
   *
   * @var OaSecuritySchemeObject[]|OaReferenceObject[]
   *      array<string,OaSecuritySchemeObject>|array<string,OaReferenceObject>
   */
  public $securitySchemes;

  /**
   * A map to hold reusable Link Objects.
   *
   * @var OaLinkObject[]|OaReferenceObject[] array<string,OaLinkObject>|array<string,OaReferenceObject>
   */
  public $links;

  /**
   * A map to hold reusable Callback Objects.
   *
   * @var OaPathItemObject[]|OaReferenceObject[] array<string, OaPathItemObject>|array<string, OaReferenceObject>
   */
  public $callbacks;
}
