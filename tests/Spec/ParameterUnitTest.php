<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\Document;
use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use erasys\OpenApi\Spec\v3\Parameter;
use PHPUnit\Framework\TestCase;

class ParameterUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $name = 'foo';
        $in   = Document::PARAM_IN_QUERY;

        $obj = new Parameter($name, $in);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($name, $obj->name);
        $this->assertEquals($in, $obj->in);
        $this->assertNull($obj->description);
    }

    public function testConstructorAllAssignments()
    {
        $name        = 'foo';
        $in          = Document::PARAM_IN_QUERY;
        $description = 'Lorem ipsum dolor sit amet';
        $additional  = [
            'required'    => true,
            'description' => null,
        ];

        $obj = new Parameter($name, $in, $description, $additional);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($name, $obj->name);
        $this->assertEquals($in, $obj->in);
        $this->assertEquals($description, $obj->description);
        $this->assertTrue($obj->required);
    }
}
