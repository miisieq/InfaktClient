<?php
declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Collections\SortClause;
use Infakt\Exception\LogicException;
use PHPUnit\Framework\TestCase;

class SortClauseTest extends TestCase
{
    public function testSettingAndGetting()
    {
        $sortClause = new SortClause('sample_field', 'desc');

        $this->assertInstanceOf(SortClause::class, $sortClause);
        $this->assertSame('sample_field', $sortClause->getField());
        $this->assertSame('desc', $sortClause->getOrder());
    }

    public function testWrongSortOrder()
    {
        $sortClause = new SortClause('sample_field', 'desc');

        $this->expectException(LogicException::class);
        $sortClause->setOrder('invalid order');
    }
}
