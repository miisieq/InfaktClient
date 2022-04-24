<?php

declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Mapper\InvoiceMapper;
use Infakt\Model\Invoice;
use PHPUnit\Framework\TestCase;

class InvoiceMapperTest extends TestCase
{
    /**
     * @var InvoiceMapper
     */
    protected $mapper;

    /**
     * @dataProvider dataProvider
     */
    public function testMap(array $data, Invoice $expected): void
    {
        $invoice = $this->mapper->map($data);

        $this->assertSame($expected->getId(), $invoice->getId());
        $this->assertSame($expected->getNumber(), $invoice->getNumber());
        $this->assertSame($expected->getCurrency(), $invoice->getCurrency());
        $this->assertSame($expected->getPaidPrice(), $invoice->getPaidPrice());
        $this->assertSame($expected->getNotes(), $invoice->getNotes());
        $this->assertSame($expected->getKind(), $invoice->getKind());
        $this->assertSame($expected->getPaymentMethod(), $invoice->getPaymentMethod());
        $this->assertSame($expected->getRecipientSignature(), $invoice->getRecipientSignature());
        $this->assertSame($expected->getSellerSignature(), $invoice->getSellerSignature());
        $this->assertEquals($expected->getInvoiceDate(), $invoice->getInvoiceDate());
        $this->assertEquals($expected->getSaleDate(), $invoice->getSaleDate());
        $this->assertSame($expected->getStatus(), $invoice->getStatus());
        $this->assertEquals($expected->getPaymentDate(), $invoice->getPaymentDate());
        $this->assertEquals($expected->getPaidDate(), $invoice->getPaidDate());
        $this->assertSame($expected->getNetPrice(), $invoice->getNetPrice());
        $this->assertSame($expected->getTaxPrice(), $invoice->getTaxPrice());
        $this->assertSame($expected->getGrossPrice(), $invoice->getGrossPrice());
        $this->assertSame($expected->getClientId(), $invoice->getClientId());
        $this->assertSame($expected->getClientCompanyName(), $invoice->getClientCompanyName());
        $this->assertSame($expected->getClientStreet(), $invoice->getClientStreet());
        $this->assertSame($expected->getClientCity(), $invoice->getClientCity());
        $this->assertSame($expected->getClientPostCode(), $invoice->getClientPostCode());
        $this->assertSame($expected->getClientTaxCode(), $invoice->getClientTaxCode());
        $this->assertSame($expected->getClientCountry(), $invoice->getClientCountry());
        $this->assertSame($expected->getBankName(), $invoice->getBankName());
        $this->assertSame($expected->getBankAccount(), $invoice->getBankAccount());
        $this->assertSame($expected->getSwift(), $invoice->getSwift());
        $this->assertSame($expected->getVatExemptionReason(), $invoice->getVatExemptionReason());
        $this->assertSame($expected->getSaleType(), $invoice->getSaleType());
        $this->assertSame($expected->getInvoiceDateKind(), $invoice->getInvoiceDateKind());

        $this->assertInstanceOf('\\Infakt\\Model\\Invoice\\Extension', $invoice->getExtensions());

        $this->assertSame(
            $expected->getExtensions()->getPayment()->getLink(),
            $invoice->getExtensions()->getPayment()->getLink()
        );

        $this->assertSame(
            $expected->getExtensions()->getPayment()->isAvailable(),
            $invoice->getExtensions()->getPayment()->isAvailable()
        );

        $this->assertSame(
            $expected->getExtensions()->getShare()->getLink(),
            $invoice->getExtensions()->getShare()->getLink()
        );

        $this->assertSame(
            $expected->getExtensions()->getShare()->isAvailable(),
            $invoice->getExtensions()->getShare()->isAvailable()
        );

        $this->assertEquals(
            $expected->getExtensions()->getShare()->getValidUntil(),
            $invoice->getExtensions()->getShare()->getValidUntil()
        );

        $this->assertTrue(is_array($invoice->getServices()));

        foreach ($invoice->getServices() as $key => $service) {
            $this->assertInstanceOf('\\Infakt\\Model\\Invoice\\Service', $service);

            $this->assertSame($expected->getServices()[$key]->getId(), $service->getId());
            $this->assertSame($expected->getServices()[$key]->getName(), $service->getName());
            $this->assertSame($expected->getServices()[$key]->getTaxSymbol(), $service->getTaxSymbol());
            $this->assertSame($expected->getServices()[$key]->getUnit(), $service->getUnit());
            $this->assertSame($expected->getServices()[$key]->getQuantity(), $service->getQuantity());
            $this->assertSame($expected->getServices()[$key]->getUnitNetPrice(), $service->getUnitNetPrice());
            $this->assertSame($expected->getServices()[$key]->getUnitNetPriceBeforeDiscount(), $service->getUnitNetPriceBeforeDiscount());
            $this->assertSame($expected->getServices()[$key]->getNetPrice(), $service->getNetPrice());
            $this->assertSame($expected->getServices()[$key]->getGrossPrice(), $service->getGrossPrice());
            $this->assertSame($expected->getServices()[$key]->getTaxPrice(), $service->getTaxPrice());
            $this->assertSame($expected->getServices()[$key]->getSymbol(), $service->getSymbol());
            $this->assertSame($expected->getServices()[$key]->getDiscount(), $service->getDiscount());
        }
    }

