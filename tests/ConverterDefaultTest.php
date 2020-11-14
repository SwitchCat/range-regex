<?php declare(strict_types=1);
/**
 * File:    ConverterDefaultTest.php
 * Created: 13-11-20
 */

namespace SwitchCat\RangeRegex\Tests;

use \PHPUnit\Framework\TestCase;
use \SwitchCat\RangeRegex\ConverterDefault;
use \SwitchCat\RangeRegex\Range;

class ConverterDefaultTest extends TestCase
{
    private ConverterDefault $ConverterDefault;

    public function __construct(?string $name = NULL, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->ConverterDefault = new ConverterDefault();
    }

    public function testToRegex()
    {
        $this->assertIsString($this->ConverterDefault->toRegex(new Range(0, 99999)));
        $this->assertIsString($this->ConverterDefault->toRegex(new Range(-5, 99999)));
        $this->assertIsString($this->ConverterDefault->toRegex(new Range(99999, 0)));
    }
}