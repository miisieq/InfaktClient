<?php

declare(strict_types=1);

namespace Infakt\Model;

use Infakt\Model\Invoice\Extension;
use Infakt\Model\Invoice\Service;

/**
 * This entity represents an invoice.
 *
 * @see https://www.infakt.pl/developers/invoices.html#def
 */
class Invoice implements EntityInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $number;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var float
     */
    protected $paidPrice;

    /**
     * @var \DateTime
     */
    protected $paidDate;

    /**
     * @var string
     */
    protected $notes;

    /**
     * @var string
     */
    protected $kind;

    /**
     * @var string
     */
    protected $paymentMethod;

    /**
     * @var string
     */
    protected $recipientSignature;

    /**
     * @var string
     */
    protected $sellerSignature;

    /**
     * @var \DateTime
     */
    protected $invoiceDate;

    /**
     * @var \DateTime
     */
    protected $saleDate;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var \DateTime
     */
    protected $paymentDate;

    /**
     * @var float
     */
    protected $netPrice;

    /**
     * @var float
     */
    protected $taxPrice;

    /**
     * @var float
     */
    protected $grossPrice;

    /**
     * @var int
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientCompanyName;

    /**
     * @var string
     */
    protected $clientStreet;

    /**
     * @var string
     */
    protected $clientCity;

    /**
     * @var string
     */
    protected $clientPostCode;

    /**
     * @var string
     */
    protected $clientTaxCode;

    /**
     * @var string
     */
    protected $clientCountry;

    /**
     * @var string
     */
    protected $bankName;

    /**
     * @var string
     */
    protected $bankAccount;

    /**
     * @var string
     */
    protected $swift;

    /**
     * @var string
     */
    protected $saleType;

    /**
     * @var string
     */
    protected $invoiceDateKind;

    /**
     * @var Service[]
     */
    protected $services;

    /**
     * @var int
     */
    protected $vatExemptionReason;

    /**
     * @var Extension
     */
    protected $extensions;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Invoice
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return Invoice
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return Invoice
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getPaidPrice(): float
    {
        return $this->paidPrice;
    }

    /**
     * @return Invoice
     */
    public function setPaidPrice(float $paidPrice): self
    {
        $this->paidPrice = $paidPrice;

        return $this;
    }

    public function getPaidDate(): \DateTime
    {
        return $this->paidDate;
    }

    /**
     * @return Invoice
     */
    public function setPaidDate(?\DateTime $paidDate): self
    {
        $this->paidDate = $paidDate;

        return $this;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @return Invoice
     */
    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * @return Invoice
     */
    public function setKind(string $kind): self
    {
        $this->kind = $kind;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    /**
     * @return Invoice
     */
    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getRecipientSignature(): ?string
    {
        return $this->recipientSignature;
    }

    /**
     * @return Invoice
     */
    public function setRecipientSignature(string $recipientSignature): self
    {
        $this->recipientSignature = $recipientSignature;

        return $this;
    }

    public function getSellerSignature(): ?string
    {
        return $this->sellerSignature;
    }

    /**
     * @return Invoice
     */
    public function setSellerSignature(string $sellerSignature): self
    {
        $this->sellerSignature = $sellerSignature;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInvoiceDate(): ?\DateTime
    {
        return $this->invoiceDate;
    }

    /**
     * @return Invoice
     */
    public function setInvoiceDate(\DateTime $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSaleDate(): ?\DateTime
    {
        return $this->saleDate;
    }

    /**
     * @return Invoice
     */
    public function setSaleDate(\DateTime $saleDate): self
    {
        $this->saleDate = $saleDate;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return Invoice
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPaymentDate(): \DateTime
    {
        return $this->paymentDate;
    }

    /**
     * @return Invoice
     */
    public function setPaymentDate(\DateTime $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    public function getNetPrice(): float
    {
        return $this->netPrice;
    }

    /**
     * @return Invoice
     */
    public function setNetPrice(float $netPrice): self
    {
        $this->netPrice = $netPrice;

        return $this;
    }

    public function getTaxPrice(): float
    {
        return $this->taxPrice;
    }

    /**
     * @return Invoice
     */
    public function setTaxPrice(float $taxPrice): self
    {
        $this->taxPrice = $taxPrice;

        return $this;
    }

    public function getGrossPrice(): float
    {
        return $this->grossPrice;
    }

    /**
     * @return Invoice
     */
    public function setGrossPrice(float $grossPrice): self
    {
        $this->grossPrice = $grossPrice;

        return $this;
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @return Invoice
     */
    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getClientCompanyName(): string
    {
        return $this->clientCompanyName;
    }

    /**
     * @return Invoice
     */
    public function setClientCompanyName(string $clientCompanyName): self
    {
        $this->clientCompanyName = $clientCompanyName;

        return $this;
    }

    public function getClientStreet(): string
    {
        return $this->clientStreet;
    }

    /**
     * @return Invoice
     */
    public function setClientStreet(string $clientStreet): self
    {
        $this->clientStreet = $clientStreet;

        return $this;
    }

    public function getClientCity(): string
    {
        return $this->clientCity;
    }

    /**
     * @return Invoice
     */
    public function setClientCity(string $clientCity): self
    {
        $this->clientCity = $clientCity;

        return $this;
    }

    public function getClientPostCode(): string
    {
        return $this->clientPostCode;
    }

    /**
     * @return Invoice
     */
    public function setClientPostCode(string $clientPostCode): self
    {
        $this->clientPostCode = $clientPostCode;

        return $this;
    }

    public function getClientTaxCode(): string
    {
        return $this->clientTaxCode;
    }

    /**
     * @return Invoice
     */
    public function setClientTaxCode(string $clientTaxCode): self
    {
        $this->clientTaxCode = $clientTaxCode;

        return $this;
    }

    public function getClientCountry(): string
    {
        return $this->clientCountry;
    }

    /**
     * @return Invoice
     */
    public function setClientCountry(string $clientCountry): self
    {
        $this->clientCountry = $clientCountry;

        return $this;
    }

    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @return Invoice
     */
    public function setBankName(string $bankName): self
    {
        $this->bankName = $bankName;

        return $this;
    }

    public function getBankAccount(): string
    {
        return $this->bankAccount;
    }

    /**
     * @return Invoice
     */
    public function setBankAccount(string $bankAccount): self
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    public function getSwift(): string
    {
        return $this->swift;
    }

    /**
     * @return Invoice
     */
    public function setSwift(string $swift): self
    {
        $this->swift = $swift;

        return $this;
    }

    /**
     * @return string
     */
    public function getSaleType(): ?string
    {
        return $this->saleType;
    }

    /**
     * @return Invoice
     */
    public function setSaleType(string $saleType): self
    {
        $this->saleType = $saleType;

        return $this;
    }

    public function getInvoiceDateKind(): string
    {
        return $this->invoiceDateKind;
    }

    /**
     * @return Invoice
     */
    public function setInvoiceDateKind(string $invoiceDateKind): self
    {
        $this->invoiceDateKind = $invoiceDateKind;

        return $this;
    }

    /**
     * @return Service[]
     */
    public function getServices(): array
    {
        return $this->services;
    }

    /**
     * @param Service[] $services
     *
     * @return Invoice
     */
    public function setServices(array $services): self
    {
        $this->services = $services;

        return $this;
    }

    public function getVatExemptionReason(): int
    {
        return $this->vatExemptionReason;
    }

    /**
     * @return Invoice
     */
    public function setVatExemptionReason(?int $vatExemptionReason): self
    {
        $this->vatExemptionReason = $vatExemptionReason;

        return $this;
    }

    public function getExtensions(): Extension
    {
        return $this->extensions;
    }

    /**
     * @return Invoice
     */
    public function setExtensions(Extension $extensions): self
    {
        $this->extensions = $extensions;

        return $this;
    }
}
