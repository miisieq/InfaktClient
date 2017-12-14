<?php

declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Mapper\VatRateMapper;
use Infakt\Model\VatRate;
use PHPUnit\Framework\TestCase;

class VatRateMapperTest extends TestCase
{
    /**
     * @var VatRateMapper
     */
    protected $mapper;

    /**
     * @dataProvider dataProvider
     *
     * @param array   $data
     * @param VatRate $expected
     */
    public function testMap(array $data, VatRate $expected)
    {
        $vatRate = $this->mapper->map($data);

        $this->assertSame($expected->getId(), $vatRate->getId());
        $this->assertSame($expected->getName(), $vatRate->getName());
        $this->assertSame($expected->getRate(), $vatRate->getRate());
        $this->assertSame($expected->getSymbol(), $vatRate->getSymbol());
    }

    public function dataProvider()
    {
        return [
            [
                [
                    'id'     => 7,
                    'rate'   => '23.0',
                    'name'   => '23%',
                    'symbol' => '23',
                ],
                (new VatRate())
                    ->setId(7)
                    ->setRate(23.0)
                    ->setName('23%')
                    ->setSymbol('23'),
            ],
            [
                [
                    'id'     => 37,
                    'rate'   => '0.0',
                    'name'   => 'o.o.',
                    'symbol' => 'oo',

                ],
                (new VatRate())
                    ->setId(37)
                    ->setRate(0)
                    ->setName('o.o.')
                    ->setSymbol('oo'),
            ],
        ];
    }

    protected function setUp()
    {
        $this->mapper = new VatRateMapper();
    }

    protected function tearDown()
    {
        $this->mapper = null;
    }
}
