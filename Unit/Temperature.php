<?php

namespace Polcode\UnitConverterBundle\Unit;

class Temperature extends BaseUnit
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

        if ($toUnit == 'C') {
            if ($fromUnit == 'F') {
                return ($value - 32) / 1.8;
            } elseif ($fromUnit == 'K') {
                return $value - 273.15;
            }
        } elseif ($toUnit == 'F') {
            $value *= 1.8;
            if ($fromUnit == 'C') {
                return $value + 32;
            } elseif ($fromUnit == 'K') {
                return $value - 459.67;
            }
        } elseif ($toUnit == 'K') {
            if ($fromUnit == 'C') {
                return $value + 273.15;
            } elseif ($fromUnit == 'F') {
                return ($value / 1.8) + 459.67;
            }
        }
    }

    public function getSupportedUnits()
    {
        return array(
            "C",
            "F",
            "K"
        );
    }
}