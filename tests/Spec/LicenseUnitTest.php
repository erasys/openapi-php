<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use erasys\OpenApi\Spec\v3\License;
use PHPUnit\Framework\TestCase;

class LicenseUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $name = 'foo';

        $obj = new License($name);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($name, $obj->name);
        $this->assertNull($obj->url);
    }

    public function testConstructorAllAssignments()
    {
        $name       = 'foo';
        $url        = 'http://example.com';
        $additional = [
            'name' => null,
            'url'  => 'http://xyz.com',
        ];

        $obj = new License($name, $url, $additional);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($name, $obj->name);
        $this->assertEquals($url, $obj->url);
    }
}
