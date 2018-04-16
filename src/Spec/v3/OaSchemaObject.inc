<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * The Schema Object allows the definition of input and output data types. These types can be objects, but also
 * primitives and arrays. This object is an extended subset of the JSON Schema Specification Wright Draft 00.
 *
 * For more information about the properties, see JSON Schema Core and JSON Schema Validation. Unless stated otherwise,
 * the property definitions follow the JSON Schema.
 *
 * Alternatively, any time a Schema Object can be used, a Reference Object can be used in its place. This allows
 * referencing definitions instead of defining them inline.
 *
 * Additional properties defined by the JSON Schema specification that are not mentioned here are strictly unsupported.
 *
 * @see https://swagger.io/specification/#schemaObject
 * @see http://json-schema.org/
 * @see https://tools.ietf.org/html/draft-wright-json-schema-00
 * @see https://tools.ietf.org/html/draft-wright-json-schema-validation-00
 */
class OaSchemaObject extends AbstractOaObject
{

  /**
   * @var string
   */
  public $title;

  /**
   * CommonMark syntax MAY be used for rich text representation.
   *
   * @var string
   */
  public $description;

  /**
   * Value MUST be a string. Multiple types via an array are not supported.
   *
   * @var string
   */
  public $type;

  /**
   * See Data Type Formats for further details. While relying on JSON Schema's defined formats, the OAS offers a few
   * additional predefined formats.
   *
   * @see https://swagger.io/specification/#dataTypeFormat
   * @var string
   */
  public $format;

  /**
   * Value MUST be an object and not an array. Inline or referenced schema MUST be of a Schema Object and not a
   * standard JSON Schema. items MUST be present if the type is array.
   *
   * @var OaSchemaObject|OaReferenceObject
   */
  public $items;

  /**
   * Property definitions MUST be a Schema Object and not a standard JSON Schema (inline or referenced).
   *
   * @var OaSchemaObject[]|OaReferenceObject[] array<string, OaSchemaObject>|array<string, OaReferenceObject>
   */
  public $properties;

  /**
   * Value can be boolean or object. Inline or referenced schema MUST be of a Schema Object and
   * not a standard JSON Schema.
   *
   * @var bool|OaSchemaObject[]|OaReferenceObject[] bool|array<string, OaSchemaObject>|array<string, OaReferenceObject>
   */
  public $additionalProperties;

  /**
   * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
   *
   * @var OaSchemaObject[]|OaReferenceObject[]
   */
  public $allOf;

  /**
   * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
   *
   * @var OaSchemaObject[]|OaReferenceObject[]
   */
  public $oneOf;

  /**
   * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
   *
   * @var OaSchemaObject[]|OaReferenceObject[]
   */
  public $anyOf;

  /**
   * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
   *
   * @var OaSchemaObject|OaReferenceObject
   */
  public $not;

  /**
   * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
   *
   * @var OaSchemaObject[]|OaReferenceObject[]
   */
  public $multipleOf;

  /**
   * The default value represents what would be assumed by the consumer of the input as the value of the schema if one
   * is not provided. Unlike JSON Schema, the value MUST conform to the defined type for the Schema Object defined at
   * the same level. For example, if type is string, then default can be "foo" but cannot be 1.
   *
   * @var mixed
   */
  public $default;

  /**
   * Allows sending a null value for the defined schema. Default value is false.
   *
   * @var bool
   */
  public $nullable;

  /**
   * Adds support for polymorphism. The discriminator is an object name that is used to differentiate between other
   * schemas which may satisfy the payload description. See Composition and Inheritance for more details.
   *
   * The discriminator attribute is legal only when using one of the composite keywords oneOf, anyOf, allOf.
   * In OAS 3.0, a response payload MAY be described to be exactly one of any number of types.
   *
   * @see https://swagger.io/specification/#schemaComposition
   * @var OaDiscriminatorObject
   */
  public $discriminator;

  /**
   * Relevant only for Schema "properties" definitions. Declares the property as "read only". This means that it MAY be
   * sent as part of a response but SHOULD NOT be sent as part of the request. If the property is marked as readOnly
   * being true and is in the required list, the required will take effect on the response only. A property MUST NOT be
   * marked as both readOnly and writeOnly being true. Default value is false.
   *
   * @var bool
   */
  public $readOnly;

  /**
   * Relevant only for Schema "properties" definitions. Declares the property as "write only". Therefore, it MAY be
   * sent as part of a request but SHOULD NOT be sent as part of the response. If the property is marked as writeOnly
   * being true and is in the required list, the required will take effect on the request only. A property MUST NOT be
   * marked as both readOnly and writeOnly being true. Default value is false.
   *
   * @var bool
   */
  public $writeOnly;

  /**
   * This MAY be used only on properties schemas. It has no effect on root schemas. Adds additional metadata to
   * describe the XML representation of this property.
   *
   * @see https://swagger.io/specification/#xmlObject
   * @var array
   */
  public $xml;

  /**
   * Additional external documentation for this schema.
   *
   * @var OaExternalDocumentationObject
   */
  public $externalDocs;

  /**
   * A free-form property to include an example of an instance for this schema. To represent examples that cannot be
   * naturally represented in JSON or YAML, a string value can be used to contain the example with escaping where
   * necessary.
   *
   * @var mixed
   */
  public $example;

  /**
   * Specifies that a schema is deprecated and SHOULD be transitioned out of usage. Default value is false.
   *
   * @var bool
   */
  public $deprecated;

  /**
   * @var int
   */
  public $maximum;

  /**
   * @var int
   */
  public $exclusiveMaximum;

  /**
   * @var int
   */
  public $minimum;

  /**
   * @var int
   */
  public $exclusiveMinimum;

  /**
   * @var int
   */
  public $maxLength;

  /**
   * @var int
   */
  public $minLength;

  /**
   * This string SHOULD be a valid regular expression, according to the ECMA 262 regular expression dialect
   *
   * @var string
   */
  public $pattern;

  /**
   * @var int
   */
  public $maxItems;

  /**
   * @var int
   */
  public $minItems;

  /**
   * @var bool
   */
  public $uniqueItems;

  /**
   * @var int
   */
  public $maxProperties;

  /**
   * @var int
   */
  public $minProperties;

  /**
   * By default, the properties defined by the properties keyword are not required. However, one can provide a list of
   * required properties using the required keyword.
   *
   * @var string[]
   */
  public $required;

  /**
   * The enum keyword is used to restrict a value to a fixed set of values. It must be an array with at least one
   * element, where each element is unique
   *
   * @var mixed[]
   */
  public $enum;
}
