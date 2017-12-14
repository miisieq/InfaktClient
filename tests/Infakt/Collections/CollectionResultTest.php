<?php
declare(strict_types=1);

namespace Infakt\Tests\Mapper;

use Infakt\Collections\CollectionResult;
use Infakt\Model\Client;
use PHPUnit\Framework\TestCase;

class CollectionResultTest extends TestCase
{
    public function testSettingAndGetting()
    {
        $client1 = (new Client())->setId(23);
        $client2 = (new Client())->setId(78);
        $client3 = (new Client())->setId(94);
        $client4 = (new Client())->setId(11);

        $collectionResult = new CollectionResult();
        $collectionResult->setCollection([$client1, $client2, $client3]);
        $collectionResult->addItemToCollection($client4);
        $collectionResult->setTotalCount(4);


        $this->assertInstanceOf(CollectionResult::class, $collectionResult);
        $this->assertSame(4, $collectionResult->getTotalCount());
        $this->assertSame([$client1, $client2, $client3, $client4], $collectionResult->getCollection());
    }
}
