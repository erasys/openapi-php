<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use erasys\OpenApi\Spec\v3\Server;
use PHPUnit\Framework\TestCase;

class ServerUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $url = 'http://example.com';

        $obj = new Server($url);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($url, $obj->url);
        $this->assertNull($obj->description);
        $this->assertNull($obj->variables);
    }

    public function testConstructorAllAssignments()
    {
        $url         = 'http://example.com';
        $description = 'Lorem ipsum dolor sit amet';
        $variables   = [];
        $additional  = [
            'url'         => 'http://xyz.com',
            'description' => null,
        ];

        $obj = new Server($url, $description, $variables, $additional);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($url, $obj->url);
        $this->assertEquals($description, $obj->description);
        $this->assertEquals($variables, $obj->variables);
    }
}
