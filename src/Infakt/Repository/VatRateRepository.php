<?php

declare(strict_types=1);

namespace Infakt\Repository;

use Infakt\Collections\CollectionResult;
use Infakt\Collections\Criteria;
use Infakt\Exception\LogicException;
use Infakt\Model\EntityInterface;

class VatRateRepository extends AbstractObjectRepository
{
    /**
     * {@inheritdoc}
     */
    public function get(int $entityId): EntityInterface
    {
        throw new LogicException('This repository does not implement entity getting.');
    }

    /**
     * {@inheritdoc}
     */
    public function create(EntityInterface $entity): EntityInterface
    {
        throw new LogicException('This repository does not implement entity creation.');
    }

    /**
     * {@inheritdoc}
     */
    public function matching(Criteria $criteria): CollectionResult
    {
        throw new LogicException('This repository does not implement entity searching.');
    }
}
