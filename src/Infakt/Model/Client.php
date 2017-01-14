<?php

namespace Infakt\Model;

class Client extends AbstractEntity
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Client
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return Client
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Client
     */
    public function setStreet($street)
    {
        $this->street = $street ? : null;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Client
     */
    public function setCity($city)
    {
        $this->city = $city ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Client
     */
    public function setCountry($country)
    {
        $this->country = $country ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return Client
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getNip()
    {
        return $this->nip;
    }

    /**
     * @param string $nip
     * @return Client
     */
    public function setNip($nip)
    {
        $this->nip = $nip ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return Client
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber ? : null;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSameForwardAddress()
    {
        return $this->sameForwardAddress;
    }

    /**
     * @param boolean $sameForwardAddress
     * @return Client
     */
    public function setSameForwardAddress($sameForwardAddress)
    {
        $this->sameForwardAddress = $sameForwardAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return Client
     */
    public function setWebsite($website)
    {
        $this->website = $website ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     * @return Client
     */
    public function setNote($note)
    {
        $this->note = $note ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param string $receiver
     * @return Client
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailingCompanyName()
    {
        return $this->mailingCompanyName;
    }

    /**
     * @param string $mailingCompanyName
     * @return Client
     */
    public function setMailingCompanyName($mailingCompanyName)
    {
        $this->mailingCompanyName = $mailingCompanyName ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailingStreet()
    {
        return $this->mailingStreet;
    }

    /**
     * @param string $mailingStreet
     * @return Client
     */
    public function setMailingStreet($mailingStreet)
    {
        $this->mailingStreet = $mailingStreet ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailingCity()
    {
        return $this->mailingCity;
    }

    /**
     * @param string $mailingCity
     * @return Client
     */
    public function setMailingCity($mailingCity)
    {
        $this->mailingCity = $mailingCity ? : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailingPostalCode()
    {
        return $this->mailingPostalCode;
    }

    /**
     * @param string $mailingPostalCode
     * @return Client
     */
    public function setMailingPostalCode($mailingPostalCode)
    {
        $this->mailingPostalCode = $mailingPostalCode ? : null;
        return $this;
    }

    /**
     * @return int
     */
    public function getDaysToPayment()
    {
        return $this->daysToPayment;
    }

    /**
     * @param int $daysToPayment
     * @return Client
     */
    public function setDaysToPayment($daysToPayment)
    {
        $this->daysToPayment = is_numeric($daysToPayment) ? (int)$daysToPayment : null;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceNote()
    {
        return $this->invoiceNote;
    }

    /**
     * @param string $invoiceNote
     * @return Client
     */
    public function setInvoiceNote($invoiceNote)
    {
        $this->invoiceNote = $invoiceNote ? : null;
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
     * @return Client
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod ? : null;
        return $this;
    }

}