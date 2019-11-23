<?php

declare(strict_types=1);

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
     * Criteria constructor.
     */
    public function __construct(array $comparisons = [], array $sortClauses = [], int $firstResult = 0, int $maxResults = 10)
    {
        $this->sortClauses = $sortClauses;
        $this->comparisons = $comparisons;
        $this->firstResult = $firstResult;
        $this->maxResults = $maxResults;
    }

    /**
     * Gets the current first result option of this Criteria.
     */
    public function getFirstResult(): int
    {
        return $this->firstResult;
    }

    /**
     * Gets maxResults.
     */
    public function getMaxResults(): int
    {
        return $this->maxResults;
    }

    /**
     * @return $this
     */
    public function addComparison(Comparison $comparison): self
    {
        $this->comparisons[] = $comparison;

        return $this;
    }

    /**
     * @param Comparison[] $comparisons
     *
     * @return Criteria
     */
    public function setComparisons(array $comparisons): self
    {
        $this->comparisons = $comparisons;

        return $this;
    }

    /**
     * @return Comparison[]
     */
    public function getComparisons(): array
    {
        return $this->comparisons;
    }

    /**
     * @return Criteria
     */
    public function addSortClause(SortClause $sortClause): self
    {
        $this->sortClauses[] = $sortClause;

        return $this;
    }

    /**
     * @param SortClause[] $sortClauses
     *
     * @return Criteria
     */
    public function setSortClauses(array $sortClauses): self
    {
        $this->sortClauses = $sortClauses;

        return $this;
    }

    /**
     * @return SortClause[]
     */
    public function getSortClauses(): array
    {
        return $this->sortClauses;
    }
}
