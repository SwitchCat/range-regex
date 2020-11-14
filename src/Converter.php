<?php

namespace SwitchCat\RangeRegex;

interface Converter
{
    public function toRegex(Range $range);
}
