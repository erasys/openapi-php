<?php

namespace erasys\OpenApi\Exceptions;

use LogicException;
use Throwable;

class UndefinedPropertyException extends LogicException implements OpenApiException
{
    public function __construct(string $property, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            sprintf("The %s property is not defined. Dynamic access is disabled for Open API objects.", $property),
            $code,
            $previous
        );
    }
}
