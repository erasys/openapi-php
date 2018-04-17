<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Describes a single operation parameter.
 * A unique parameter is defined by a combination of a name and location.
 *
 * Parameter Locations
 * There are four possible parameter locations specified by the in field:
 *
 * - path: Used together with Path Templating, where the parameter value is actually part of the operation's URL. This
 * does not include the host or base path of the API. For example, in /items/{itemId}, the path parameter is itemId.
 *
 * - query: Parameters that are appended to the URL. For example, in /items?id=###, the query parameter is id.
 *
 * - header: Custom headers that are expected as part of the request. Note that RFC7230 states header names are case
 * insensitive.
 *
 * - cookie: - Used to pass a specific cookie value to the API.
 *
 *
 * The rules for serialization of the parameter are specified in one of two ways.
 * For simpler scenarios, a "schema" and "style" can describe the structure and syntax of the parameter.
 *
 * For more complex scenarios, the "content" property can define the media type and schema of the parameter.
 * A parameter MUST contain either a "schema" property, or a "content" property, but not both
 * When "example" or "examples" are provided in conjunction with the "schema" object, the "example" MUST
 * follow the prescribed serialization strategy for the parameter.
 *
 * @see https://swagger.io/specification/#parameterObject
 */
class Parameter extends AbstractParameter
{

    const IN_PATH = 'path';
    const IN_QUERY = 'query';
    const IN_HEADER = 'header';
    const IN_COOKIE = 'cookie';

    /**
     * REQUIRED. The name of the parameter. Parameter names are case sensitive.
     *
     * - If in is "path", the name field MUST correspond to the associated path segment from the path field in the Paths
     * Object. See Path Templating for further information.
     *
     * - If in is "header" and the name field is "Accept",
     * "Content-Type" or "Authorization", the parameter definition SHALL be ignored.
     *
     * - For all other cases, the name corresponds to the parameter name used by the in property.
     *
     * @see https://swagger.io/specification/#pathTemplating
     *
     *
     * @var string
     */
    public $name;

    /**
     * REQUIRED. The location of the parameter. Possible values are "query", "header", "path" or "cookie".
     *
     *
     * @var string
     */
    public $in;
}
