<?php

namespace SwitchCat\RangeRegex;

use InvalidArgumentException;

final class Range
{
    private int $min;

    private int $max;

    /**
     * Range constructor.
     *
     * @param int $min
     * @param int $max
     */
    public function __construct(int $min, int $max)
    {
        $this->assertTheseAreIntegers($min, $max);
        if($min > $max)
        {
            throw new \InvalidArgumentException('Parameter 1 has to be smaller or equal to parameter 2');
        }
        $this->min = $min;
        $this->max = $max;
    }

    public function getMin():int
    {
        return $this->min;
    }

    public function getMax():int
    {
        return $this->max;
    }

    private function assertTheseAreIntegers($min, $max):void
    {
        if (is_int($min) === false) {
            throw new InvalidArgumentException(
                sprintf(
                    'Expected an integer as $min but instead got: %s',
                    is_object($min) ? get_class($min) : gettype($min)
                )
            );
        }

        if (is_int($max) === false) {
            throw new InvalidArgumentException(
                sprintf(
                    'Expected an integer as $max but instead got: %s',
                    is_object($max) ? get_class($max) : gettype($max)
                )
            );
        }
    }
}
