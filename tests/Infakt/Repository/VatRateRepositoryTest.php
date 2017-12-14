<?php
declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Collections\Criteria;
use Infakt\Exception\LogicException;
use Infakt\Infakt;
use Infakt\Model\VatRate;
use Infakt\Repository\VatRateRepository;
use Infakt\Tests\Client\TestClient;
use PHPUnit\Framework\TestCase;

class VatRateRepositoryTest extends TestCase
{
    /**
     * @var VatRateRepository
     */
    protected $repository;

    protected function setUp()
    {
        $this->repository = (new Infakt(new TestClient(), ['api_key' => 'X']))->getRepository('\\Infakt\\Model\\VatRate');
    }

    protected function tearDown()
    {
        $this->repository = null;
    }

    public function testGet()
    {
        $this->expectException(LogicException::class);

        $this->repository->get(1);
    }

    public function testCreate()
    {
        $this->expectException(LogicException::class);

        $this->repository->create(new VatRate());
    }

    public function testMatching()
    {
        $this->expectException(LogicException::class);

        $this->repository->matching(new Criteria());
    }
}
