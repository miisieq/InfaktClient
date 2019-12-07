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
     * @var string|null
     */
    protected $companyName;

    /**
     * Street.
     *
     * @var string|null
     */
    protected $street;

    /**
     * City.
     *
     * @var string|null
     */
    protected $city;

    /**
     * Country code.
     *
     * @see https://www.infakt.pl/developers/countries.html#list
     *
     * @var string|null
     */
    protected $country;

    /**
     * Postal code in format 'XX-XXX'.
     *
     * @var string|null
     */
    protected $postalCode;

    /**
     * NIP.
     *
     * @var string|null
     */
    protected $nip;

    /**
     * Phone number.
     *
     * @var string|null
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
     * @var string|null
     */
    protected $website;

    /**
     * Email address.
     *
     * @var string|null
     */
    protected $email;

    /**
     * Note.
     *
     * @var string|null
     */
    protected $note;

    /**
     * Document receiver.
     *
     * @var string|null
     */
    protected $receiver;

    /**
     * Mailing company name.
     *
     * @var string|null
     */
    protected $mailingCompanyName;

    /**
     * Mailing street.
     *
     * @var string|null
     */
    protected $mailingStreet;

    /**
     * Mailing city.
     *
     * @var string|null
     */
    protected $mailingCity;

    /**
     * Mailing postal code in format 'XX-XXX'.
     *
     * @var string|null
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

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getNip(): ?string
    {
        return $this->nip;
    }

    public function setNip(?string $nip): self
    {
        $this->nip = $nip;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function isSameForwardAddress(): bool
    {
        return $this->sameForwardAddress;
    }

    public function setSameForwardAddress(bool $sameForwardAddress): self
    {
        $this->sameForwardAddress = $sameForwardAddress;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return Client
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getReceiver(): string
    {
        return $this->receiver;
    }

    public function setReceiver(string $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getMailingCompanyName(): string
    {
        return $this->mailingCompanyName;
    }

    public function setMailingCompanyName(string $mailingCompanyName): self
    {
        $this->mailingCompanyName = $mailingCompanyName;

        return $this;
    }

    public function getMailingStreet(): string
    {
        return $this->mailingStreet;
    }

    public function setMailingStreet(string $mailingStreet): self
    {
        $this->mailingStreet = $mailingStreet;

        return $this;
    }

    public function getMailingCity(): string
    {
        return $this->mailingCity;
    }

    public function setMailingCity(string $mailingCity): self
    {
        $this->mailingCity = $mailingCity;

        return $this;
    }

    public function getMailingPostalCode(): string
    {
        return $this->mailingPostalCode;
    }

    public function setMailingPostalCode(string $mailingPostalCode): self
    {
        $this->mailingPostalCode = $mailingPostalCode;

        return $this;
    }

    public function getDaysToPayment(): int
    {
        return $this->daysToPayment;
    }

    public function setDaysToPayment(?int $daysToPayment): self
    {
        $this->daysToPayment = $daysToPayment;

        return $this;
    }

    public function getInvoiceNote(): string
    {
        return $this->invoiceNote;
    }

    public function setInvoiceNote(string $invoiceNote): self
    {
        $this->invoiceNote = $invoiceNote;

        return $this;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }
}
