<?php

declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Mapper\BankAccountMapper;
use Infakt\Model\BankAccount;
use PHPUnit\Framework\TestCase;

class BankAccountMapperTest extends TestCase
{
    /**
     * @var BankAccountMapper
     */
    protected $mapper;

    /**
     * @dataProvider dataProvider
     *
     * @param array       $data
     * @param BankAccount $expected
     */
    public function testMap(array $data, BankAccount $expected)
    {
        $bankAccount = $this->mapper->map($data);

        $this->assertSame($expected->getId(), $bankAccount->getId());
        $this->assertSame($expected->getBankName(), $bankAccount->getBankName());
        $this->assertSame($expected->getAccountNumber(), $bankAccount->getAccountNumber());
        $this->assertSame($expected->getSwift(), $bankAccount->getSwift());
        $this->assertSame($expected->isDefault(), $bankAccount->isDefault());
    }

    public function dataProvider()
    {
        return [
            [
                [
                    'id'             => 123456789,
                    'bank_name'      => 'Narodowy Bank Polski',
                    'account_number' => '67101011400149482222000000',
                    'swift'          => 'NBPLPLPW',
                    'default'        => true,
                ],
                (new BankAccount())
                    ->setId(123456789)
                    ->setBankName('Narodowy Bank Polski')
                    ->setAccountNumber('67101011400149482222000000')
                    ->setSwift('NBPLPLPW')
                    ->setDefault(true),
            ],
            [
                [
                    'id'             => 987654321,
                    'bank_name'      => 'Bank Ochrony Środowiska SA',
                    'account_number' => '49154000042018909455930002',
                    'swift'          => null,
                    'default'        => false,

                ],
                (new BankAccount())
                    ->setId(987654321)
                    ->setBankName('Bank Ochrony Środowiska SA')
                    ->setAccountNumber('49154000042018909455930002'),
            ],
        ];
    }

    protected function setUp()
    {
        $this->mapper = new BankAccountMapper();
    }

    protected function tearDown()
    {
        $this->mapper = null;
    }
}
