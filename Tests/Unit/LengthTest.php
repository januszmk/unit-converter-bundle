<?php

namespace Polcode\UnitConverterBundle\Tests\Unit;


use Polcode\UnitConverterBundle\Unit\Length;

class LengthTest extends \PHPUnit_Framework_TestCase
{

    public function testConversion()
    {
        $l = new Length("10", "yd");
        $this->assertEquals(10 / 5.5, $l->getValue("rd"));
        $this->assertEquals(30, $l->getValue("ft"));
        $this->assertEquals(9.144, $l->getValue("m"));

        $l = new Length("10", "m");
        $this->assertEquals(10 / 20.1168, $l->getValue("ch"));
        $this->assertEquals(0.01, $l->getValue("km"));
    }

}