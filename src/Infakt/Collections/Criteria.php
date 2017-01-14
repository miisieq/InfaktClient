<?php
namespace Infakt\Collections;

class Criteria
{
    /**
     * @var int
     */
    private $firstResult;

    /**
     * @var int
     */
    private $maxResults;

    /**
     * @var Comparison[]
     */
    private $comparisons;

    /**
     * @var SortClause[]
     */
    private $sortClauses;

    /**
     * Creates an instance of the class.
     *
     * @return Criteria
     */
    public static function create()
    {
        return new static();
    }

    public function __construct(array $comparisons = [], array $sortClauses = [], $firstResult = 0, $maxResults = 10)
    {
        $this->sortClauses = $sortClauses;
        $this->comparisons = $comparisons;

        $this->setFirstResult($firstResult);
        $this->setMaxResults($maxResults);
    }

    /**
     * Gets the current first result option of this Criteria.
     *
     * @return int
     */
    public function getFirstResult()
    {
        return $this->firstResult;
    }

    /**
     * Set the number of first result that this Criteria should return.
     *
     * @param int|null $firstResult The value to set.
     *
     * @return $this
     */
    public function setFirstResult($firstResult)
    {
        $this->firstResult = null === $firstResult ? null : (int) $firstResult;

        return $this;
    }

    /**
     * Gets maxResults.
     *
     * @return int
     */
    public function getMaxResults()
    {
        return $this->maxResults;
    }

    /**
     * Sets maxResults.
     *
     * @param int|null $maxResults The value to set.
     *
     * @return $this
     */
    public function setMaxResults($maxResults)
    {
        $this->maxResults = null === $maxResults ? null : (int) $maxResults;

        return $this;
    }

    /**
     * @param Comparison $comparison
     * @return $this
     */
    public function addComparison(Comparison $comparison)
    {
        $this->comparisons[] = $comparison;

        return $this;
    }

    /**
     * @return Comparison[]
     */
    public function getComparisons()
    {
        return $this->comparisons;
    }

    /**
     * @return SortClause[]
     */
    public function getSortClauses()
    {
        return $this->sortClauses;
    }

    /**
     * @param SortClause[] $sortClauses
     * @return Criteria
     */
    public function setSortClauses($sortClauses)
    {
        $this->sortClauses = $sortClauses;
        return $this;
    }

}
