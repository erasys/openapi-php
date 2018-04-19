<?php

namespace erasys\OpenApi\Tests;

use erasys\OpenApi\Exceptions\ArrayKeyConflictException;
use erasys\OpenApi\Exceptions\UndefinedPropertyException;
use erasys\OpenApi\Exceptions\UnsupportedTypeException;
use erasys\OpenApi\ExtensionProperty;
use erasys\OpenApi\RawValue;
use erasys\OpenApi\Spec\v3\AbstractObject;
use erasys\OpenApi\Spec\v3\Reference;
use erasys\OpenApi\Spec\v3\Tag;
use PHPUnit\Framework\TestCase;
use stdClass;

class AbstractObjectUnitTest extends TestCase
{
    private function getClassStub(array $properties = []): AbstractObject
    {
        return new class($properties) extends AbstractObject
        {
            public $foo;

            public function __construct(array $properties = [])
            {
                parent::__construct($properties);
            }
        };
    }

    public function testGetUndefinedPropertyViaGetterShouldFail()
    {
        $this->expectException(UndefinedPropertyException::class);
        $this->expectExceptionCode(1);

        $obj = $this->getClassStub();
        $obj->undefinedProperty;
    }

    public function testSetUndefinedPropertyViaSetterShouldFail()
    {
        $this->expectException(UndefinedPropertyException::class);
        $this->expectExceptionCode(2);

        $obj                    = $this->getClassStub();
        $obj->undefinedProperty = null;
    }

    public function testGetUndefinedPropertyViaArrayOffsetShouldFail()
    {
        $this->expectException(UndefinedPropertyException::class);
        $this->expectExceptionCode(1);

        $obj = $this->getClassStub();
        $obj['undefinedProperty'];
    }

    public function testGetOffsetIsset()
    {
        $obj = $this->getClassStub();
        $this->assertFalse(isset($obj['foo']));
        $this->assertFalse(isset($obj['undefinedProperty']));
        $obj->foo = 'bar';
        $this->assertTrue(isset($obj['foo']));
    }

    public function testGetOffsetUnset()
    {
        $obj = $this->getClassStub(['foo' => 'bar']);
        $this->assertTrue(isset($obj['foo']));
        unset($obj['foo']);
        $this->assertFalse(isset($obj['foo']));
    }

    public function testSetUndefinedPropertyViaArrayOffsetShouldFail()
    {
        $this->expectException(UndefinedPropertyException::class);
        $this->expectExceptionCode(2);

        $obj                      = $this->getClassStub();
        $obj['undefinedProperty'] = null;
    }

    public function testSetUndefinedPropertyViaConstructorShouldFail()
    {
        $this->expectException(UndefinedPropertyException::class);
        $this->expectExceptionCode(2);

        $this->getClassStub(['undefinedProperty' => null]);
    }

    public function testToArrayWithUnsupportedTypeShouldFail()
    {
        $this->expectException(UnsupportedTypeException::class);
        $this->expectExceptionCode(0);

        $obj      = $this->getClassStub();
        $obj->foo = new stdClass();
        $obj->toArray();
    }

    public function testToArrayShouldNotReturnNonPublicProperties()
    {
        $obj = new class() extends AbstractObject
        {
            public $foo = 'a';
            protected $bar = 'b';
            private $baz = 'c';
        };

        $expected = ['foo' => 'a'];
        $actual   = $obj->toArray();

        $this->assertEquals($expected, $actual);
    }

    public function testToArrayNullPropertiesShouldNotBeExported()
    {
        $obj = new class() extends AbstractObject
        {
            public $foo = 'a';
            public $bar = null;
            public $baz;
        };

        $expected = ['foo' => 'a'];
        $actual   = $obj->toArray();

        $this->assertEquals($expected, $actual);
    }

    public function testToArrayRawValueShouldBeExportedAsItIs()
    {
        $obj = new class() extends AbstractObject
        {
            public $foo = 'a';
            public $bar = null;
            public $baz;
        };

        $obj->bar = new RawValue('b');
        $obj->baz = new RawValue(null);

        $expected = ['foo' => 'a', 'bar' => 'b', 'baz' => null];
        $actual   = $obj->toArray();

        $this->assertEquals($expected, $actual);
    }

