<?php

namespace Infakt\Model;

/**
 * This entity represents a bank account
 *
 * @link https://www.infakt.pl/developers/bank_accounts.html#def
 * @package Infakt\Model
 */
class BankAccount implements EntityInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $bankName;

    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * @var string|null
     */
    protected $swift;

    /**
     * @var bool
     */
    protected $default = false;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return BankAccount
     */
    public function setId(int $id): BankAccount
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     * @return BankAccount
     */
    public function setBankName(string $bankName): BankAccount
    {
        $this->bankName = $bankName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     * @return BankAccount
     */
    public function setAccountNumber(string $accountNumber): BankAccount
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getSwift(): ?string
    {
        return $this->swift;
    }

    /**
     * @param string $swift
     * @return BankAccount
     */
    public function setSwift(?string $swift): BankAccount
    {
        $this->swift = $swift;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @param bool $default
     * @return BankAccount
     */
    public function setDefault(bool $default): BankAccount
    {
        $this->default = $default;

        return $this;
    }
}
