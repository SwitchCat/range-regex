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
    private Range $Range;

    public function __construct($name = NULL, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->Range = new Range(0, 9999);
    }

    public function testRangeHasParams()
    {
        $this->assertObjectHasAttribute('min', $this->Range);
        $this->assertObjectHasAttribute('max', $this->Range);
    }

    public function testRangeParamsAreInteger()
    {
        $this->assertIsInt($this->Range->getMin());
        $this->assertIsInt($this->Range->getMax());
    }

    public function testRangeThrowsExceptionWithInvalidParameters()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->Range = new Range(5555, 0);
    }
}