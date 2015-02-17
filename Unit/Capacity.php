<?php

namespace Polcode\UnitConverterBundle\Unit;

class Capacity extends BaseImperialUnit
{
    protected function getImperialUnits()
    {
        return array(
            "fl oz" =>  0,
            "gill"  =>  5,
            "cup"   =>  10,
            "pt"    =>  20,
            "qt"    =>  40,
            "gal"   =>  160,
        );
    }

    protected function getMetricUnits()
    {
        return array(
            "ml" => 0,
            "l" => 1000,
            "hl" => 100000,
            "mm3" => 0,
            "dm3"   =>  1000,
            "m3"    =>  1000000,
        );
    }



    protected function getImperialToMetricPoint()
    {
        return array(
            "from"  =>  "pt",
            "to"    =>  "l",
            "conversion"    =>  0.568261,
        );
    }
}