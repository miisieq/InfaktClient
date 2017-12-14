<?php

declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Collections\Comparison;
use PHPUnit\Framework\TestCase;

class ComparisonTest extends TestCase
{
    public function testSettingAndGetting()
    {
        $comparison = new Comparison('dummy_field', 'cont', 'fi');

        $this->assertInstanceOf(Comparison::class, $comparison);
        $this->assertSame('dummy_field', $comparison->getField());
        $this->assertSame('cont', $comparison->getOperator());
        $this->assertSame('fi', $comparison->getValue());
    }
}
