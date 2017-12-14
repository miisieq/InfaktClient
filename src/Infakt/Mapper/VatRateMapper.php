<?php

declare(strict_types=1);

namespace Infakt\Mapper;

use Infakt\Model\VatRate;

class VatRateMapper extends AbstractMapper
{
    /**
     * {@inheritdoc}
     *
     * @param $data
     *
     * @return VatRate
     */
    public function map($data)
    {
        return (new VatRate())
            ->setId((int) $data['id'])
            ->setRate((float) $data['rate'])
            ->setName($data['name'])
            ->setSymbol($data['symbol']);
    }
}
