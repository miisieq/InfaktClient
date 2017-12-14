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
     * @param array $data
     * @param Invoice $expected
     */
    public function testMap(array $data, Invoice $expected)
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

            var_dump($key);
        }



    }

    public function dataProvider()
    {
        return [
            [
                [
                    'id' => 18433599,
                    'number' => '2/12/2017',
                    'currency' => 'PLN',
                    'paid_price' => '0',
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
                            'unit_net_price_before_discount' => 812
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
                            'unit_net_price_before_discount' => 10000
                        ],
                    ],
                    'extensions' => [
                        'payments' => [
                            'link' => 'https://www.infakt.pl/app/gateways/bluemedia/1bd93a788d60822473667492f1c6cca1',
                            'available' => true,
                        ],
                        'shares' => [
                            'link' =>  'https://www.infakt.pl/app/twoja-faktura/22628024-700a-47de-8389-c58f52474568',
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
                ->setServices([])
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
                )



            ],
        ];
    }

    protected function setUp()
    {
        $this->mapper = new InvoiceMapper();
    }

    protected function tearDown()
    {
        $this->mapper = null;
    }
}
