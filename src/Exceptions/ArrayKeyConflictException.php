<?php

namespace erasys\OpenApi\Exceptions;

use LogicException;
use Throwable;

class ArrayKeyConflictException extends LogicException implements OpenApiException
{
    public function __construct(string $property, int $code = 0, Throwable $previous = null)
    {
        $message = 'The %s key has been already assigned and cannot be replaced.';
        parent::__construct(sprintf($message, $property), $code, $previous);
    }
}
