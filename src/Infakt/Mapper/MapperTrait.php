<?php

declare(strict_types=1);

namespace Infakt\Mapper;

/**
 * Trait MapperTrait.
 */
trait MapperTrait
{
    /**
     * Maps date string to \DateTime object.
     *
     * @param string $date
     *
     * @return \DateTime|null
     */
    public function mapDate(?string $date): ?\DateTime
    {
        return $date ? new \DateTime($date) : null;
    }

    /**
     * Maps price in cents to float.
     *
     * @param int|string $price
     *
     * @return float|null
     */
    public function mapPrice($price): ?float
    {
        return null === $price ? null : (float) ($price / 100);
    }
}
