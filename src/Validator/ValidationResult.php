<?php

namespace erasys\OpenApi\Validator;

class ValidationResult
{
    /**
     * @var array
     */
    private $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    public function isValid(): bool
    {
        return !$this->hasErrors();
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
