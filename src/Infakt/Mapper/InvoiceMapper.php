<?php

declare(strict_types=1);

namespace Infakt\Mapper;

use Infakt\Model\Invoice;

class InvoiceMapper extends AbstractMapper
{
    /**
     * Map array to Invoice object.
     *
     * @param $data
     *
     * @return Invoice
     */
    public function map($data): Invoice
    {
        $services = [];

        foreach ($data['services'] as $service) {
            $services[] = (new Invoice\Service())
                ->setId((int) $service['id'])
                ->setName($service['name'])
                ->setTaxSymbol($service['tax_symbol'])
                ->setUnit($service['unit'])
                ->setQuantity((float) $service['quantity'])
                ->setUnitNetPrice($this->mapPrice($service['unit_net_price']))
                ->setUnitNetPriceBeforeDiscount($this->mapPrice($service['unit_net_price_before_discount']))
                ->setNetPrice($this->mapPrice($service['net_price']))
                ->setGrossPrice($this->mapPrice($service['gross_price']))
                ->setTaxPrice($this->mapPrice($service['tax_price']))
                ->setSymbol($service['symbol'])
                ->setDiscount((float) $service['discount']);
        }

        $invoice = (new Invoice())
            ->setId((int) $data['id'])
            ->setNumber($data['number'])
            ->setInvoiceDate($this->mapDate($data['invoice_date']))
            ->setCurrency($data['currency'])
            ->setPaidPrice($this->mapPrice($data['paid_price']))
            ->setNotes($data['notes'])
            ->setKind($data['kind'])
            ->setPaymentMethod($data['payment_method'])
            ->setSellerSignature($data['seller_signature'])
            ->setRecipientSignature($data['recipient_signature'])
            ->setSaleDate($this->mapDate($data['sale_date']))
            ->setStatus($data['status'])
            ->setPaymentDate($this->mapDate($data['payment_date']))
            ->setPaidDate($this->mapDate($data['paid_date']))
            ->setNetPrice($this->mapPrice($data['net_price']))
            ->setTaxPrice($this->mapPrice($data['tax_price']))
            ->setGrossPrice($this->mapPrice($data['gross_price']))
            ->setClientId($data['client_id'] ? (int) $data['client_id'] : null)
            ->setClientCompanyName($data['client_company_name'])
            ->setClientStreet($data['client_street'])
            ->setClientCity($data['client_city'])
            ->setClientPostCode($data['client_post_code'])
            ->setClientTaxCode($data['client_tax_code'])
            ->setClientCountry($data['client_country'])
            ->setBankAccount($data['bank_account'])
            ->setBankName($data['bank_name'])
            ->setSwift($data['swift'])
            ->setVatExemptionReason($data['vat_exemption_reason'] ?: null)
            ->setSaleDate($this->mapDate($data['sale_date']))
            ->setSaleType($data['sale_type'])
            ->setInvoiceDateKind($data['invoice_date_kind'])
            ->setServices($services)
            ->setExtensions((new Invoice\Extension())
                ->setPayment((new Invoice\Extension\Payment())
                    ->setLink($data['extensions']['payments']['link'])
                    ->setAvailable($data['extensions']['payments']['available']))
                ->setShare((new Invoice\Extension\Share())
                    ->setLink($data['extensions']['shares']['link'])
                    ->setAvailable($data['extensions']['payments']['available'])
                    ->setValidUntil($this->mapDate($data['extensions']['shares']['valid_until'])))
            );

        return $invoice;
    }
}
