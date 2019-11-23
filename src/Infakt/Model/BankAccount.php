<?php

declare(strict_types=1);

namespace Infakt\Model;

/**
 * This entity represents a bank account.
 *
 * @see https://www.infakt.pl/developers/bank_accounts.html#def
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

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return BankAccount
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @return BankAccount
     */
    public function setBankName(string $bankName): self
    {
        $this->bankName = $bankName;

        return $this;
    }

    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @return BankAccount
     */
    public function setAccountNumber(string $accountNumber): self
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
     *
     * @return BankAccount
     */
    public function setSwift(?string $swift): self
    {
        $this->swift = $swift;

        return $this;
    }

    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @return BankAccount
     */
    public function setDefault(bool $default): self
    {
        $this->default = $default;

        return $this;
    }
}
