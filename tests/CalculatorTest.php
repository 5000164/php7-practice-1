<?php

namespace Tests;

use App\Calculator;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $this->assertTrue(Calculator::add(1, 2) === 3);
    }
}
