<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use erasys\OpenApi\Spec\v3\ServerVariable;
use PHPUnit\Framework\TestCase;

class ServerVariableUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $default = 'foo';

        $obj = new ServerVariable($default);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($default, $obj->default);
        $this->assertNull($obj->description);
    }

    public function testConstructorAllAssignments()
    {
        $default     = 'foo';
        $description = 'Lorem ipsum dolor sit amet';
        $enum        = [];
        $additional  = [
            'description' => null,
        ];

        $obj = new ServerVariable($default, $description, $enum, $additional);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($default, $obj->default);
        $this->assertEquals($description, $obj->description);
        $this->assertEquals($enum, $obj->enum);
    }
}
