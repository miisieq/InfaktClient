<?php

declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Mapper\ClientMapper;
use Infakt\Model\Client;
use PHPUnit\Framework\TestCase;

class ClientMapperTest extends TestCase
{
    /**
     * @var ClientMapper
     */
    protected $mapper;

    /**
     * @dataProvider dataProvider
     *
     * @param array  $data
     * @param Client $expected
     */
    public function testMap(array $data, Client $expected): void
    {
        $client = $this->mapper->map($data);

        $this->assertSame($expected->getId(), $client->getId());
        $this->assertSame($expected->getCompanyName(), $client->getCompanyName());
        $this->assertSame($expected->getStreet(), $client->getStreet());
        $this->assertSame($expected->getCity(), $client->getCity());
        $this->assertSame($expected->getCountry(), $client->getCountry());
        $this->assertSame($expected->getPostalCode(), $client->getPostalCode());
        $this->assertSame($expected->getNip(), $client->getNip());
        $this->assertSame($expected->getPhoneNumber(), $client->getPhoneNumber());
        $this->assertSame($expected->isSameForwardAddress(), $client->isSameForwardAddress());
        $this->assertSame($expected->getWebsite(), $client->getWebsite());
        $this->assertSame($expected->getEmail(), $client->getEmail());
        $this->assertSame($expected->getNote(), $client->getNote());
        $this->assertSame($expected->getReceiver(), $client->getReceiver());
        $this->assertSame($expected->getMailingCompanyName(), $client->getMailingCompanyName());
        $this->assertSame($expected->getMailingStreet(), $client->getMailingStreet());
        $this->assertSame($expected->getMailingCity(), $client->getMailingCity());
        $this->assertSame($expected->getMailingPostalCode(), $client->getMailingPostalCode());
        $this->assertSame($expected->getDaysToPayment(), $client->getDaysToPayment());
        $this->assertSame($expected->getInvoiceNote(), $client->getInvoiceNote());
        $this->assertSame($expected->getPaymentMethod(), $client->getPaymentMethod());
    }

    public function dataProvider(): array
    {
        return [
            [
                [
                    'id' => 6056166,
                    'company_name' => 'Firma Testowa sp. z o.o.',
                    'street' => 'ul. Mickiewicza 1',
                    'city' => 'Gdańsk',
                    'country' => 'PL',
                    'postal_code' => '80-425',
                    'nip' => '9999999999',
                    'phone_number' => '+48140633900',
                    'same_forward_address' => false,
                    'web_site' => 'http://example.com/',
                    'email' => 'example@example.com',
                    'note' => 'Powiadomić telefonicznie o wystawieniu faktury.',
                    'receiver' => 'Jan Nowak',
                    'mailing_company_name' => 'Firma Testowa sp. z o.o. oddział w Łowiczu',
                    'mailing_street' => 'ul. Polna 1',
                    'mailing_city' => 'Warszawa',
                    'mailing_postal_code' => '00-622',
                    'days_to_payment' => 7,
                    'invoice_note' => 'powód zwolnienia z VAT: na podstawie art. 113 ust. 1 ustawy o VAT',
                    'payment_method' => 'transfer',
                ],
                (new Client())
                    ->setId(6056166)
                    ->setCompanyName('Firma Testowa sp. z o.o.')
                    ->setStreet('ul. Mickiewicza 1')
                    ->setCity('Gdańsk')
                    ->setCountry('PL')
                    ->setPostalCode('80-425')
                    ->setNip('9999999999')
                    ->setPhoneNumber('+48140633900')
                    ->setSameForwardAddress(false)
                    ->setWebsite('http://example.com/')
                    ->setEmail('example@example.com')
                    ->setNote('Powiadomić telefonicznie o wystawieniu faktury.')
                    ->setReceiver('Jan Nowak')
                    ->setMailingCompanyName('Firma Testowa sp. z o.o. oddział w Łowiczu')
                    ->setMailingStreet('ul. Polna 1')
                    ->setMailingCity('Warszawa')
                    ->setMailingPostalCode('00-622')
                    ->setDaysToPayment(7)
                    ->setInvoiceNote('powód zwolnienia z VAT: na podstawie art. 113 ust. 1 ustawy o VAT')
                    ->setPaymentMethod('transfer'),
            ],
        ];
    }

    protected function setUp(): void
    {
        $this->mapper = new ClientMapper();
    }

    protected function tearDown(): void
    {
        $this->mapper = null;
    }
}
