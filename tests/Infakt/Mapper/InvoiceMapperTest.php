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
     *
     * @param array   $data
     * @param Invoice $expected
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
     *
     * @param array   $expected
     * @param Invoice $invoice
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
                [
                    'id' => 18433599,
                    'number' => '2/12/2017',
                    'currency' => 'PLN',
                    'paid_price' => 0,
                    'notes' => 'powód zwolnienia z VAT: na podstawie art. 113 ust. 1 ustawy o VAT',
                    'kind' => 'vat',
                    'payment_method' => 'transfer',
                    'recipient_signature' => 'Artur Nowak',
                    'seller_signature' => 'Jan Kowalski',
                    'invoice_date' => '2017-12-01',
                    'sale_date' => '2017-12-01',
                    'status' => 'draft',
                    'payment_date' => '2017-12-08',
                    'paid_date' => '2017-12-14',
                    'net_price' => 10812,
                    'tax_price' => 2487,
                    'gross_price' => 13299,
                    'client_id' => 6056166,
                    'client_company_name' => 'Firma Testowa sp. z o.o.',
                    'client_street' => 'ul. Mickiewicza 1',
                    'client_city' => 'Gdańsk',
                    'client_post_code' => '80-425',
                    'client_tax_code' => '9999999999',
                    'client_country' => 'PL',
                    'bank_name' => 'Narodowy Bank Polski',
                    'bank_account' => '67101011400149482222000000',
                    'swift' => 'NBPLPLPW',
                    'vat_exemption_reason' => 1,
                    'sale_type' => 'merchandise',
                    'invoice_date_kind' => 'sale_date',
                    'services' => [
                        [
                            'id' => 39956922,
                            'name' => 'Dostawa',
                            'tax_symbol' => '23',
                            'unit' => 'szt.',
                            'quantity' => 1,
                            'unit_net_price' => 812,
                            'net_price' => 812,
                            'gross_price' => 999,
                            'tax_price' => 187,
                            'symbol' => null,
                            'discount' => 0.0,
                            'unit_net_price_before_discount' => 812,
                        ],
                        [
                            'id' => 39957837,
                            'name' => 'Sprzęt',
                            'tax_symbol' => 'zw',
                            'unit' => 'szt.',
                            'quantity' => 0.5,
                            'unit_net_price' => 10000,
                            'net_price' => 5000,
                            'gross_price' => 5000,
                            'tax_price' => 0,
                            'symbol' => '32.20.14',
                            'discount' => 0.0,
                            'unit_net_price_before_discount' => 10000,
                        ],
                    ],
                    'extensions' => [
                        'payments' => [
                            'link' => 'https://www.infakt.pl/app/gateways/bluemedia/1bd93a788d60822473667492f1c6cca1',
                            'available' => true,
                        ],
                        'shares' => [
                            'link' => 'https://www.infakt.pl/app/twoja-faktura/22628024-700a-47de-8389-c58f52474568',
                            'available' => true,
                            'valid_until' => '2018-01-13',
                        ],
                    ],
                ],
                (new Invoice())
                ->setId(18433599)
                ->setNumber('2/12/2017')
                ->setCurrency('PLN')
                ->setPaidPrice(0.0)
                ->setNotes('powód zwolnienia z VAT: na podstawie art. 113 ust. 1 ustawy o VAT')
                ->setKind('vat')
                ->setPaymentMethod('transfer')
                ->setRecipientSignature('Artur Nowak')
                ->setSellerSignature('Jan Kowalski')
                ->setInvoiceDate(new \DateTime('2017-12-01'))
                ->setSaleDate(new \DateTime('2017-12-01'))
                ->setStatus('draft')
                ->setPaymentDate(new \DateTime('2017-12-08'))
                ->setPaidDate(new \DateTime('2017-12-14'))
                ->setNetPrice(108.12)
                ->setTaxPrice(24.87)
                ->setGrossPrice(132.99)
                ->setClientId(6056166)
                ->setClientCompanyName('Firma Testowa sp. z o.o.')
                ->setClientStreet('ul. Mickiewicza 1')
                ->setClientCity('Gdańsk')
                ->setClientPostCode('80-425')
                ->setClientTaxCode('9999999999')
                ->setClientCountry('PL')
                ->setBankName('Narodowy Bank Polski')
                ->setBankAccount('67101011400149482222000000')
                ->setSwift('NBPLPLPW')
                ->setVatExemptionReason(1)
                ->setSaleType('merchandise')
                ->setInvoiceDateKind('sale_date')
                ->setServices([
                    (new Invoice\Service())
                        ->setId(39956922)
                        ->setName('Dostawa')
                        ->setTaxSymbol('23')
                        ->setUnit('szt.')
                        ->setQuantity(1)
                        ->setUnitNetPrice(8.12)
                        ->setUnitNetPriceBeforeDiscount(8.12)
                        ->setNetPrice(8.12)
                        ->setGrossPrice(9.99)
                        ->setTaxPrice(1.87)
                        ->setSymbol(null)
                        ->setDiscount(0.0),
                    (new Invoice\Service())
                        ->setId(39957837)
                        ->setName('Sprzęt')
                        ->setTaxSymbol('zw')
                        ->setUnit('szt.')
                        ->setQuantity(0.5)
                        ->setUnitNetPrice(100.00)
                        ->setUnitNetPriceBeforeDiscount(100.00)
                        ->setNetPrice(50.00)
                        ->setGrossPrice(50.00)
                        ->setTaxPrice(0.00)
                        ->setSymbol('32.20.14')
                        ->setDiscount(0.0),
                ])
                ->setExtensions((new Invoice\Extension())
                    ->setPayment((new Invoice\Extension\Payment())
                        ->setLink('https://www.infakt.pl/app/gateways/bluemedia/1bd93a788d60822473667492f1c6cca1')
                        ->setAvailable(true)
                    )
                    ->setShare((new Invoice\Extension\Share())
                        ->setLink('https://www.infakt.pl/app/twoja-faktura/22628024-700a-47de-8389-c58f52474568')
                        ->setAvailable(true)
                        ->setValidUntil(new \DateTime('2018-01-13'))
                    )
                ),
            ],
        ];
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
