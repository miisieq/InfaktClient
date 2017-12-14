<?php

namespace Infakt\Repository;

use Infakt\Model\Invoice;

class InvoiceRepository extends AbstractObjectRepository
{
    public function getNextNumber($kind = 'vat')
    {
        $kinds = ['final', 'advance', 'margin', 'proforma', 'vat'];

        if (!in_array($kind, $kinds)) {
            throw new \LogicException('Invalid invoice kind "' . $kind . '"');
        }

        $query = $this->getServiceName() . '/next_number.json?kind=' . $kind;
        $response = $this->infakt->get($query);

        $data = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        return (string) $data['next_number'];
    }

    public function markAsPaid(Invoice $invoice, \DateTime $paidDate = null)
    {
        $query = $this->getServiceName() . '/' . $invoice->getId() . '/paid.json';
        $this->infakt->post($query);

        return;
    }
}
