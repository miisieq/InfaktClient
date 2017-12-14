<?php

namespace Infakt\Repository;

use Infakt\Collections\Criteria;
use Infakt\Exception\LogicException;
use Infakt\Model\EntityInterface;

class VatRateRepository extends AbstractObjectRepository
{
    /**
     * {@inheritdoc}
     */
    public function get(int $entityId)
    {
        throw new LogicException('This repository does not implement entity getting.');
    }

    /**
     * {@inheritdoc}
     */
    public function create(EntityInterface $entity)
    {
        throw new LogicException('This repository does not implement entity creation.');
    }

    /**
     * {@inheritdoc}
     */
    public function matching(Criteria $criteria)
    {
        throw new LogicException('This repository does not implement entity searching.');
    }
}
