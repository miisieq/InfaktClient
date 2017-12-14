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

    public function testInstanceOf()
    {
        $this->assertInstanceOf('\\Infakt\\Infakt', $this->infakt);
    }

    public function testRepository()
    {
        $this->assertInstanceOf(
            'Infakt\\Repository\\InvoiceRepository',
            $this->infakt->getRepository('\\Infakt\\Model\\Invoice')
        );
    }

    public function testInvalidRepositoryClass()
    {
        $this->expectException('\\Infakt\\Exception\\ConfigurationException');
        $this->infakt->getRepository('\\Infakt\\Model\\Invoic');
    }

    public function testGetMethodResponse()
    {
        $this->assertInstanceOf(
            '\\Psr\\Http\\Message\\ResponseInterface',
            $this->infakt->get('invoices')
        );
    }

    public function testNotProvidedKey()
    {
        $this->expectException('\\Infakt\\Exception\\ConfigurationException');
        new Infakt(new TestClient(), []);
    }

    public function testBuildQuery()
    {
        $this->assertSame('https://api.infakt.pl/v3/invoices', $this->infakt->buildQuery('invoices'));
    }

    protected function setUp()
    {
        $this->infakt = new Infakt(new TestClient(), ['api_key' => 'XXX']);
    }

    protected function tearDown()
    {
        $this->infakt = null;
    }
}
