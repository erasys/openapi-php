<?php

namespace erasys\OpenApi\Exceptions;

use LogicException;
use Throwable;

class UndefinedPropertyException extends LogicException implements OpenApiException
{
    public function __construct(string $property, int $code = 0, Throwable $previous = null)
    {
        $message = 'The %s property is not defined. Dynamic access is disabled for Open API objects.';
        parent::__construct(sprintf($message, $property), $code, $previous);
    }
}