    /**
     * @dataProvider dataProvider
     */
    public function testReverseMap(array $expected, Invoice $invoice): void
    {
        $data = $this->mapper->reverseMap($invoice);

        foreach ($expected as $key => $value) {
            if (!is_array($value)) {
                $this->assertSame($expected[$key], $data[$key]);
            } elseif ('services' === $key) {
                /** @var Invoice\Service $service */
                foreach ($data[$key] as $serviceKey => $service) {
                    $this->assertSame($expected[$key][$serviceKey]['id'], $service['id']);
                    $this->assertSame($expected[$key][$serviceKey]['name'], $service['name']);
                    $this->assertSame($expected[$key][$serviceKey]['tax_symbol'], $service['tax_symbol']);
                    $this->assertSame($expected[$key][$serviceKey]['unit'], $service['unit']);
                    $this->assertSame($expected[$key][$serviceKey]['quantity'], $service['quantity']);
                    $this->assertSame($expected[$key][$serviceKey]['unit_net_price'], $service['unit_net_price']);
                    $this->assertSame($expected[$key][$serviceKey]['net_price'], $service['net_price']);
                    $this->assertSame($expected[$key][$serviceKey]['gross_price'], $service['gross_price']);
                    $this->assertSame($expected[$key][$serviceKey]['tax_price'], $service['tax_price']);
                    $this->assertSame($expected[$key][$serviceKey]['symbol'], $service['symbol']);
                    $this->assertSame(
                        $expected[$key][$serviceKey]['unit_net_price_before_discount'],
                        $service['unit_net_price_before_discount']
                    );
                }
            }
        }
    }

    public function dataProvider(): array
    {
        return [
            [
                DummyInvoiceData::getRawResponse(),
                DummyInvoiceData::getMappedResponse(),
            ],
        ];
    }

    public function noteDataProvider(): array
    {
        return [
            [
                'Lorem ipsum',
                'Lorem ipsum',
            ],
            [
                '',
                null,
            ],
            [
                null,
                null,
            ],
        ];
    }

    /**
     * @dataProvider noteDataProvider
     */
    public function testMapNoteField(?string $rawValue, ?string $expectedValue): void
    {
        $this->assertSame(
            $expectedValue,
            $this->mapper->mapNote($rawValue)
        );
    }

    protected function setUp(): void
    {
        $this->mapper = new InvoiceMapper();
    }

    protected function tearDown(): void
    {
        $this->mapper = null;
    }
}
