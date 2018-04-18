<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * This is the root document object of the OpenAPI document.
 *
 * @see https://swagger.io/specification/
 */
class Document extends AbstractObject implements ExtensibleInterface
{
    const SCHEME_HTTP                 = 'http';
    const SCHEME_HTTPS                = 'https';
    const SCHEME_WEBSOCKET            = 'ws';
    const SCHEME_SECURE_WEBSOCKET     = 'wss';
    const MIME_TYPE_JSON              = 'application/json';
    const MIME_TYPE_JSON_SCHEMA       = 'application/schema+json';
    const MIME_TYPE_URLENCODED        = 'application/x-www-form-urlencoded';
    const MIME_TYPE_MULTIPART         = 'multipart/form-data';
    const PARAM_IN_PATH               = 'path';
    const PARAM_IN_QUERY              = 'query';
    const PARAM_IN_HEADER             = 'header';
    const PARAM_IN_COOKIE             = 'cookie';
    const PARAM_STYLE_MATRIX          = 'matrix';
    const PARAM_STYLE_LABEL           = 'label';
    const PARAM_STYLE_FORM            = 'form';
    const PARAM_STYLE_SIMPLE          = 'simple';
    const PARAM_STYLE_SPACE_DELIMITED = 'spaceDelimited';
    const PARAM_STYLE_PIPE_DELIMITED  = 'pipeDelimited';
    const PARAM_STYLE_DEEP_OBJECT     = 'deepObject';
    const TYPE_STRING                 = 'string';
    const TYPE_INTEGER                = 'integer';
    const TYPE_FLOAT                  = 'number';
    const TYPE_DOUBLE                 = 'number';
    const TYPE_NUMBER                 = 'number';
    const TYPE_BOOLEAN                = 'boolean';
    const TYPE_ARRAY                  = 'array';
    const TYPE_OBJECT                 = 'object';
    const TYPE_NULL                   = 'null';
    const TYPE_FORMAT_STRING_INT32    = 'int32';
    const TYPE_FORMAT_STRING_INT64    = 'int64';
    const TYPE_FORMAT_STRING_BYTE     = 'byte';
    const TYPE_FORMAT_STRING_BINARY   = 'binary';
    const TYPE_FORMAT_STRING_DATE     = 'date';
    const TYPE_FORMAT_STRING_DATETIME = 'date-time';
    const TYPE_FORMAT_STRING_PASSWORD = 'password';
    const TYPE_FORMAT_NUMBER_FLOAT    = 'float';
    const TYPE_FORMAT_NUMBER_DOUBLE   = 'double';

    /**
     * REQUIRED. This string MUST be the semantic version number of the OpenAPI Specification version that the
     * OpenAPI document uses. The openapi field SHOULD be used by tooling specifications and clients
     * to interpret the OpenAPI document. This is not related to the API info.version string.
     *
     *
     * @var string
     */
    public $openapi = '3.0.1';

    /**
     * REQUIRED. Provides metadata about the API. The metadata MAY be used by tooling as required.
     *
     *
     * @var Info
     */
    public $info;

    /**
     * REQUIRED. The available paths and operations for the API.
     * A map between a path and its definition.
     *
     * The key is the relative path to an individual endpoint. The path MUST begin with a slash.
     * The path is appended (no relative URL resolution) to the expanded URL from the Server Object's url
     * field in order to construct the full URL. Path templating is allowed.
     *
     * When matching URLs, concrete (non-templated) paths would be matched before their templated counterparts.
     * Templated paths with the same hierarchy but different templated names MUST NOT exist as they are identical.
     * In case of ambiguous matching, it's up to the tooling to decide which one to use.
     *
     * @see https://swagger.io/specification/#pathsObject
     * @see https://swagger.io/specification/#pathTemplating
     *
     *
     * @var PathItem[] array<string, Path>
     */
    public $paths;

    /**
     * An array of Server Objects, which provide connectivity information to a target server.
     * If the servers property is not provided, or is an empty array,
     * the default value would be a Server Object with a url value of /.
     *
     * @var Server[]
     */
    public $servers;

    /**
     * An element to hold various schemas for the specification.
     *
     * @var Components
     */
    public $components;

    /**
     * A declaration of which security mechanisms can be used across the API.
     * The list of values includes alternative security requirement objects that can be used.
     * Only one of the security requirement objects need to be satisfied to authorize a request.
     * Individual operations can override this definition.
     *
     * @example {"api_key": []}
     *
     * @see     https://swagger.io/specification/#securityRequirementObject
     * @var string[] array<string, string[]>
     */
    public $security;

    /**
     * A list of tags used by the specification with additional metadata.
     * The order of the tags can be used to reflect on their order by the parsing tools.
     * Not all tags that are used by the Operation Object must be declared.
     * The tags that are not declared MAY be organized randomly or based on the tools' logic.
     * Each tag name in the list MUST be unique.
     *
     * @var Tag[]
     */
    public $tags;

    /**
     * Additional external documentation.
     *
     * @var ExternalDocumentation
     */
    public $externalDocs;

    /**
     * @param Info       $info
     * @param PathItem[] $paths
     * @param string     $openapi
     * @param array      $additionalProperties
     */
    public function __construct(Info $info, array $paths, string $openapi = '3.0.1', array $additionalProperties = [])
    {
        $this->info    = $info;
        $this->paths   = $paths;
        $this->openapi = $openapi;

        parent::__construct($additionalProperties);
    }

    /**
     * @param Tag $tag
     *
     * @return $this
     */
    public function addTag(Tag $tag): Document
    {
        $this->tags[] = $tag;
        return $this;
    }

    /**
     * @param string $securitySchemeName
     * @param array  $scopes
     *
     * @return $this
     */
    public function addSecurityRequirement(string $securitySchemeName, $scopes = []): Document
    {
        $this->security[] = [$securitySchemeName => $scopes];
        return $this;
    }
}
