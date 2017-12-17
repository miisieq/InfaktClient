<?php

declare(strict_types=1);

namespace Infakt\Mapper;

abstract class AbstractMapper implements MapperInterface
{
    /**
     * Maps date string to \DateTime object.
     *
     * @param string $date
     *
     * @return \DateTime|null
     */
    protected function mapDate(?string $date): ?\DateTime
    {
        return $date ? new \DateTime($date) : null;
    }

    /**
     * Maps price in cents to float
     *
     * @param int|string $price
     *
     * @return float|null
     */
    protected function mapPrice($price) :?float
    {
        return is_null($price) ? null : (float) ($price / 100);
    }
}
