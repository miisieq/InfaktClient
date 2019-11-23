<?php

declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Collections\Comparison;
use Infakt\Collections\Criteria;
use Infakt\Collections\SortClause;
use PHPUnit\Framework\TestCase;

class CriteriaTest extends TestCase
{
    /**
     * @var Criteria
     */
    protected $criteria;

    /**
     * @var Comparison[]
     */
    protected $comparisons;

    /**
     * @var SortClause[]
     */
    protected $sortClauses;

    /**
     * @var int
     */
    protected $firstResult;

    /**
     * @var int
     */
    protected $maxResults;

    public function testComparisons(): void
    {
        $this->assertSame($this->comparisons, $this->criteria->getComparisons());
    }

    public function testAddComparisons(): void
    {
        $comparison = new Comparison('price', Comparison::GT, 10);
        $this->criteria->addComparison($comparison);

        $this->assertSame(array_merge($this->comparisons, [$comparison]), $this->criteria->getComparisons());
    }

    public function testSetComparisons(): void
    {
        $this->criteria->setComparisons([]);

        $this->assertSame([], $this->criteria->getComparisons());
    }

    public function testSortClauses(): void
    {
        $this->assertSame($this->sortClauses, $this->criteria->getSortClauses());
    }

    public function testAddSortClauses(): void
    {
        $sortClause = new SortClause('price', SortClause::ORDER_ASC);
        $this->criteria->addSortClause($sortClause);

        $this->assertSame(array_merge($this->sortClauses, [$sortClause]), $this->criteria->getSortClauses());
    }

    public function testSetSortClauses(): void
    {
        $this->criteria->setSortClauses([]);

        $this->assertSame([], $this->criteria->getSortClauses());
    }

    public function testFirstResult(): void
    {
        $this->assertSame($this->firstResult, $this->criteria->getFirstResult());
    }

    public function testMaxResults(): void
    {
        $this->assertSame($this->maxResults, $this->criteria->getMaxResults());
    }

    protected function setUp(): void
    {
        $this->comparisons = [
            new Comparison('name', Comparison::EQ, 'php'),
        ];

        $this->sortClauses = [
            new SortClause('name', SortClause::ORDER_DESC),
        ];

        $this->firstResult = 10;
        $this->maxResults = 25;

        $this->criteria = new Criteria($this->comparisons, $this->sortClauses, $this->firstResult, $this->maxResults);
    }

    protected function tearDown(): void
    {
        $this->comparisons = null;
        $this->sortClauses = null;
        $this->firstResult = null;
        $this->maxResults = null;
    }
}
