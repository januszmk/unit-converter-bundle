<?php

namespace Polcode\UnitConverterBundle\Unit;

class Length extends BaseImperialUnit
{


    protected function getImperialUnits()
    {
        return array(
            "in" => 0,
            "ft" => 12,
            "yd" => 36,
            "rd" => 5.5 * 36,
            "ch" => 4 * 5.5 * 36,
            "fur" => 40 * 5.5 * 36,
            "mi" => 8 * 40 * 5.5 * 36,
            "lg" => 3 * 8 * 40 * 5.5 * 36,
        );
    }

    protected function getMetricUnits()
    {
        return array(
            "mm" => 0,
            "cm" => 10,
            "m" => 1000,
            "km" => 1000000,
        );
    }

    protected function getImperialToMetricPoint()
    {
        return array(
            "from"  =>  "ch",
            "to"    =>  "m",
            "conversion"    =>  20.1168,
        );
    }

}