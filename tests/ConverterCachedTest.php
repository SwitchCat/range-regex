<?php declare(strict_types=1);
/**
 * File:    ConverterCachedTest.php
 * Created: 13-11-20
 */

namespace SwitchCat\RangeRegex\Tests;

use \PHPUnit\Framework\TestCase;
use \SwitchCat\RangeRegex\ConverterCached;
use \SwitchCat\RangeRegex\FactoryDefault;

class ConverterCachedTest extends TestCase
{
    private FactoryDefault $FactoryDefault;
    private ConverterCached $ConverterCached;

    public function __construct($name = NULL, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->FactoryDefault = new FactoryDefault();
        $this->ConverterCached = $this->FactoryDefault->getConverter();
    }

    public function testConverterCachedHasParams()
    {
        $this->assertObjectHasAttribute('converter', $this->ConverterCached);
        $this->assertObjectHasAttribute('cache', $this->ConverterCached);
    }
}