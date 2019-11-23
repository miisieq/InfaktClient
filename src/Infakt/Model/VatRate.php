<?php

declare(strict_types=1);

namespace Infakt\Model;

/**
 * This entity represents a vat rate.
 *
 * @see https://www.infakt.pl/developers/vat_rates.html#def
 */
class VatRate implements EntityInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var float
     */
    protected $rate;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $symbol;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return VatRate
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @return VatRate
     */
    public function setRate(float $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return VatRate
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @return VatRate
     */
    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }
}
