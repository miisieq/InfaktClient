<?php

namespace Infakt\Repository;

use Infakt\Collections\Criteria;
use Infakt\Model\EntityInterface;

interface ObjectRepositoryInterface
{
    public function matching(Criteria $criteria);

    public function get(int $entityId);

    public function getAll(int $page, int $limit);

    public function create(EntityInterface $entity);
}
