<?php

declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Collections\Comparison;
use Infakt\Collections\Criteria;
use Infakt\Collections\SortClause;
use Infakt\Infakt;
use Infakt\Repository\InvoiceRepository;
use Infakt\Tests\Client\TestClient;
use PHPUnit\Framework\TestCase;

class InvoiceRepositoryTest extends TestCase
{
    /**
     * @var InvoiceRepository
     */
    protected $repository;

    protected function setUp(): void
    {
        $this->repository = (new Infakt('XXX', new TestClient()))->getRepository('\\Infakt\\Model\\Invoice');
    }

    protected function tearDown(): void
    {
        $this->repository = null;
    }

    public function testGetModelClass(): void
    {
        $this->assertSame('Infakt\Model\Invoice', $this->getPrivateMethod('getModelClass')->invoke($this->repository));
    }

    public function testGetEntityName(): void
    {
        $this->assertSame('invoice', $this->getPrivateMethod('getEntityName')->invoke($this->repository));
    }

    public function testGetServiceName(): void
    {
        $this->assertSame('invoices', $this->getPrivateMethod('getServiceName')->invoke($this->repository));
    }

    public function testGetMapper(): void
    {
        $this->assertInstanceOf(
            '\\Infakt\\Mapper\\InvoiceMapper',
            $this->getPrivateMethod('getMapper')->invoke($this->repository)
        );
    }

    /**
     * @dataProvider criteriaProvider
     *
     * @param Criteria $criteria
     * @param string   $expected
     */
    public function testBuildQueryParameters(Criteria $criteria, string $expected): void
    {
        $this->assertSame(
            $expected,
            $this->getPrivateMethod('buildQueryParameters')->invoke($this->repository, $criteria)
        );
    }

    public function testBuildQuery(): void
    {
        $this->assertSame(
            'invoices.json?offset=0&limit=25',
            $this->getPrivateMethod('buildQuery')->invoke($this->repository, new Criteria([], [], 0, 25))
        );
    }

    public function criteriaProvider(): array
    {
        return [
            [
                new Criteria([], [], 3, 25),
                'offset=3&limit=25',
            ],
            [
                new Criteria(
                    [
                        new Comparison('name', Comparison::EQ, 'php'),
                    ],
                    [],
                    3,
                    25
                ),
                'q[name_eq]=php&offset=3&limit=25',
            ],
            [
                new Criteria(
                    [
                        new Comparison('name', Comparison::EQ, 'php'),
                        new Comparison('unit_net_price', Comparison::GT, 30.75),
                    ],
                    [],
                    3,
                    25
                ),
                'q[name_eq]=php&q[unit_net_price_gt]=30.75&offset=3&limit=25',
            ],
            [
                new Criteria(
                    [
                        new Comparison('name', Comparison::EQ, 'php'),
                        new Comparison('unit_net_price', Comparison::GT, 30.75),
                    ],
                    [
                        new SortClause('name', SortClause::ORDER_DESC),
                    ],
                    3,
                    25
                ),
                'q[name_eq]=php&q[unit_net_price_gt]=30.75&order=name desc&offset=3&limit=25',
            ],
        ];
    }

    /**
     * @param string $name
     *
     * @return \ReflectionMethod
     */
    protected function getPrivateMethod(string $name): \ReflectionMethod
    {
        $class = new \ReflectionClass($this->repository);
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }
}
