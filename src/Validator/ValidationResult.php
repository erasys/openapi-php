<?php

namespace erasys\OpenApi\Validator;

class ValidationResult
{
    /**
     * @var bool
     */
    private $valid;

    /**
     * @var array
     */
    private $errors;

    public function __construct(bool $valid, array $errors)
    {
        $this->valid  = $valid;
        $this->errors = $errors;
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }
}
