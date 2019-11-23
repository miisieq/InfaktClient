<?php

declare(strict_types=1);

namespace Infakt\Mapper;

use Infakt\Model\EntityInterface;

interface ReverseMapperInterface
{
    /**
     * Map object to array.
     *
     * @param $entity EntityInterface
     */
    public function reverseMap(EntityInterface $entity): array;
}
