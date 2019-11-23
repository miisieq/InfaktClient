<?php

declare(strict_types=1);

namespace Infakt\Mapper;

use Infakt\Model\EntityInterface;
use Infakt\Model\Invoice;

class InvoiceMapper implements MapperInterface, ReverseMapperInterface
{
    use MapperTrait;
    use ReverseMapperTrait;

    /**
     * Map array to Invoice object.
     *
     * @param $data
     *
     * @return Invoice
     */
    public function map($data): EntityInterface
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

    /**
     * @param EntityInterface $entity
     *
     * @return array
     */
    public function reverseMap(EntityInterface $entity): array
    {
        /** @var $entity Invoice */
        $services = [];

        foreach ($entity->getServices() as $service) {
            $services[] = [
                'id' => $service->getId(),
                'name' => $service->getName(),
                'tax_symbol' => $service->getTaxSymbol(),
                'unit' => $service->getUnit(),
                'quantity' => $this->reverseMapQuantity($service->getQuantity()),
                'unit_net_price' => $this->reverseMapPrice($service->getUnitNetPrice()),
                'net_price' => $this->reverseMapPrice($service->getNetPrice()),
                'gross_price' => $this->reverseMapPrice($service->getGrossPrice()),
                'tax_price' => $this->reverseMapPrice($service->getTaxPrice()),
                'symbol' => $service->getSymbol(),
                'discount' => $service->getDiscount(),
                'unit_net_price_before_discount' => $this->reverseMapPrice($service->getUnitNetPriceBeforeDiscount()),
            ];
        }

        return [
            'id' => $entity->getId(),
            'number' => $entity->getNumber(),
            'currency' => $entity->getCurrency(),
            'paid_price' => $this->reverseMapPrice($entity->getPaidPrice()),
            'notes' => $entity->getNotes(),
            'kind' => $entity->getKind(),
            'payment_method' => $entity->getPaymentMethod(),
            'recipient_signature' => $entity->getRecipientSignature(),
            'seller_signature' => $entity->getSellerSignature(),
            'invoice_date' => $this->reverseMapDate($entity->getInvoiceDate()),
            'sale_date' => $this->reverseMapDate($entity->getSaleDate()),
            'status' => $entity->getStatus(),
            'payment_date' => $this->reverseMapDate($entity->getPaymentDate()),
            'paid_date' => $this->reverseMapDate($entity->getPaidDate()),
            'net_price' => $this->reverseMapPrice($entity->getNetPrice()),
            'tax_price' => $this->reverseMapPrice($entity->getTaxPrice()),
            'gross_price' => $this->reverseMapPrice($entity->getGrossPrice()),
            'client_id' => $entity->getClientId(),
            'client_company_name' => $entity->getClientCompanyName(),
            'client_street' => $entity->getClientStreet(),
            'client_city' => $entity->getClientCity(),
            'client_post_code' => $entity->getClientPostCode(),
            'client_tax_code' => $entity->getClientTaxCode(),
            'client_country' => $entity->getClientCountry(),
            'bank_name' => $entity->getBankName(),
            'bank_account' => $entity->getBankAccount(),
            'swift' => $entity->getSwift(),
            'vat_exemption_reason' => $entity->getVatExemptionReason(),
            'sale_type' => $entity->getSaleType(),
            'invoice_date_kind' => $entity->getInvoiceDateKind(),
            'services' => $services,
        ];
    }
}
