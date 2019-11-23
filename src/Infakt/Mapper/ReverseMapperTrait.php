<?php

declare(strict_types=1);

namespace Infakt\Mapper;

trait ReverseMapperTrait
{
    /**
     * Maps price to string.
     *
     * @param float|null $price
     *
     * @return int|null
     */
    public function reverseMapPrice(?float $price): ?int
    {
        if (null === $price) {
            return null;
        }

        if (0.00 === $price) {
            return 0;
        }

        return (int) \str_replace('.', '', \number_format($price, 2, '.', ''));
    }

    /**
     * Maps quantity to integer or float.
     *
     * @param float|null $quantity
     *
     * @return int|float|null
     */
    public function reverseMapQuantity(?float $quantity)
    {
        return (int) $quantity == $quantity ? (int) $quantity : $quantity;
    }

    /**
     * Maps \DateTime object to string.
     *
     * @param \DateTime|null $date
     *
     * @return string|null
     */
    public function reverseMapDate(?\DateTime $date): ?string
    {
        if (!$date instanceof \DateTime) {
            return null;
        }

        return $date->format('Y-m-d');
    }
}
