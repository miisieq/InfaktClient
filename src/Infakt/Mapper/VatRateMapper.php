<?php

declare(strict_types=1);

namespace Infakt\Mapper;

use Infakt\Model\EntityInterface;
use Infakt\Model\VatRate;

class VatRateMapper implements MapperInterface
{
    /**
     * {@inheritdoc}
     *
     * @param $data
     *
     * @return VatRate
     */
    public function map($data): EntityInterface
    {
        return (new VatRate())
            ->setId((int) $data['id'])
            ->setRate((float) $data['rate'])
            ->setName($data['name'])
            ->setSymbol($data['symbol']);
    }
}
