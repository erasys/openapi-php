<?php

namespace erasys\OpenApi\Exceptions;

use LogicException;
use Throwable;

class ArrayKeyConflictException extends LogicException implements OpenApiException
{
    public function __construct(string $property, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            sprintf("The %s key has been already assigned and cannot be replaced.", $property),
            $code,
            $previous
        );
    }
}
