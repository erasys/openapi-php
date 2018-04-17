<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Each Media Type Object provides schema and examples for the media type identified by its key.
 *
 * @see https://swagger.io/specification/#mediaTypeObject
 */
class MediaType extends AbstractObject
{

    /**
     * The schema defining the type used for the request body.
     *
     * This field should be the raw array representing the JSON schema or a Reference Object.
     *
     * @see https://swagger.io/specification/#schemaObject
     * @var Schema|Reference
     */
    public $schema;

    /**
     * Example of the media type. The example object SHOULD be in the correct format as specified by the media type.
     * The example field is mutually exclusive of the examples field. Furthermore,
     * if referencing a schema which contains an example, the example value SHALL
     * override the example provided by the schema.
     *
     * @var string|mixed
     */
    public $example;

    /**
     * Examples of the media type. Each example object SHOULD match the media type and specified schema if present.
     * The examples field is mutually exclusive of the example field. Furthermore,
     * if referencing a schema which contains an example, the examples value SHALL override
     * the example provided by the schema.
     *
     * @var Example[]|Reference[] array<string, Example>|array<string, Reference>
     */
    public $examples;

    /**
     * A map between a property name and its encoding information.
     * The key, being the property name, MUST exist in the schema as a property.
     * The encoding object SHALL only apply to requestBody objects when the media type
     * is multipart or application/x-www-form-urlencoded.
     *
     * @var Encoding[] array<string, Encoding>
     */
    public $encoding;
}
