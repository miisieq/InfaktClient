<?php
declare(strict_types=1);

namespace Infakt\Mapper;

abstract class AbstractMapper implements MapperInterface
{
    /**
     * Default date format
     */
    const DATE_FORMAT = 'Y-m-d';

    /**
     * Maps date string to \DateTime object
     *
     * @param string $date
     * @return \DateTime|null
     */
    protected function mapDate(?string $date): ?\DateTime
    {
        return $date ? new \DateTime($date) : null;
    }
}
