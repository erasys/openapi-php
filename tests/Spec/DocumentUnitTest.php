<?php

namespace erasys\OpenApi\Tests\Spec;

use erasys\OpenApi\Spec\v3\Document;
use erasys\OpenApi\Spec\v3\ExtensibleInterface;
use erasys\OpenApi\Spec\v3\Info;
use erasys\OpenApi\Spec\v3\Tag;
use PHPUnit\Framework\TestCase;

class DocumentUnitTest extends TestCase
{
    public function testConstructorRequiredAssignments()
    {
        $info  = new Info('Foo Bar', 'v1');
        $paths = [];

        $obj = new Document($info, $paths);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertSame($info, $obj->info);
        $this->assertSame($paths, $obj->paths);
        $this->assertEquals(Document::DEFAULT_OPENAPI_VERSION, $obj->openapi);
    }

    public function testConstructorAllAssignments()
    {
        $info    = new Info('Foo Bar', 'v1');
        $paths   = [];
        $openapi = '3.0.3';
        $other   = [
            'openapi' => '3.0.0',
            'paths' => [null],
            'tags' => [
                new Tag('Foo'),
            ],
        ];

        $obj = new Document($info, $paths, $openapi, $other);

        $this->assertInstanceOf(ExtensibleInterface::class, $obj);
        $this->assertSame($info, $obj->info);
        $this->assertSame($paths, $obj->paths);
        $this->assertEquals($openapi, $obj->openapi);
        $this->assertSame($other['tags'], $obj->tags);
    }
}
