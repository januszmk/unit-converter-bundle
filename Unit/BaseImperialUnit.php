<?php

namespace Polcode\UnitConverterBundle\Unit;

abstract class BaseImperialUnit extends BaseUnit
{

    /**
     * @param $value
     * @param $toUnit
     * @param null $fromUnit
     *
     * @return float
     */
    protected function convert($value, $toUnit, $fromUnit = null)
    {

        if (!$fromUnit) {
            $fromUnit = $this->unit;
        }

        //checking if is imperial and converting current value into imperial
        if ($this->isImperial($fromUnit) && !$this->isImperial($toUnit)) {
            $conversion = $this->getImperialToMetricPoint();
            $val = $this->convert($value, $conversion['from']);
            $val *= $conversion['conversion'];
            return $this->convert($val, $toUnit, $conversion['to']);
        }

        //checking if is metric and converting current value into metric
        if ($this->isMetric($fromUnit) && !$this->isMetric($toUnit)) {
            $conversion = $this->getImperialToMetricPoint();
            $val = $this->convert($value, $conversion['to']);
            $val /= $conversion['conversion'];
            return $this->convert($val, $toUnit, $conversion['from']);
        }

        $units = ($this->isImperial($fromUnit)) ? $this->getImperialUnits() : $this->getMetricUnits();

        $value *= $units[$fromUnit];
        if ($units[$toUnit]) {
            $value /= $units[$toUnit];
        }

        return $value;

    }

    /**
     * @param mixed $unit
     * checking if unit is imperial
     * @return bool
     */
    public function isImperial($unit = null)
    {
        if (!$unit) {
            $unit = $this->unit;
        }

        return in_array($unit, array_keys($this->getImperialUnits()));
    }


    /**
     * @param null $unit
     * checking if unit is metric
     * @return bool
     */
    public function isMetric($unit = null)
    {
        if (!$unit) {
            $unit = $this->unit;
        }

        return in_array($unit, array_keys($this->getMetricUnits()));
    }


    /**
     * @return array imperial units
     */
    protected function getImperialUnits()
    {
        return array();
    }

    /**
     * @return array metric units
     */
    protected function getMetricUnits()
    {
        return array();
    }


    public function getSupportedUnits()
    {
        return array_merge(array_keys($this->getImperialUnits()), array_keys($this->getMetricUnits()));
    }

    /**
     *
     * @return array data to convert units,
     * key from => from what unit we convert,
     * key to   => to what unit we convert,
     * key conversion => difference between units
     */
    protected function getImperialToMetricPoint()
    {
        return array();
    }


}