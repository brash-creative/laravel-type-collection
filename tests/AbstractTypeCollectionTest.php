<?php

namespace Brash\TypeCollection\Tests;

use Brash\TypeCollection\Tests\Resource\IntegerTypeCollection;
use PHPUnit\Framework\TestCase;

class AbstractTypeCollectionTest extends TestCase
{
    public function testCollectionCreationAcceptsTypeTrue()
    {
        $sut = new IntegerTypeCollection([1, 2]);

        $this->assertCount(2, $sut);
        $this->assertEquals([1, 2], $sut->all());
    }

    public function testCollectionCreationWithInvalidType()
    {
        $this->expectException(\UnexpectedValueException::class);
        $this->expectExceptionMessage(sprintf("Invalid value passed to %s", IntegerTypeCollection::class));

        new IntegerTypeCollection([1, 'This is a string!']);
    }

    public function testPushWithTypeTrue()
    {
        $sut = new IntegerTypeCollection;
        $sut->push(1);

        $this->assertCount(1, $sut);
        $this->assertEquals([1], $sut->all());
    }

    public function testPushWithInvalidType()
    {
        $this->expectException(\UnexpectedValueException::class);
        $this->expectExceptionMessage(sprintf("Invalid value passed to %s", IntegerTypeCollection::class));

        $sut = new IntegerTypeCollection;
        $sut->push('This is a string!');
    }

    public function testPutWithTypeTrue()
    {
        $sut = new IntegerTypeCollection;
        $sut->put('key', 1);

        $this->assertCount(1, $sut);
        $this->assertEquals(['key' => 1], $sut->all());
        $this->assertEquals(1, $sut->get('key'));
    }

    public function testPutWithInvalidType()
    {
        $this->expectException(\UnexpectedValueException::class);
        $this->expectExceptionMessage(sprintf("Invalid value passed to %s", IntegerTypeCollection::class));

        $sut = new IntegerTypeCollection;
        $sut->put('key', 'This is a string!');
    }
}
