<?php

namespace SwitchCat\RangeRegex;

interface Factory
{
    /**
     * @return Converter
     */
    public function getConverter();
}
