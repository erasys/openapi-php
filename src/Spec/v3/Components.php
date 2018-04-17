<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Holds a set of reusable objects for different aspects of the OAS. All objects defined within the components object
 * will have no effect on the API unless they are explicitly referenced from properties outside the components object.
 *
 * @see https://swagger.io/specification/#componentsObject
 */
class Components extends AbstractObject
{

  /**
   * A map to hold reusable Schema Objects.
   *
   * @var Schema[]|Reference[] array<string,Schema>|array<string,Reference>
   */
    public $schemas;

  /**
   * A map to hold reusable Response Objects.
   *
   * @var Response[]|Reference[] array<string,Response>|array<string,Reference>
   */
    public $responses;

  /**
   * A map to hold reusable Parameter Objects.
   *
   * @var Parameter[]|Reference[] array<string,Parameter>|array<string,Reference>
   */
    public $parameters;

  /**
   * A map to hold reusable Example Objects.
   *
   * @var Example[]|Reference[] array<string,Example>|array<string,Reference>
   */
    public $examples;

  /**
   * A map to hold reusable Request Body Objects.
   *
   * @var RequestBody[]|Reference[] array<string,RequestBody>|array<string,Reference>
   */
    public $requestBodies;

  /**
   * A map to hold reusable Header Objects.
   *
   * @var Header[]|Reference[] array<string,Header>|array<string,Reference>
   */
    public $headers;

  /**
   * A map to hold reusable Security Scheme Objects.
   *
   * @var SecurityScheme[]|Reference[]
   *      array<string,SecurityScheme>|array<string,Reference>
   */
    public $securitySchemes;

  /**
   * A map to hold reusable Link Objects.
   *
   * @var Link[]|Reference[] array<string,Link>|array<string,Reference>
   */
    public $links;

  /**
   * A map to hold reusable Callback Objects.
   *
   * @var PathItem[]|Reference[] array<string, PathItem>|array<string, Reference>
   */
    public $callbacks;
}
