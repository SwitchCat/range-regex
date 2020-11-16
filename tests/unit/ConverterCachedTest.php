<?php
/**
 * File:    CoverterCachedTest.php
 * Created: 15-11-20
 */

namespace SwitchCat\RangeRegex\Tests;

use \PHPUnit\Framework\TestCase;
use SwitchCat\RangeRegex\ConverterCached;
use SwitchCat\RangeRegex\Converter;
use SwitchCat\RangeRegex\ConverterDefault;
use SwitchCat\RangeRegex\Range;

class ConverterCachedTest extends TestCase
{
    /**
     * @covers \SwitchCat\RangeRegex\ConverterCached::__construct
     */
    public function testConverterCachedRequiresParam()
    {
        $this->expectException(\ArgumentCountError::class);
        new ConverterCached();
    }

    /**
     * @covers \SwitchCat\RangeRegex\ConverterCached::__construct
     * @covers \SwitchCat\RangeRegex\ConverterCached::toRegex
     */
    public function testToRegexRequiresParam()
    {
        $this->expectException(\ArgumentCountError::class);
        $Converter = new ConverterDefault();
        $ConverterCached = new ConverterCached($Converter);
        $ConverterCached->toRegex();
    }

    /**
     * @throws \ReflectionException
     * @covers \SwitchCat\RangeRegex\ConverterCached::getKey
     * @covers \SwitchCat\RangeRegex\ConverterCached::__construct
     * @covers \SwitchCat\RangeRegex\Range::__construct
     * @covers \SwitchCat\RangeRegex\Range::getMax
     * @covers \SwitchCat\RangeRegex\Range::getMin
     */
    public function testGetKeyReturnsString()
    {
        $Converter = new ConverterDefault();
        $ConverterCached = new ConverterCached($Converter);
        $ReflectionMethod = new \ReflectionMethod(get_class($ConverterCached), 'getKey');
        $ReflectionMethod->setAccessible(true);
        $this->assertIsString($ReflectionMethod->invokeArgs($ConverterCached, array(new Range(0, 5))));
    }

    /**
     * @covers \SwitchCat\RangeRegex\ConverterCached::__construct
     * @covers \SwitchCat\RangeRegex\ConverterCached::toRegex
     * @covers \SwitchCat\RangeRegex\ConverterCached::getKey
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countNines
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countZeros
     * @covers \SwitchCat\RangeRegex\ConverterDefault::filterPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::rangeToPattern
     * @covers \SwitchCat\RangeRegex\ConverterDefault::siftPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToRanges
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex
     * @covers \SwitchCat\RangeRegex\ConverterDefault::zip
     * @covers \SwitchCat\RangeRegex\Range::__construct
     * @covers \SwitchCat\RangeRegex\Range::getMax
     * @covers \SwitchCat\RangeRegex\Range::getMin
     */
    public function testToRegexReturnsString()
    {
        $Converter = new ConverterDefault();
        $ConverterCached = new ConverterCached($Converter);
        $this->assertIsString($ConverterCached->toRegex(new Range(0, 5)));
    }
}