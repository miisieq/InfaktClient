<?php
declare(strict_types=1);

namespace Infakt\Model;

/**
 * This entity represents a client
 *
 * @link https://www.infakt.pl/developers/clients.html#def
 * @package Infakt\Model
 */
class Client implements EntityInterface
{

    /**
     * ID
     *
     * @var int
     */
    protected $id;

    /**
     * Company name
     *
     * @var string
     */
    protected $companyName;

    /**
     * Street
     *
     * @var string
     */
    protected $street;

    /**
     * City
     *
     * @var string
     */
    protected $city;

    /**
     * Country code
     * @see https://www.infakt.pl/developers/countries.html#list
     *
     * @var string
     */
    protected $country;


    /**
     * Postal code in format 'XX-XXX'
     *
     * @var string
     */
    protected $postalCode;

    /**
     * NIP
     *
     * @var string
     */
    protected $nip;

    /**
     * Phone number
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Mailing address same as the default address
     *
     * @var boolean
     */
    protected $sameForwardAddress;

    /**
     * Website URL
     *
     * @var string
     */
    protected $website;

    /**
     * Email address
     *
     * @var string
     */
    protected $email;

    /**
     * Note
     *
     * @var string
     */
    protected $note;

    /**
     * Document receiver
     *
     * @var string
     */
    protected $receiver;

    /**
     * Mailing company name
     *
     * @var string
     */
    protected $mailingCompanyName;

    /**
     * Mailing street
     *
     * @var string
     */
    protected $mailingStreet;

    /**
     * Mailing city
     *
     * @var string
     */
    protected $mailingCity;

    /**
     * Mailing postal code in format 'XX-XXX'
     * @var string
     */
    protected $mailingPostalCode;

    /**
     * The default paying term in days
     *
     * @var integer
     */
    protected $daysToPayment;

    /**
     * Default note
     *
     * @var string
     */
    protected $invoiceNote;

    /**
     * Payment method identifier
     *
     * @var string
     */
    protected $paymentMethod;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Client
     */
    public function setId(int $id): Client
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return Client
     */
    public function setCompanyName(string $companyName): Client
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Client
     */
    public function setStreet(string $street): Client
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Client
     */
    public function setCity(string $city): Client
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Client
     */
    public function setCountry(string $country): Client
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return Client
     */
    public function setPostalCode(string $postalCode): Client
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getNip(): string
    {
        return $this->nip;
    }

    /**
     * @param string $nip
     * @return Client
     */
    public function setNip(string $nip): Client
    {
        $this->nip = $nip;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return Client
     */
    public function setPhoneNumber(string $phoneNumber): Client
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSameForwardAddress(): bool
    {
        return $this->sameForwardAddress;
    }

    /**
     * @param bool $sameForwardAddress
     * @return Client
     */
    public function setSameForwardAddress(bool $sameForwardAddress): Client
    {
        $this->sameForwardAddress = $sameForwardAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return Client
     */
    public function setWebsite(string $website): Client
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Client
     */
    public function setEmail(string $email): Client
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return Client
     */
    public function setNote(string $note): Client
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiver(): string
    {
        return $this->receiver;
    }

    /**
     * @param string $receiver
     * @return Client
     */
    public function setReceiver(string $receiver): Client
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailingCompanyName(): string
    {
        return $this->mailingCompanyName;
    }

    /**
     * @param string $mailingCompanyName
     * @return Client
     */
    public function setMailingCompanyName(string $mailingCompanyName): Client
    {
        $this->mailingCompanyName = $mailingCompanyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailingStreet(): string
    {
        return $this->mailingStreet;
    }

    /**
     * @param string $mailingStreet
     * @return Client
     */
    public function setMailingStreet(string $mailingStreet): Client
    {
        $this->mailingStreet = $mailingStreet;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailingCity(): string
    {
        return $this->mailingCity;
    }

    /**
     * @param string $mailingCity
     * @return Client
     */
    public function setMailingCity(string $mailingCity): Client
    {
        $this->mailingCity = $mailingCity;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailingPostalCode(): string
    {
        return $this->mailingPostalCode;
    }

    /**
     * @param string $mailingPostalCode
     * @return Client
     */
    public function setMailingPostalCode(string $mailingPostalCode): Client
    {
        $this->mailingPostalCode = $mailingPostalCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getDaysToPayment(): int
    {
        return $this->daysToPayment;
    }

    /**
     * @param int|null $daysToPayment
     * @return Client
     */
    public function setDaysToPayment(?int $daysToPayment): Client
    {
        $this->daysToPayment = $daysToPayment;
        
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceNote(): string
    {
        return $this->invoiceNote;
    }

    /**
     * @param string $invoiceNote
     * @return Client
     */
    public function setInvoiceNote(string $invoiceNote): Client
    {
        $this->invoiceNote = $invoiceNote;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     * @return Client
     */
    public function setPaymentMethod(string $paymentMethod): Client
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }
}
