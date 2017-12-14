<?php

declare(strict_types=1);

namespace Infakt\Mapper;

use Infakt\Model\Client;

class ClientMapper extends AbstractMapper
{
    /**
     * {@inheritdoc}
     *
     * @param $data
     *
     * @return Client
     */
    public function map($data)
    {
        return (new Client())
            ->setId((int) $data['id'])
            ->setCompanyName($data['company_name'])
            ->setStreet($data['street'])
            ->setCity($data['city'])
            ->setCountry($data['country'])
            ->setPostalCode($data['postal_code'])
            ->setNip($data['nip'])
            ->setPhoneNumber($data['phone_number'])
            ->setWebsite($data['web_site'])
            ->setEmail($data['email'])
            ->setNote($data['note'])
            ->setReceiver($data['receiver'])
            ->setMailingCompanyName($data['mailing_company_name'])
            ->setMailingStreet($data['mailing_street'])
            ->setMailingCity($data['mailing_city'])
            ->setMailingPostalCode($data['mailing_postal_code'])
            ->setDaysToPayment($data['days_to_payment'] ?: null)
            ->setPaymentMethod($data['payment_method'])
            ->setInvoiceNote($data['invoice_note'])
            ->setSameForwardAddress((bool) $data['same_forward_address']);
    }
}
