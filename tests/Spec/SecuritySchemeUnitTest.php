<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\Document;
use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use erasys\OpenApi\Spec\v3\SecurityScheme;
use PHPUnit\Framework\TestCase;

class SecuritySchemeUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $type = 'apiKey';

        $obj = new SecurityScheme($type);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($type, $obj->type);
        $this->assertNull($obj->description);
    }

    public function testConstructorAllAssignments()
    {
        $type        = 'apiKey';
        $description = 'Lorem ipsum dolor sit amet';
        $additional  = [
            'in'          => Document::PARAM_IN_HEADER,
            'description' => null,
        ];

        $obj = new SecurityScheme($type, $description, $additional);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($type, $obj->type);
        $this->assertEquals($description, $obj->description);
        $this->assertEquals($additional['in'], $obj->in);
    }
}
