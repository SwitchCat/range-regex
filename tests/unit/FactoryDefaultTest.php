<?php
/**
 * File:    FactoryDefaultTest.php
 * Created: 15-11-20
 */

namespace SwitchCat\RangeRegex\Tests;

use PHPUnit\Framework\TestCase;
use SwitchCat\RangeRegex\ConverterCached;
use \SwitchCat\RangeRegex\FactoryDefault;

class FactoryDefaultTest extends TestCase
{
    /**
     * @covers \SwitchCat\RangeRegex\FactoryDefault::getConverter()
     * @covers \SwitchCat\RangeRegex\ConverterCached::__construct()
     */
    public function testGetConverterReturnsConverterCached()
    {
        $FactoryDefault = new FactoryDefault();
        $this->assertIsObject($FactoryDefault->getConverter());
        $this->assertInstanceOf(ConverterCached::class, $FactoryDefault->getConverter());
    }
}