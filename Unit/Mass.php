<?php

namespace Polcode\UnitConverterBundle\Unit;

class Mass extends BaseImperialUnit
{
    protected function getImperialUnits()
    {
        return array(
            "gr"    =>  0,
            "dr"    =>  27 + 11/32,
            "oz"    =>  16 * (27 + 11/32),
            "lb"    =>  256 * (27 + 11/32),
            "st"    =>  14 * 256 * (27 + 11/32),
            "qrt"   =>  28 * 256 * (27 + 11/32),
            "cwt"   =>  4 * 28 * 256 * (27 + 11/32),
        );
    }

    protected function getMetricUnits()
    {
        return array(
            "g" => 0,
            "dg" => 10,
            "kg" => 1000,
            "t" => 1000000,
        );
    }



    protected function getImperialToMetricPoint()
    {
        return array(
            "from"  =>  "st",
            "to"    =>  "kg",
            "conversion"    =>  6.35,
        );
    }
}