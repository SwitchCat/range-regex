<?php

namespace SwitchCat\RangeRegex;

final class ConverterCached implements Converter
{
    private Converter $converter;

    private array $cache = [];

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    private function getKey(Range $range):string
    {
        return sprintf('%d:%d', $range->getMin(), $range->getMax());
    }

    public function toRegex(Range $range):string
    {
        $key = $this->getKey($range);

        if (isset($this->cache[$key])) {
            return $this->cache[$key];
        }

        $regex = $this->converter->toRegex($range);
        $this->cache[$key] = $regex;

        return $regex;
    }
}
