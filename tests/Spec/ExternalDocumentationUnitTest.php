<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use erasys\OpenApi\Spec\v3\ExternalDocumentation;
use PHPUnit\Framework\TestCase;

class ExternalDocumentationUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $url = 'http://www.example.com';

        $obj = new ExternalDocumentation($url);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($url, $obj->url);
        $this->assertNull($obj->description);
    }

    public function testConstructorAllAssignments()
    {
        $url         = 'foo';
        $description = 'Lorem ipsum dolor sit amet';
        $additional  = [
            'url'         => 'http://xyz.com',
            'description' => null,
        ];

        $obj = new ExternalDocumentation($url, $description, $additional);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertEquals($url, $obj->url);
        $this->assertEquals($description, $obj->description);
    }
}
