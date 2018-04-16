<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Common class for Parameter Object and Header Object.
 */
abstract class AbstractParameter extends AbstractObject
{

  /**
   * A brief description of the parameter. This could contain examples of use.
   * CommonMark syntax MAY be used for rich text representation.
   *
   * @var string
   */
  public $description;

  /**
   * Determines whether this parameter is mandatory. If the parameter location is "path",
   * this property is REQUIRED and its value MUST be true.
   * Otherwise, the property MAY be included and its default value is false.
   *
   * @var bool
   */
  public $required;

  /**
   * Specifies that a parameter is deprecated and SHOULD be transitioned out of usage.
   *
   * @var bool
   */
  public $deprecated;

  /**
   * Sets the ability to pass empty-valued parameters.
   * This is valid only for query parameters and allows sending a parameter with an empty value.
   * Default value is false. If style is used, and if behavior is n/a (cannot be serialized),
   * the value of allowEmptyValue SHALL be ignored.
   *
   * @var bool
   */
  public $allowEmptyValue;

  /**
   * Describes how the parameter value will be serialized depending on the type of the parameter value.
   * Default values (based on value of in): for query - form; for path - simple; for header - simple;
   * for cookie - form.
   *
   * @var string
   */
  public $style;

  /**
   * When this is true, parameter values of type array or object generate separate parameters
   * for each value of the array or key-value pair of the map. For other types of parameters this property
   * has no effect. When style is form, the default value is true. For all other styles, the default value is false.
   *
   * @var bool
   */
  public $explode;

  /**
   * Determines whether the parameter value SHOULD allow reserved characters,
   * as defined by RFC3986 :/?#[]@!$&'()*+,;= to be included without percent-encoding.
   * This property only applies to parameters with an in value of query. The default value is false.
   *
   * @var bool
   */
  public $allowReserved;

  /**
   * The schema defining the type used for the parameter.
   *
   * This field should be the raw array representing the JSON schema or a Reference Object.
   *
   * @see https://swagger.io/specification/#schemaObject
   * @var Schema|Reference
   */
  public $schema;

  /**
   * Example of the media type. The example SHOULD match the specified schema and encoding properties if present.
   * The example field is mutually exclusive of the examples field. Furthermore,
   * if referencing a schema which contains an example, the example value SHALL override
   * the example provided by the schema. To represent examples of media types that cannot naturally
   * be represented in JSON or YAML, a string value can contain the example with escaping where necessary.
   *
   * @var string|mixed
   */
  public $example;

  /**
   * Examples of the media type. Each example SHOULD contain a value in the correct format as
   * specified in the parameter encoding. The examples field is mutually exclusive of the example field.
   * Furthermore, if referencing a schema which contains an example, the examples value SHALL override the
   * example provided by the schema.
   *
   * @var Example[]|Reference[] array<string, Example>|array<string, Reference>
   */
  public $examples;

  /**
   * A map containing the representations for the parameter.
   * The key is the media type and the value describes it. The map MUST only contain one entry.
   *
   * @var MediaType[] array<string, MediaType>
   */
  public $content;
}
