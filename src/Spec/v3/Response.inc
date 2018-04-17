<?php

namespace erasys\OpenApi\Spec\v3;

/**
 * Describes a single response from an API Operation, including design-time, static links to operations based on the
 * response.
 *
 * @see https://swagger.io/specification/#responsesObject
 */
class Response extends AbstractObject
{

  /**
   * REQUIRED. A short description of the response. CommonMark syntax MAY be used for rich text representation.
   *
   *
   * @var string
   */
    public $description;

  /**
   * Maps a header name to its definition. RFC7230 states header names are case insensitive. If a response header is
   * defined with the name "Content-Type", it SHALL be ignored.
   *
   * @var Header[]|Reference[] array<string, Header>|array<string, Reference>
   */
    public $headers;

  /**
   * A map containing descriptions of potential response payloads. The key is a media type or media type range and the
   * value describes it. For responses that match multiple keys, only the most specific key is applicable. e.g.
   * text/plain overrides text/*
   *
   * @see https://tools.ietf.org/html/rfc7231#appendix-D
   * @var MediaType[] array<string, MediaType>
   */
    public $content;

  /**
   * A map of operations links that can be followed from the response. The key of the map is a short name for the link,
   * following the naming constraints of the names for Component Objects.
   *
   * @see https://swagger.io/specification/#componentsObject
   * @var Link[]|Reference[] array<string, Link>|array<string, Reference>
   */
    public $links;
}
