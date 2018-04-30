<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\Discriminator;
use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use PHPUnit\Framework\TestCase;

class DiscriminatorUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $propertyName = 'foo';

        $obj = new Discriminator($propertyName);

        $this->assertNotInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($propertyName, $obj->propertyName);
        $this->assertNull($obj->mapping);
    }

    public function testConstructorAllAssignments()
    {
        $propertyName = 'foo';
        $mapping      = ['foo' => 'bar'];

        $obj = new Discriminator($propertyName, $mapping);

        $this->assertNotInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($propertyName, $obj->propertyName);
        $this->assertEquals($mapping, $obj->mapping);
    }
}
