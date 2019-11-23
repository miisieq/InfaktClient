<?php

declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Exception\LogicException;
use Infakt\Infakt;
use Infakt\Model\BankAccount;
use Infakt\Repository\BankAccountRepository;
use Infakt\Tests\Client\TestClient;
use PHPUnit\Framework\TestCase;

class BankAccountRepositoryTest extends TestCase
{
    /**
     * @var BankAccountRepository
     */
    protected $repository;

    protected function setUp(): void
    {
        $this->repository = (new Infakt('XXX', new TestClient()))->getRepository('\\Infakt\\Model\\BankAccount');
    }

    protected function tearDown(): void
    {
        $this->repository = null;
    }

    public function testGet(): void
    {
        $this->expectException(LogicException::class);

        $this->repository->get(1);
    }

    public function testCreate(): void
    {
        $this->expectException(LogicException::class);

        $this->repository->create(new BankAccount());
    }
}
