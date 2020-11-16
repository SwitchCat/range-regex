<?php declare(strict_types=1);
/**
 * File:    RangeTest.php
 * Created: 13-11-20
 */

namespace SwitchCat\RangeRegex\Tests;

use \PHPUnit\Framework\TestCase;
use \SwitchCat\RangeRegex\Range;

class RangeTest extends TestCase
{
    /**
     * @covers \SwitchCat\RangeRegex\Range::__construct()
     */
    public function testRangeParamsAreSet()
    {
        $this->Range = new Range(0, 9999);
        $this->assertObjectHasAttribute('min', $this->Range);
        $this->assertObjectHasAttribute('max', $this->Range);
    }

    /**
     * @covers \SwitchCat\RangeRegex\Range::getMin()
     * @covers \SwitchCat\RangeRegex\Range::getMax()
     * @covers \SwitchCat\RangeRegex\Range::__construct
     */
    public function testRangeParamsAreInteger()
    {
        $this->Range = new Range(0, 9999);
        $this->assertIsInt($this->Range->getMin());
        $this->assertIsInt($this->Range->getMax());
    }

    /**
     * @covers \SwitchCat\RangeRegex\Range::__construct()
     */
    public function testRangeThrowsExceptionWithInvalidParameters_minHigherThanMax()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->Range = new Range(5555, 0);
    }

    /**
     * @covers \SwitchCat\RangeRegex\Range::__construct()
     */
    public function testRangeThrowsExceptionWithInvalidParameters_minIsFloat()
    {
        $this->expectException(\TypeError::class);
        $this->Range = new Range(0.1, 5);
    }

    /**
     * @covers \SwitchCat\RangeRegex\Range::__construct()
     */
    public function testRangeThrowsExceptionWithInvalidParameters_minIsString()
    {
        $this->expectException(\TypeError::class);
        $this->Range = new Range("0", 5);
    }

    /**
     * @covers \SwitchCat\RangeRegex\Range::__construct()
     */
    public function testRangeThrowsExceptionWithInvalidParameters_minIsArray()
    {
        $this->expectException(\TypeError::class);
        $this->Range = new Range(["0"], 5);
    }

    /**
     * @covers \SwitchCat\RangeRegex\Range::__construct()
     */
    public function testRangeThrowsExceptionWithInvalidParameters_minIsObject()
    {
        $this->expectException(\TypeError::class);
        $this->Range = new Range(new \stdClass(), 5);
    }
}