<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use erasys\OpenApi\Spec\v3\RequestBody;
use PHPUnit\Framework\TestCase;

class RequestBodyUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $content = [];

        $obj = new RequestBody($content);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($content, $obj->content);
        $this->assertNull($obj->description);
        $this->assertNull($obj->required);
    }

    public function testConstructorAllAssignments()
    {
        $content     = [];
        $description = 'Lorem ipsum dolor sit amet';
        $required    = true;
        $additional  = [
            'required'    => false,
            'description' => null,
        ];

        $obj = new RequestBody($content, $description, $required, $additional);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($content, $obj->content);
        $this->assertEquals($description, $obj->description);
        $this->assertEquals($required, $obj->required);
    }
}
