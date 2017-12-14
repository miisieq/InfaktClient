<?php
declare(strict_types=1);

namespace Infakt\Model;

/**
 * This entity represents a vat rate
 *
 * @link https://www.infakt.pl/developers/vat_rates.html#def
 * @package Infakt\Model
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return VatRate
     */
    public function setId(int $id): VatRate
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     * @return VatRate
     */
    public function setRate(float $rate): VatRate
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return VatRate
     */
    public function setName(string $name): VatRate
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return VatRate
     */
    public function setSymbol(string $symbol): VatRate
    {
        $this->symbol = $symbol;

        return $this;
    }
}
