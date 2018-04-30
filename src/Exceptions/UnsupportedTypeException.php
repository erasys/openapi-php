<?php

namespace erasys\OpenApi\Exceptions;

use Throwable;
use UnexpectedValueException;

class UnsupportedTypeException extends UnexpectedValueException implements OpenApiException
{
    public function __construct(string $type, int $code = 0, Throwable $previous = null)
    {
        $message = 'Unsupported type: %s.';
        parent::__construct(sprintf($message, $type), $code, $previous);
    }
}
