<?php

declare(strict_types=1);

namespace Infakt\Mapper;

use Infakt\Model\EntityInterface;

interface MapperInterface
{
    /**
     * Map array to object.
     *
     * @param $data
     */
    public function map($data): EntityInterface;
}
