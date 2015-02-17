<?php

namespace Polcode\UnitConverterBundle\Tests\Unit;

use Polcode\UnitConverterBundle\Unit\Capacity;

class CapacityTest extends \PHPUnit_Framework_TestCase
{

    public function testConversion()
    {
        $cap = new Capacity("10", "pt");
        $this->assertEquals(5.68261, $cap->getValue("l"));
        $this->assertEquals(20, $cap->getValue("cup"));

        $cap = new Capacity("10", "l");
        $this->assertEquals(10 / 0.568261, $cap->getValue("pt"));
        $this->assertEquals(0.1, $cap->getValue("hl"));
    }

}