<?php

namespace Polcode\UnitConverterBundle\Unit;

class Byte extends BaseUnit
{

    /**
     * @param $value
     * @param $toUnit
     * @param mixed $fromUnit
     *
     * @return float converted value
     */
    protected function convert($value, $toUnit, $fromUnit = null)
    {

        if (!$fromUnit) {
            $fromUnit = $this->unit;
        }


        $units = $this->getSupportedUnits();
        $fromUnitIndex = array_search($fromUnit, $units);
        $toUnitIndex = array_search($toUnit, $units);

        $diff = $toUnitIndex - $fromUnitIndex;

        return $value * pow(1024, $diff * -1);
    }

    public function getSupportedUnits()
    {
        return array(
            "b",
            "kb",
            "mb",
            "gb",
            "tb",
            "pb",
            "eb",
            "zb",
            "yb",
        );
    }
}