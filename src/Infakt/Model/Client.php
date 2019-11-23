<?php

declare(strict_types=1);

namespace Infakt\Model;

/**
 * This entity represents a client.
 *
 * @see https://www.infakt.pl/developers/clients.html#def
 */
class Client implements EntityInterface
{
    /**
     * ID.
     *
     * @var int
     */
    protected $id;

    /**
     * Company name.
     *
     * @var string
     */
    protected $companyName;

    /**
     * Street.
     *
     * @var string
     */
    protected $street;

    /**
     * City.
     *
     * @var string
     */
    protected $city;

    /**
     * Country code.
     *
     * @see https://www.infakt.pl/developers/countries.html#list
     *
     * @var string
     */
    protected $country;

    /**
     * Postal code in format 'XX-XXX'.
     *
     * @var string
     */
    protected $postalCode;

    /**
     * NIP.
     *
     * @var string
     */
    protected $nip;

    /**
     * Phone number.
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Mailing address same as the default address.
     *
     * @var bool
     */
    protected $sameForwardAddress;

    /**
     * Website URL.
     *
     * @var string
     */
    protected $website;

    /**
     * Email address.
     *
     * @var string
     */
    protected $email;

    /**
     * Note.
     *
     * @var string
     */
    protected $note;

    /**
     * Document receiver.
     *
     * @var string
     */
    protected $receiver;

    /**
     * Mailing company name.
     *
     * @var string
     */
    protected $mailingCompanyName;

    /**
     * Mailing street.
     *
     * @var string
     */
    protected $mailingStreet;

    /**
     * Mailing city.
     *
     * @var string
     */
    protected $mailingCity;

    /**
     * Mailing postal code in format 'XX-XXX'.
     *
     * @var string
     */
    protected $mailingPostalCode;

    /**
     * The default paying term in days.
     *
     * @var int
     */
    protected $daysToPayment;

    /**
     * Default note.
     *
     * @var string
     */
    protected $invoiceNote;

    /**
     * Payment method identifier.
     *
     * @var string
     */
    protected $paymentMethod;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Client
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @return Client
     */
    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return Client
     */
    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return Client
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return Client
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @return Client
     */
    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getNip(): string
    {
        return $this->nip;
    }

    /**
     * @return Client
     */
    public function setNip(string $nip): self
    {
        $this->nip = $nip;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return Client
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function isSameForwardAddress(): bool
    {
        return $this->sameForwardAddress;
    }

    /**
     * @return Client
     */
    public function setSameForwardAddress(bool $sameForwardAddress): self
    {
        $this->sameForwardAddress = $sameForwardAddress;

        return $this;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @return Client
     */
    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return Client
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @return Client
     */
    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getReceiver(): string
    {
        return $this->receiver;
    }

    /**
     * @return Client
     */
    public function setReceiver(string $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getMailingCompanyName(): string
    {
        return $this->mailingCompanyName;
    }

    /**
     * @return Client
     */
    public function setMailingCompanyName(string $mailingCompanyName): self
    {
        $this->mailingCompanyName = $mailingCompanyName;

        return $this;
    }

    public function getMailingStreet(): string
    {
        return $this->mailingStreet;
    }

    /**
     * @return Client
     */
    public function setMailingStreet(string $mailingStreet): self
    {
        $this->mailingStreet = $mailingStreet;

        return $this;
    }

    public function getMailingCity(): string
    {
        return $this->mailingCity;
    }

    /**
     * @return Client
     */
    public function setMailingCity(string $mailingCity): self
    {
        $this->mailingCity = $mailingCity;

        return $this;
    }

    public function getMailingPostalCode(): string
    {
        return $this->mailingPostalCode;
    }

    /**
     * @return Client
     */
    public function setMailingPostalCode(string $mailingPostalCode): self
    {
        $this->mailingPostalCode = $mailingPostalCode;

        return $this;
    }

    public function getDaysToPayment(): int
    {
        return $this->daysToPayment;
    }

    /**
     * @return Client
     */
    public function setDaysToPayment(?int $daysToPayment): self
    {
        $this->daysToPayment = $daysToPayment;

        return $this;
    }

    public function getInvoiceNote(): string
    {
        return $this->invoiceNote;
    }

    /**
     * @return Client
     */
    public function setInvoiceNote(string $invoiceNote): self
    {
        $this->invoiceNote = $invoiceNote;

        return $this;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @return Client
     */
    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }
}
