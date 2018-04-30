<?php

namespace erasys\OpenApi\Validator;

use erasys\OpenApi\Spec\v3\Document;
use JsonSchema;
use stdClass;
use Symfony\Component\Yaml\Yaml;

/**
 * Open API document validator
 */
class DocumentValidator
{
    /**
     * @var stdClass
     */
    protected $jsonSchema;

    /**
     * @var string
     */
    protected $defaultJsonSchemaFile = '/../Spec/v3/schemas/v3.0.x.yml';

    /**
     * @param string $jsonSchema JSON Schema of the Open API specification, in YAML format. If omitted, the bundled
     * Open API 3.0.x JSON Schema file will be used.
     */
    public function __construct(string $jsonSchema = null)
    {
        if (is_null($jsonSchema)) {
            $schemaFile = realpath(__DIR__ . $this->defaultJsonSchemaFile);
            if (!file_exists($schemaFile)) {
                throw new \LogicException("The default schema file cannot be found: ${schemaFile}");
            }
            $jsonSchema = file_get_contents($schemaFile);
        }

        $this->jsonSchema = Yaml::parse($jsonSchema, Yaml::PARSE_OBJECT_FOR_MAP);
    }

    /**
     * @param Document $document
     * @return ValidationResult
     */
    public function validate(Document $document): ValidationResult
    {
        $documentObject = $document->toObject();
        $validator      = new JsonSchema\Validator();
        $validator->validate($documentObject, $this->jsonSchema);
        return new ValidationResult($validator->getErrors());
    }

    public function getJsonSchema(): stdClass
    {
        return $this->jsonSchema;
    }
}
