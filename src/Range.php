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
        if($min > $max)
        {
            throw new InvalidArgumentException('Parameter 1 has to be smaller or equal to parameter 2');
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
}
