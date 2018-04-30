<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use erasys\OpenApi\Spec\v3\Header;
use PHPUnit\Framework\TestCase;

class HeaderUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $obj = new Header();

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertNull($obj->description);
    }

    public function testConstructorAllAssignments()
    {
        $description = 'Lorem ipsum dolor sit amet';
        $additional  = [
            'description' => null,
        ];

        $obj = new Header($description, $additional);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($description, $obj->description);
    }
}
