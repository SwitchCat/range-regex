<?php
/**
 * File:    ConverterDefaultTest.php
 * Created: 15-11-20
 */

namespace SwitchCat\RangeRegex\Tests;

use \PHPUnit\Framework\TestCase;
use SwitchCat\RangeRegex\ConverterCached;
use \SwitchCat\RangeRegex\ConverterDefault;
use \SwitchCat\RangeRegex\Range;

class ConverterDefaultTest extends TestCase
{
    /**
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex()
     */
    public function testToArrayThrowsExceptionWithInvalidParameters_string()
    {
        $this->expectException(\TypeError::class);
        $ConverterDefault = new ConverterDefault();
        $ConverterDefault->toRegex('Range');
    }

    /**
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex()
     */
    public function testToArrayThrowsExceptionWithInvalidParameters_int()
    {
        $this->expectException(\TypeError::class);
        $ConverterDefault = new ConverterDefault();
        $ConverterDefault->toRegex(1);
    }

    /**
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex()
     */
    public function testToArrayThrowsExceptionWithInvalidParameters_float()
    {
        $this->expectException(\TypeError::class);
        $ConverterDefault = new ConverterDefault();
        $ConverterDefault->toRegex(1.1);
    }

    /**
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex()
     */
    public function testToArrayThrowsExceptionWithInvalidParameters_bool()
    {
        $this->expectException(\TypeError::class);
        $ConverterDefault = new ConverterDefault();
        $ConverterDefault->toRegex(TRUE);
    }

    /**
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex()
     */
    public function testToArrayThrowsExceptionWithInvalidParameters_array()
    {
        $this->expectException(\TypeError::class);
        $ConverterDefault = new ConverterDefault();
        $ConverterDefault->toRegex(['Range']);
    }

    /**
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex()
     */
    public function testToArrayThrowsExceptionWithInvalidParameters_object()
    {
        //$Range = new Range(0,1);
        $this->expectException(\TypeError::class);
        $ConverterDefault = new ConverterDefault();
        $ConverterDefault->toRegex(new \stdClass());
    }

    /**
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex()
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countNines
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countZeros
     * @covers \SwitchCat\RangeRegex\ConverterDefault::filterPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::rangeToPattern
     * @covers \SwitchCat\RangeRegex\ConverterDefault::siftPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToRanges
     * @covers \SwitchCat\RangeRegex\ConverterDefault::zip
     * @covers \SwitchCat\RangeRegex\Range::__construct
     * @covers \SwitchCat\RangeRegex\Range::getMax
     * @covers \SwitchCat\RangeRegex\Range::getMin
     */
    public function testToArrayReturnsStringWithCorrectParams()
    {
        $Range = new Range(0,1);
        $ConverterDefault = new ConverterDefault();
        $this->assertIsString($ConverterDefault->toRegex($Range));
    }

    /**
     * @throws \ReflectionException
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countNines
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countZeros
     * @covers \SwitchCat\RangeRegex\ConverterDefault::filterPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::rangeToPattern
     * @covers \SwitchCat\RangeRegex\ConverterDefault::siftPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToRanges
     * @covers \SwitchCat\RangeRegex\ConverterDefault::zip
     * @covers \SwitchCat\RangeRegex\Range::__construct
     * @covers \SwitchCat\RangeRegex\Range::getMax
     * @covers \SwitchCat\RangeRegex\Range::getMin
     */
    public function testToArrayThrowsExceptionWithIncorrectParams_minHigherThanMax()
    {
        $this->expectException(\InvalidArgumentException::class);
        $Range = new Range(1,0);
        $ConverterDefault = new ConverterDefault();
        $ConverterDefault->toRegex($Range);
    }

    /**
     * @throws \ReflectionException
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToRanges
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countNines
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countZeros
     */
    public function testSplitToRangesReturnsArray()
    {
        $Converter = new ConverterDefault();
        $ReflectionMethod = new \ReflectionMethod(get_class($Converter), 'splitToRanges');
        $ReflectionMethod->setAccessible(true);
        $this->assertIsArray($ReflectionMethod->invokeArgs($Converter, [0, 9999]));
    }

    /**
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countNines
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countZeros
     * @covers \SwitchCat\RangeRegex\ConverterDefault::filterPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::rangeToPattern
     * @covers \SwitchCat\RangeRegex\ConverterDefault::siftPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToRanges
     * @covers \SwitchCat\RangeRegex\ConverterDefault::zip
     * @covers \SwitchCat\RangeRegex\Range::__construct
     * @covers \SwitchCat\RangeRegex\Range::getMax
     * @covers \SwitchCat\RangeRegex\Range::getMin
     */
    public function testToRegexReturnsString()
    {
        $Converter = new ConverterDefault();
        $this->assertIsString($Converter->toRegex(new Range(-100, 100)));

    }

    /**
     * @covers \SwitchCat\RangeRegex\ConverterDefault::toRegex
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countNines
     * @covers \SwitchCat\RangeRegex\ConverterDefault::countZeros
     * @covers \SwitchCat\RangeRegex\ConverterDefault::filterPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::rangeToPattern
     * @covers \SwitchCat\RangeRegex\ConverterDefault::siftPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToPatterns
     * @covers \SwitchCat\RangeRegex\ConverterDefault::splitToRanges
     * @covers \SwitchCat\RangeRegex\ConverterDefault::zip
     * @covers \SwitchCat\RangeRegex\Range::__construct
     * @covers \SwitchCat\RangeRegex\Range::getMax
     * @covers \SwitchCat\RangeRegex\Range::getMin
     */
    public function testToRegexMinEqualsMaxReturnsString()
    {
        $Converter = new ConverterDefault();
        $this->assertIsString($Converter->toRegex(new Range(0, 0)));
    }

}