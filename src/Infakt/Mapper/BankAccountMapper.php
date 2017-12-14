<?php
declare(strict_types=1);

namespace Infakt\Mapper;

use Infakt\Model\BankAccount;

class BankAccountMapper extends AbstractMapper
{
    /**
     * {@inheritdoc}
     *
     * @param $data
     * @return BankAccount
     */
    public function map($data)
    {
        return (new BankAccount())
            ->setId((int)$data['id'])
            ->setBankName($data['bank_name'])
            ->setAccountNumber(str_replace(' ', '', $data['account_number']))
            ->setSwift($data['swift'] ?: null)
            ->setDefault($data['default'])
        ;
    }
}