    public function testToArrayNestedAbstractObjectShouldBeExported()
    {
        $obj = new class() extends AbstractObject
        {
            public $foo = 'a';
            public $bar;
        };

        $obj->bar = new Tag('foobar');

        $expected = ['foo' => 'a', 'bar' => ['name' => 'foobar']];
        $actual   = $obj->toArray();

        $this->assertEquals($expected, $actual);
    }

    public function testToArrayExtensionPropertyObjectShouldBeMappedAndExported()
    {
        $obj = new class() extends AbstractObject
        {
            public $foo = 'a';
            public $xBarBaz;
            public $xBarBazFoo;
        };

        $obj->xBarBaz    = new ExtensionProperty('Hello-World', 123);
        $obj->xBarBazFoo = new ExtensionProperty('Hello-World-Foo', null);

        $expected = ['foo' => 'a', 'x-Hello-World' => 123];
        $actual   = $obj->toArray();

        $this->assertEquals($expected, $actual);
    }

    public function testToArrayXmlPropertyShouldNotBeTreatedAsExtension()
    {
        $obj = new class() extends AbstractObject
        {
            public $foo = 'a';
            public $xml = 'b';
            public $xML = 'c';
        };

        $expected = ['foo' => 'a', 'xml' => 'b', 'x-ML' => 'c'];
        $actual   = $obj->toArray();

        $this->assertEquals($expected, $actual);
    }

    public function testToArrayExtensionNameShouldBeExportedWithDashedFormatAndRespectedCase()
    {
        $obj = new class() extends AbstractObject
        {
            public $foo = 'a';
            public $x_bar_baz = 'b';
            public $x_BarBazFoo = 'c';
            public $xBarBaz_foo_Bar = 'd';
            public $xBar_baz = 'e';
            public $xbar_baz_foo = 'f';
        };

        $expected = [
            'foo' => 'a',
            'x-bar-baz' => 'b',
            'x-BarBazFoo' => 'c',
            'x-BarBaz-foo-Bar' => 'd',
            'x-Bar-baz' => 'e',
            'x-bar-baz-foo' => 'f',
        ];
        $actual   = $obj->toArray();

        $this->assertEquals($expected, $actual);
    }

    public function testToArrayWithConflictingExtensionNamesShouldFail()
    {
        $this->expectException(ArrayKeyConflictException::class);
        $this->expectExceptionCode(0);

        $obj = new class() extends AbstractObject
        {
            public $foo = 'a';
            public $x_Bar_baz = 'b';
            public $xBar_baz = 'e';
        };
        $obj->toArray();
    }

    public function testToArrayRefPropertyNameShouldBeExportedWithDollarSign()
    {
        $obj = new class() extends AbstractObject
        {
            public $foo = 'a';
            public $ref;
            public $data;
        };

        $obj->ref  = 'b';
        $obj->data = new Reference('c');

        $expected = ['foo' => 'a', '$ref' => 'b', 'data' => ['$ref' => 'c']];
        $actual   = $obj->toArray();

        $this->assertEquals($expected, $actual);
    }

    public function testToJson()
    {
        $obj = $this->getClassStub();
        $this->assertEquals('{}', $obj->toJson());

        $obj      = $this->getClassStub();
        $obj->foo = 'bar';

        $this->assertEquals('{"foo":"bar"}', $obj->toJson());
    }

    public function testToYaml()
    {
        $obj = $this->getClassStub();
        $this->assertEquals('{  }', $obj->toYaml());

        $obj      = $this->getClassStub();
        $obj->foo = 'bar';

        $this->assertEquals("foo: bar\n", $obj->toYaml());
    }

    public function testToObject()
    {
        $obj = $this->getClassStub();
        $this->assertEquals('{}', $obj->__toString());

        $obj      = $this->getClassStub();
        $obj->foo = 'bar';

        $this->assertEquals('{"foo":"bar"}', $obj->__toString());
    }

    public function testToString()
    {
        $obj = $this->getClassStub();
        $this->assertEquals(new stdClass(), $obj->toObject());

        $obj           = $this->getClassStub();
        $obj->foo      = 'bar';
        $expected      = new stdClass();
        $expected->foo = 'bar';
        $this->assertEquals($expected, $obj->toObject());
    }
}
