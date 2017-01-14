<?php

namespace Infakt\Model;

class Invoice extends AbstractEntity
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
     * @var int
     */
    protected $paidPrice;

    /**
     * @var string
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
     * @var string
     */
    protected $invoiceDate;

    /**
     * @var string
     */
    protected $saleDate;

    /**
     * @var string
     */
    protected $status;
    /**
     * @var string
     */
    protected $paymentDate;

    /**
     * @var int
     */
    protected $netPrice;

    /**
     * @var int
     */
    protected $taxPrice;

    /**
     * @var int
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

    protected $clientCountry;

    /**
     * @var bool
     */
    protected $checkDuplicateNumber = true;

    /**
     * @var string
     */
    protected $bankName;

    protected $bankAccount;

    protected $swift;

    protected $saleType;

    protected $invoiceDateKind;

    protected $services;

    protected $vatExemptionReason;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Invoice
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Invoice
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Invoice
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaidPrice()
    {
        return $this->paidPrice;
    }

    /**
     * @param int $paidPrice
     * @return Invoice
     */
    public function setPaidPrice($paidPrice)
    {
        $this->paidPrice = $paidPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaidDate()
    {
        return $this->paidDate;
    }

    /**
     * @param string $paidDate
     * @return Invoice
     */
    public function setPaidDate($paidDate)
    {
        $this->paidDate = $paidDate;
        return $this;
    }



    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Invoice
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     * @return Invoice
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     * @return Invoice
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecipientSignature()
    {
        return $this->recipientSignature;
    }

    /**
     * @param string $recipientSignature
     * @return Invoice
     */
    public function setRecipientSignature($recipientSignature)
    {
        $this->recipientSignature = $recipientSignature;
        return $this;
    }

    /**
     * @return string
     */
    public function getSellerSignature()
    {
        return $this->sellerSignature;
    }

    /**
     * @param string $sellerSignature
     * @return Invoice
     */
    public function setSellerSignature($sellerSignature)
    {
        $this->sellerSignature = $sellerSignature;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * @param string $invoiceDate
     * @return Invoice
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * @param string $saleDate
     * @return Invoice
     */
    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Invoice
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param string $paymentDate
     * @return Invoice
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getNetPrice()
    {
        return $this->netPrice;
    }

    /**
     * @param int $netPrice
     * @return Invoice
     */
    public function setNetPrice($netPrice)
    {
        $this->netPrice = $netPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaxPrice()
    {
        return $this->taxPrice;
    }

    /**
     * @param int $taxPrice
     * @return Invoice
     */
    public function setTaxPrice($taxPrice)
    {
        $this->taxPrice = $taxPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getGrossPrice()
    {
        return $this->grossPrice;
    }

    /**
     * @param int $grossPrice
     * @return Invoice
     */
    public function setGrossPrice($grossPrice)
    {
        $this->grossPrice = $grossPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return Invoice
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientCompanyName()
    {
        return $this->clientCompanyName;
    }

    /**
     * @param string $clientCompanyName
     * @return Invoice
     */
    public function setClientCompanyName($clientCompanyName)
    {
        $this->clientCompanyName = $clientCompanyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientStreet()
    {
        return $this->clientStreet;
    }

    /**
     * @param string $clientStreet
     * @return Invoice
     */
    public function setClientStreet($clientStreet)
    {
        $this->clientStreet = $clientStreet;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientCity()
    {
        return $this->clientCity;
    }

    /**
     * @param string $clientCity
     * @return Invoice
     */
    public function setClientCity($clientCity)
    {
        $this->clientCity = $clientCity;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientPostCode()
    {
        return $this->clientPostCode;
    }

    /**
     * @param string $clientPostCode
     * @return Invoice
     */
    public function setClientPostCode($clientPostCode)
    {
        $this->clientPostCode = $clientPostCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientTaxCode()
    {
        return $this->clientTaxCode;
    }

    /**
     * @param string $clientTaxCode
     * @return Invoice
     */
    public function setClientTaxCode($clientTaxCode)
    {
        $this->clientTaxCode = $clientTaxCode ? : null;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientCountry()
    {
        return $this->clientCountry;
    }

    /**
     * @param mixed $clientCountry
     * @return Invoice
     */
    public function setClientCountry($clientCountry)
    {
        $this->clientCountry = $clientCountry;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCheckDuplicateNumber()
    {
        return $this->checkDuplicateNumber;
    }

    /**
     * @param boolean $checkDuplicateNumber
     * @return Invoice
     */
    public function setCheckDuplicateNumber($checkDuplicateNumber)
    {
        $this->checkDuplicateNumber = $checkDuplicateNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     * @return Invoice
     */
    public function setBankName($bankName)
    {
        $this->bankName = $bankName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param mixed $bankAccount
     * @return Invoice
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSwift()
    {
        return $this->swift;
    }

    /**
     * @param mixed $swift
     * @return Invoice
     */
    public function setSwift($swift)
    {
        $this->swift = $swift;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSaleType()
    {
        return $this->saleType;
    }

    /**
     * @param mixed $saleType
     * @return Invoice
     */
    public function setSaleType($saleType)
    {
        $this->saleType = $saleType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvoiceDateKind()
    {
        return $this->invoiceDateKind;
    }

    /**
     * @param mixed $invoiceDateKind
     * @return Invoice
     */
    public function setInvoiceDateKind($invoiceDateKind)
    {
        $this->invoiceDateKind = $invoiceDateKind;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param mixed $services
     * @return Invoice
     */
    public function setServices($services)
    {
        $this->services = $services;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVatExemptionReason()
    {
        return $this->vatExemptionReason;
    }

    /**
     * @param mixed $vatExemptionReason
     * @return Invoice
     */
    public function setVatExemptionReason($vatExemptionReason)
    {
        $this->vatExemptionReason = $vatExemptionReason;
        return $this;
    }



}