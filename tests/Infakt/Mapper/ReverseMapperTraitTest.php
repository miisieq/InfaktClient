<?php

declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Mapper\ReverseMapperTrait;
use PHPUnit\Framework\TestCase;

class ReverseMapperTraitTest extends TestCase
{
    /**
     * @var ReverseMapperTrait
     */
    protected $trait;

    public function pricesDataProvider(): array
    {
        return [
            [null, null],
            [0.00, 0],
            [1.23, 123],
        ];
    }

    /**
     * @dataProvider pricesDataProvider
     *
     * @param $data
     * @param $expected
     */
    public function testReverseMapPrice($data, $expected): void
    {
        $this->assertSame($expected, $this->trait->reverseMapPrice($data));
    }

    public function quantitiesDataProvider(): array
    {
        return [
            [0.00, 0],
            [1.00, 1],
            [1.23, 1.23],
        ];
    }

    /**
     * @dataProvider quantitiesDataProvider
     *
     * @param $data
     * @param $expected
     */
    public function testReverseMapQuantity($data, $expected): void
    {
        $this->assertSame($expected, $this->trait->reverseMapQuantity($data));
    }

    public function datesDataProvider(): array
    {
        return [
            [null, null],
            [new \DateTime('2017-01-01'), '2017-01-01'],
            [new \DateTime('2017-06-23 16:52'), '2017-06-23'],
        ];
    }

    /**
     * @dataProvider datesDataProvider
     *
     * @param $data
     * @param $expected
     */
    public function testReverseMapDate($data, $expected): void
    {
        $this->assertSame($expected, $this->trait->reverseMapDate($data));
    }

    protected function setUp()
    {
        $this->trait = $this->getMockForTrait('\Infakt\Mapper\ReverseMapperTrait');
    }

    protected function tearDown()
    {
        $this->trait = null;
    }
}
