<?php
declare(strict_types=1);

namespace Infakt\Model\Invoice;

/**
 * Class representing an invoice status
 *
 * @package Infakt\Model\Invoice
 */
class Status
{
    const DRAFT = 'draft';

    const SENT = 'sent';

    const PRINTED = 'printed';

    const PAID = 'paid';
}
