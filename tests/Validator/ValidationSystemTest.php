<?php

namespace erasys\OpenApi\Tests\Validator;

use erasys\OpenApi\Spec\v3 as OASv3;
use erasys\OpenApi\Validator\DocumentValidator;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;

class ValidationSystemTest extends TestCase
{
    /**
     * @var DocumentValidator
     */
    private $defaultValidator;

    protected function setUp(): void
    {
        if (!$this->defaultValidator) {
            $this->defaultValidator = new DocumentValidator();
        }
    }

    public function testNonExistingSpecFileCausesLogicException()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessageMatches('/The default schema file cannot be found/i');

        new class extends DocumentValidator
        {
            protected $defaultJsonSchemaFile = '/../Spec/v3/schemas/vFooBar.yml';
        };
    }

    public function testJsonSchemaReturnsExpectedObject()
    {
        $schema = $this->defaultValidator->getJsonSchema();
        $this->assertInstanceOf(stdClass::class, $schema);
        $this->assertObjectHasAttribute('type', $schema);
        $this->assertEquals('object', $schema->type);
        $this->assertObjectHasAttribute('properties', $schema);
    }

    public function testValidateSimpleDocumentValid()
    {
        $doc = new OASv3\Document(
            new OASv3\Info('My API', '1.0.0', 'My API description'),
            [
                '/foo/bar' => new OASv3\PathItem(
                    [
                        'get' => new OASv3\Operation(
                            [
                                '200'     => new OASv3\Response('Successful response.'),
                                'default' => new OASv3\Response('Default error response.'),
                            ]
                        ),
                    ]
                ),
            ]
        );

        $result = $this->defaultValidator->validate($doc);

        $this->assertTrue($result->isValid(), json_encode($result->getErrors()));
    }

    public function testValidateSimpleDocumentInvalid()
    {
        $doc = new OASv3\Document(
            new OASv3\Info('My API', '1.0.0', 'My API description'),
            []
        );

        $result = $this->defaultValidator->validate($doc);
        $json   = $doc->toJson();

        $this->assertFalse($result->isValid(), 'This document should be invalid: ' . $json);
    }
}
