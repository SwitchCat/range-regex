<?php

namespace SwitchCat\RangeRegex;

final class FactoryDefault implements Factory
{
    public function getConverter():ConverterCached
    {
        $converter = new ConverterDefault();

        return new ConverterCached($converter);
    }
}
