<?php

namespace erasys\OpenApi\Exceptions;

use Throwable;
use UnexpectedValueException;

class UnsupportedTypeException extends UnexpectedValueException implements OpenApiException
{
    public function __construct(string $type, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            sprintf("Unsupported type: %s.", $type),
            $code,
            $previous
        );
    }
}
