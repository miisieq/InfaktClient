<?php

namespace Infakt\Repository;

use Infakt\Collections\Criteria;
use Infakt\Model\AbstractEntity;

interface ObjectRepositoryInterface
{

    public function matching(Criteria $criteria);

    public function get($entityId);

    public function create(AbstractEntity $entity);
}