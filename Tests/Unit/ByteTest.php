<?php

namespace Polcode\UnitConverterBundle\Tests\Unit;

use Polcode\UnitConverterBundle\Unit\Byte;

class ByteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Polcode\UnitConverterBundle\Exceptions\UnitException
     */
    public function testUnsupportedUnit()
    {
        new Byte("1", "test");
    }

    /**
     * @expectedException \Polcode\UnitConverterBundle\Exceptions\UnitException
     */
    public function testNotNumericValue()
    {
        new Byte("text", "b");
    }

    public function testConversion()
    {
        $byte = new Byte("4", "mb");
        $this->assertEquals(4, $byte->getValue());
        $this->assertEquals(4 * 1024, $byte->getValue("kb"));
        $this->assertEquals(4 / 1024, $byte->getValue("gb"));

        $this->assertEquals("4 mb", $byte->getValue(null, true));
        $this->assertEquals("4096 kb", $byte->getValue("kb", true));
    }

}