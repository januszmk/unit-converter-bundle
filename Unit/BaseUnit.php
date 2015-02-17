<?php

namespace Polcode\UnitConverterBundle\Unit;

use Polcode\UnitConverterBundle\Exceptions\UnitException;

abstract class BaseUnit
{
    protected $value;
    protected $unit;

    /**
     * @param $value
     * @param $unit
     *
     * @throws UnitException when unit is not supported
     */
    public function __construct($value, $unit)
    {
        if (!is_numeric($value)) {
            throw new UnitException("Wrong value");
        }
        $this->checkIfSupportedUnit($unit);
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @param string|null $unit unit that we want value in, if not specified, unit from the class will be taken
     * @param boolean $suffix if true, unit will be added to the return value
     *
     * @return mixed
     */
    public function getValue($unit = null, $suffix = false)
    {
        $this->checkIfSupportedUnit($unit);
        $value = $this->value;

        if ($unit && $unit != $this->unit) {
            $value = $this->convert($this->value, $unit, $this->unit);
        }

        if ($suffix) {
            $value .= " " . ($unit ? $unit : $this->unit);
        }

        return $value;

    }


    /**
     * @param $value
     * @param $toUnit
     * @param mixed $fromUnit
     *
     * @return float converted value
     */
    abstract protected function convert($value, $toUnit, $fromUnit = null);

    /**
     * @param $unit
     * Check if unit is supported by class
     * @throws UnitException when unit is not supported
     */
    protected function checkIfSupportedUnit($unit)
    {
        if ($unit && !in_array($unit, $this->getSupportedUnits())) {
            throw new UnitException(sprintf(
                "Not supported unit: %s by class: %s. Supported units: %s", $unit, get_class($this), implode(", ", $this->getSupportedUnits())
            ));
        }
    }

    /**
     * @return array supported unit
     */
    abstract public function getSupportedUnits();


}