<?php

namespace Polcode\UnitConverterBundle\Tests\Unit;

use Polcode\UnitConverterBundle\Unit\Mass;

class MassTest extends \PHPUnit_Framework_TestCase
{

    public function testConversion()
    {
        $m = new Mass("10", "st");
        $this->assertEquals(140, $m->getValue("lb"));
        $this->assertEquals(5, $m->getValue("qrt"));
        $this->assertEquals(63.5, $m->getValue("kg"));

        $m = new Mass("10", "kg");
        $this->assertEquals(1000, $m->getValue("dg"));
        $this->assertEquals(10 / 6.35, $m->getValue("st"));
    }

}