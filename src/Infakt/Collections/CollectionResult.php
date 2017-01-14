<?php

namespace Infakt\Collections;

use Infakt\Model\AbstractEntity;

class CollectionResult
{

    /**
     * @var int
     */
    protected $totalCount = 0;

    /**
     * @var array
     */
    protected $collection = [];

    /**
     * Add item to collection
     *
     * @param AbstractEntity $item
     * @return $this
     */
    public function addItemToCollection(AbstractEntity $item)
    {
        $this->collection[] = $item;

        return $this;
    }

    /**
     * Get collection
     *
     * @return array
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set collection
     *
     * @param AbstractEntity[] $collection
     * @return $this
     */
    public function setCollection(array $collection)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection total count
     *
     * @return int
     */
    public function getTotalCount()
    {
        return $this->totalCount;
    }

    /**
     * Set collection total count
     *
     * @param int $totalCount
     * @return $this
     */
    public function setTotalCount($totalCount)
    {
        $this->totalCount = (int) $totalCount;

        return $this;
    }
}
