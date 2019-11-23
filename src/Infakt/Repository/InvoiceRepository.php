<?php

declare(strict_types=1);

namespace Infakt\Repository;

use Infakt\Model\Invoice;

class InvoiceRepository extends AbstractObjectRepository
{
    /**
     * Get a next invoice number.
     *
     * @param string $kind
     * @return string
     */
    public function getNextNumber($kind = 'vat'): string
    {
        $kinds = ['final', 'advance', 'margin', 'proforma', 'vat'];

        if (!in_array($kind, $kinds)) {
            throw new \LogicException('Invalid invoice kind "'.$kind.'"');
        }

        $query = $this->getServiceName().'/next_number.json?kind='.$kind;
        $response = $this->infakt->get($query);

        $data = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        return (string) $data['next_number'];
    }

    /**
     * Mark an invoice as paid.
     *
     * @param Invoice $invoice
     * @param \DateTime|null $paidDate
     */
    public function markAsPaid(Invoice $invoice, \DateTime $paidDate = null): void
    {
        $query = $this->getServiceName().'/'.$invoice->getId().'/paid.json';
        $this->infakt->post($query);
    }
}
