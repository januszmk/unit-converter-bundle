<?php

namespace Polcode\UnitConverterBundle\Tests\Unit;

use Polcode\UnitConverterBundle\Unit\Temperature;

class TemperatureTest extends \PHPUnit_Framework_TestCase
{
    public function testConversion()
    {
        $t = new Temperature("10", "C");
        $this->assertEquals(283.15, $t->getValue("K"));
        $this->assertEquals(50, $t->getValue("F"));
        $t = new Temperature(5, "F");
        $this->assertEquals(-15, $t->getValue("C"));
        $this->assertEquals(5 / 1.8 + 459.67, $t->getValue("K"));
        $t = new Temperature(5, "K");
        $this->assertEquals(-268.15, $t->getValue("C"));
        $this->assertEquals(5 * 1.8 - 459.67, $t->getValue("F"));
    }
}