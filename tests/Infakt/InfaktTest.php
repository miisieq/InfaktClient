<?php

declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Infakt;
use Infakt\Tests\Client\TestClient;
use PHPUnit\Framework\TestCase;

class InfaktTest extends TestCase
{
    /**
     * @var Infakt
     */
    protected $infakt;

    public function testInstanceOf(): void
    {
        $this->assertInstanceOf('\\Infakt\\Infakt', $this->infakt);
    }

    public function testRepository(): void
    {
        $this->assertInstanceOf(
            'Infakt\\Repository\\InvoiceRepository',
            $this->infakt->getRepository('\\Infakt\\Model\\Invoice')
        );
    }

    public function testInvalidRepositoryClass(): void
    {
        $this->expectException('\\Infakt\\Exception\\LogicException');
        $this->infakt->getRepository('\\Infakt\\Model\\Invoic');
    }

    public function testGetMethodResponse(): void
    {
        $this->assertInstanceOf(
            '\\Psr\\Http\\Message\\ResponseInterface',
            $this->infakt->get('invoices')
        );
    }

    public function testBuildQuery(): void
    {
        $this->assertSame('https://api.infakt.pl/v3/invoices', $this->infakt->buildQuery('invoices'));
    }

    protected function setUp(): void
    {
        $this->infakt = new Infakt('XXX', new TestClient());
    }

    protected function tearDown(): void
    {
        $this->infakt = null;
    }
}
