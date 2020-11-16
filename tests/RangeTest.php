<?php declare(strict_types=1);
/**
 * File:    RangeTest.php
 * Created: 13-11-20
 */

namespace SwitchCat\RangeRegex\Tests;

use \PHPUnit\Framework\TestCase;
use \SwitchCat\RangeRegex\Range;

/**
 * Class RangeTest
 *
 * @author    Felix Eloy
 * @copyright 2020SwitchCat Agency
 * @licence   MIT
 *
 * @package   SwitchCat\RangeRegex\Tests
 * @covers    \SwitchCat\RangeRegex\Range
 * @uses      \InvalidArgumentException
 */
class RangeTest extends TestCase
{
    private Range $Range;

    /**
     * RangeTest constructor.
     * @param null   $name
     * @param array  $data
     * @param string $dataName
     * @codeCoverageIgnore
     */
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

    /**
     * @covers \SwitchCat\RangeRegex\Range
     */
    public function testRangeParamsAreInteger()
    {
        $this->assertIsInt($this->Range->getMin());
        $this->assertIsInt($this->Range->getMax());
    }

    /**
     * @covers \SwitchCat\RangeRegex\Range
     */
    public function testRangeThrowsExceptionWithInvalidParameters()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->Range = new Range(5555, 0);
    }
}