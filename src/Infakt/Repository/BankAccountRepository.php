<?php

namespace Infakt\Repository;

use Infakt\Exception\LogicException;
use Infakt\Model\EntityInterface;

class BankAccountRepository extends AbstractObjectRepository
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
}
